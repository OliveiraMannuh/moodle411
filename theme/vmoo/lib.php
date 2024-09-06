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
 * Lib metadata for the theme_vmoo.
 *
 * @package   theme_vmoo
 * @copyright 2024, Manuela Oliveira <oliveira.mannuh@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects tge file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// We will add callbacks here as we add features to our theme. 
function theme_vmoo_get_main_scss_content($theme) {
    $scss = file_get_contents($theme->dir . '/scss/pre.scss');
    $scss .= file_get_contents($theme->dir . '/scss/moove.scss');
    return $scss;
}

function theme_vmoo_process_css($css, $theme) {
    // Aqui você pode adicionar qualquer processamento adicional de CSS se necessário.
    return $css;
}
