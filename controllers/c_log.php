<?php

class log_controller extends base_controller {
	
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		# Only let logged in users access the methods in this controller
		if(!$this->user) {
			die("Members only");
		}
		
	} 
	
	/*-------------------------------------------------------------------------------------------------
	View system log
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
		$this->template->content = View::instance('v_log_index');
		
		# Render view
		echo $this->template;
		
	}

    /*-------------------------------------------------------------------------------------------------
    Retrieve logs data
    -------------------------------------------------------------------------------------------------*/
    
    public function get_logs() {
        
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
            FROM logs AS l inner join
            users as u on l.modified_by=u.user_id
            inner JOIN contacts AS c ON u.user_id=c.user_id
            and c.modified_date = (select max(modified_date) from
            contacts as c where c.user_id=l.modified_by);
        ";
         // run query
        $count = DB::instance(DB_NAME)->select_row($q);
        $order = isset($params['jtSorting']) ? $params['jtSorting'] : 'log_id DESC';
        
        # Set up query
        $q = "
            SELECT
            l.log_id, l.FK_table,c.first_name, c.last_name, l.modified_date, l.login, l.FK_id
            FROM logs AS l inner join
            users as u on l.modified_by=u.user_id
            inner JOIN contacts AS c ON u.user_id=c.user_id
            and c.modified_date = (select max(modified_date) from
            contacts as c where c.user_id=l.modified_by)
            ORDER BY {$order}  
            LIMIT {$params['jtStartIndex']}, {$params['jtPageSize']}
            ";
    
        # Run query
        $logs = DB::instance(DB_NAME)->select_rows($q);
        $items = array();
        $i = 0;
        foreach($logs as $log) {
            $items[] = array(
                "log_id" => $log["log_id"],
                "posted_on" => Time::display($log['modified_date'],'Y-m-d H:m:s'),
                "first_name" => $log["first_name"],
                "last_name" => $log["last_name"],
                "login" => $log["login"],
                "action" => $log["FK_table"],
                "fk"     =>$log["FK_id"]
            );
        }

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['TotalRecordCount'] = $count['count'];
        $jTableResult['Records'] = $items;
        print json_encode($jTableResult);
    }

    /*-------------------------------------------------------------------------------------------------
    Delete Selected Log
    -------------------------------------------------------------------------------------------------*/
    
    public function delete_log() {
        # check if user is admin
        if (empty($this->user->admin)) {
            Router::redirect('/');
            die();
        }

        # Set up query
        $q = "DELETE FROM logs
              WHERE log_id=".$_POST['log_id'];
        $logs = DB::instance(DB_NAME)->query($q);

        //Return result to jTable
        $jTableResult = array();
        $jTableResult['Result'] = "OK";
        print json_encode($jTableResult);
    }
} # eoc
