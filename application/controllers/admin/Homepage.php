<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Homepage extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();

			$this->load->model('homedata');

			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}
		public function index()
		{
			$this->data['page_title'] = 'Home Edit';

			if($result = $this->homedata->getData()){
				$this->data['home'] = $result;
			}
			$this->render('admin/pages/home_page_edit_view');

		}

		public function limgExtCheck($file){
			$path = $_FILES['upload_leftImage']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if($ext!="png" && $ext!="jpg" && $ext!="jpeg"&& $ext!="JPG"){
				return FALSE;
			}
			else{
				return TRUE;
			}
		}

		public function bgExtCheck($file){
			$path = $_FILES['upload_virtualBg']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if($ext!="png" && $ext!="jpg" && $ext!="jpeg"&& $ext!="JPG"){
				return FALSE;
			}
			else{
				return TRUE;
			}
		}

		public function edit()
		{	
			$result = $this->homedata->getData();
			$this->data['home'] = $result;

			if(isset($_POST['submit'])){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('ta_landingScreen','Landing Paragraph','trim|required');
				$this->form_validation->set_rules('ta_aboutUs','About Us','trim|required');
				$this->form_validation->set_rules('ta_ShortDesc','Short Description','trim|required');
				$this->form_validation->set_rules('ta_virtualTourLink','Virtual Tour Link', 'trim|required');
				$this->form_validation->set_rules('txtleftImage','Left Image','trim|required');
				$this->form_validation->set_rules('txtvirtualBg','Background Image','trim|required');
				
				if(!empty($_FILES['upload_leftImage']['name'])){
					$this->form_validation->set_rules('upload_leftImage','Left Image','callback_limgExtCheck');
					$this->form_validation->set_message('limgExtCheck','Image should be png / jpg / jpeg');
				}
				
				if(!empty($_FILES['upload_virtualBg']['name'])){
					$this->form_validation->set_rules('upload_virtualBg','Background Image','callback_bgExtCheck');
					$this->form_validation->set_message('bgExtCheck','Image should be png / jpg / jpeg');
				}

				if($this->form_validation->run() === FALSE)
				{
					
					if($result = $this->homedata->getData()){
						$this->data['home'] = $result;
					}
					$this->load->helper('form');
					$this->render('admin/pages/home_page_edit_view');
				}
				else{
					$fileleft= time().$_FILES['upload_leftImage']['name'];
					$fileleft = str_replace(' ', '_', $fileleft);
				 	$filebg = time().$_FILES['upload_virtualBg']['name'];
				 	$filebg = str_replace(' ', '_', $filebg);

				 	//upload left Image
					 	$config['upload_path']   = './assets/images/uploads/leftImage' ;
					 	$config['allowed_types'] = 'png|jpg|jpeg';
					 	$config['file_name'] = $fileleft;
					 	$config['max_size'] = 0;
					 	$config['overwrite'] = TRUE;
					 	$this->load->library('upload', $config);
					 	$this->upload->initialize($config);

					 	if($this->upload->do_upload('upload_leftImage')){
					 		$upload_data = $this->upload->data();
					 		if(!empty($result)){
					 			unlink('./assets/images/uploads/leftImage/'.$result->upload_leftImage);
					 		}
					 	}
					 	
					 	//upload virtualBackground
					 	$config['upload_path']   = './assets/images/uploads/virtualBackground' ;
					 	$config['allowed_types'] = 'png|jpg|jpeg';
					 	$config['file_name'] = $filebg;
					 	$config['max_size'] = 0;
					 	$config['overwrite'] = TRUE;
					 	$this->load->library('upload', $config);
					 	$this->upload->initialize($config);

					 	if($this->upload->do_upload('upload_virtualBg')){
					 		$upload_data = $this->upload->data();
					 		if(!empty($result)){
					 			unlink('./assets/images/uploads/virtualBackground/'.$result->upload_virtualBg);
					 		}
					 	}			 	

					 	$data = array(
					 			'ta_landingScreen'=>$this->input->post('ta_landingScreen'),
					 			'ta_ShortDesc'=>$this->input->post('ta_ShortDesc'),
					 			'ta_aboutUs'=> $this->input->post('ta_aboutUs'),
					 			'ta_virtualTourLink' => $this->input->post('ta_virtualTourLink')
					 		);
					 	if(!empty($_FILES['upload_leftImage']['name'])){
					 		$data['upload_leftImage']=$fileleft;
					 	}
					 	if(!empty($_FILES['upload_virtualBg']['name'])){
					 		$data['upload_virtualBg']=$filebg;
					 	}
					 	$this->homedata->update($data);
					 	$this->session->set_flashdata('message','Update Success');

					 	redirect('admin/homepage','refresh');
				 	}
				 	
				 	
				}
		}
	}
?>