<?php
	class WebService extends Generic
	{
		function manage_service($data)
		{	
			$data['handler'] = 'web_services';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function manage_service_log($data)
		{
			$data['handler'] = 'web_service_access_logs';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_service_list($data)
		{
			$data['handler'] = 'web_services';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_service_log_list($data)
		{
			$data['handler'] = 'web_service_access_logs';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_service_details($data)
		{
			$data['handler'] = 'web_services';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
		function get_service_log_details($data)
		{
			$data['handler'] = 'web_service_access_logs';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>