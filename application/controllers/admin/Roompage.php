<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Roompage extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();

			$this->load->model('roomdata');

			if(!$this->ion_auth->in_group('admin'))
			{
				$this->session->set_flashdata('message','You are not allowed to visit the Pages page');
				redirect('admin','refresh');
			}
		}
//
//		public function roomExtCheck($file){
//			$path = $_FILES['upload_room']['name'];
//			$ext = pathinfo($path, PATHINFO_EXTENSION);
//			if($ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="gif" && $ext!="JPG"){
//				return FALSE;
//			}
//			else{
//				return TRUE;
//			}
//		}

		public function index()
		{
			$this->data['page_title'] = 'Room Edit';
			if($result1 = $this->roomdata->getData()){
				$this->data['headerRoom'] = $result1;
			}
			if($result2 = $this->roomdata->getRooms()){
				$this->data['rooms'] = $result2;
			}

			$this->render('admin/pages/room_page_edit_view');
		}

		public function edit()
		{
			$result = $this->roomdata->getData();
			$this->data['headerRoom'] = $result;

			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_roomPageDesc','Page Description','trim|required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->roomdata->getData()){
				$this->data['headerRoom'] = $result1;
			}
			if($result2 = $this->roomdata->getRooms()){
				$this->data['rooms'] = $result2;
			}
				$this->render('admin/pages/room_page_edit_view');
			}
			else{
				$data = array(
					'ta_roomPageDesc'=>$this->input->post('ta_roomPageDesc')
					);
				$this->roomdata->update($data);
				$this->session->set_flashdata('message','Update Success');
				redirect('admin/roompage','refresh');
			}
		}

		public function createRoom()
		{
			$this->data['page_title'] = 'Add Room';
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ta_roomName','Room name','trim|required');

			$this->form_validation->set_rules('ta_roomDesc','Room Description','trim|required');
			$this->form_validation->set_rules('txtroom','Room Image','trim|required');
			
//			if(!empty($_FILES['upload_room']['name'])){
//				$this->form_validation->set_rules('upload_room','Room Image','callback_roomExtCheck');
//				$this->form_validation->set_message('roomExtCheck','Image should be png / jpg / jpeg / gif');
//			}

			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->roomdata->getData()){
                    $this->data['headerRoom'] = $result1;
                }
                if($result2 = $this->roomdata->getRooms()){
                    $this->data['rooms'] = $result2;
                }
				$this->render('admin/rooms/create_room_view');
			}
			else
			{
				$fileroom = $_FILES['upload_room']['name'];

                $room_id    = uniqid();
                $room_dir   = './assets/images/uploads/rooms/' . $room_id;

                if(!mkdir($room_dir))
                {
                    $this->session->set_flashdata('error_file', 'Error Making Directory');
                    redirect(base_url('admin/roompage'));
                    return;
                }

				if(!empty($fileroom)){

				    foreach($fileroom as $count => $file)
                    {
                        //Put into one array
                        $_FILES['room_single']['name'] = $_FILES['upload_room']['name'][$count];
                        $_FILES['room_single']['type'] = $_FILES['upload_room']['type'][$count];
                        $_FILES['room_single']['tmp_name'] = $_FILES['upload_room']['tmp_name'][$count];
                        $_FILES['room_single']['error'] = $_FILES['upload_room']['error'][$count];
                        $_FILES['room_single']['size'] = $_FILES['upload_room']['size'][$count];

                        $config['upload_path']   = $room_dir;
                        $config['allowed_types'] = 'png|jpg|jpeg|gif';
                        $config['file_name'] = time() . '_' . uniqid();
                        $config['max_size'] = 0;
                        $config['overwrite'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if(!$this->upload->do_upload('room_single')){
                            $this->session->set_flashdata('error_file', $this->upload->display_errors());
                        }
                        else{
                            $upload_data = $this->upload->data();
                        }
                    }

				 	$data = array(
				 			'name'          => $this->input->post('ta_roomName'),
				 			'description'   => $this->input->post('ta_roomDesc'),
				 			'image'         => $room_dir
				 		);

				 	$this->roomdata->createRoom($data);
				 	$this->session->set_flashdata('message','Room Successfully Added');
				}

				redirect('admin/roompage','refresh');
			}
		}

		public function editRoom($id=NULL){

			$id = $this->input->post('id') ? $this->input->post('id') : $id;
			$result = $this->roomdata->selectRoom($id);
			$this->data['room'] = $result;

			$this->data['page_title'] = 'Edit Room';
			$this->load->library('form_validation');

			$this->form_validation->set_rules('ta_roomName','Room Name','trim|required');
			$this->form_validation->set_rules('ta_roomDesc','Room Description','trim|required');


			/*
			 * @author : Jonathan
			 * Deprecated since 14th Aug Revisions
			 */
//			$this->form_validation->set_rules('txtroom','Room Image','trim|required');

//			if(!empty($_FILES['upload_room']['name'])){
//				$this->form_validation->set_rules('upload_room','Room Image','callback_roomExtCheck');
//				$this->form_validation->set_message('roomExtCheck','Image should be png / jpg / jpeg / gif');
//			}

			if($this->form_validation->run()===FALSE)
			{
				$this->load->helper('form');
				if($result1 = $this->roomdata->getData()){
				$this->data['headerRoom'] = $result1;
			}
			if($result2 = $this->roomdata->getRooms()){
				$this->data['rooms'] = $result2;
			}
				$this->render('admin/rooms/edit_room_view');
			}
			else
			{
				$id = $this->input->post('id') ? $this->input->post('id') : $id;
				$result = $this->roomdata->selectRoom($id);
				$this->data['room'] = $result;

				$fileroom = $_FILES['upload_room']['name'];

                if(!empty($fileroom)) {

                    foreach ($fileroom as $count => $file) {
                        //Put into one array
                        $_FILES['room_single']['name'] = $_FILES['upload_room']['name'][$count];
                        $_FILES['room_single']['type'] = $_FILES['upload_room']['type'][$count];
                        $_FILES['room_single']['tmp_name'] = $_FILES['upload_room']['tmp_name'][$count];
                        $_FILES['room_single']['error'] = $_FILES['upload_room']['error'][$count];
                        $_FILES['room_single']['size'] = $_FILES['upload_room']['size'][$count];

                        $config['upload_path'] = $result->image;
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
                }

			 	$data = array(
			 			'name'=>$this->input->post('ta_roomName'),
			 			'description'=>$this->input->post('ta_roomDesc')
			 		);


                /*
                 * Deprecated
                 * author : @darthjonathan
                 * Not used, since now a file folder
                 */
//			 	if(!empty($_FILES['upload_room']['name'])){
//			 		$data['image']=$fileroom;
//			 	}

			 	$this->roomdata->editRoom($id,$data);
			 	$this->session->set_flashdata('message','Room Successfully Edited');
				
				redirect('admin/roompage','refresh');
			}
		}

		public function deleteRoom($id=NULL){
			$id = $this->input->post('id') ? $this->input->post('id') : $id;
            $result = $this->roomdata->selectRoom($id);

			if(is_null($id))
			{
				$this->session->set_flashdata('message','There\'s no room to delete');
			}
			else{
				$this->roomdata->deleteRoom($id, $result->image);
				$this->session->set_flashdata('message','Room successfully deleted');
			}
			
			redirect('admin/roompage','refresh');
		}

        public function delete_image(){

            $file_link = $this->input->post('file');

            if(unlink($file_link)){
                echo 'success';
            }else{
                return false;
            }
        }
	}
?>