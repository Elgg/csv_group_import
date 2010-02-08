<?php
	/**
	 * Elgg email domains language pack.
	 * 
	 * @package ElggEmailDomains
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2010
	 * @link http://elgg.com/
	 */

	$english = array(
		'csvgroupimport:menu:import' => 'Import users into group',
		'csvgroupimport:description' => 'Select a CSV file to import which must contain a list of users in the following format:
		
		GROUP NAME, USER NAME',
	
		'csvgroupimport:label:skipfirstline' => 'Skip the first line',
	
		'csvgroupimport:import:error' => 'There was a problem importing this file.',
		'csvgroupimport:import:success' => '%d out of %d users successfully imported!',
	
		'csvgroupimport:import:warning:linelength' => 'Warning line %d: Unexpected length',
		'csvgroupimport:import:warning:missingfield' => 'Warning line %d: Missing fields',
		'csvgroupimport:import:warning:importgroupfailed' => 'Warning line %d: Could not import user %s',
	);
					
	add_translation("en",$english);
?>