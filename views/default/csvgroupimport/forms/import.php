<?php
	/**
	 * Elgg csv import
	 * 
	 * @package ElggCSVImport
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2010
	 * @link http://elgg.com/
	 */
	
	global $CONFIG;
	
	echo "<div class=\"contentWrapper\">";
	echo elgg_view('output/longtext', array('value' => elgg_echo('csvgroupimport:description')));
	
	$file = elgg_view('input/file', array('internalname' => 'csvgroupimport'));
	$checkbox = elgg_view('input/checkboxes', array('internalname' => 'skipfirst', 'options' => array(
		elgg_echo('csvgroupimport:label:skipfirstline') => 'skipfirst'
	)));
	$button = elgg_view('input/submit', array('value' => elgg_echo('import')));
	
	$form_body = <<< END
		
			$file $checkbox
			$button
END;
	echo elgg_view('input/form', array('enctype' => 'multipart/form-data', 'body' => $form_body, 'action' => $CONFIG->url . "action/csvgroupimport/import"));
	echo "</div>";
?>