<?php
function xmldb_local_minhabiblioteca_uninstall()
{
    global $CFG, $DB;
    require_once($CFG->dirroot."/user/profile/definelib.php");
    $id = $DB->get_field('user_info_field', 'id', array('shortname' => "minhabiblioteca"));
    profile_delete_field($id);
    return true;
}