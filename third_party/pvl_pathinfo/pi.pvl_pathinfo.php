<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Pvl_pathinfo
 *
 * @copyright (c) 2011 - Pv Ledoux
 * @author Pierre-Vincent Ledoux <ee-addons@pvledoux.be>
 * @since 20 Arp 2011
 * @version 0.1
 *
 */

$plugin_info = array(
	'pi_name'		=> 'Pvl - PathInfo function',
	'pi_version'		=>'0.1',
	'pi_author'		=>'Pierre-Vincent Ledoux',
	'pi_author_email'	=>'ee-addons@pvledoux.be',
	'pi_author_url'		=> 'http://twitter.com/pvledoux/',
	'pi_description'	=> 'Return result of the pathinfo() function',
	'pi_usage'		=> Pvl_pathinfo::usage()
);

class Pvl_pathinfo
{

	/**
	 * Data returned from the plugin.
	 *
	 * @access	public
	 * @var		array
	 */
	public $return_data = '';


	/**
	 * Constructor.
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		$this->return_data = $this->EE->TMPL->parse_variables($this->EE->TMPL->tagdata, array($this->_output()));
	}


	/**
	 * Annoyingly, the supposedly PHP5-only EE2 still requires this PHP4
	 * constructor in order to function.
	 * method first seen used by Stephen Lewis (https://github.com/experience/you_are_here.ee2_addon)
	 *
	 * @access public
	 * @return void
	 */
	public function Pvl_pathinfo()
	{
		$this->__construct();
	}


	/**
	 * Return pathinfo() output
	 *
	 * @access	private
	 * @return	array
	 */
	private function _output()
	{

		//Get parameter
		$path = $this->EE->TMPL->fetch_param('path');

		if ($path) {
			return pathinfo($path);
		} else {
			return '';
		}

	}

	/**
	 * Usage
	 *
	 * This function describes how the plugin is used.
	 *
	 * @access	public
	 * @return	string
	 */
	static function usage()
	{
		ob_start();
		?>

			Description:

			This plugin run the PHP pathinfo() function on a given path parameter.
			See http://php.net/manual/en/function.pathinfo.php for more info.

			Pay attention that no verification of any sort is done on the path parameter.
			Please be very prudent when using this plugin.

			(c) Copyright 2011 Pv Ledoux

			Author: ee-addons@pvledoux.be

			------------------------------------------------------

			Examples:
			{exp:pvl_pathinfo path="/a/path/to/a/file.txt"}
				{dirname}<br />
				{basename}<br />
				{filename}<br />
				{extension}
			{/exp:pvl_pathinfo}

			------------------------------------------------------

		<?php
		$buffer = ob_get_contents();

		ob_end_clean();

		return $buffer;
	}
	  // END

}


/* End of file pi.pvl_pathinfo.php */
/* Location: ./system/expressionengine/third_party/pvl_pathinfo/pi.pvl_pathinfo.php */
