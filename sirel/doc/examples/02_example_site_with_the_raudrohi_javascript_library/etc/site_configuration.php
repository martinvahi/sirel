<?php
//=========================================================================
// Author: martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// This file is in public domain.
//=========================================================================

$application_root=realpath('./');
$s_path_lib_sirel=realpath($application_root.'/../../../src/devel');
define('s_path_lib_sirel',$s_path_lib_sirel); 
require_once($s_path_lib_sirel.'/src/sirel.php');
sirelSiteConfig::$various['application_root']=$application_root;

sirelSiteConfig::$site_titleprefix='Sirel Example 2';

//=======================================================================
?>