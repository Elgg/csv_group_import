<?php
	/**
	 * Elgg csv import
	 * 
	 * @package ElggCSVImport
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	/**
	 * Initialise the csvgroupimport tool
	 *
	 */
	function csvgroupimport_init()
	{
		global $CONFIG;

		// Register a page handler, so we can have nice URLs
		register_page_handler('csvgroupimport','csvgroupimport_page_handler');
		
		// Register some actions
		register_action("csvgroupimport/import", false, $CONFIG->pluginspath . "csvgroupimport/actions/import.php", true);
		
	}
	
	/**
	 * Adding the diagnostics to the admin menu
	 *
	 */
	function csvgroupimport_pagesetup()
	{
		if (get_context() == 'admin' && isadminloggedin()) {
			global $CONFIG;
			add_submenu_item(elgg_echo('csvgroupimport:menu:import'), $CONFIG->wwwroot . 'pg/csvgroupimport/');
		}
	}
	
	/**
	 * Email domains page.
	 *
	 * @param array $page Array of page elements, forwarded by the page handling mechanism
	 */
	function csvgroupimport_page_handler($page) 
	{
		global $CONFIG;
		
		// only interested in one page for now
		include($CONFIG->pluginspath . "csvgroupimport/index.php"); 
	}

	// Initialise log browser
	register_elgg_event_handler('init','system','csvgroupimport_init');
	register_elgg_event_handler('pagesetup','system','csvgroupimport_pagesetup');
?>