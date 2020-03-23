<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('Ajax_pagination');
        $this->perPage = 1;        
        $this->table = "salary";   
        $this->id = "id";  
        $this->MainTitle = "Salary";
        $this->folder = "salary/"; 
        $this->Controller = "Salary"; 
        $this->url = "salary";

        $this->img_path = IMG_INDUSTRY;
        $this->img_height = 160; 
        $this->img_width = 200;
        $this->isthumb = true;

        $config = array(
            'table' => $this->table,
            'id' => $this->id,
            'field' => 'slug',
            'title' => 'title',
            'replacement' => 'dash' // Either dash or underscore
        );
        $this->load->library('slug', $config);
	}

	public function index()
	{
        $this->general->adminauth();
		$data = array();
        $this->global['pageTitle'] = ' | Manage Demo';
        $this->global['ActiveMenu'] = 'Manage Demo';
        $data['MainTitle'] = $this->MainTitle;
        $data['Controller'] = $this->Controller;
        $data['url'] = $this->url;  
        $this->global['pageTitle'] = ' : Manage '.$data['MainTitle'];
        $this->general->loadViews(ADMIN.$this->folder."Manage", $this->global, $data, NULL);

	}

    public function showForm($id = '')
    {
        $this->global['pageTitle'] = ' | Add Demo';     
        $data = array();
        $data['type'] = "add";
        $this->global['pageTitle'] = ' | Add School';
        $this->global['ActiveMenu'] = 'Add Demo';
        if($id!='') {
            $data['type'] = "edit";
            $this->global['pageTitle'] = ' | Edit School';
            $data['edit'] = $this->common->get_one_row('tbl_demo',array('id'=>$id));
        }

        $data['Controller'] = $this->Controller;
        $data['MainTitle'] = $this->MainTitle;
        $data['tbl_id'] = $this->id;
        $data['url'] = $this->url; 
        $data['img_path'] = $this->img_path;        
        $this->general->loadViews(ADMIN.$this->folder."Form", $this->global, $data, NULL);
    }

	public function ajax_list()
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
        $tablename = $this->table;
        $rows = '*';
        $order_by = 'id';
        $order = 'DESC';

        $limit = array();

        $record = $this->common->get_all_record_with_limit_like($tablename,$order_by,$order,$limit,$wh,$this->id,$keywords,$field_array);
        if($record != '') {
            $totalRec = count($record);
            $config['target']      = '#listing';
            $config['base_url']    = base_url(ADMIN).$this->Controller.'/ajax_list';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['link_func']   = 'getData';
            $config['uri_segment'] = 4;
            $config['show_count'] = false;
            $this->ajax_pagination->initialize($config);
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            /**/
            $limit['start'] = $offset;
            $limit['limit'] = $this->perPage;
            /**/
            $data['result'] = $this->common->get_all_record_with_limit_like($tablename,$order_by,$order,$limit,$wh,$rows,$keywords,$field_array);
            echo $this->db->last_query();
        }
        else {
            $data['result'] = array();   
        }
        $data['table'] = $this->table;
        $data['id_field'] = $this->id;
        $data['url'] = $this->url;
        $data['controller'] = $this->Controller;
        $this->load->view(ADMIN.$this->folder.'/get_ajax_data', $data, false);
    }

    public function ajax_demo_()
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

	public function save(){

        $type = $this->input->post('type');
        $post = $this->input->post();

        $this->form_validation->set_rules('fname','Name','trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->showForm();
        }
        else
        {

            $fname = $post['fname'];
            $email = $post['email'];
            $description = $post['description'];

            $data = array(
                'fname'         => $fname,
                'email'         => $email,
                'description'   => $description,
            );

            if($type == "edit"){

                if($post['ImgFile'] != '') {

                    $path = $this->img_path;
                    if(!is_dir($path)) {
                        mkdir($path);
                    }
                    
                    $Img = array();
                    $old_Img = $post['old_Img'];
                    $ImgFile = $post['ImgFile'];
                    
                    $src = MyPath.$ImgFile;
                    $dest = $this->img_path.$ImgFile;
                    copy($src, $dest);
                    unlink($src);
                    
                    if($old_Img != '') {                    
                        unlink($this->img_path.$old_Img);
                    }

                    $data['image'] = $post['ImgFile'];
                    
                }
                
                if($post['multiImageFile'] != '') {

                    $path = $this->img_path;
                    if(!is_dir($path)) {
                        mkdir($path);
                    }
                    
                    $Images = array();
                    $old_multiImage = $post['old_multiImage'];
                    $multiImageFile = json_decode($post['multiImageFile'], true);
                    foreach ($multiImageFile as $key => $value) {
                        $src = MyPath.$value;
                        $dest = $this->img_path.$value;
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
                
                $editid = $this->input->post('editid'); 
                $wh = array('id'=>$editid);
                $schoolId = $this->common->update_record($this->table,$data,$wh);
                $messge = array('message' => 'Updated Successfully..','class' => 'success');
                $this->session->set_flashdata('success',$messge['message']);
                redirect(ADMIN_LINK.$this->url);

            }
            if($type == "add") {

                if($post['ImgFile'] != '') {

                    $path = $this->img_path;
                    if(!is_dir($path)) {
                        mkdir($path);
                    }
                    
                    $Img = array();
                    $ImgFile = $post['ImgFile'];
                    
                    $src = MyPath.$ImgFile;
                    $dest = $this->img_path.$ImgFile;
                    copy($src, $dest);
                    unlink($src);
                    
                    $data['image'] = $post['ImgFile'];
                    
                }
                
                if($post['multiImageFile'] != '') {

                    $path = $this->img_path;
                    if(!is_dir($path)) {
                        mkdir($path);
                    }
                    
                    $Images = array();
                    $multiImageFile = json_decode($post['multiImageFile'], true);
                    foreach ($multiImageFile as $key => $value) {
                        $src = MyPath.$value;
                        $dest = $this->img_path.$value;
                        copy($src, $dest);
                        unlink($src);
                    }

                    $data['images'] = $post['multiImageFile'];
                    
                }

                $schoolId = $this->common->insert_record($this->table,$data);
                $messge = array('message' => 'Added Successfully..','class' => 'success');
                $this->session->set_flashdata('msg',$messge);
                redirect(ADMIN_LINK.$this->url);
            }
        }
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

                $path = $this->img_path;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Img = array();
                $old_Img = $post['old_Img'];
                $ImgFile = $post['ImgFile'];
                
                $src = MyPath.$ImgFile;
                $dest = $this->img_path.$ImgFile;
                copy($src, $dest);
                unlink($src);
                
                if($old_Img != '') {                    
                    unlink($this->img_path.$old_Img);
                }

                $data['image'] = $post['ImgFile'];
                
            }
            
            if($post['multiImageFile'] != '') {

                $path = $this->img_path;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_multiImage = $post['old_multiImage'];
                $multiImageFile = json_decode($post['multiImageFile'], true);
                foreach ($multiImageFile as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->img_path.$value;
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

                $path = $this->img_path;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Img = array();
                $ImgFile = $post['ImgFile'];
                
                $src = MyPath.$ImgFile;
                $dest = $this->img_path.$ImgFile;
                copy($src, $dest);
                unlink($src);
                
                $data['image'] = $post['ImgFile'];
                
            }
            
            if($post['multiImageFile'] != '') {

                $path = $this->img_path;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $multiImageFile = json_decode($post['multiImageFile'], true);
                foreach ($multiImageFile as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->img_path.$value;
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
