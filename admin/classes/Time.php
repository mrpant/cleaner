<?php
	class Time extends Generic
	{
		function manage_time($data)
		{	
			$data['handler'] = 'time_slot';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_time_list($data)
		{
			$data['handler'] = 'time_slot';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_time_details($data)
		{
			$data['handler'] = 'time_slot';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>