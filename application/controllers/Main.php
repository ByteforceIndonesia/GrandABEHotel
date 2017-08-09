<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct ()
	{
		parent::__construct();
		$this->load->model('homedata');
		$this->load->model('bnmdata');
		$this->load->model('roomdata');
		$this->load->model('wnbdata');
		$this->load->model('locationdata');
		$this->load->model('footerdata');
		$this->load->model('Mainsettingsdata');
		$this->load->model('resto_data');
		$this->load->model('news_model');
	}

	public function index()
	{
		$this->data['home']=$this->homedata->getData();
		$this->data['footer']=$this->footerdata->getData();
		$this->data['class']    = $this->roomdata->getRooms();
		$this->data['contacts']=$this->footerdata->getContacts();
		$this->data['main']=$this->Mainsettingsdata->getData();
		$this->load->view('home', $this->data);
	}

	public function rooms ()
	{
		$this->data['main']=$this->Mainsettingsdata->getData();
		$this->data['headerRoom']=$this->roomdata->getData();
		$this->data['rooms']=$this->roomdata->getRooms();
		$this->data['footer']=$this->footerdata->getData();
		$this->data['contacts']=$this->footerdata->getContacts();
		$this->template->load('template', 'rooms', $this->data);

	}

	public function restaurant ()
	{
		$this->data['main']=$this->Mainsettingsdata->getData();
		$this->data['footer']=$this->footerdata->getData();
		$this->data['headers']			= $this->resto_data->getHeaders();
		$this->data['resto']			= $this->resto_data->getDataResto();
		$this->data['cafe']				= $this->resto_data->getDataCafe();
		$this->data['cafe_catagory']	= $this->resto_data->getCakeCatagory();
		$this->data['contacts']=$this->footerdata->getContacts();
		$this->template->load('template', 'resto', $this->data);
	}

	public function businessandmeetings ()
	{
		$this->data['main']=$this->Mainsettingsdata->getData();
		$this->data['bnm']=$this->bnmdata->getData();
		$this->data['packages']=$this->bnmdata->getPackages();
		$this->data['footer']=$this->footerdata->getData();
		$this->data['contacts']=$this->footerdata->getContacts();
		$this->data['images']=$this->bnmdata->getImages();
		$this->template->load('template', 'businessandmeetings', $this->data);
	}

	public function location ()
	{
		$this->data['main']=$this->Mainsettingsdata->getData();
		$this->data['headerLocation']=$this->locationdata->getData();
		$this->data['locations']=$this->locationdata->getLocations();
		$this->data['photos']=$this->locationdata->getPhotos();
		$this->data['footer']=$this->footerdata->getData();
		$this->data['contacts']=$this->footerdata->getContacts();
		$this->template->load('template', 'location', $this->data);
	}

	public function news ()
	{
		$this->data['main']=$this->Mainsettingsdata->getData();
		$this->data['footer']=$this->footerdata->getData();
		$this->data['contacts']=$this->footerdata->getContacts();
		$this->data['news']	= $this->news_model->getNews();
		$this->template->load('template', 'news', $this->data);
	}

	public function weddingsandevents ()
	{
		$this->data['main']=$this->Mainsettingsdata->getData();
		$this->data['header']=$this->wnbdata->getData();
		$this->data['birthdays']=$this->wnbdata->getBirthdayPhotos();
		$this->data['weddings']=$this->wnbdata->getWeddingPhotos();
		$this->data['footer']=$this->footerdata->getData();
		$this->data['contacts']=$this->footerdata->getContacts();
		$this->template->load('template', 'weddingsandbirthdays', $this->data);
	}


}
