<?php

class goals_controller extends base_controller {
	
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
		$this->template->content = View::instance('v_goals_index');
		
		# Render view
		echo $this->template;
	}

    public function get_goals() {
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        // extract passed parameters from jtable
        $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($query, $params);
        

        // count all records query
        $q = "
        		SELECT COUNT(*) as count
                FROM goals AS g 
                inner JOIN contacts AS c ON c.user_id=c.user_id
                and c.modified_date = (select max(modified_date) from
                contacts as c where c.user_id=g.modified_by)
                where goals is not null
        ";
         // run query
        $count = DB::instance(DB_NAME)->select_row($q);
        $order = isset($params['jtSorting']) ? $params['jtSorting'] : 'goal_id DESC';
        
        # Set up query
        $q = "  SELECT
                c.first_name, c.last_name, 
                g.goal_id,g.modified_date, g.goals, g.public
                FROM goals AS g 
                inner JOIN contacts AS c ON c.user_id=c.user_id
                and c.modified_date = (select max(modified_date) from
                contacts as c where c.user_id=g.modified_by)
                where goals is not null
              ORDER BY {$order}  
              LIMIT {$params['jtStartIndex']}, {$params['jtPageSize']}

            ";
       
        # Run query
        $goals = DB::instance(DB_NAME)->select_rows($q);
        $items = array();
        $i = 0;
        foreach($goals as $goal) {
            $items[] = array(
                "goal_id"    => $goal["goal_id"],
                "modified_date"  => Time::display($goal["modified_date"],'Y-m-d H:m:s'),
                "first_name" => $goal["first_name"],
                "last_name"  => $goal["last_name"],
                "public"     => $goal["public"]
            );
        }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $count['count'];
        $jTableResult['Records'] = $items;
        print json_encode($jTableResult);
    }

} # eoc
