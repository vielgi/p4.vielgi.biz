<?php
class users_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
    public function __construct() {

    	# Make sure the base controller construct gets called
		parent::__construct();
    }


	/*-------------------------------------------------------------------------------------------------
	Display a form so users can sign up
	-------------------------------------------------------------------------------------------------*/
    public function signup() {

        # Set up the view
        $this->template->content = View::instance('v_users_signup');

        # Check If Email exists and Display error message
        $userExists = null;
        if (isset($_POST['email']) && $_POST['email']) {
            $userExists = DB::instance(DB_NAME)->select_row("
                SELECT user_id FROM users WHERE email = '".$_POST['email']."'
            ");
        }
        $errorMsgs = null;
        if ($userExists) {
            $errorMsgs = 'The email exists';
        } 
        else if (isset($_POST['email']) && $_POST['email']) {

            $data4 = Array (
                # Mark the time
                "modified_date" => Time::now(),

                # Hash password
                "password"      => sha1(PASSWORD_SALT.$_POST['password']),

                # Create a hashed token
                "token"        => sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string()),

                "email"        => $_POST['email']
            );

            # Insert the new user
            $user_id = DB::instance(DB_NAME)->insert('users', $data4);

            # Create also the contact info
            $data = Array (

                
                "first_name"          => $_POST['first_name'],
                "last_name"          => $_POST['last_name'],
                "username"          => $_POST['email'],
                "user_id"          => $user_id
            );

           
            $contact_id = DB::instance(DB_NAME)->insert_row('contacts',$data," WHERE user_id = '".$user_id."'");
            
            #add to general log
            $data2 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $contact_id,
                "FK_table"       => 'contacts',
                "login"          => false,
                "modified_by"    => $user_id
            );
            $data3 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $user_id,
                "FK_table"       => 'users',
                "login"          => false,
                "modified_by"    => $user_id
            );
            DB::instance(DB_NAME)->insert('logs',$data2);
            DB::instance(DB_NAME)->insert('logs',$data3);

            # Redirect to the login page and display a success message there
            //Router::redirect('/users/login/success/1');
            //p_login;
            $data4['password'] = $_POST['password'];

            $this->d_login($data4);
            die();
        }

        # Pass $errorMsgs to the view
        $this->template->content->errorMsgs = $errorMsgs;

        # Render the view
        echo $this->template;

    }


	/*-------------------------------------------------------------------------------------------------
	Display a form so users can login
	-------------------------------------------------------------------------------------------------*/
    public function login($success = null) {

        
            $this->template->content = View::instance('v_users_login');
            $successMsg = null;
            if ($success) {
                $successMsg = 'Successfully Signed Up -- Please Login Now Below';
            }
            //exit;
            # Pass $successMsg to the view
            $this->template->content->successMsg = $successMsg;

            echo $this->template;
       
    }


    /*-------------------------------------------------------------------------------------------------
    Process the login form
    -------------------------------------------------------------------------------------------------*/
    public function p_login() {

        //exit;
        
        # Hash the password they entered so we can compare it with the ones in the database
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Set up the query to see if there's a matching email/password in the DB
		$q =
            "
            SELECT token
			FROM users
			WHERE email = '".$_POST['email']."'
			AND password = '".$_POST['password']."'
            ";

		# If there was, this will return the token
		$token = DB::instance(DB_NAME)->select_field($q);
        
       // $errorMsg = null;
		# Success
		if($token) {

			# Don't echo anything to the page before setting this cookie!
			setcookie('token',$token, strtotime('+1 year'), '/');

			# Send them to the homepage
			Router::redirect('/');
		}
		# Fail
		else {
			$errorMsg = '<div>Login failed! <a href="/users/login">Try again?</a> OR <a href="/users/signup">REGISTER HERE</a>.</div>';
            $this->template->content = View::instance('v_users_login');
            $this->template->content->errorMsg = $errorMsg;
            echo $this->template;
		}
        
    }

    /*-------------------------------------------------------------------------------------------------
    Login from Sign-Up form directly
    -------------------------------------------------------------------------------------------------*/
    public function d_login($internalData = false) {

        //exit;
        if (!empty($internalData)) {
            $data = $internalData;
        } else {
            $data = $_POST;
        }
        
        # Hash the password they entered so we can compare it with the ones in the database
		$data['password'] = sha1(PASSWORD_SALT.$data['password']);

		# Set up the query to see if there's a matching email/password in the DB
		$q =
            "
            SELECT token, admin
			FROM users
			WHERE email = '".$data['email']."'
			AND password = '".$data['password']."'
            ";

		# If there was, this will return the token
		$result = DB::instance(DB_NAME)->select_row($q);
        $token = $result['token'];
        $admin = $result['admin'];
        
       // $errorMsg = null;
		# Success
		if($token) {

			# Don't echo anything to the page before setting this cookie!
			setcookie('token',$token, strtotime('+1 year'), '/');
            if ($admin) {
                $_SESSION['admin'] = 1;
            }
            // check if auth - if (!empty($)SESSION['uid'])
            // logout -  unset ($_SESSION['uid'])

			# Send them to the homepage
			Router::redirect('/');
		}
		# Fail
		else {
			$errorMsg = '<div>Login failed! <a href="/users/login">Try again?</a> OR <a href="/users/signup">REGISTER HERE</a>.</div>';
            $this->template->content = View::instance('v_users_login');
            $this->template->content->errorMsg = $errorMsg;
            echo $this->template;
		}
        
    }

    /*-------------------------------------------------------------------------------------------------
	No view needed here, they just goto /users/logout, it logs them out and sends them
	back to the homepage.
	-------------------------------------------------------------------------------------------------*/
    public function logout() {

        # Generate a new token they'll use next time they login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Update their row in the DB with the new token
        $data = Array(
            'token' => $new_token
        );
        DB::instance(DB_NAME)->update('users',$data, 'WHERE user_id ='. $this->user->user_id);

        # Delete their old token cookie by expiring it
        setcookie('token', '', strtotime('-1 year'), '/');
        if (!empty($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        # Send them back to the homepage
        Router::redirect('/');

    }

	/*-------------------------------------------------------------------------------------------------
        UPDATE OF PROFILE BY LOGGED-IN USER ONLY
	-------------------------------------------------------------------------------------------------*/
    public function profile($user_name = NULL) {

		# Only logged in users are allowed...
		if(!$this->user) {
			die('Members only. <a href="/users/login">Please Login</a> OR <a href="/users/signup">Sign Up</a>');
            $this->template->content = View::instance('v_index_index');
		}

		# Set up the View
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile";

		# Pass the data to the View
		$this->template->content->user_name = $user_name;

        $successMsg = null;
        if (isset($_POST['btn']) && $_POST['btn'] == 'Submit') {
            $data = Array (

                "modified_date"          => Time::now(),
                "user_id"          => $this->user->user_id,
                "modified_by" => $this->user->user_id,
                "first_name"          => $_POST['first_name'],
                "last_name"          => $_POST['last_name'],
                "address1" => $_POST['address1'],
                "address2" => $_POST['address2'],
                "city" => $_POST['city'],
                "zip" => $_POST['zip'],
                "state" => $_POST['state'],
                "country" => $_POST['country'],
                "username"          => $_POST['email'],
            );

            $data2 = Array (

                "email"          => $_POST['email'],
                "modified_by"    => $this->user->user_id,
                "modified_date"  => Time::now()
            );

            unset($_POST['btn']);
            $contact_id = DB::instance(DB_NAME)->insert_row('contacts',$data," WHERE user_id = '".$this->user->user_id."'");
            DB::instance(DB_NAME)->update('users',$data2," WHERE user_id = '".$this->user->user_id."'");
            
            #create general log entry
            $data3 = Array (

                "modified_date"  => Time::now(),
                "FK_id"          => $contact_id,
                "FK_table"       => 'contacts',
                "login"          => false,
                "modified_by"    => $this->user->user_id
            );

            DB::instance(DB_NAME)->insert('logs',$data3);
            
            $successMsg = 'Successfully Updated';

        }

        $this->template->content->successMsg = $successMsg;


        # Set up the query to retrieve the logged-in user's contact info from contacts and users
		$q = "SELECT 
                *
			FROM users u inner join
            contacts c on u.user_id=c.user_id 

			WHERE u.user_id = '".$this->user->user_id."'
            ORDER BY c.modified_date DESC
            LIMIT 1
            ";
        
        # Run query
		$user = DB::instance(DB_NAME)->select_row($q);

		# Pass array to the view
		$this->template->content->user = $user;

        # Display the view
		echo $this->template;

    }

    /*-------------------------------------------------------------------------------------------------
        LOG of UPDATES TO PROFILE
    -------------------------------------------------------------------------------------------------*/
    public function log ($user_name = NULL) {

        # Only logged in users are allowed...
        if(!$this->user) {
            die('Members only. <a href="/users/login">Please Login</a> OR <a href="/users/signup">Sign Up</a>');
            $this->template->content = View::instance('v_index_index');
        }

        # Set up the View
        $this->email_template->content = View::instance('v_users_log');
        $this->email_template->title = "Profile History";

        # Pass the data to the View
        $this->email_template->content->user_name = $user_name;

        # Set up the query to retrieve the log of changes
        $q = "
            SELECT 
            c.modified_date, c.first_name, c.last_name, u.email, c.address1, c.address2, c.city, c.state, c.zip, c.country
            FROM users u inner join
            contacts c on u.user_id=c.user_id 
            WHERE u.user_id = '".$this->user->user_id."'
            ORDER BY c.modified_date DESC
            ";
        
        # Run query
        $logs = DB::instance(DB_NAME)->select_rows($q);

        # Pass array to the view
        $this->email_template->content->logs = $logs;

        # Display the view
        echo $this->email_template;
    }

} # end of the class
