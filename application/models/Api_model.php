<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
		
	
	function getToken()
	{
			$this->db->order_by('id','DESC');
			$this->db->limit(1);
		$q = $this->db->get('api_token');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function validateToken($token)
	{
		$this->db->where('token',$token);
		$q = $this->db->get('api_token');
		if($q->num_rows()==0) 
		{   
	        $arr['status']='2';
			$arr['message']='Invalid Request';
			echo json_encode($arr);
			exit;
		}
	}
	
	
	function getTenantList($search,$offset)
	{
		if($search)
		{
		   $this->db->like('first_name',$search);
		   $this->db->or_like('last_name',$search);
		   $this->db->or_like('email',$search);
		   $this->db->or_like('phone',$search);
		   $this->db->or_like('driver_license_number',$search);
		}
		$this->db->order_by('id');
		$q = $this->db->get('applicants_and_tenants');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function getTenantById($id)
	{
		$this->db->where('id',$id);
		$q = $this->db->get('applicants_and_tenants');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	public function addTenant($data) 
    {
		$email = $data['email'];
    	$qry = "select id FROM applicants_and_tenants WHERE email='$email'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

	        if ($this->db->insert("applicants_and_tenants", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Already exists';
			echo json_encode($arr);
			exit;
		}
	}
	
	public function editTenant($id, $data) 
    {
		$email = $data['email'];
    	$qry = "select id FROM applicants_and_tenants WHERE email='$email' AND id='$id'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

			$this->db->where('id', $id);
			if($this->db->update("applicants_and_tenants", $data)) 
			{
				$arr['status']='1';
				$arr['message']='Updated successfully';
				echo json_encode($arr);
				exit;
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Something wrong';
			echo json_encode($arr);
			exit;
		}
	}
	
	
	
	//Property
	
	
	function getPropertyList($search,$offset)
	{
		if($search)
		{
		   $this->db->like('property_name',$search);
		   $this->db->or_like('type',$search);
		   $this->db->or_like('owner',$search);
		   $this->db->or_like('City',$search);
		   $this->db->or_like('number_of_units',$search);
		   $this->db->or_like('street',$search);
		   $this->db->or_like('ZIP',$search);
		}
		$this->db->order_by('id');
		$q = $this->db->get('properties');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function getPropertyById($id)
	{
		$this->db->where('id',$id);
		$q = $this->db->get('properties');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	public function addProperty($data) 
    {
		$property_name = $data['property_name'];
		$owner = $data['owner'];
    	$qry = "select id FROM properties WHERE property_name='$property_name' AND owner='$owner'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

	        if ($this->db->insert("properties", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Already exists';
			echo json_encode($arr);
			exit;
		}
	}
	
	public function editProperty($id, $data) 
    {
		$owner = $data['owner'];
    	$qry = "select id FROM properties WHERE owner='$owner' AND id='$id'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

			$this->db->where('id', $id);
			if($this->db->update("properties", $data)) 
			{
				$arr['status']='1';
				$arr['message']='Updated successfully';
				echo json_encode($arr);
				exit;
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Something wrong';
			echo json_encode($arr);
			exit;
		}
	}
	
	function getUnitList($search,$offset)
	{
		if($search)
		{
		   $this->db->like('features',$search);
		   $this->db->like('size',$search);
		   $this->db->or_like('unit_number',$search);
		   $this->db->or_like('street',$search);
		   $this->db->or_like('city',$search);
		   $this->db->or_like('rooms',$search);
		   $this->db->or_like('bathroom',$search);
		   $this->db->or_like('rental_amount',$search);
		   $this->db->or_like('deposit_amount',$search);
		   $this->db->or_like('description',$search);
		   $this->db->or_like('postal_code',$search);
		}
		$this->db->order_by('id');
		$q = $this->db->get('units');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function getPropertyUnitById($id)
	{
		$this->db->where('id',$id);
		$q = $this->db->get('units');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	public function addPropertyUnit($data) 
    {
		$property = $data['property'];
    	$qry = "select id FROM units WHERE unit_number='$unit_number' AND property='$property'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

	        if ($this->db->insert("units", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Already exists';
			echo json_encode($arr);
			exit;
		}
	}
	
	public function editPropertyUnit($id, $data) 
    {
		$property = $data['property'];
    	$qry = "select id FROM units WHERE property='$property' AND id='$id'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

			$this->db->where('id', $id);
			if($this->db->update("units", $data)) 
			{
				$arr['status']='1';
				$arr['message']='Updated successfully';
				echo json_encode($arr);
				exit;
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Something wrong';
			echo json_encode($arr);
			exit;
		}
	}
	
	public function addPropertyPhoto($data) 
    {
		
	        if ($this->db->insert("property_photos", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
	}
	
	
	
	// Owners
	function getOwnersList($search,$offset)
	{
		if($search)
		{
		   $this->db->like('first_name',$search);
		   $this->db->or_like('last_name',$search);
		   $this->db->or_like('primary_email',$search);
		   $this->db->or_like('phone',$search);
		   $this->db->or_like('company_name',$search);
		   $this->db->or_like('city',$search);
		}
		$this->db->order_by('id');
		$q = $this->db->get('rental_owners');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function getOwnersById($id)
	{
		$this->db->where('id',$id);
		$q = $this->db->get('rental_owners');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	public function addOwner($data) 
    {
		$primary_email = $data['primary_email'];
    	$qry = "select id FROM rental_owners WHERE primary_email='$primary_email'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

	        if ($this->db->insert("rental_owners", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Already exists';
			echo json_encode($arr);
			exit;
		}
	}
	
	public function editOwner($id, $data) 
    {
		$primary_email = $data['primary_email'];
    	$qry = "select id FROM rental_owners WHERE primary_email='$primary_email' AND id='$id'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

			$this->db->where('id', $id);
			if($this->db->update("rental_owners", $data)) 
			{
				$arr['status']='1';
				$arr['message']='Updated successfully';
				echo json_encode($arr);
				exit;
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Something wrong';
			echo json_encode($arr);
			exit;
		}
	}
	
	//Services
	
	function getServiceCategoriesList()
	{
		$q = $this->db->get('service_categories');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function getServiceList($search,$offset)
	{
		if($search)
		{
		   $this->db->like('name',$search);
		   $this->db->or_like('description',$search);
		   $this->db->or_like('owner',$search);
		   $this->db->or_like('category_id',$search);
		   $this->db->or_like('ZIP',$search);
		}
		$this->db->order_by('id');
		$q = $this->db->get('services');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function getServiceById($id)
	{
		$this->db->where('id',$id);
		$q = $this->db->get('services');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	public function addService($data) 
    {
		$name = $data['name'];
		$owner = $data['owner'];
    	$qry = "select id FROM services WHERE name='$name' AND owner='$owner'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

	        if ($this->db->insert("services", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Already exists';
			echo json_encode($arr);
			exit;
		}
	}
	
	public function editService($id, $data) 
    {
		$owner = $data['owner'];
    	$qry = "select id FROM services WHERE owner='$owner' AND id='$id'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

			$this->db->where('id', $id);
			if($this->db->update("services", $data)) 
			{
				$arr['status']='1';
				$arr['message']='Updated successfully';
				echo json_encode($arr);
				exit;
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Something wrong';
			echo json_encode($arr);
			exit;
		}
	}
	
	
	
	
	
	// Leases
	
	function getLeaseType()
	{
		
		$array['status']='1';
		$array['message']='';
		$arr = array();
		$row['type'] = 'Fixed';
		$data[]=$row;
		$row['type'] = 'Fixed with rollover';
		$data[]=$row;
		$row['type'] = 'At-will';
		$data[]=$row;
		
		$array['result']= $data;
		echo json_encode($array);
		exit;			
	}
	
	function getLeaseStatus()
	{
		
		$array['status']='1';
		$array['message']='';
		$arr = array();
		$row['type'] = 'Application';
		$data[]=$row;
		$row['type'] = 'Lease';
		$data[]=$row;
		$row['type'] = 'Historical lease';
		$data[]=$row;
		
		$array['result']= $data;
		echo json_encode($array);
		exit;			
	}
	
	function getLeaseRecurringCharges()
	{
		
		$array['status']='1';
		$array['message']='';
		$arr = array();
		$row['type'] = 'Monthly';
		$data[]=$row;
		$row['type'] = 'Lease';
		$data[]=$row;
		$row['type'] = 'Historical lease';
		$data[]=$row;
		
		$array['result']= $data;
		echo json_encode($array);
		exit;			
	}
	
	function getLeaseList($search,$offset)
	{
		
		
		$this->db->select('applications_leases.*, applicants_and_tenants.first_name,applicants_and_tenants.last_name,applicants_and_tenants.phone,properties.property_name,units.unit_number')
         ->from('applications_leases')
         ->join('applicants_and_tenants', 'applicants_and_tenants.id = applications_leases.tenants')
         ->join('properties', 'properties.id = applications_leases.property')
         ->join('units', 'units.id = applications_leases.unit');
        $q = $this->db->get();
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	public function addLease($data) 
    {

	        if ($this->db->insert("applications_leases", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		
	}
	
	public function editLease($id, $data) 
    {
    	$qry = "select id FROM applications_leases WHERE id='$id'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

			$this->db->where('id', $id);
			if($this->db->update("applications_leases", $data)) 
			{
				$arr['status']='1';
				$arr['message']='Updated successfully';
				echo json_encode($arr);
				exit;
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Something wrong';
			echo json_encode($arr);
			exit;
		}
	}
	
	
	
	// Vendors
	function getVendorList($search,$offset)
	{
		if($search)
		{
		   $this->db->like('first_name',$search);
		   $this->db->or_like('last_name',$search);
		   $this->db->or_like('primary_email',$search);
		   $this->db->or_like('phone',$search);
		   $this->db->or_like('company_name',$search);
		   $this->db->or_like('city',$search);
		}
		$this->db->order_by('id');
		$q = $this->db->get('service_owners');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	
	function getVendorById($id)
	{
		$this->db->where('id',$id);
		$q = $this->db->get('service_owners');
		if($q->num_rows() > 0) 
		{   
			$array['status']='1';
			$array['message']='';
			$arr = array();
			foreach (($q->result()) as $row) 
			{
				
				$data[]=$row;
			}
			$array['result']= $data;
			echo json_encode($array);
			exit;			
		} 
		$arr['status']='0';
		$arr['message']='No Records Found';
		echo json_encode($arr);
		exit;
	}
	
	public function addVendor($data) 
    {
		$primary_email = $data['primary_email'];
    	$qry = "select id FROM service_owners WHERE primary_email='$primary_email'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

	        if ($this->db->insert("service_owners", $data)) 
	        {
				$arr['status']='1';
				$arr['message']='Added successfully';
				echo json_encode($arr);
				exit;
				
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Already exists';
			echo json_encode($arr);
			exit;
		}
	}
	
	public function editVendor($id, $data) 
    {
		$primary_email = $data['primary_email'];
    	$qry = "select id FROM service_owners WHERE primary_email='$primary_email' AND id='$id'";
        $q = $this->db->query($qry);
        if ($q->num_rows() == 0) 
        {

			$this->db->where('id', $id);
			if($this->db->update("service_owners", $data)) 
			{
				$arr['status']='1';
				$arr['message']='Updated successfully';
				echo json_encode($arr);
				exit;
			}
			else
			{
				$arr['status']='0';
				$arr['message']='Something wrong';
				echo json_encode($arr);
				exit;
			}
		}
		else
		{
			$arr['status']='0';
			$arr['message']='Something wrong';
			echo json_encode($arr);
			exit;
		}
	}
	
	
	
}
