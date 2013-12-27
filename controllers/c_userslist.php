<?php

class userslist_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		# Only let logged in users access the methods in this controller
		if(!$this->user) {
			die("Members only");
		}
		
	} 

	/*-------------------------------------------------------------------------------------------------
	View only all plans
	-------------------------------------------------------------------------------------------------*/
	public function index() {
        
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        # using JqGrid lib
        $this->template->jtable = true;

		# Set up view
		$this->template->content = View::instance('v_userslist_index');
		
		# Render view
		echo $this->template;
	}

    public function get_users() {
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        // extract passed parameters from jtable
        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $params);
        

        // count all records query
        $q = "  SELECT COUNT(*) as count
                FROM users AS u 
              WHERE deleted = 0
        ";
         // run query
        $count = DB::instance(DB_NAME)->select_row($q);
        $order = isset($params['jtSorting']) ? $params['jtSorting'] : 'user_id DESC';
        
        # Set up query
        $q = "
              SELECT 
              u.user_id, u.modified_by, u.admin, u.deleted, u.email, u.modified_date
              FROM users AS u 
              WHERE deleted = 0
              ORDER BY {$order}  
              LIMIT {$params['jtStartIndex']}, {$params['jtPageSize']}
            ";
       
        # Run query
        $users = DB::instance(DB_NAME)->select_rows($q);
        $items = array();
        $i = 0;
        foreach($users as $user) {
            $items[] = array(
                "user_id" => $user["user_id"],
                "email"   => $user["email"],
                "modified_date" => Time::display($user['modified_date'],'Y-m-d H:m:s'),
                "admin" => $user["admin"],
                "deleted" => $user["deleted"]
            );
        }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $count['count'];
        $jTableResult['Records'] = $items;
        print json_encode($jTableResult);
    }

    public function update_user() {
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        # Set up query
        $q = "UPDATE users SET
			  email='".$_POST['email']."', admin='".(!empty($_POST['admin'])?1:0)."', deleted='".(!empty($_POST['deleted'])?1:0)."'
			  WHERE user_id=".$_POST['user_id'];
        $plans = DB::instance(DB_NAME)->query($q);
		
		#Adding action to System Log
        $data3 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $_POST['user_id'],
                "FK_table"       => 'users',
                "login"          => false,
                "modified_by"    => $this->user->user_id
        );
        DB::instance(DB_NAME)->insert('logs',$data3);

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        print json_encode($jTableResult);
    }

} # eoc
