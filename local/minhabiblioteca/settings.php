<?php

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    $settings = new admin_settingpage( 'local_minhabiblioteca', 'Configuração MinhaBiblioteca');

    $ADMIN->add( 'localplugins', $settings );

    $settings->add(new admin_setting_configpasswordunmask(
        'local_minhabiblioteca/apikey', 
        'X-DigitalLibraryIntegration-API-Key',
        'API de Acesso ao MinhaBiblioteca',
        '4f97ed7f-41a7-4063-be3b-cae97101a1e0',
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configtext(
        'local_minhabiblioteca/bloquear_acesso', 
        'Bloquear Acesso', 
        'Prefixo da identificação dos usúarios que terão o acesso restringido.', 
        'POS|P|E|M', 
        PARAM_TEXT
    ));
}