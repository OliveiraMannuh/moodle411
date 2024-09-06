<?php

defined('MOODLE_INTERNAL') || die();

function local_minhabiblioteca_extend_navigation(navigation_node $navigation)
{
    if (!\local_minhabiblioteca\MinhaBiblioteca::user_is_blocked()) {
        $navigation->add(
            "Minha Biblioteca",
            new moodle_url('/local/minhabiblioteca/CreateOrAuthenticate.php'),
            global_navigation::TYPE_CUSTOM,
            null,
            'minhabiblioteca',
            new pix_icon('icon', 'books', 'local_minhabiblioteca')
        )->showinflatnavigation = true;
    }
}

function local_minhabiblioteca_before_footer()
{
    if (!\local_minhabiblioteca\MinhaBiblioteca::user_is_blocked()) {
        global $PAGE;
        $PAGE->requires->js_init_code("document.querySelector('li[data-key=\"minhabiblioteca\"] a')?.setAttribute('target','_blank');");
    }
}

function local_minhabiblioteca_extend_settings_navigation($settingsnav, $context) {
    global $CFG, $PAGE;

    // Only add this settings item on non-site course pages.
    if (!$PAGE->course or $PAGE->course->id == 1) {
        return;
    }

    // Only let users with the appropriate capability see this settings item.
    if (!has_capability('moodle/backup:backupcourse', context_course::instance($PAGE->course->id))) {
        return;
    }

    if ($settingnode = $settingsnav->find('courseadmin', navigation_node::TYPE_COURSE)) {
        $strfoo = get_string('foo', 'local_minhabiblioteca');
        $url = new moodle_url('/local/minhabiblioteca/foo.php', array('id' => $PAGE->course->id));
        $foonode = navigation_node::create(
            $strfoo,
            $url,
            navigation_node::NODETYPE_LEAF,
            'minhabiblioteca',
            'minhabiblioteca',
            new pix_icon('t/addcontact', $strfoo)
        );
        if ($PAGE->url->compare($url, URL_MATCH_BASE)) {
            $foonode->make_active();
        }
        $settingnode->add_node($foonode);
    }
}