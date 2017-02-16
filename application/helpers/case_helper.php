<?php
if ( ! function_exists('get_Case_Id'))
{
	/**
	 * Get "Last inserted Case_Id"
	 * @param	string
	 * @return	string
	 */
	function get_Case_Id()
	{
		$CI =& get_instance();
		$CI->load->model('Case_Info_model');
		return $CI->Case_Info_model->get_Last_Case_Id();
	}
}
if ( ! function_exists('get_Case_AutoId'))
{
	/**
	 * Get "Case_AutoId" from "Case_Id"
	 * @param	string
	 * @return	string
	 */
	function get_Case_AutoId($Case_Id)
	{
		$CI =& get_instance();
		$CI->load->model('Case_Info_model');
		return $CI->Case_Info_model->get_Case_AutoId($Case_Id);
	}
}



?>