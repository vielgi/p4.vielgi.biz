<?php

class plans_controller extends base_controller {
	
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
		$this->template->content = View::instance('v_plans_index');
		
		# Render view
		echo $this->template;
	}

    public function get_plans() {
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        // extract passed parameters from jtable
        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $params);
        

        // count all records query
        $q = "SELECT COUNT(*) as count
        FROM plans AS p inner join
        users as u on p.modified_by=u.user_id
        inner JOIN contacts AS c ON u.user_id=c.user_id
        and c.modified_date = (select max(modified_date) from
          contacts as c where c.user_id=p.modified_by)
        ";
         // run query
        $count = DB::instance(DB_NAME)->select_row($q);
        $order = isset($params['jtSorting']) ? $params['jtSorting'] : 'plan_id DESC';
        
        # Set up query
        $q = "SELECT
              p.plan_id, p.description,p.time,p.public, c.first_name, c.last_name, p.modified_date, p.show
              FROM plans AS p inner join
              users as u on p.modified_by=u.user_id
              inner JOIN contacts AS c ON u.user_id=c.user_id
              and c.modified_date = (select max(modified_date) from
              contacts as c where c.user_id=p.modified_by)
              ORDER BY {$order}  
              LIMIT {$params['jtStartIndex']}, {$params['jtPageSize']}
            ";
       
        # Run query
        $plans = DB::instance(DB_NAME)->select_rows($q);
        $items = array();
        $i = 0;
        foreach($plans as $plan) {
            $items[] = array(
                "plan_id" => $plan["plan_id"],
                "modified_date" => Time::display($plan['modified_date'],'Y-m-d H:m:s'),
                "first_name" => $plan["first_name"],
                "last_name" => $plan["last_name"],
                "public" => $plan["public"],
                "show" => $plan["show"],
                "description" => $plan["description"],
                "time" => $plan["time"]
            );
        }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $count['count'];
        $jTableResult['Records'] = $items;
        print json_encode($jTableResult);
    }

    public function update_plan() {
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

    public function create_plan() {
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
			  p.plan_id, p.description,p.time,p.public, c.first_name, c.last_name, p.modified_date, p.show
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

    public function delete_plan() {
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

	public function load_five() {

		# Set up view
		$this->template->content = View::instance('v_plans_index');
		
		# Set up query
		$q = "
				SELECT * FROM plans 
                WHERE public = 1 
                AND show = 1
 				ORDER BY MODIFIED_DATE DESC
				LIMIT 5
            ";
		
		# Run query	
		$plans = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $plans array to the view
		$this->template->content->plans = $plans;
		
		# Render view
		echo $this->template;
	}

} # eoc
