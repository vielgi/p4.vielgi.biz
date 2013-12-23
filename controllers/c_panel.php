<?php

class control_panel_controller extends base_controller {
	
	
	/*-------------------------------------------------------------------------------------------------
	Dashboard panel
	-------------------------------------------------------------------------------------------------*/
	public function control_panel() {
		
		#setup view
		$this->template->content = View::instance("v_panel");
		$this->template->title = "Control Panel";

		#JS included
		$client_files_body = Array (
				'/js/form-ajax.js',
				'/js/panel.js'
		);

		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		echo $this->template;
		
	}

	public function p_control_panel() {

    $data = Array();

    # Find out how many posts there are
    $q = "SELECT count(post_id) FROM posts";
    $data['post_count'] = DB::instance(DB_NAME)->select_field($q);

    # Find out how many users there are
    $q = "SELECT count(user_id) FROM users";
    $data['user_count'] = DB::instance(DB_NAME)->select_field($q);

    # Find out when the last post was created
    $q = "SELECT created FROM posts ORDER BY created DESC LIMIT 1";
    $data['most_recent_post'] = Time::display(DB::instance(DB_NAME)->select_field($q));

    # Send back json results to the JS, formatted in json
	echo json_encode($data);
	}
}