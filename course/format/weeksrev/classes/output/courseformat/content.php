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
 * Output content for the format_pluginname plugin.
 *
 * @package   format_weeksrev
 * @copyright Year, You Name <your@email.address>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace format_weeksrev\output\courseformat;

use core_courseformat\output\local\content as content_base;

class content extends content_base {

   

    /**
     * Returns the output class template path.
     *
     * This method redirects the default template when the course content is rendered.
     */
       /**
     * Export sections array data.
     *
     * @param renderer_base $output typically, the renderer that's calling this function
     * @return array data context for a mustache template
     */
    protected function export_sections(\renderer_base $output): array {

        $sections = parent::export_sections($output);
        
        $sections_reversed = array_reverse($sections, true);
        $sections_reversed = [array_pop($sections_reversed)] + $sections_reversed; // Move section 0 back to top.

        return $sections_reversed;
    }
}