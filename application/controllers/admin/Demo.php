<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller
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
		$this->global['pageTitle'] = ' | Manage Demo';
        $this->global['ActiveMenu'] = 'Manage Demo';
        $this->general->loadViews(ADMIN."demo/manage_demo", $this->global, $data, NULL);
	}

	public function ajax_demo()
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
        $tablename = 'tbl_demo';
        $rows = '*';
        $order_by = 'id';
        $order = 'DESC';

        $limit = array();

        $record = $this->common->get_all_record_with_limit_like($tablename,$order_by,$order,$limit,$wh,"id",$keywords,$field_array);
        if($record != '') {
            $totalRec = count($record);
            $config['target']      = '#tourList';
            $config['base_url']    = base_url(ADMIN).'Tour/ajax_demo';
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
        $this->load->view(ADMIN.'demo/get_demo', $data, false);
    }

	public function add_demo($id='')
	{
		$this->global['pageTitle'] = ' | Add Demo';		
        $data = array();

        if($id) {
            $data['demo'] = $this->common->get_one_row('tbl_demo',array('id'=>$id));
            $this->global['pageTitle'] = ' | Edit School';
        }
        else {
            $this->global['pageTitle'] = ' | Add School';
        }

        $this->global['ActiveMenu'] = 'Add Demo';
        $this->general->loadViews(ADMIN."demo/add_demo", $this->global, $data, NULL);
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

                $path = DemoPath;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Img = array();
                $old_Img = $post['old_Img'];
                $ImgFile = $post['ImgFile'];
                
                $src = MyPath.$ImgFile;
                $dest = DemoPath.$ImgFile;
                copy($src, $dest);
                unlink($src);
                
                if($old_Img != '') {                    
                    unlink(DemoPath.$old_Img);
                }

                $data['image'] = $post['ImgFile'];
                
            }
            
            if($post['multiImageFile'] != '') {

                $path = DemoPath;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_multiImage = $post['old_multiImage'];
                $multiImageFile = json_decode($post['multiImageFile'], true);
                foreach ($multiImageFile as $key => $value) {
                    $src = MyPath.$value;
                    $dest = DemoPath.$value;
                    copy($src, $dest);
                    unlink($src);
                }

                if($old_multiImage != '') {
                    $old_multiImage = json_decode($old_multiImage, true);
                    $Images = array_merge($old_multiImage,$multiImageFile);
                    $Images = json_encode($Images);
                    $data['images'] = $Images;
                }
                else {

                    $data['images'] = $post['multiImageFile'];
                }
                
            }
            
            $wh = array('id'=>$id);
            $schoolId = $this->common->update_record('tbl_demo',$data,$wh);
            $messge = array('message' => 'Updated Successfully..','class' => 'success');
            $this->session->set_flashdata('success',$messge['message']);
            redirect(ADMIN_LINK.'add-demo/'.$id);

        }
        else {

            if($post['ImgFile'] != '') {

                $path = DemoPath;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Img = array();
                $ImgFile = $post['ImgFile'];
                
                $src = MyPath.$ImgFile;
                $dest = DemoPath.$ImgFile;
                copy($src, $dest);
                unlink($src);
                
                $data['image'] = $post['ImgFile'];
                
            }
            
            if($post['multiImageFile'] != '') {

                $path = DemoPath;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $multiImageFile = json_decode($post['multiImageFile'], true);
                foreach ($multiImageFile as $key => $value) {
                    $src = MyPath.$value;
                    $dest = DemoPath.$value;
                    copy($src, $dest);
                    unlink($src);
                }

                $data['images'] = $post['multiImageFile'];
                
            }

            $schoolId = $this->common->insert_record('tbl_demo',$data);
            $messge = array('message' => 'Added Successfully..','class' => 'success');
            $this->session->set_flashdata('msg',$messge);
            redirect(ADMIN_LINK.'manage-demo');
        }
    }

    public function changeStatus($type='')
    {
        $response = array();
        $post = $this->input->post();
        $status = $post['status'];

        $data = array('status'=>$status);

        $where = array('id'=>$post['id']);
        $table = 'tbl_demo';
    
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
