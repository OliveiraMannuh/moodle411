<?php

namespace format_weeksrev\output\courseformat\state;

use core_courseformat\output\local\state\course as course_base;
use stdClass;
 
class course extends course_base {
    /**
     * Export this data so it can be used as state object in the course editor.
     *
     * @param renderer_base $output typically, the renderer that's calling this function
     * @return stdClass data context for a mustache template
     */
    public function export_for_template(\renderer_base $output): stdClass {

        $data = parent::export_for_template($output);
        $firstElement = array_shift($data->sectionlist);
        $reversedArray = array_reverse($data->sectionlist);
        array_unshift($reversedArray, $firstElement);
        $data->sectionlist = $reversedArray;
        
        return $data;
    }
}