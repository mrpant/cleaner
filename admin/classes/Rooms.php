<?php
	class Rooms extends Generic
	{
		function manage_rooms($data)
		{	
			$data['handler'] = 'rooms';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_rooms_list($data)
		{
			$data['handler'] = 'rooms';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_rooms_details($data)
		{
			$data['handler'] = 'rooms';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>