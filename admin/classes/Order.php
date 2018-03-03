<?php
	class Order extends Generic
	{
		function manage_account($data)
		{	
			$data['handler'] = 'order';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_order_list($data)
		{
			$data['handler'] = 'order';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_order_details($data)
		{
			$data['handler'] = 'order';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>