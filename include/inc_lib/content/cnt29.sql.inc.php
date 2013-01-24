<?php
/**
 * phpwcms content management system
 *
 * @author Oliver Georgi <oliver@phpwcms.de>
 * @copyright Copyright (c) 2002-2013, Oliver Georgi
 * @license http://opensource.org/licenses/GPL-2.0 GNU GPL-2
 * @link http://www.phpwcms.de
 *
 **/


// ----------------------------------------------------------------
// obligate check for phpwcms constants
if (!defined('PHPWCMS_ROOT')) {
   die("You Cannot Access This Script Directly, Have a Nice Day.");
}
// ----------------------------------------------------------------



// Content Type Images
$SQL .= "acontent_text	='".aporeplace($content["text"])."', ";
$SQL .= "acontent_template	='".aporeplace($content["image_template"])."', ";
$SQL .= "acontent_form	='".aporeplace(serialize($content['image_list']))."' ";

?>