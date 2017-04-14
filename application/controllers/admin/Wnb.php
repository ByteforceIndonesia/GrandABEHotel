<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Wnb extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('wnbdata');
			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}

		public function index()
		{
			$this->data['page_title'] = 'Weddings & Birthdays Edit';
			if($result1 = $this->wnbdata->getData()){
				$this->data['header'] = $result1;
			}
			if($result2 = $this->wnbdata->getWeddingPhotos()){
				$this->data['weddingphotos'] = $result2;
			}
			if($result3 = $this->wnbdata->getBirthdayPhotos()){
				$this->data['birthdayphotos'] = $result3;
			}
			
			$this->render('admin/pages/wnb_page_edit_view');
		}

		public function edit(){
			$result = $this->wnbdata->getData();
			$this->data['header'] = $result;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_wedding','Wedding Description','trim|required');
			$this->form_validation->set_rules('ta_birthday','Birthday Description','trim|required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->wnbdata->getData()){
					$this->data['header'] = $result1;
				}
				if($result2 = $this->wnbdata->getWeddingPhotos()){
					$this->data['weddingphotos'] = $result2;
				}
				if($result3 = $this->wnbdata->getBirthdayPhotos()){
					$this->data['birthdayphotos'] = $result3;
				}
				$this->render('admin/pages/wnb_page_edit_view');
			}
			else{
				$data = array(
					'ta_wedding'=>$this->input->post('ta_wedding'),
					'ta_birthday'=>$this->input->post('ta_birthday')
					);
				$this->wnbdata->update($data);
				$this->session->set_flashdata('message','Update Success');
				redirect('admin/wnb','refresh');
			}

		}

		public function weddingExtCheck($file){

			$filesCount = count($_FILES['upload_weddings']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$path = $_FILES['upload_weddings']['name'][$i];
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				if($ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="JPG"){
					return FALSE;
				}
				else{
					return TRUE;
				}
			}
		}

		public function birthdayExtCheck($file){

			$filesCount = count($_FILES['upload_birthdays']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$path = $_FILES['upload_birthdays']['name'][$i];
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				if($ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="gif" && $ext!="JPG"){
					return FALSE;
				}
				else{
					return TRUE;
				}
			}
		}

		public function addWeddingImages(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('txtwedding','Photo','trim|required');
			if(!empty($_FILES['upload_weddings']['name'])){
				$this->form_validation->set_rules('upload_weddings[]','Wedding Image','callback_weddingExtCheck');
				$this->form_validation->set_message('weddingExtCheck','Image should be png / jpg / jpeg / gif');
			}
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');

				if($result1 = $this->wnbdata->getData()){
					$this->data['header'] = $result1;
				}
				if($result2 = $this->wnbdata->getWeddingPhotos()){
					$this->data['weddingphotos'] = $result2;
				}
				if($result3 = $this->wnbdata->getBirthdayPhotos()){
					$this->data['birthdayphotos'] = $result3;
				}

				$this->render('admin/pages/wnb_page_edit_view');
			}
			else
			{
				$data = array();
		       
	            $filesCount = count($_FILES['upload_weddings']['name']);

	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['upload_wedding']['name'] = $_FILES['upload_weddings']['name'][$i];
	                $_FILES['upload_wedding']['tmp_name'] = $_FILES['upload_weddings']['tmp_name'][$i];
	                $_FILES['upload_wedding']['error'] = $_FILES['upload_weddings']['error'][$i];
                	$_FILES['upload_wedding']['size'] = $_FILES['upload_weddings']['size'][$i];
                	$_FILES['upload_wedding']['type'] = $_FILES['upload_weddings']['type'][$i];
	                $photoname = time().$_FILES['upload_wedding']['name'];
	                $photoname = str_replace(' ', '_', $photoname);
	                $config['upload_path']   = './assets/images/uploads/weddingImages' ;
				 	$config['allowed_types'] = 'png|jpg|jpeg|gif';
				 	$config['file_name'] = $photoname;
				 	$config['max_size'] = 0;
				 	$config['overwrite'] = TRUE;
				 	$this->load->library('upload', $config);
				 	$this->upload->initialize($config);
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if($this->upload->do_upload('upload_wedding')){
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['image'] = $photoname;
	                }
	            }
	            
	            if(!empty($uploadData)){
	                //Insert file information into the database
	                $insert = $this->wnbdata->addWeddingPhotos($uploadData);
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('message',$statusMsg);
	            }
		        redirect('admin/wnb','refresh');
	        }
			
		}

		public function deleteWeddingImages(){
			$selected = $this->input->post('checkedWeddingImages');

			for ($i=0; $i <count($selected) ; $i++) { 
				$this->wnbdata->deleteWeddingPhoto($selected[$i]);
			}

			$this->session->set_flashdata('message','Photos successfully deleted');
			redirect('admin/wnb','refresh');
		}

		public function addBirthdayImages(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('txtbirthday','Photo','trim|required');
			if(!empty($_FILES['upload_birthdays']['name'])){
				$this->form_validation->set_rules('upload_birthdays[]','Birthday Image','callback_birthdayExtCheck');
				$this->form_validation->set_message('birthdayExtCheck','Image should be png / jpg / jpeg / gif');
			}
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');

				if($result1 = $this->wnbdata->getData()){
					$this->data['header'] = $result1;
				}
				if($result2 = $this->wnbdata->getWeddingPhotos()){
					$this->data['weddingphotos'] = $result2;
				}
				if($result3 = $this->wnbdata->getBirthdayPhotos()){
					$this->data['birthdayphotos'] = $result3;
				}

				$this->render('admin/pages/wnb_page_edit_view');
			}
			else
			{
				$data = array();
		       
	            $filesCount = count($_FILES['upload_birthdays']['name']);

	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['upload_birthday']['name'] = $_FILES['upload_birthdays']['name'][$i];
	                $_FILES['upload_birthday']['tmp_name'] = $_FILES['upload_birthdays']['tmp_name'][$i];
	                $_FILES['upload_birthday']['error'] = $_FILES['upload_birthdays']['error'][$i];
                	$_FILES['upload_birthday']['size'] = $_FILES['upload_birthdays']['size'][$i];
                	$_FILES['upload_birthday']['type'] = $_FILES['upload_birthdays']['type'][$i];
	                $photoname = time().$_FILES['upload_birthday']['name'];
	                $photoname = str_replace(' ', '_', $photoname);
	                $config['upload_path']   = './assets/images/uploads/birthdayImages' ;
				 	$config['allowed_types'] = 'png|jpg|jpeg|gif';
				 	$config['file_name'] = $photoname;
				 	$config['max_size'] = 0;
				 	$config['overwrite'] = TRUE;
				 	$this->load->library('upload', $config);
				 	$this->upload->initialize($config);
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if($this->upload->do_upload('upload_birthday')){
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['image'] = $photoname;
	                }
	            }
	            
	            if(!empty($uploadData)){
	                //Insert file information into the database
	                $insert = $this->wnbdata->addBirthdayPhotos($uploadData);
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('message',$statusMsg);
	            }
		        redirect('admin/wnb','refresh');
	        }
			
		}

		public function deleteBirthdayImages(){
			$selected = $this->input->post('checkedBirthdayImages');

			for ($i=0; $i <count($selected) ; $i++) { 
				$this->wnbdata->deleteBirthdayPhoto($selected[$i]);
			}

			$this->session->set_flashdata('message','Photos successfully deleted');
			redirect('admin/wnb','refresh');
		}
	}

?>