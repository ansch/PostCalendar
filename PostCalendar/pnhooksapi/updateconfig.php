<?php
/**
 * @package     PostCalendar
 * @author      $Author$
 * @link        $HeadURL$
 * @version     $Id$
 * @copyright   Copyright (c) 2009, Craig Heydenburg, Sound Web Development
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * updateconfig action on hook
 *
 * @author  Craig Heydenburg
 * @return  boolean    true/false
 * @access  public
 */
function postcalendar_hooksapi_updateconfig($args)
{
	$hookinfo = FormUtil::getPassedValue('postcalendar', array(), 'POST'); // array of data from 'modifyconfig' hook
    if ((!isset($hookinfo['postcalendar_optoverride'])) || (empty($hookinfo['postcalendar_optoverride']))) {
        $hookinfo['postcalendar_optoverride'] = 0;
    }
    $thismodule = isset($args['extrainfo']['module']) ? strtolower($args['extrainfo']['module']) : strtolower(ModUtil::getName()); // default to active module
    ModUtil::setVars($thismodule, $hookinfo);
    // ModVars: postcalendar_admincatselected, postcalendar_optoverride

    $dom = ZLanguage::getModuleDomain('PostCalendar');
    LogUtil::registerStatus(__("PostCalendar: module config updated.", $dom));

    return;
}