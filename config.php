<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'root';
$CFG->dbpass    = '';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'http://localhost/moodle';
$CFG->dataroot  = '/opt/lampp/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

/*Configurações adicionais*/

$CFG->debug = E_ALL;
$CFG->debugdisplay = 1;
$CFG->langstringcache = 0;
$CFG->cachetemplates = 0;
$CFG->cachejs = 0;
$CFG->perfdebug = 15;
$CFG->debugpageinfo = 1;

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
