<?php

function xmldb_local_minhabiblioteca_install()
{
    global $CFG;

    require_once($CFG->dirroot."/user/profile/lib.php");
    require_once($CFG->dirroot."/user/profile/definelib.php");

    $data = new stdClass();
    $data->id = 0;
    $data->action = "editfield";
    $data->datatype = "checkbox";
    $data->shortname = "minhabiblioteca";
    $data->name = "MinhaBiblioteca";
    $data->description = "";
    $data->required = 0;
    $data->locked = 1;
    $data->forceunique = 0;
    $data->signup = 1;
    $data->visible = 1;
    $data->categoryid = 1;
    $data->defaultdata = 0;
    $data->descriptionformat = 1;
    
    (new profile_define_base())->define_save($data);

    return true;
}
