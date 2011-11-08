<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Demo controller for GitIgniter library
	 *
	 */
	 
	public function index(){
	
		$this->load->library('git_igniter');
		
		
		if ( ! $_GET['code'] )
		{
			
			$this->git_igniter->authorize_request();	
			
		}
		else
		{
		
			$token = $this->git_igniter->process_code();

			/*You should pass a real user id corresponding to your table instead of "1"
			  The TRUE and TRUE are default values, showing them here to make you see that you can 
			  opt for session and/or DB storage of tokens. */
			  
			$this->git_igniter->store_token( $token, 1, TRUE, TRUE ); 

			echo '<pre>Don\'t show the token, please -> ';
			print_r( $token );
			echo '<pre>';

					
		}
		
		//Assuming token has been saved to session. If it hasn't, use $this->git_igniter->retrieve_token();
		
		
	}
	
	public function test_post(){
		
		$this->load->library('git_igniter');
		$repo_options = array(
								'name' => 'test' . time()
		);
	
		$test = $this->git_igniter->post_call( 'user/repos', $repo_options );
			$this->firephp->log($test); //debug only

			echo '<pre>';
			print_r( $test );
			echo '<pre>';
	
	}
	
	public function test_get(){
	
		$this->load->library('git_igniter');
		
		$test = $this->git_igniter->get_call( 'user/followers' );

		echo '<pre>';
		print_r( $test );
		echo '<pre>';

	}
	
	public function retrieve_token( $id ){
	
		$this->load->library('git_igniter');
		
		$test = $this->git_igniter->retrieve_token( $id );

		echo '<pre>';
		print_r( $test );
		echo '<pre>';		
	
	}
	
	
	
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */