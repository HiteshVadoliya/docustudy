<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Story extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('Ajax_pagination');
        $this->perPage = 1;
	}

	public function index()
	{
        $this->general->adminauth();
		$data = array();
		$this->global['pageTitle'] = ' | Manage Story';
        $this->global['ActiveMenu'] = 'Manage Story';
        $this->general->loadViews(ADMIN."story/manage_story", $this->global, $data, NULL);
	}

	public function ajax_story()
	{
        $conditions = array();
        $page = $this->input->post('page');
        $perpage = $this->input->post('perpage');
        $this->perPage = $perpage;
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        $wh = array();
        $field_array = array();
        $keywords = $this->input->post('keywords');
        
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
            $field_array = array("fname","email");
        }
       
        $wh['isDelete'] = 0;
        
        $data = array();
        $tablename = 'doc_story';
        $rows = '*';
        $order_by = 'id';
        $order = 'DESC';

        $limit = array();

        $record = $this->common->get_all_record_with_limit_like($tablename,$order_by,$order,$limit,$wh,"id",$keywords,$field_array);
        if($record != '') {
            $totalRec = count($record);
            $config['target']      = '#tourList';
            $config['base_url']    = base_url(ADMIN).'Tour/ajax_story';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['link_func']   = 'gettour';
            $config['uri_segment'] = 4;
            $config['show_count'] = false;
            $this->ajax_pagination->initialize($config);
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            /**/
            $limit['start'] = $offset;
            $limit['limit'] = $this->perPage;
            /**/
            $data['tours'] = $this->common->get_all_record_with_limit_like($tablename,$order_by,$order,$limit,$wh,$rows,$keywords,$field_array);
        }
        else {
            $data['tours'] = array();   
        }
        $this->load->view(ADMIN.'story/get_story', $data, false);
    }

	public function add_story($id='')
	{
		$this->global['pageTitle'] = ' | Add Story';		
        $data = array();

        if($id) {
            $data['edit'] = $this->common->get_one_row('doc_story',array('id'=>$id));
            $this->global['pageTitle'] = ' | Edit Story';
        }
        else {
            $this->global['pageTitle'] = ' | Add Story';
        }

        $this->global['ActiveMenu'] = 'Add Story';
        $this->general->loadViews(ADMIN."story/add_story", $this->global, $data, NULL);
	}

    public function save_data($id='')
    {
        $post = $this->input->post();

        $fname = $post['fname'];
        $email = $post['email'];
        $description = $post['description'];

        $data = array(
            'fname'         => $fname,
            'email'         => $email,
            'description'   => $description,
        );

        if($id) {

            if($post['ImgFile'] != '') {

                $path = StoryPath;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Img = array();
                $old_Img = $post['old_Img'];
                $ImgFile = $post['ImgFile'];
                
                $src = MyPath.$ImgFile;
                $dest = StoryPath.$ImgFile;
                copy($src, $dest);
                unlink($src);
                
                if($old_Img != '') {                    
                    unlink(StoryPath.$old_Img);
                }

                $data['image'] = $post['ImgFile'];
                
            }
            
            $wh = array('id'=>$id);
            $schoolId = $this->common->update_record('doc_story',$data,$wh);
            $messge = array('message' => 'Updated Successfully..','class' => 'success');
            $this->session->set_flashdata('success',$messge['message']);
            redirect(ADMIN_LINK.'add-story/'.$id);

        }
        else {

            if($post['ImgFile'] != '') {

                $path = StoryPath;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Img = array();
                $ImgFile = $post['ImgFile'];
                
                $src = MyPath.$ImgFile;
                $dest = StoryPath.$ImgFile;
                copy($src, $dest);
                unlink($src);
                
                $data['image'] = $post['ImgFile'];
                
            }
            
            $schoolId = $this->common->insert_record('doc_story',$data);
            $messge = array('message' => 'Added Successfully..','class' => 'success');
            $this->session->set_flashdata('msg',$messge);
            redirect(ADMIN_LINK.'manage-story');
        }
    }

    public function changeStatus($type='')
    {
        $response = array();
        $post = $this->input->post();
        $status = $post['status'];

        $data = array('status'=>$status);

        $where = array('id'=>$post['id']);
        $table = 'doc_story';
    
        $update = $this->common->update_record($table,$data,$where);
        
        $response['success'] = true;
        $response['message'] = 'Status Changed Successfully..';
        echo json_encode($response);
    }

	function deleteData()
    {
        $id = $this->input->post('id');
        $table_name = base64_decode( $this->input->post('td') );
        $field = base64_decode( $this->input->post('i') );
        
        $where_array = array($field => $id);

        $data_array = array('isDelete'=>1);
        $result = $this->common->update_record($table_name, $data_array,$where_array);
        if ($result > 0) { 
            echo(json_encode(array('status'=>TRUE))); 
        }
        else { 
            echo(json_encode(array('status'=>FALSE))); 
        }
        
    }

    public function upload_files()
    {
        try {
            if (
                !isset($_FILES['file']['error']) ||
                is_array($_FILES['file']['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }

            switch ($_FILES['file']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }
            $filename = uniqid().'_'.$_FILES['file']['name'];
            // $filepath = sprintf(MyPath.'%s_%s', uniqid(), $_FILES['file']['name']);
            $filepath = MyPath.$filename;

            if (!move_uploaded_file($_FILES['file']['tmp_name'],$filepath)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            // All good, send the response
            $data = array('status' => 'ok','path' => $filename);
            //echo json_encode($data);

        } catch (RuntimeException $e) {
            // Something went wrong, send the err message as JSON
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        echo json_encode($data);
    }

}
