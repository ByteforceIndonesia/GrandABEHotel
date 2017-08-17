<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('locationdata');

        if(!$this->ion_auth->in_group('admin'))
        {
            $this->session->set_flashdata('message','You are not allowed to visit the Pages page');
            redirect('admin','refresh');
        }
    }

    public function locationExtCheck($file){
        $path = $_FILES['upload_location']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if($ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="gif" && $ext!="JPG"){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function photoExtCheck($file){
        $path = $_FILES['upload_photo']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if($ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="gif"&& $ext!="JPG"){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function index()
    {
        $this->data['page_title'] = 'Location Edit';
        if($result1 = $this->locationdata->getData()){
            $this->data['headerLocation'] = $result1;
        }
        if($result2 = $this->locationdata->getLocations()){
            $this->data['locations'] = $result2;
        }
        if($result3 = $this->locationdata->getPhotos()){
            $this->data['photos'] = $result3;
        }

        $this->render('admin/pages/location_page_edit_view');
    }

    public function edit()
    {
        $result = $this->locationdata->getData();
        $this->data['headerLocation'] = $result;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('ta_where','Where Are We','trim|required');
        if($this->form_validation->run() === FALSE)
        {
            $this->load->helper('form');
            if($result1 = $this->locationdata->getData()){
                $this->data['headerLocation'] = $result1;
            }
            if($result2 = $this->locationdata->getLocations()){
                $this->data['locations'] = $result2;
            }
            if($result3 = $this->locationdata->getPhotos()){
                $this->data['photos'] = $result3;
            }
            $this->render('admin/pages/location_page_edit_view');
        }
        else{
            $data = array(
                'ta_where'=>$this->input->post('ta_where')
            );
            $this->locationdata->update($data);
            $this->session->set_flashdata('message','Update Success');
            redirect('admin/location','refresh');
        }
    }

    public function addlocation()
    {
        $this->data['page_title'] = 'Add Location';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ta_locationName','Location name','trim|required');
        $this->form_validation->set_rules('ta_locationDesc','Location Description','trim|required');
        $this->form_validation->set_rules('txtlocation','Location Image','trim|required');

        if(!empty($_FILES['upload_location']['name'])){
            $this->form_validation->set_rules('upload_location','Location Image','callback_locationExtCheck');
            $this->form_validation->set_message('locationExtCheck','Image should be png / jpg / jpeg / gif');
        }

        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            if($result1 = $this->locationdata->getData()){
                $this->data['headerLocation'] = $result1;
            }
            if($result2 = $this->locationdata->getLocations()){
                $this->data['locations'] = $result2;
            }
            if($result3 = $this->locationdata->getPhotos()){
                $this->data['photos'] = $result3;
            }

            $this->render('admin/location/add_location_view');
        }
        else
        {
            $filelocation = $_FILES['upload_location']['name'];

            if(!empty($filelocation)){
                $filelocation = str_replace(' ', '_', $filelocation);
                $filelocation = time().$filelocation;
                $config['upload_path']   = './assets/images/uploads/locations' ;
                $config['allowed_types'] = 'png|jpg|jpeg|gif';
                $config['file_name'] = $filelocation;
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('upload_location')){

                    echo $this->upload->display_errors();
                    die();
                }
                else{
                    $upload_data = $this->upload->data();
                    //$bg_file_name = $upload_data['file_name'];
                }

                $data = array(
                    'name'=>$this->input->post('ta_locationName'),
                    'description'=>$this->input->post('ta_locationDesc'),
                    'image'=>$filelocation
                );

                $this->locationdata->createLocation($data);

                $this->session->set_flashdata('message','Location Successfully Added');
            }
            redirect('admin/location','refresh');
        }
    }

    public function editlocation($id=NULL){

        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        $result = $this->locationdata->selectLocation($id);
        $this->data['location'] = $result;

        $this->data['page_title'] = 'Edit location';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ta_locationName','Location name','trim|required');
        $this->form_validation->set_rules('ta_locationDesc','Location Description','trim|required');
        $this->form_validation->set_rules('txtlocation','Location Image','trim|required');

        if(!empty($_FILES['upload_location']['name'])){
            $this->form_validation->set_rules('upload_location','Location Image','callback_locationExtCheck');
            $this->form_validation->set_message('locationExtCheck','Image should be png / jpg / jpeg / gif');
        }

        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            $this->render('admin/location/edit_location_view');
        }
        else
        {
            $id = $this->input->post('id') ? $this->input->post('id') : $id;
            $result = $this->locationdata->selectLocation($id);
            $this->data['location'] = $result;

            $filelocation = time().$_FILES['upload_location']['name'];
            $filelocation = str_replace(' ', '_', $filelocation);

            $config['upload_path']   = './assets/images/uploads/locations' ;
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['file_name'] = $filelocation;
            $config['max_size'] = 0;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('upload_location')){
                $upload_data = $this->upload->data();
                unlink('./assets/images/uploads/locations/'.$result->image);

            }


            $data = array(
                'name'=>$this->input->post('ta_locationName'),
                'description'=>$this->input->post('ta_locationDesc')

            );

            if(!empty($_FILES['upload_location']['name'])){
                $data['image']=$filelocation;
            }

            $this->locationdata->editLocation($id,$data);
            $this->session->set_flashdata('message','Location Successfully Edited');

            redirect('admin/location','refresh');
        }
    }

    public function addphoto()
    {
        $this->data['page_title'] = 'Add Photo';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtphoto','Photo','trim|required');

        if(!empty($_FILES['upload_photo']['name'])){
            $this->form_validation->set_rules('upload_photo','Photo','callback_photoExtCheck');
            $this->form_validation->set_message('photoExtCheck','Image should be png / jpg / jpeg / gif');
        }

        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            if($result1 = $this->locationdata->getData()){
                $this->data['headerLocation'] = $result1;
            }
            if($result2 = $this->locationdata->getLocations()){
                $this->data['locations'] = $result2;
            }
            if($result3 = $this->locationdata->getPhotos()){
                $this->data['photos'] = $result3;
            }
            $this->render('admin/location/add_image_view');
        }
        else
        {
            $filelocation = $_FILES['upload_photo']['name'];

            if(!empty($filelocation)){
                $filelocation = str_replace(' ', '_', $filelocation);
                $filelocation = time().$filelocation;
                $config['upload_path']   = './assets/images/uploads/locationPhotos' ;
                $config['allowed_types'] = 'png|jpg|jpeg|gif';
                $config['file_name'] = $filelocation;
                $config['max_size'] = 0;
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('upload_photo')){

                    echo $this->upload->display_errors();
                    die();
                }
                else{
                    $upload_data = $this->upload->data();
                    //$bg_file_name = $upload_data['file_name'];
                }

                $data = array(
                    'photo'=>$filelocation
                );
                if(!empty($this->input->post('ta_photoCaption'))){
                    $data['caption']=$this->input->post('ta_photoCaption');
                }

                if(!empty($this->input->post('txtphoto'))){
                    $data['title']=$this->input->post('ta_photoTitle');
                }

                if(!empty($this->input->post('ta_photoLink'))){
                    $data['link']=$this->input->post('ta_photoLink');
                }

                $this->locationdata->createPhoto($data);

                $this->session->set_flashdata('message','Photo Successfully Added');
            }
            redirect('admin/location','refresh');
        }

    }

    public function editPhoto($id=NULL)
    {
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        $result = $this->locationdata->selectPhoto($id);
        $this->data['photo'] = $result;

        $this->data['page_title'] = 'Edit Photo';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtphoto','Photo','trim|required');

        if(!empty($_FILES['upload_photo']['name'])){
            $this->form_validation->set_rules('upload_photo','Photo','callback_photoExtCheck');
            $this->form_validation->set_message('photoExtCheck','Image should be png / jpg / jpeg / gif');
        }

        if($this->form_validation->run()===FALSE)
        {
            $this->load->helper('form');
            if($result1 = $this->locationdata->getData()){
                $this->data['headerLocation'] = $result1;
            }
            if($result2 = $this->locationdata->getLocations()){
                $this->data['locations'] = $result2;
            }
            if($result3 = $this->locationdata->getPhotos()){
                $this->data['photos'] = $result3;
            }
            $this->render('admin/location/edit_image_view');
        }
        else
        {
            $id = $this->input->post('id') ? $this->input->post('id') : $id;
            $result = $this->locationdata->selectPhoto($id);
            $this->data['photo'] = $result;

            $filephoto = time().$_FILES['upload_photo']['name'];
            $filephoto = str_replace(' ', '_', $filephoto);
            $config['upload_path']   = './assets/images/uploads/locationPhotos' ;
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['file_name'] = $filephoto;
            $config['max_size'] = 0;
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('upload_photo')){
                $upload_data = $this->upload->data();
                unlink('./assets/images/uploads/locationPhotos/'.$result->photo);
            }


            $data = array();

            if(!empty($this->input->post('ta_photoCaption'))){
                $data['caption']=$this->input->post('ta_photoCaption');
            }

            if(!empty($this->input->post('txtphoto'))){
                $data['title']=$this->input->post('ta_photoTitle');
            }

            if(!empty($_FILES['upload_photo']['name'])){
                $data['photo']=$filephoto;
            }
            if(!empty($this->input->post('ta_photoLink'))){
                $data['link']= $this->input->post('ta_photoLink');
            }

            $this->locationdata->editPhoto($id,$data);
            $this->session->set_flashdata('message','Photo Successfully Edited');

            redirect('admin/location','refresh');
        }
    }

    public function deleteLocation($id=NULL){
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        if(is_null($id))
        {
            $this->session->set_flashdata('message','There\'s no item to delete');
        }
        else{
            $this->locationdata->deleteLocation($id);
            $this->session->set_flashdata('message','Location successfully deleted');
        }

        redirect('admin/location','refresh');
    }

    public function deletePhoto($id=NULL){
        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        if(is_null($id))
        {
            $this->session->set_flashdata('message','There\'s no item to delete');
        }
        else{
            $this->locationdata->deletePhoto($id);
            $this->session->set_flashdata('message','Photo successfully deleted');
        }

        redirect('admin/location','refresh');
    }
}
?>