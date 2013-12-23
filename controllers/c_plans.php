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
	Display a new plan form for editing by admins only and the logged-in users' own plans
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
	Create a new plan -- only for logged-in users and admins
	-------------------------------------------------------------------------------------------------*/
	public function p_add() {
		
		# 1. Create the plan
		$data = Array (
				"modified_date"  => Time::now(),
                "modified_by"    => $user_id,
                "description"    => $_POST['description'],
                "public"         => $_POST['public'],
                "time"           => $_POST['time']
        );

        $plan_id = DB::instance(DB_NAME)->insert_row('plans',$data);

		# 2. Update plan only for logged-in admins
		/*$data2 = Array(	
				"modified_by"    => $user_id,
				"modified_date"	 => Time::now(),
                "description"    => $_POST['description'],
                "public"         => $_POST['public'],
                "time"           => $_POST['time']
            DB::instance(DB_NAME)->update('[plans',$_POST, "WHERE plan_id = '".$_POST['plan_id']."'");
        ); */ 
        # 3. Insert plan into log
        $data3 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $plan_id,
                "FK_table"       => 'plans',
                "login"          => false,
                "modified_by"    => $user_id
        );
        DB::instance(DB_NAME)->insert('logs',$data3);
		
		//Router::redirect('/posts/');
		$view = new View('');
	}
	
	/*-------------------------------------------------------------------------------------------------
	View only all plans
	-------------------------------------------------------------------------------------------------*/
	public function index() {

		# Set up view
		$this->template->content = View::instance('v_plans_index');
		
		# Set up query
		$q = "SELECT 
			  p.description,p.time,p.public, c.first_name, c.last_name, p.modified_date
			  FROM plans AS p inner join
			  users as u on p.modified_by=u.user_id
    		  inner JOIN contacts AS c ON u.user_id=c.user_id 
			  and c.modified_date = (select max(modified_date) from
			  contacts as c where c.user_id=p.modified_by)
            ";
		
		# Run query	
		$plans = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $plans array to the view
		$this->template->content->plans = $plans;
		
		# Render view
		echo $this->template;
		
	}
    
    /*-------------------------------------------------------------------------------------------------
	View and update plans that logged-in user has created
	-------------------------------------------------------------------------------------------------*/
	public function mine() {
		
        
		# Set up view
		$this->template->content = View::instance('v_plans_mine');
        
        
        $successMsg = null;
        if (isset($_POST['btn']) && $_POST['btn'] == 'Update') {
            
            $_POST['modified_date'] = Time::now();
            /*$_POST['description'] = trim($_POST['description'] );
            */$_POST['time'] = trim($_POST['time'] );
            $_POST['modified_by'] = $user_id;
            unset($_POST['btn']);
            DB::instance(DB_NAME)->update('plans',$_POST, "WHERE plan_id = '".$_POST['plan_id']."'");
            
            
            $successMsg = 'Successfully Updated Plan!';
        } 
        else if (isset($_POST['btn']) && $_POST['btn'] == 'Delete') {
            
            DB::instance(DB_NAME)->delete('posts', "WHERE plan_id = '".$_POST['plan_id']."'");
            
            $successMsg = 'Successfully Deleted Plan!';
        }
        
        $this->template->content->successMsg = $successMsg;
       
		
		# Set up query
		$q = 'SELECT 
			  p.description,p.time,p.public, c.first_name, c.last_name, p.modified_date
			  FROM plans AS p inner join
			  users as u on p.modified_by=u.user_id
    		  inner JOIN contacts AS c ON u.user_id=c.user_id 
			  and c.modified_date = (select max(modified_date) from
			  contacts as c where c.user_id=p.modified_by)
    		  and p.modified_by = '.$this->user->user_id;
		
		# Run query	
		$plans = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $plans array to the view
		$this->template->content->plans = $plans;
		
		# Render view
		echo $this->template;
	}

	/*-------------------------------------------------------------------------------------------------
	View and update plans that logged-in user has created
	-------------------------------------------------------------------------------------------------*/
	public function admin_view() {
		
        
		# Set up view
		$this->template->content = View::instance('v_plans_mine');
        
        
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
	
} # eoc
