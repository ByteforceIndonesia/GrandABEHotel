<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Bnm extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();

			$this->load->model('bnmdata');

			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}


		public function packageExtCheck($file){
			$path = $_FILES['upload_package']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if($ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="gif" && $ext!="JPG"){
				return FALSE;
			}
			else{
				return TRUE;
			}
		}

		public function index()
		{
			$this->data['page_title'] = 'Business & Meetings Edit';
			if($result1 = $this->bnmdata->getData()){
				$this->data['bnm'] = $result1;
			}
			if($result2 = $this->bnmdata->getPackages()){
				$this->data['packages'] = $result2;
			}
			if($result3 = $this->bnmdata->getImages()){
				$this->data['images'] = $result3;
			}
			//$this->data['packages']=$this->bnmdata->getPackages();

			$this->render('admin/pages/bnm_page_edit_view');
		}

		public function edit()
		{
			$result = $this->bnmdata->getData();
			$this->data['bnm'] = $result;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_bnmPageDesc','Page Description','trim|required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->bnmdata->getData()){
					$this->data['bnm'] = $result1;
				}
				if($result2 = $this->bnmdata->getPackages()){
					$this->data['packages'] = $result2;
				}
				if($result3 = $this->bnmdata->getImages()){
					$this->data['images'] = $result3;
				}
				$this->render('admin/pages/bnm_page_edit_view');
			}
			else{
				$data = array(
					'ta_bnmPageDesc'=>$this->input->post('ta_bnmPageDesc')
					);
				$this->bnmdata->update($data);
				$this->session->set_flashdata('message','Update Success');
				redirect('admin/bnm','refresh');
			}
		}

		public function createPackage()
		{
			$this->data['page_title'] = 'Add Package';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_packageName','Package Name','trim|required');
			$this->form_validation->set_rules('ta_packageDesc','Package Description','trim|required');
			$this->form_validation->set_rules('txtpackage','Package Image','trim|required');
			if(!empty($_FILES['upload_package']['name'])){
				$this->form_validation->set_rules('upload_package','Package Image','callback_packageExtCheck');
				$this->form_validation->set_message('packageExtCheck','Image should be png / jpg / jpeg / gif');
			}

			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->bnmdata->getData()){
					$this->data['bnm'] = $result1;
				}
				if($result2 = $this->bnmdata->getPackages()){
					$this->data['packages'] = $result2;
				}
				if($result3 = $this->bnmdata->getImages()){
					$this->data['images'] = $result3;
				}

				$this->render('admin/bnm/create_package_view');
			}
			else
			{

				$filepackage = $_FILES['upload_package']['name'];

				if(!empty($filepackage)){
					$filepackage = str_replace(' ', '_', $filepackage);
					$filepackage = time().$filepackage;
					$config['upload_path']   = './assets/images/uploads/packages' ;
				 	$config['allowed_types'] = 'png|jpg|jpeg';
				 	$config['file_name'] = $filepackage;
				 	$config['max_size'] = 0;
				 	$config['overwrite'] = TRUE;
				 	$this->load->library('upload', $config);
				 	$this->upload->initialize($config);

				 	if(!$this->upload->do_upload('upload_package')){
					 		
					 	echo $this->upload->display_errors();
					 	die(); 
				 	}
				 	else{
				 		$upload_data = $this->upload->data();
					 	//$bg_file_name = $upload_data['file_name'];
				 	}

				 	$data = array(
				 			'name'=>$this->input->post('ta_packageName'),
				 			'description'=>$this->input->post('ta_packageDesc'),
				 			'image'=>$filepackage
				 		);

				 	$this->bnmdata->createPackage($data);
				 	$this->session->set_flashdata('message','Package Successfully Added');
				}
				
				redirect('admin/bnm','refresh');
			}
		}

		public function editPackage($id=NULL){

			$id = $this->input->post('id') ? $this->input->post('id') : $id;
			$result = $this->bnmdata->selectPackage($id);
			$this->data['package'] = $result;

			$this->data['page_title'] = 'Edit Package';
			$this->load->library('form_validation');

			$this->form_validation->set_rules('ta_packageName','Package Name','trim|required');
			$this->form_validation->set_rules('ta_packageDesc','Package Description','trim|required');
			$this->form_validation->set_rules('txtpackage','Package Image','trim|required');
			if(!empty($_FILES['upload_package']['name'])){
				$this->form_validation->set_rules('upload_package','Package Image','callback_packageExtCheck');
				$this->form_validation->set_message('packageExtCheck','Image should be png / jpg / jpeg / gif');
			}

			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->bnmdata->getData()){
					$this->data['bnm'] = $result1;
				}
				if($result2 = $this->bnmdata->getPackages()){
					$this->data['packages'] = $result2;
				}
				if($result3 = $this->bnmdata->getImages()){
					$this->data['images'] = $result3;
				}
				$this->render('admin/bnm/edit_package_view');
			}
			else
			{
				$id = $this->input->post('id') ? $this->input->post('id') : $id;
				$result = $this->bnmdata->selectPackage($id);
				$this->data['package'] = $result;

				$filepackage = time().$_FILES['upload_package']['name'];
				$filepackage = str_replace(' ', '_', $filepackage);

				$config['upload_path']   = './assets/images/uploads/packages' ;
			 	$config['allowed_types'] = 'png|jpg|jpeg|gif';
			 	$config['file_name'] = $filepackage;
			 	$config['max_size'] = 0;
			 	$config['overwrite'] = TRUE;
			 	$this->load->library('upload', $config);
			 	$this->upload->initialize($config);

			 	if($this->upload->do_upload('upload_package')){
				 	$upload_data = $this->upload->data();
				 	unlink('./assets/images/uploads/packages/'.$result->image);
			 	}
				 	

			 	$data = array(
			 			'name'=>$this->input->post('ta_packageName'),
			 			'description'=>$this->input->post('ta_packageDesc')
			 		);
			 	if(!empty($_FILES['upload_package']['name'])){
			 		$data['image']=$filepackage;
			 	}

			 	$this->bnmdata->editPackage($id,$data);
			 	$this->session->set_flashdata('message','Package Successfully Edited');
				
				redirect('admin/bnm','refresh');
			}
		}

		public function deletePackage($id=NULL){
			$id = $this->input->post('id') ? $this->input->post('id') : $id;
			if(is_null($id))
			{
				$this->session->set_flashdata('message','There\'s no package to delete');
			}
			else{
				$this->bnmdata->deletePackage($id);
				$this->session->set_flashdata('message','Package successfully deleted');
			}
			
			redirect('admin/bnm','refresh');
			
		}

		public function photoExtCheck($file){

			$filesCount = count($_FILES['upload_images']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$path = $_FILES['upload_images']['name'][$i];
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				if($ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="gif" && $ext!="JPG"){
					return FALSE;
				}
				else{
					return TRUE;
				}
			}
		}

		public function addImages(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('txtimage','Photo','trim|required');
			if(!empty($_FILES['upload_images']['name'])){
				$this->form_validation->set_rules('upload_images[]','Image','callback_photoExtCheck');
				$this->form_validation->set_message('photoExtCheck','Image should be png / jpg / jpeg / gif');
			}
			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->bnmdata->getData()){
					$this->data['bnm'] = $result1;
				}
				if($result2 = $this->bnmdata->getPackages()){
					$this->data['packages'] = $result2;
				}
				if($result3 = $this->bnmdata->getImages()){
					$this->data['images'] = $result3;
				}
				$this->render('admin/pages/bnm_page_edit_view');
			}
			else
			{
				$data = array();
		       
	            $filesCount = count($_FILES['upload_images']['name']);

	            for($i = 0; $i < $filesCount; $i++){
	                $_FILES['upload_image']['name'] = $_FILES['upload_images']['name'][$i];
	                $_FILES['upload_image']['tmp_name'] = $_FILES['upload_images']['tmp_name'][$i];
	                $_FILES['upload_image']['error'] = $_FILES['upload_images']['error'][$i];
                	$_FILES['upload_image']['size'] = $_FILES['upload_images']['size'][$i];
                	$_FILES['upload_image']['type'] = $_FILES['upload_images']['type'][$i];
	                $photoname = time().$_FILES['upload_image']['name'];
	                $photoname = str_replace(' ', '_', $photoname);
	                $config['upload_path']   = './assets/images/uploads/bnmImages' ;
				 	$config['allowed_types'] = 'png|jpg|jpeg|gif';
				 	$config['file_name'] = $photoname;
				 	$config['max_size'] = 0;
				 	$config['overwrite'] = TRUE;
				 	$this->load->library('upload', $config);
				 	$this->upload->initialize($config);
	                
	                $this->load->library('upload', $config);
	                $this->upload->initialize($config);
	                if($this->upload->do_upload('upload_image')){
	                    $fileData = $this->upload->data();
	                    $uploadData[$i]['image'] = $photoname;
	                }
	            }
	            
	            if(!empty($uploadData)){
	                //Insert file information into the database
	                $insert = $this->bnmdata->addImages($uploadData);
	                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
	                $this->session->set_flashdata('message',$statusMsg);
	            }
		        redirect('admin/bnm','refresh');
	        }
			
		}

		public function deleteImages(){
			$selected = $this->input->post('checkedImages');

			for ($i=0; $i <count($selected) ; $i++) { 
				$this->bnmdata->deleteImage($selected[$i]);
			}

			$this->session->set_flashdata('message','Photos successfully deleted');
			redirect('admin/bnm','refresh');
		}
	}
?>