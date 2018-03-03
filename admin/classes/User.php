<?php
	class User extends Generic
	{
		function manage_account($data)
		{	
			$data['handler'] = 'admins';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_role($data)
		{	
			$data['handler'] = 'roles';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_user($data)
		{	
			$data['handler'] = 'customers';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_customer_address($data)
		{	
			$data['handler'] = 'customer_addresses';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_customer_list($data)
		{
			$data['handler'] = 'customers';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_salutation_list($data)
		{
			$data['handler'] = 'salutations';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_role_list($data)
		{
			$data['handler'] = 'roles';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_user_type_list($data)
		{
			$data['handler'] = 'user_types';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_customer_type_list($data)
		{
			$data['handler'] = 'customer_types';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_customer_address_list($data)
		{
			$data['handler'] = 'customer_addresses';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_customer_details($data)
		{
			$data['handler'] = 'customers';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_role_details($data)
		{
			$data['handler'] = 'roles';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_customer_address_details($data)
		{
			$data['handler'] = 'customer_addresses';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_customer_type_details($data)
		{
			$data['handler'] = 'customer_types';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_salutation_details($data)
		{
			$data['handler'] = 'salutations';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>