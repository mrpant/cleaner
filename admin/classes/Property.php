<?php
	class Property extends Generic
	{
		function manage_property($data)
		{	
			$data['handler'] = 'property';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_property_list($data)
		{
			$data['handler'] = 'property';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_property_details($data)
		{
			$data['handler'] = 'property';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>