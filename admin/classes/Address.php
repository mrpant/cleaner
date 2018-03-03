<?php
	class Address extends Generic
	{
		function manage_address($data)
		{	
			$data['handler'] = 'address';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_address_list($data)
		{
			$data['handler'] = 'address';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_address_details($data)
		{
			$data['handler'] = 'address';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>