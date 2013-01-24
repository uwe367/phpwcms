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

define('PHPWCMS_JSLIB', 'mootools-1.1');

/**
 * Init Mootools 1.1.x Library
 */
function initJSLib() {
	if(empty($GLOBALS['block']['custom_htmlhead']['mootools.js'])) {
		if(!USE_GOOGLE_AJAX_LIB) {
			$GLOBALS['block']['custom_htmlhead']['mootools.js'] = getJavaScriptSourceLink(TEMPLATE_PATH.'lib/mootools/mootools-1.1-yc.js');
		} else {
			$GLOBALS['block']['custom_htmlhead']['mootools.js'] = getJavaScriptSourceLink(USE_GOOGLE_AJAX_LIB.'mootools/1.1/mootools-yui-compressed.js');
		}
	}
	return TRUE;
}

/**
 * Initialize Slimbox CSS and JavaScript for MooTools 1.1
 */
function initSlimbox() {
	initJSLib();
	$GLOBALS['block']['custom_htmlhead']['lightbox.css'] = '  <link href="'.TEMPLATE_PATH.'lib/slimbox/slimbox.css" rel="stylesheet" type="text/css" media="screen" />';
	$GLOBALS['block']['custom_htmlhead']['slimbox.js'] = getJavaScriptSourceLink(TEMPLATE_PATH.'lib/slimbox/slimbox.mootools-1.1.js');
}

/**
 * Initialize Frontend Edit DomReady JavaScript
 */
function init_frontend_edit_js() {
	
	initJSLib();
	$GLOBALS['block']['js_ondomready'][] = '		var felink_status = 0;
		$$("a.fe-link").each(function(r) { r.setStyle("display", "none"); });
		$("fe-link").addEvent("click", function() {
			if(felink_status == 1) {
				$$("a.fe-link").each(function(r) { r.setStyle("display", "none"); });
				$("fe-link").removeClass("enabled"); $("fe-link").addClass("disabled");	felink_status = 0;
			} else {
				$$("a.fe-link").each(function(r) { r.setStyle("display", ""); });
				$("fe-link").removeClass("disabled"); $("fe-link").addClass("enabled");	felink_status = 1;
			}
		});';
	
}

/**
 * Create JavaScript Domready Section
 */
function jsOnDomReady($js='', $return=false, $prefix='  ') {
	
	if($js) {
		
		initJSLib();
		
		$_js  = $prefix . '<script type="text/javascript">'.LF.SCRIPT_CDATA_START.LF;
		$_js .= '	window.addEvent("domready", function() {' . LF . $js . LF . '	});';
		$_js .= LF.SCRIPT_CDATA_END.LF.$prefix.'</script>';
		
		if($return) {
			return $_js;
		}
		
		$GLOBALS['block']['custom_htmlhead'][] = $_js;
	}
}

/**
 * Create JavaScript UnLoad Section
 */
function jsOnUnLoad($js='', $return=false, $prefix='  ') {
	
	if($js) {
		
		initJSLib();
		
		$_js  = $prefix . '<script type="text/javascript">'.LF.SCRIPT_CDATA_START.LF;
		$_js .= '	window.addEvent("unload", function() {' . LF . $js . LF . '	});';
		$_js .= LF.SCRIPT_CDATA_END.LF.$prefix.'</script>';
		
		if($return) {
			return $_js;
		}
		
		$GLOBALS['block']['custom_htmlhead'][] = $_js;
	}
}

/**
 * Simple MooTools Plugin Loader
 */
function initJSPlugin($plugin='') {
	$plugin = 'mootools.'.$plugin.'.js';
	if(empty($GLOBALS['block']['custom_htmlhead'][$plugin])) {
		initJSLib();
		$GLOBALS['block']['custom_htmlhead'][$plugin] = getJavaScriptSourceLink(TEMPLATE_PATH.'lib/mootools/plugin-1.1/'.$plugin);
	}
	return TRUE;
}

?>