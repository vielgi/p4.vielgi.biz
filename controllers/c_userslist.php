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
                FROM users as u left join
                contacts AS c ON 
                u.user_id=c.user_id
                and c.modified_date = (select max(modified_date) from
                contacts as c where c.user_id=u.modified_by)
                where deleted=0
        ";
         // run query
        $count = DB::instance(DB_NAME)->select_row($q);
        $order = isset($params['jtSorting']) ? $params['jtSorting'] : 'user_id DESC';
        
        # Set up query
        $q = "
              SELECT 
              u.user_id, u.modified_by, admin, deleted, email, u.modified_date,
              c.first_name, c.last_name, c.address1, c.address2, c.city, c.state, c.zip, c.contact_id,
              c.country, c.username,c.modified_date, c.modified_date
              FROM users as u left join
              contacts AS c ON 
              u.user_id=c.user_id
              and c.modified_date = (select max(modified_date) from
              contacts as c where c.user_id=u.modified_by)
              where deleted=0
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
                "first_name" => $user["first_name"],
                "last_name" => $user["last_name"],
                "admin" => $user["admin"]
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
        $q = "UPDATE plans SET
			  description='".$_POST['description']."', time='".$_POST['time']."', public='".(!empty($_POST['public'])?1:0)."'
			  WHERE plan_id=".$_POST['plan_id'];
        $plans = DB::instance(DB_NAME)->query($q);
		
		#Adding action to System Log
        $data3 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $_POST['plan_id'],
                "FK_table"       => 'plans',
                "login"          => false,
                "modified_by"    => $this->user->user_id
        );
        DB::instance(DB_NAME)->insert('logs',$data3);

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        print json_encode($jTableResult);
    }

    public function create_user() {
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        # Set up query
        $q = "INSERT INTO plans SET
			  description='".$_POST['description']."', time='".$_POST['time']."', public='".(!empty($_POST['public'])?1:0)."',
			  modified_date='".Time::now()."', modified_by='".$this->user->user_id."'";
        $plans = DB::instance(DB_NAME)->query($q);

        # Set up query
        $q = "SELECT
			  p.plan_id, p.description,p.time,p.public, c.first_name, c.last_name, p.modified_date
			  FROM plans AS p inner join
			  users as u on p.modified_by=u.user_id
    		  inner JOIN contacts AS c ON u.user_id=c.user_id
			  and c.modified_date = (select max(modified_date) from
			  contacts as c where c.user_id=p.modified_by) and p.plan_id = LAST_INSERT_ID()
            ";

        # Run query
        $result = DB::instance(DB_NAME)->select_row($q);
        $result["posted_on"] = Time::display($result['modified_date'],'Y-m-d H:m:s');

        #Adding action to System Log
        $data3 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $result["plan_id"],
                "FK_table"       => 'plans',
                "login"          => false,
                "modified_by"    => $this->user->user_id
        );
        DB::instance(DB_NAME)->insert('logs',$data3);

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Record'] = $result;
        print json_encode($jTableResult);
    }

    public function delete_user() {
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        # Set up query
        $q = "DELETE FROM plans
			  WHERE plan_id=".$_POST['plan_id'];
        $plans = DB::instance(DB_NAME)->query($q);

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        print json_encode($jTableResult);
    }

} # eoc
