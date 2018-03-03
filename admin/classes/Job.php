<?php
	class Job extends Generic
	{
		function manage_job($data)
		{	
			$data['handler'] = 'jobs';
			$Generic = new Generic();
			$response = $Generic->manage_row($data);
			return $response;
		}
		function get_job_list($data)
		{
			$data['handler'] = 'jobs';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_list($data);
			return $response;
		}
		function get_job_details($data)
		{
			$data['handler'] = 'jobs';
			$Generic = new Generic();
			$response = array();
			$data['condition'] = $Generic->generate_condition($data['conditionParam']);
			$response['data'] = $Generic->get_details($data);
			return $response;
		}
	}
?>