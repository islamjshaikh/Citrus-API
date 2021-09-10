<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	 
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('api_model');
		$this->load->helper('url');
		$this->load->library('parser');
		//date_default_timezone_set('Asia/Dubai');
		if($this->router->fetch_method()!='getToken'  && $this->router->fetch_method()!='validateToken' && $this->router->fetch_method()!='createToken')
		{
			$this->validateToken();
		}
		

    }

	function createToken()
    {
		$this->db->delete('api_token');
		$data['status'] = 1;
		$data['token'] = random_string('sha1', 16);
		if ($this->db->insert("api_token", $data)) 
		{
			$arr['status']='1';
			$arr['message'] = 'Token Added successfully';
			echo json_encode($arr);
			exit;
			
		} 
    }
	
	function getToken()
    {
		$this->api_model->getToken();   
    }
	
	function validateToken()
    {
	
		$headers = apache_request_headers();
		  if(isset($headers['Authorization'])){
			  $token = $headers['Authorization'];
			$this->api_model->validateToken($token);
		  }
		  else
		  {
			$arr['status']='2';
			$arr['message']='Invalid Request';
			echo json_encode($arr);
			exit;
		  }
		//$this->api_model->validateToken($token);   
    }
	
	function getTenantList()
    {
		$search =$this->input->post('search');
		$offset =$this->input->post('offset');
		$this->api_model->getTenantList($search,$offset);   
    }
	
	
	function getTenantById()
    {
		$id =$this->input->post('id');
		$this->api_model->getTenantById($id);   
    }
	
	function addTenant()
    {
		
		
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('driver_license_number', 'driver_license_number', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['first_name'] =$this->input->post('first_name');
			$data['last_name'] =$this->input->post('last_name');
			$data['email'] =$this->input->post('email');
			$data['phone'] =$this->input->post('phone');
			$data['birth_date'] =$this->input->post('birth_date');
			$data['driver_license_number'] =$this->input->post('driver_license_number');
			$data['driver_license_state'] =$this->input->post('driver_license_state');
			$data['requested_lease_term'] =$this->input->post('requested_lease_term');
			$data['monthly_gross_pay'] =$this->input->post('monthly_gross_pay');
			$data['additional_income'] =$this->input->post('additional_income');
			$data['assets'] =$this->input->post('assets');
			$data['status'] =$this->input->post('status');
			$data['notes'] =$this->input->post('notes');
            
            $this->api_model->addTenant($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	function editTenant()
    {
		
		
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('driver_license_number', 'driver_license_number', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['first_name'] =$this->input->post('first_name');
			$data['last_name'] =$this->input->post('last_name');
			$data['email'] =$this->input->post('email');
			$data['phone'] =$this->input->post('phone');
			$data['birth_date'] =$this->input->post('birth_date');
			$data['driver_license_number'] =$this->input->post('driver_license_number');
			$data['driver_license_state'] =$this->input->post('driver_license_state');
			$data['requested_lease_term'] =$this->input->post('requested_lease_term');
			$data['monthly_gross_pay'] =$this->input->post('monthly_gross_pay');
			$data['additional_income'] =$this->input->post('additional_income');
			$data['assets'] =$this->input->post('assets');
			$data['status'] =$this->input->post('status');
			$data['notes'] =$this->input->post('notes');
			
			
			$id =$this->input->post('id');
			
            $this->api_model->editTenant($id, $data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	
	//property
	
	
	function getPropertyList()
    {
		$search =$this->input->post('search');
		$offset =$this->input->post('offset');
		$this->api_model->getPropertyList($search,$offset);   
    }
	
	
	function getPropertyById()
    {
		$id =$this->input->post('id');
		$this->api_model->getPropertyById($id);   
    }
	
	
	function addProperty()
    {
		
		
		$this->form_validation->set_rules('property_name', 'property_name', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('number_of_units', 'number_of_units', 'required');
        $this->form_validation->set_rules('owner', 'owner', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZIP', 'ZIP', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['property_name'] =$this->input->post('property_name');
			$data['type'] =$this->input->post('type');
			$data['number_of_units'] =$this->input->post('number_of_units');
			$data['phone'] =$this->input->post('phone');
			$data['owner'] =$this->input->post('owner');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['City'] =$this->input->post('City');
			$data['State'] =$this->input->post('State');
			$data['ZIP'] =$this->input->post('ZIP');
            $this->api_model->addProperty($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	function editProperty()
    {
		
		$this->form_validation->set_rules('property_name', 'property_name', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('number_of_units', 'number_of_units', 'required');
        $this->form_validation->set_rules('owner', 'owner', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZIP', 'ZIP', 'required');
        $this->form_validation->set_rules('id', 'id', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['property_name'] =$this->input->post('property_name');
			$data['type'] =$this->input->post('type');
			$data['number_of_units'] =$this->input->post('number_of_units');
			$data['phone'] =$this->input->post('phone');
			$data['owner'] =$this->input->post('owner');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['City'] =$this->input->post('City');
			$data['State'] =$this->input->post('State');
			$data['ZIP'] =$this->input->post('ZIP');
			$id =$this->input->post('id');
            $this->api_model->editProperty($id,$data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	//property unit
	
	
	function getUnitList()
    {
		$search =$this->input->post('search');
		$offset =$this->input->post('offset');
		$this->api_model->getUnitList($search,$offset);   
    }
	
	
	function getPropertyUnitById()
    {
		$id =$this->input->post('id');
		$this->api_model->getPropertyUnitById($id);   
    }
	
	function addPropertyUnit()
    {
		
		
		$this->form_validation->set_rules('property', 'property', 'required');
        $this->form_validation->set_rules('unit_number', 'unit_number', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('property', 'property', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['property'] =$this->input->post('property');
			$data['unit_number'] =$this->input->post('unit_number');
			$data['status'] =$this->input->post('status');
			$data['size'] =$this->input->post('size');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['city'] =$this->input->post('city');
			$data['state'] =$this->input->post('state');
			$data['postal_code'] =$this->input->post('postal_code');
			$data['rooms'] =$this->input->post('rooms');
			$data['bathroom'] =$this->input->post('bathroom');
			$data['features'] =$this->input->post('features');
			$data['market_rent'] =$this->input->post('market_rent');
			$data['rental_amount'] =$this->input->post('rental_amount');
			$data['deposit_amount'] =$this->input->post('deposit_amount');
			$data['description'] =$this->input->post('description');
            $this->api_model->addPropertyUnit($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	function editPropertyUnit()
    {
		
		
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('property', 'property', 'required');
        $this->form_validation->set_rules('unit_number', 'unit_number', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('property', 'property', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['property'] =$this->input->post('property');
			$data['unit_number'] =$this->input->post('unit_number');
			$data['status'] =$this->input->post('status');
			$data['size'] =$this->input->post('size');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['city'] =$this->input->post('city');
			$data['state'] =$this->input->post('state');
			$data['postal_code'] =$this->input->post('postal_code');
			$data['rooms'] =$this->input->post('rooms');
			$data['bathroom'] =$this->input->post('bathroom');
			$data['features'] =$this->input->post('features');
			$data['market_rent'] =$this->input->post('market_rent');
			$data['rental_amount'] =$this->input->post('rental_amount');
			$data['deposit_amount'] =$this->input->post('deposit_amount');
			$data['description'] =$this->input->post('description');
			
			$id =$this->input->post('id');
            $this->api_model->editPropertyUnit($id, $data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	
	function addPropertyPhoto()
    {
		
        $this->form_validation->set_rules('photo', 'photo', 'required');
        $this->form_validation->set_rules('property', 'property', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['photo'] =$this->input->post('photo');
			$data['property'] =$this->input->post('property');
			$data['description'] =$this->input->post('description');
			
            $this->api_model->addPropertyPhoto($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	
	
	//Owners
	
	
	function getOwnersList()
    {
		$search =$this->input->post('search');
		$offset =$this->input->post('offset');
		$this->api_model->getOwnersList($search,$offset);   
    }
	
	
	function getOwnersById()
    {
		$id =$this->input->post('id');
		$this->api_model->getOwnersById($id);   
    }
	
	function addOwner()
    {
		
		
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('primary_email', 'primary_email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('street', 'street', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zip', 'zip', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['first_name'] =$this->input->post('first_name');
			$data['last_name'] =$this->input->post('last_name');
			$data['primary_email'] =$this->input->post('primary_email');
			$data['company_name'] =$this->input->post('company_name');
			$data['alternate_email'] =$this->input->post('alternate_email');
			$data['date_of_birth'] =$this->input->post('date_of_birth');
			$data['phone'] =$this->input->post('phone');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['city'] =$this->input->post('city');
			$data['state'] =$this->input->post('state');
			$data['zip'] =$this->input->post('zip');
			$data['comments'] =$this->input->post('comments');
            
            $this->api_model->addOwner($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	function editOwner()
    {
		
		
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('primary_email', 'primary_email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('street', 'street', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zip', 'zip', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['first_name'] =$this->input->post('first_name');
			$data['last_name'] =$this->input->post('last_name');
			$data['primary_email'] =$this->input->post('primary_email');
			$data['company_name'] =$this->input->post('company_name');
			$data['alternate_email'] =$this->input->post('alternate_email');
			$data['date_of_birth'] =$this->input->post('date_of_birth');
			$data['phone'] =$this->input->post('phone');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['city'] =$this->input->post('city');
			$data['state'] =$this->input->post('state');
			$data['zip'] =$this->input->post('zip');
			$data['comments'] =$this->input->post('comments');
			
			
			$id =$this->input->post('id');
			
            $this->api_model->editOwner($id, $data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	
		//Owners
	
	
	function getVendorList()
    {
		$search =$this->input->post('search');
		$offset =$this->input->post('offset');
		$this->api_model->getVendorList($search,$offset);   
    }
	
	
	function getVendorById()
    {
		$id =$this->input->post('id');
		$this->api_model->getVendorById($id);   
    }
	
	function addVendor()
    {
		
		
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('primary_email', 'primary_email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('street', 'street', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zip', 'zip', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['first_name'] =$this->input->post('first_name');
			$data['last_name'] =$this->input->post('last_name');
			$data['primary_email'] =$this->input->post('primary_email');
			$data['company_name'] =$this->input->post('company_name');
			$data['alternate_email'] =$this->input->post('alternate_email');
			$data['date_of_birth'] =$this->input->post('date_of_birth');
			$data['phone'] =$this->input->post('phone');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['city'] =$this->input->post('city');
			$data['state'] =$this->input->post('state');
			$data['zip'] =$this->input->post('zip');
			$data['comments'] =$this->input->post('comments');
            
            $this->api_model->addVendor($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	function editVendor()
    {
		
		
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('primary_email', 'primary_email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $this->form_validation->set_rules('street', 'street', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('state', 'state', 'required');
        $this->form_validation->set_rules('zip', 'zip', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['first_name'] =$this->input->post('first_name');
			$data['last_name'] =$this->input->post('last_name');
			$data['primary_email'] =$this->input->post('primary_email');
			$data['company_name'] =$this->input->post('company_name');
			$data['alternate_email'] =$this->input->post('alternate_email');
			$data['date_of_birth'] =$this->input->post('date_of_birth');
			$data['phone'] =$this->input->post('phone');
			$data['country'] =$this->input->post('country');
			$data['street'] =$this->input->post('street');
			$data['city'] =$this->input->post('city');
			$data['state'] =$this->input->post('state');
			$data['zip'] =$this->input->post('zip');
			$data['comments'] =$this->input->post('comments');
			
			
			$id =$this->input->post('id');
			
            $this->api_model->editVendor($id, $data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	//Services
	
	function getServiceCategoriesList()
    {
		$this->api_model->getServiceCategoriesList();   
    }
	
	
	function getServiceList()
    {
		$search =$this->input->post('search');
		$offset =$this->input->post('offset');
		$this->api_model->getServiceList($search,$offset);   
    }
	
	
	function getServiceById()
    {
		$id =$this->input->post('id');
		$this->api_model->getServiceById($id);   
    }
	
	
	function addService()
    {
		
		
		$this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['name'] =$this->input->post('name');
			$data['description'] =$this->input->post('description');
			$data['category_id'] =$this->input->post('category_id');
			$data['rate'] =$this->input->post('rate');
			$data['rating'] =$this->input->post('rating');
            $this->api_model->addService($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	function editService()
    {
		
		$this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('category_id', 'category_id', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['name'] =$this->input->post('name');
			$data['description'] =$this->input->post('description');
			$data['category_id'] =$this->input->post('category_id');
			$data['rate'] =$this->input->post('rate');
			$data['rating'] =$this->input->post('rating');
			$id =$this->input->post('id');
            $this->api_model->editService($id,$data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	
	
	
	//lease
	
	
	function getLeaseList()
    {
		$search =$this->input->post('search');
		$offset =$this->input->post('offset');
		$this->api_model->getLeaseList($search,$offset);   
    }
	
	
	function getLeaseById()
    {
		$id =$this->input->post('id');
		$this->api_model->getLeaseById($id);   
    }
	
	function getLeaseType()
    {
		$this->api_model->getLeaseType();   
    }
	
	function getLeaseStatus()
    {
		$this->api_model->getLeaseStatus();   
    }
	
	function getLeaseRecurringCharges()
    {
		$this->api_model->getLeaseRecurringCharges();   
    }
	
	
	
	function addLease()
    {
		
		$this->form_validation->set_rules('tenants', 'tenants', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('property', 'property', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('total_number_of_occupants', 'total_number_of_occupants', 'required');
        $this->form_validation->set_rules('recurring_charges_frequency', 'recurring_charges_frequency', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['tenants'] =$this->input->post('tenants');
			$data['status'] =$this->input->post('status');
			$data['property'] =$this->input->post('property');
			$data['unit'] =$this->input->post('unit');
			$data['type'] =$this->input->post('type');
			$data['total_number_of_occupants'] =$this->input->post('total_number_of_occupants');
			$data['start_date'] =$this->input->post('start_date');
			$data['end_date'] =$this->input->post('end_date');
			$data['recurring_charges_frequency'] =$this->input->post('recurring_charges_frequency');
			$data['next_due_date'] =$this->input->post('next_due_date');
			$data['rent'] =$this->input->post('rent');
			$data['security_deposit'] =$this->input->post('security_deposit');
			$data['security_deposit_date'] =$this->input->post('security_deposit_date');
			$data['emergency_contact'] =$this->input->post('emergency_contact');
			$data['co_signer_details'] =$this->input->post('co_signer_details');
			$data['notes'] =$this->input->post('notes');
			$data['agreement'] =$this->input->post('agreement');
            
            $this->api_model->addLease($data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	function editLease()
    {
		
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('tenants', 'tenants', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('property', 'property', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('total_number_of_occupants', 'total_number_of_occupants', 'required');
        $this->form_validation->set_rules('recurring_charges_frequency', 'recurring_charges_frequency', 'required');
        if ($this->form_validation->run() == true)
        {
			$data['tenants'] =$this->input->post('tenants');
			$data['status'] =$this->input->post('status');
			$data['property'] =$this->input->post('property');
			$data['unit'] =$this->input->post('unit');
			$data['type'] =$this->input->post('type');
			$data['total_number_of_occupants'] =$this->input->post('total_number_of_occupants');
			$data['start_date'] =$this->input->post('start_date');
			$data['end_date'] =$this->input->post('end_date');
			$data['recurring_charges_frequency'] =$this->input->post('recurring_charges_frequency');
			$data['next_due_date'] =$this->input->post('next_due_date');
			$data['rent'] =$this->input->post('rent');
			$data['security_deposit'] =$this->input->post('security_deposit');
			$data['security_deposit_date'] =$this->input->post('security_deposit_date');
			$data['emergency_contact'] =$this->input->post('emergency_contact');
			$data['co_signer_details'] =$this->input->post('co_signer_details');
			$data['notes'] =$this->input->post('notes');
			$data['agreement'] =$this->input->post('agreement');
			
			
			$id =$this->input->post('id');
			
            $this->api_model->editLease($id, $data);  
        }
        else
        {
            $arr['status']='0';
            $arr['message']='Please provide compulsary fields';
            echo json_encode($arr);
            exit;
        }
		
		 
    }
	
	
	
	
 
	
}

