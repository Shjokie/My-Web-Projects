<?php
 /**
 * Plugin Name: Rescue Shortcodes
 * Plugin URI:  https://rescuethemes.com/plugins/rescue-shortcodes-plugin/
 * Description: A lightweight shortcodes plugin.
 * Version:     1.6
 * Author:      Rescue Themes
 * Author URI:  https://rescuethemes.com
 * Text Domain: rescue-shortcodes
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

 /*  Copyright 2015  Rescue Themes  ( email : hello@rescuethemes.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*----------------------------------------------------*/
/*  Exit if accessed directly
/*----------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) exit;

/*----------------------------------------------------*/
/* JS and CSS
/*----------------------------------------------------*/
require_once( dirname(__FILE__) . '/includes/scripts.php' );

/*----------------------------------------------------*/
/*  Shortcode functions
/*----------------------------------------------------*/
require_once( dirname(__FILE__) . '/includes/shortcode-functions.php');

/*----------------------------------------------------*/
/*  Add button to WP editor
/*----------------------------------------------------*/
require_once( dirname(__FILE__) . '/includes/mce/rescue_shortcodes_tinymce.php');
