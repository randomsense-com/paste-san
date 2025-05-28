<?php
/*
Plugin Name: Paste-san
Plugin URI: https://oss.randomsense.jp/paste-san/
Description: Added "Add HTML" button to the visual editor. Shortcut is the 「Ctrl+Shift+K（Cmd+Shift+K）」.
Author: RandomSense(Original: NAE)
Version: 1.1
Author URI: https://oss.randomsense.jp/
License: GPL2
Requires at least: 4.9
Requires PHP: 7.0
*/

/*  Copyright 2017 NAE (email : @__NAE__), 2025 RandomSense (email : oss@randomsense.jp)

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

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('PasteRawHtml')) :
    class PasteRawHtml
    {
        public function __construct()
        {
            add_filter('mce_buttons_2', array($this, 'register_button'));
            add_filter('mce_external_plugins', array($this, 'register_plugin'));
        }

        public function register_button($buttons)
        {
            array_push($buttons, 'paste_raw_html');
            return $buttons;
        }

        public function register_plugin($plugin_array)
        {
            $plugin_array['paste_raw_html'] = esc_url(plugins_url('/paste-san-button.js', __FILE__));
            return $plugin_array;
        }
    }
endif;

$nae_prh = new PasteRawHtml();