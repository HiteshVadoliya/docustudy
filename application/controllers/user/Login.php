<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Settingmodel');
		$this->sendemail = true;
	}
	
	public function register()
	{

		$post	= $this->input->post();
		$response = array();
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[doc_user.email]');
		$this->form_validation->set_rules('password','Password','required');		
		
		if($this->form_validation->run())
		{
			$password = md5($post['password']);
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$ForgotString = substr( str_shuffle( $chars ), 0,13 );
			
			$data = array(
				'fname'			=>	$post['fname'],
				'lname'			=>	$post['lname'],
				'phone'			=>	$post['phone'],
				'email'			=>	$post['email'],
				'password'		=>	$password,
				'ForgotString'	=>	$ForgotString,
				'status'		=>	0,
				'email_confirm'	=>	0,
			);
			
			$res = $this->common->insert_record('doc_user',$data);
			if($res)
			{
				$email_body = $this->load->view(FRONTEND.'email/registration_mail', $data, TRUE);
				$mailbody = array(
					'ToEmail'=>$post['email'],
					'FromName'=>FROMNAME,
					'FromEmail'=> FROMMAIL,
					'Subject'=>'Successfully Register',
					'Message'=>$email_body
				);
				if($this->sendemail) {
					$this->general->EmailSend($mailbody);
				}
			}
			$response['msg'] = "Registration Successfully. Please check your mail to confirm account";
			$response['res'] = true;
			$response['res_type'] = 'success';
			
		} else {			
			$this->session->set_flashdata('error','Please Fill The Data First!!'.validation_errors());
			$response['msg'] = "Something went wrong..!";
			$response['res'] = false;
			$response['res_type'] = 'danger';
		}
		echo json_encode($response);
		die();
	}

	public function confirm_account( $confirm_str ) {

		$wh = array(
			"ForgotString"=>$confirm_str,
		);
		$res = $this->common->get_one_row("doc_user",$wh);

		if( $res ) {
			if( empty($res['ForgotString']) || $res['email_confirm']=='1' ) {
				$_SESSION['SUCCESS'] = "Your Account is already confirmed";
			} else {
				$update_data = array(
					"ForgotString" => "",
					"email_confirm" => "1",
					"status" => "1",
				);
				$wh_update = array(
					"ForgotString" => $confirm_str
				);
				$this->common->update_record("doc_user",$update_data,$wh_update);
				$_SESSION['SUCCESS'] = "Your Account confirmed";
			}
		} else {
			$_SESSION['FAIL'] = "No Account Found.";
		}		
		redirect(base_url());
	}

	public function login()
	{
		if($this->session->DS_USER['DS_Id']){
			redirect(base_url());
		}
		$data = array();
		$this->global['pageTitle'] = ' | Login';
		$this->general->loadViewsFront(FRONTEND."login", $this->global, $data, NULL);
	}

	public function login_process() {

		$post	= $this->input->post();
		$response = array();
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');		
		
		if($this->form_validation->run())
		{
			$wh = array(
				"email" => $post['email'],
				"status" => '1',
				"isDelete" => '0',
			);

			
			$res = $this->common->get_one_row("doc_user",$wh);
			
			if($res) {

				if($res['password']==md5($post['password'])) {

					if($res['email_confirm']=='1') {
						$response['msg'] = "Login Successfully";
						$response['res'] = true;
						$response['res_type'] = 'success';

						$session_data = array(
							'DS_Id' 		=> $res['id'],
					        'DS_Name' 		=> $res['fname']." ".$res['lname'],
					        'DS_Email'    	=> $res['email'],
					    );
						$this->session->set_userdata('DS_USER',$session_data);
						$refer = $this->session->userdata("user_last_page") ? $this->session->userdata("user_last_page") : base_url('profile');
						$response['last_page'] = $refer;
						
					} else {
						$response['msg'] = "Please Confrim your Account";
						$response['res'] = false;
						$response['res_type'] = 'danger';	
					}

				} else {
					$response['msg'] = "Email or Password is Wrong...!";
					$response['res'] = false;
					$response['res_type'] = 'danger';
				}
			} else {
				$response['msg'] = "No Account Found";
				$response['res'] = false;
				$response['res_type'] = 'danger';
			}
			
		} else {			
			$this->session->set_flashdata('error','Please Fill The Data First!!'.validation_errors());
			$response['msg'] = "Something went wrong..!";
			$response['res'] = false;
			$response['res_type'] = 'danger';
		}
		echo json_encode($response);
		die();
	}


	public function forgot_Password() {

		if($this->session->DS_USER['DS_Id']){
			redirect(base_url());
		}
		$data = array();
		$this->global['pageTitle'] = ' | Login';
		$this->general->loadViewsFront(FRONTEND."forgot_password", $this->global, $data, NULL);

	}
	public function forgotpass() {

		$to_email = $this->input->post('email_forgot');
		$response 	= array();

		$this->form_validation->set_rules('email_forgot', 'Email', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$res = $this->common->get_one_row('doc_user',array('email'=>$to_email));

			
			if(!empty($res))
			{
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$data['ForgotString'] = substr( str_shuffle( $chars ), 0,13 );
				$data2 = array('ForgotString'=>$data['ForgotString']);

				$this->common->update_record('doc_user',$data2,array('email'=>$to_email));
				
				$data['user_data'] = $res;
				$email_body = $this->load->view(FRONTEND.'email/forgot_password', $data, TRUE);
				
				$mailbody = array(
					'ToEmail'=>$to_email,
					'FromName'=>FROMNAME,
					'FromEmail'=> FROMMAIL,
					'Subject'=>'Set New Password ',
					'Message'=>$email_body,
				);
				if($this->sendemail) {
					$res = $this->general->EmailSend($mailbody);
				}
				
				if($res){
					$response['msg'] = "Reset Passwod Link is Successfully Send To Email Id Check Your Email.";
					$response['res'] = true;
					$response['res_type'] = 'success';
				}
				else {
					$response['msg'] = "Error occure while sending an Email!";
					$response['res'] = true;
					$response['res_type'] = 'danger';
				}
			

			}
			else {
				$response['msg'] = "Your email is not Registered with us!";
				$response['res'] = true;
				$response['res_type'] = 'danger';
			}
		}
		else {
			$response['msg'] = "Please enter your email!";
			$response['res'] = true;
			$response['res_type'] = 'danger';
		}
		echo json_encode($response);
		die();
	}

	


	public function ResetPassword($str)
	{
		if($this->session->DS_USER['DS_Id']){
			redirect(base_url());
		}
		$data['user'] = $this->common->get_one_row('doc_user',array('ForgotString'=>$str));
		if(!$data['user'])
		{
			$_SESSION['FAIL'] = 'Link is Expire';
			redirect(base_url());
		}
		
		$this->global['pageTitle'] = ' | Reset Password';
		$data['string'] = $str;
		$this->general->loadViewsFront(FRONTEND."reset_password", $this->global, $data, NULL);
	}

	public function reset_pass()
	{

		$post = $this->input->post();
		$response = array();
		if($this->session->DS_USER['DS_Id']){
			redirect(base_url());
		}
		$res = $this->common->get_one_row('doc_user',array('ForgotString'=>$post['ForgotString']));

		if($res) {
			$post = $this->input->post();
			$data = array('password'=>md5($post['password']),'ForgotString'=>'');
			$res = $this->common->update_record('doc_user',$data,array('ForgotString'=>$post['ForgotString']));
			if($res) {
				$response['msg'] = "New Password set Successfully.";
				$response['res'] = true;
				$response['res_type'] = 'success';
			} else {
				$response['msg'] = "something Went Wrong";
				$response['res'] = false;
				$response['res_type'] = 'danger';
			}

		} else {
			$response['msg'] = "You already used this link";
			$response['res'] = false;
			$response['res_type'] = 'danger';
		}
		echo json_encode($response);
		die();
	}

	public function Logout()
	{
		$array_items = array('DS_Id' => '', 'DS_Name' => '','DS_Email'=>'');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect(base_url());
	}

	
}