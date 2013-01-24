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



// Content Type 89: Poll		jens
$content["poll_list"]		= unserialize($row["acontent_image"]);
$content["poll_form"]		= unserialize($row["acontent_form"]);
$content["poll_text"]		= unserialize($row["acontent_text"]);

?>