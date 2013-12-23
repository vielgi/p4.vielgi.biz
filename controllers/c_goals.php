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
	Create a new goal -- only for logged-in users
	-------------------------------------------------------------------------------------------------*/
	public function p_add() {
		
		# 1. Create the schedule
		$data = Array (
				"modified_date"  => Time::now(),
                "modified_by"    => $user_id,
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
                "modified_by"    => $user_id,
				"goal_name"      => $_POST['goal_name'],
				"plan_id"        => $_POST['plan_id'],
                "schedule"       => $schedule_id,
                "public"         => true,
                "goal_date"      => $_POST['goal_date']
        );

        $goal_id = DB::instance(DB_NAME)->insert_row('goals',$data);
            
        # 3. Insert into log
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
		$q = "SELECT 
			    posts.content,
			    posts.created,
			    posts.user_id AS post_user_id,
			    users_users.user_id AS follower_id,
			    users.first_name,
			    users.last_name
			FROM posts
			INNER JOIN users_users 
			    ON posts.user_id = users_users.user_id_followed
			INNER JOIN users 
			    ON posts.user_id = users.user_id
			WHERE users_users.user_id = '".$this->user->user_id."'
            order by posts.created DESC
            ";
		
		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
		
	}
    
    /*-------------------------------------------------------------------------------------------------
	View all goals that logged-in user has created
	-------------------------------------------------------------------------------------------------*/
	public function mine() {
		
        
		# Set up view
		$this->template->content = View::instance('v_posts_mine');
        
        
        $successMsg = null;
        if (isset($_POST['btn']) && $_POST['btn'] == 'Update') {
            
            $_POST['modified'] = Time::now();
            $_POST['content'] = trim($_POST['content'] );
            unset($_POST['btn']);
            DB::instance(DB_NAME)->update('posts',$_POST, "WHERE post_id = '".$_POST['post_id']."'");
            
            
            $successMsg = 'Successfully Updated Post!';
        } 
        else if (isset($_POST['btn']) && $_POST['btn'] == 'Delete') {
            
            DB::instance(DB_NAME)->delete('posts', "WHERE post_id = '".$_POST['post_id']."'");
            
            $successMsg = 'Successfully Deleted Post!';
        }
        
        $this->template->content->successMsg = $successMsg;
       
		
		# Set up query
		$q = 'SELECT 
                posts.post_id,
			    posts.content,
			    posts.created,
                posts.modified,
			    posts.user_id
			FROM posts
			INNER JOIN users 
			    ON posts.user_id = users.user_id
			WHERE posts.user_id = '.$this->user->user_id;
		
		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
	}
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function users() {
		
		# Set up view
		$this->template->content = View::instance("v_posts_users");
		
		# Set up query to get all users
		$q = 'SELECT *
			FROM users';
			
		# Run query
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		# Set up query to get all connections from users_users table
		$q = 'SELECT *
			FROM users_users
			WHERE user_id = '.$this->user->user_id;
			
		# Run query
		$connections = DB::instance(DB_NAME)->select_array($q,'user_id_followed');
		
		# Pass data to the view
		$this->template->content->users       = $users;
		$this->template->content->connections = $connections;
		
		# Render view
		echo $this->template;
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Creates a row in the users_users table representing that one user is following another
	-------------------------------------------------------------------------------------------------*/
	public function follow($user_id_followed) {
	
	    # Prepare the data array to be inserted
	    $data = Array(
	        "created"          => Time::now(),
	        "user_id"          => $this->user->user_id,
	        "user_id_followed" => $user_id_followed
	        );
	
	    # Do the insert
	    DB::instance(DB_NAME)->insert('users_users', $data);
	
	    # Send them back
	    Router::redirect("/posts/users");
	
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Removes the specified row in the users_users table, removing the follow between two users
	-------------------------------------------------------------------------------------------------*/
	public function unfollow($user_id_followed) {
	
	    # Set up the where condition
	    $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
	    
	    # Run the delete
	    DB::instance(DB_NAME)->delete('users_users', $where_condition);
	
	    # Send them back
	    Router::redirect("/posts/users");
	
	}

	public function control_panel() {
	# Setup view
        $this->template->content = View::instance('v_posts_control_panel');
        $this->template->title   = "Control Panel";

    # JavaScript files
        $client_files_body = Array(
            '/js/panel.js');
        $this->template->client_files_body = Utils::load_client_files($client_files_body);

    # Render template
    echo $this->template;
	}
} # eoc
