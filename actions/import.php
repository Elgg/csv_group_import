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

	admin_gatekeeper();
	action_gatekeeper();
	
	global $CONFIG;
	
	
	// Get flag
	$flag = get_input('skipfirst');
	
	// File
	$file = "";
	
	if (isset($_FILES['csvgroupimport']) && $_FILES['csvgroupimport']['error'] == 0) {
			$file = $_FILES['csvgroupimport']['tmp_name'];
	}
	
	if ($file)
	{	
	
		$f = fopen($file, 'r');
		if ($f)
		{
			// Stats
			$total = 0;
			$imported = 0;	
			$line = 0;
			
			// If we skip first, then skip first
			if ($flag) {
				$line++;
				fgetcsv($f);
			}
				
			// Now read and parse the rest
			while ($line = fgetcsv($f))
			{
				$total++;
				$line++;
				
				$numfields = count($line);
				$group = $line[0];
				$user = $line[1];
				
				// Sanitise		
				if ($numfields != 2)
					register_error(sprintf(elgg_echo('csvgroupimport:import:warning:linelength'), $line));
				else {
					
					if ((!$group) || (!$user) )
						register_error(sprintf(elgg_echo('csvgroupimport:import:warning:missingfield'), $line));
					else
					{ 
						$g = search_for_group($group, $limit = 1);
						$g = $g[0];
						$u = get_user_by_username($user);
						
						if (
							($u) && ($g) && ($g instanceof ElggGroup)
						) {
							$g->join($u);
							
							$imported ++;
							
						}
						else
							register_error(sprintf(elgg_echo('csvgroupimport:import:warning:importgroupfailed'), $line, $user));
						
					}
				}
				
			}
			
			fclose($f);
			
			system_message(sprintf(elgg_echo('csvgroupimport:import:success'), $imported, $total));
		}
		else
			register_error(elgg_echo('csvgroupimport:import:error'));
	}
	else
		register_error(elgg_echo('csvgroupimport:import:error'));
	
	
	forward($_SERVER['HTTP_REFERER']);
?>