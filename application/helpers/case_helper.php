<?php
if ( ! function_exists('get_Case_Id'))
{
	/**
	 * Get "now" time
	 *
	 * Returns time() based on the timezone parameter or on the
	 * "time_reference" setting
	 *
	 * @param	string
	 * @return	int
	 */
	function get_Case_Id()
	{
		$CI =& get_instance();
		$CI->load->model('dataentry_model');
		
		return $CI->dataentry_model->get_Last_Case_Id();
	}
}



?>