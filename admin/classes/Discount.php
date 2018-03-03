<?php
	class Discount extends Generic
	{
		function manage_discount($data)
		{	
			$data['handler'] = 'discount';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_discount_list($data)
		{
			$data['handler'] = 'discount';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_discount_details($data)
		{
			$data['handler'] = 'discount';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>