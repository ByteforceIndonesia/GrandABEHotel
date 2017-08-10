<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Email extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        public function check_day($post_string)
        {
            return $post_string == '0' ? FALSE : TRUE;
        }

        public function check_month($post_string)
        {
            return $post_string == '0' ? FALSE : TRUE;
        }

        public function check_year($post_string)
        {
            return $post_string == '0' ? FALSE : TRUE;
        }

        public function mail()
        {
            //$ci = get_instance();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('starting', 'Check In', 'required');
            $this->form_validation->set_rules('end', 'Check Out', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_message('check_checkin', 'Check In is required.');
            $this->form_validation->set_message('check_checkout', 'Check Out is required.');

            if ($this->form_validation->run() === FALSE) {
                $this->load->helper('form');
                $this->session->set_flashdata('mailMessageHeader', 'Information incomplete');

                $this->session->set_flashdata('mailMessage',
                    form_error('starting') .
                    form_error('end') .
                    form_error('email'));
            } else {
//				$this->load->model('Mainsettingsdata');
                if ($result = $this->Mainsettingsdata->getData()) {
                    $data = $result;
                }
                $this->load->library('email');
//				$this->load->library('encrypt');

                /*
                 *
                 * Depreceated
                 * @author : @darthjonathan
                 *
                 */

//				$password= $this->encrypt->decode($data->password);

//				$config = Array(
//					'protocol' => 'smtp',
//					'smtp_host' => 'ssl://smtp.gmail.com',
//					'smtp_port' => 465,
//					'smtp_user' => $data->email,
//					'smtp_pass' => $password,
//
//					'mailtype'  => 'html',
//					'charset'   => 'iso-8859-1'
//					);
//				$this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->email->from('automated.reservations@grandabehotel.com', 'Customer Reservations');
                $this->email->to($data->email);

                // $this->email->cc('another@another-example.com');
                // $this->email->bcc('them@their-ample.com');

                $this->email->subject('Reservations');

                $dateObj = DateTime::createFromFormat('!m', $this->input->post('month'));
                $monthName = $dateObj->format('F');
                $this->email->message(
                    "Reservations " . "<br>" .
                    "Customer Name : " . $this->input->post('name') . "<br>" .
                    "Date : " . $this->input->post('day') . " " . $monthName . " 20" . $this->input->post('year') . "<br>" .
                    "Email : " . $this->input->post('email'));

                $result = $this->email->send();
                //$ci->email->print_debugger();
                if (!$result) {
                    $this->session->set_flashdata('mailMessageHeader', 'Error');
                    $this->session->set_flashdata('mailMessage', 'Failed to send email. Please try again later.');
                } else {
                    $this->session->set_flashdata('mailMessageHeader', 'Mail sent!');
                    $this->session->set_flashdata('mailMessage', 'The mail has been sent. We will contact you shortly.');
                }

            }
            redirect('', 'refresh');
        }

        public function contact_mail()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required|min_length[10]',
                array('min_length[10]' => 'Address must be at least 10 characters.'));
            $this->form_validation->set_rules('phone', 'Phone', 'required|numeric',
                array('numeric' => 'Phone must be a number'));
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('message', 'Message', 'required');

            if ($this->form_validation->run() === FALSE) {

                $this->data['footer']=$this->footerdata->getData();
                $this->data['contacts']=$this->footerdata->getContacts();
                $this->data['main']=$this->Mainsettingsdata->getData();
                $this->data['header']=$this->wnbdata->getData();
                $this->template->load('template', 'contact_us', $this->data);

            } else {

                if ($result = $this->Mainsettingsdata->getData()) {
                    $maindata = $result;
                }

                $data = array(

                    'name'      => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                    'phone'     => $this->input->post('phone'),
                    'address'   => $this->input->post('address'),
                    'message'   => $this->input->post('message')

                );

                $config = array(
                    'charset'=>'utf-8',
                    'wordwrap'=> TRUE,
                    'mailtype' => 'html'
                );

                $this->load->library('email');
                $this->email->initialize($config);

                $this->email->from('contact_us_form@grandabehotel.com', 'Contact Us Form System');
                $this->email->to($maindata->email);

                $this->email->subject('Contact Us Form from ' .  $data['name']);
                $this->email->message($this->load->view('templates/email_template', $data, true));

                if($this->email->send())
                {
                    $this->session->set_flashdata('success', 'Your mail have been successfully sent, please wait for our respond');
                    redirect('contactus');
                }else
                {
                    $this->session->set_flashdata('error', 'Email failed to send, please email directly to our email.');
                    redirect('contactus');
                }
            }
        }
    }

?>