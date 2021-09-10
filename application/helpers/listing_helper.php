<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */



if (! function_exists('now_open')) {
  function now_open($listing_id = '') {
    $CI	=&	get_instance();
    $CI->load->database();
    $time_configurations = $CI->db->get_where('time_configuration', array('listing_id' => $listing_id))->row_array();
    $today = strtolower(date('l'));
    $current_hour = date('H');
    $time_configuration_for_today = explode('-', $time_configurations[$today]);
    if ($time_configuration_for_today[0] == 'closed' || $time_configuration_for_today[1] == 'closed') {
      return get_phrase('closed');
    }else {
      if( $time_configuration_for_today[0] <= $current_hour && $time_configuration_for_today[1] >= $current_hour )
        return get_phrase('now_open');
      else
        return get_phrase('closed');
    }
  }
}


if (! function_exists('is_wishlisted')) {
  function is_wishlisted($listing_id = '') {
    $CI =&  get_instance();
    $CI->load->database();
    if ($CI->session->userdata('is_logged_in') != 1 ) {
      return false;
    }

    $user_details = $CI->db->get_where('user', array('id' => $CI->session->userdata('user_id')))->row_array();
    if ($user_details['wishlists'] != "") {
      $wishlists = json_decode($user_details['wishlists']);
      if (in_array($listing_id, $wishlists)) {
        return 1;
      }else {
        return 0;
      }
    }else {
      return 1;
    }
  }
}

if (! function_exists('get_listing_url')) {
  function get_listing_url($listing_id = ""){
    $CI =&  get_instance();
    $CI->load->database();
    $listing = $CI->db->get_where('listing', array('id' => $listing_id))->row_array();
	
   // $custom_url = site_url($listing['listing_type'].'/'.slugify($listing['name']).'/'.$listing_id);
   $custom_url = site_url('general/'.slugify($listing['name']).'/'.$listing_id);
    return $custom_url;
  }
}



// ------------------------------------------------------------------------
/* End of file package_helper.php */
/* Location: ./system/helpers/package_helper.php */
