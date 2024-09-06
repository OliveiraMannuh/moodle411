<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Config metadata for the theme_vmoo.
 *
 * @package   theme_vmoo
 * @copyright 2024, Manuela Oliveira <oliveira.mannuh@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects tge file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// $THEME is defined before this page is included and we can define settings by adding by properties to this global object.

// The first setting we need is the name of the theme. This should bet the last part of the component name, and the same 
// as the directory name for our theme.
$THEME->name = 'vmoo';

// This setting list the style sheets we want to include in our theme. Because we want to use SCSS instead of CSS - we won't 
// list any style sheets. If we did we would list the name of a file in the /style/ folder for our theme without any css file
// extensions.
$THEME->sheets = [];

// This is a setting that can be used to provide some styling to the content in the TinyMCE text editor. This is no longer the
// default text editor and "Atto" does not need this setting so we won't provide anything. If we did ir would work them same
//as the previous setting - listing a file in the /style/ folder. 
$THEME->editor_sheets = [];

// This is a critical setting. We want to inherit from theme_boost because it provides a great starting point for SCSS bootstrap4
// themes. We could add more than one parent here to inherit from multiple parents, and if we did they would be processed in
// order of importance (later themes overriding earlier ones). Things we will inherit from the parent theme include
// styles and mustache templates and some (not all) settings.
$THEME->parents = ['moove'];

$THEME->usefallback = true;
$THEME->scss = function($theme) {
    return theme_vmoo_get_main_scss_content($theme);
};
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_vmoo_process_css';
