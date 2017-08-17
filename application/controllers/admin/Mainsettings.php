<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mainsettings extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Mainsettingsdata');
			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}
	

		public function index()
		{
			$this->data['page_title'] = 'Main Settings';

			if($result = $this->Mainsettingsdata->getData()){
				$this->data['main'] = $result;
			}
			$this->render('admin/pages/main_settings_edit_view');

		}

		public function logoExtCheck($file){
			$path = $_FILES['upload_logo']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if($ext!="png"){
				return FALSE;
			}
			else{
				return TRUE;
			}
		}

		public function bgExtCheck($file){
			$path = $_FILES['upload_bg']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			if($ext!="png" && $ext!="jpg" && $ext!="jpeg"&& $ext!="JPG"){
				return FALSE;
			}
			else{
				return TRUE;
			}
		}

		public function passValidate($string){
			$pass = $this->input->post('ta_password');
			$cpass = $this->input->post('ta_cpassword');
			if(strcmp($pass, $cpass)!=0){
				return false;
			}
			else{
				return true;
			}
		}

        public function delete_image(){

            $file_link = $this->input->post('file');

            if(unlink($file_link)){
                echo 'success';
            }else{
                return false;
            }
        }

        public function new_promo()
        {
            if(!$_POST){
                return $this->load->view('admin/pages/modal/new_promo', true);
            }else{

                $files = $_FILES['uploaded']['name'];

                if(empty($files)){
                    redirect(base_url('admin/mainsettings'));
                    return;
                }else{

                    foreach ($files as $count => $file) {
                        //Put into one array
                        $_FILES['room_single']['name'] = $_FILES['uploaded']['name'][$count];
                        $_FILES['room_single']['type'] = $_FILES['uploaded']['type'][$count];
                        $_FILES['room_single']['tmp_name'] = $_FILES['uploaded']['tmp_name'][$count];
                        $_FILES['room_single']['error'] = $_FILES['uploaded']['error'][$count];
                        $_FILES['room_single']['size'] = $_FILES['uploaded']['size'][$count];

                        $config['upload_path'] = './assets/images/uploads/promos';
                        $config['allowed_types'] = 'png|jpg|jpeg|gif';
                        $config['file_name'] = time() . '_' . uniqid();
                        $config['max_size'] = 0;

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if (!$this->upload->do_upload('room_single')) {
                            $this->session->set_flashdata('error_file', $this->upload->display_errors());
                        } else {
                            $upload_data = $this->upload->data();
                        }
                    }


                    redirect(base_url('admin/mainsettings'));
                    return;

                }
            }
        }

		public function edit(){
			$result = $this->Mainsettingsdata->getData();
			$this->data['main'] = $result;

			if(isset($_POST['submit'])){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('ta_email','Email','trim|required|valid_email');
//				$this->form_validation->set_rules('ta_password','Password','trim|required');
//				$this->form_validation->set_rules('ta_cpassword','Confirm Password','trim|required');
				$this->form_validation->set_rules('txtlogo','Logo Image','trim|required');
				$this->form_validation->set_rules('txtbg','Background Image','trim|required');
				
				if(!empty($_FILES['upload_logo']['name'])){
					$this->form_validation->set_rules('upload_logo','Logo Image','callback_logoExtCheck');
					$this->form_validation->set_message('logoExtCheck','Image should be png');
				}
				
				if(!empty($_FILES['upload_bg']['name'])){
					$this->form_validation->set_rules('upload_bg','Background Image','callback_bgExtCheck');
					$this->form_validation->set_message('bgExtCheck','Image should be png / jpg / jpeg');
				}

                /*
                 * Deprecated
                 * @darthjonathan
                 *
                 */
//				if(!empty($this->input->post('ta_password')) && !empty($this->input->post('ta_cpassword'))){
//					$this->form_validation->set_rules('ta_cpassword','Confirm Password','callback_passValidate');
//					$this->form_validation->set_message('passValidate','Passwords do not match');
//				}

				if($this->form_validation->run() === FALSE)
				{
					if($result = $this->Mainsettingsdata->getData()){
						$this->data['main'] = $result;
					}
					$this->load->helper('form');
					$this->render('admin/pages/main_settings_edit_view');
				}
				else{
				    /*
				     * No need for time
				     */
					$filelogo= $_FILES['upload_logo']['name'];
					$filelogo = str_replace(' ', '_', $filelogo);
				 	$filebg = $_FILES['upload_bg']['name'];
				 	$filebg = str_replace(' ', '_', $filebg);

				 	//upload logo Image
					 	$config['upload_path']   = './assets/images/uploads/logo' ;
					 	$config['allowed_types'] = 'png';
					 	$config['file_name'] = $filelogo;
					 	$config['max_size'] = 0;
					 	$config['overwrite'] = TRUE;
					 	$this->load->library('upload', $config);
					 	$this->upload->initialize($config);

					 	if($this->upload->do_upload('upload_logo')){
					 		$upload_data = $this->upload->data();
					 		if(!empty($result)){
					 			unlink('./assets/images/uploads/logo/'.$result->logo);
					 		}
					 	}
					 	
					 	//upload Background
					 	$config['upload_path']   = './assets/images/uploads/background' ;
					 	$config['allowed_types'] = 'png|jpg|jpeg';
					 	$config['file_name'] = $filebg;
					 	$config['max_size'] = 0;
					 	$config['overwrite'] = TRUE;
					 	$this->load->library('upload', $config);
					 	$this->upload->initialize($config);

					 	if($this->upload->do_upload('upload_bg')){
					 		$upload_data = $this->upload->data();
					 		if(!empty($result)){
					 			unlink('./assets/images/uploads/background/'.$result->background);
					 		}
					 	}			 	

//					 	$this->load->library('encrypt');
//					 	$encpassword = $this->encrypt->encode($this->input->post('ta_password'));
//
//
					 	$data = array(
					 			'email'=>$this->input->post('ta_email')
//					 			'password'=>$encpassword
					 		);
					 	if(!empty($_FILES['upload_logo']['name'])){
					 		$data['logo']=$filelogo;
					 	}
					 	if(!empty($_FILES['upload_bg']['name'])){
					 		$data['background']=$filebg;
					 	}
					 	$this->Mainsettingsdata->update($data);
					 	$this->session->set_flashdata('message','Update Success');

					 	redirect('admin','refresh');
				 	}
				 	
				 	
				}
		}
	}

?>