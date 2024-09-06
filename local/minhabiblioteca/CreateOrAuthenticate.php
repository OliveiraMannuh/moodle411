<?php
require_once("../../config.php");
$mb = (new \local_minhabiblioteca\MinhaBiblioteca())->createOrAuthenticate();
header("location:{$mb}");
