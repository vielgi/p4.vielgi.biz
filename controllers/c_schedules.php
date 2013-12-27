<?php

class schedules_controller extends base_controller {
	
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
	Display a new post form
	-------------------------------------------------------------------------------------------------*/
	public function add() {
		
		$this->template->content = View::instance("v_posts_add");
		$client_files_body = Array (
				'/js/form-ajax.js',
				'/js/add_post.js'
		);

		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		echo $this->template;
		
	}	
	
	
	/*-------------------------------------------------------------------------------------------------
	Create a new goal -- only for logged-in users or saving to session
	-------------------------------------------------------------------------------------------------*/
    public function p_add_to_session() {
        if (!empty($_POST) && $_POST['work']) {
            $_SESSION['sessionData'] = serialize($_POST);
        }
    }

	public function p_add() {
	
		# 1. Create the schedule
		$data = Array (
				"modified_date"  => Time::now(),
                "modified_by"    => $this->user->user_id,
                "work"           => $_POST['work'],
                "sleep"          => $_POST['sleep'],
                "leisure"        => $_POST['leisure'],
                "care"           => $_POST['care'],
                "eat"            => $_POST['eat'],
                "house"          => $_POST['house'],
                "free"           => $_POST['free']
        );

        $schedule_id = DB::instance(DB_NAME)->insert_row('schedules',$data);

		# 2. Create the goal
		$data2 = Array (
				"modified_date"  => Time::now(),
                "modified_by"    => $this->user->user_id,
                "schedule_id"    => $schedule_id,
                "public"         => 1, 
                "goals"			 => $_POST['goals']
        );

        $goal_id = DB::instance(DB_NAME)->insert_row('goals',$data2);
            
        # 3. Insert into log with goal item only
        $data3 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $goal_id,
                "FK_table"       => 'goals',
                "login"          => false,
                "modified_by"    => $user_id
        );
        DB::instance(DB_NAME)->insert('logs',$data3);
		
		//Router::redirect('/posts/');
		$view = new View('');
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	View all goals
	-------------------------------------------------------------------------------------------------*/
	public function index() {

		# Set up view
		$this->template->content = View::instance('v_goals_index');
		
		# Set up query
		$q = "
			SELECT 
			*
			FROM goals as g
			ORDER BY  g.modified_date    DESC
            ";
		
		# Run query	
		$goals = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->goals = $goals;
		
		# Render view
		echo $this->template;
		
	}
    
} # eoc
