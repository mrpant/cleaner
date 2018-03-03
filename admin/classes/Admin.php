<?php
	class Admin extends Generic
	{
		function manage_account($data)
		{	
			$data['handler'] = 'admins';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_user_list($data)
		{
			$data['handler'] = 'admins';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_user_details($data)
		{
			$data['handler'] = 'admins';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>