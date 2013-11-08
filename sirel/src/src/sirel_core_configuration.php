<?php
//=========================================================================
// Copyright martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
//
// This file is under the
// http://www.opensource.org/licenses/BSD-3-Clause
// license.
//=========================================================================
// Those are just the "simplest", "most commonly edited", settings
// that client code should override.
//
// The rest of the Sirel PHP Library settings
// are determined at sirel_core_base.php and
// sirel_core_initialisation_part_1.php
//
// In addition to the overwriting/setting of the
// values that are listed in this file, client code
// should check, whether the
//
//     sirelSiteConfig::s_get_sirel_version()
//
// returns the version that the client code
// was designed for. Backwards compatibility of sirel versions
// is not and will not be maintained.
//-------------------------------------------------------------------------

//sirelSiteConfig::$debug_PHP=TRUE;
sirelSiteConfig::$debug_PHP=FALSE;
//sirelSiteConfig::$debug_JavaScript=TRUE;
sirelSiteConfig::$debug_JavaScript=FALSE;

//sirelSiteConfig::$b_use_content_delivery_networks_for_JavaScript_dependency_libs=TRUE;
sirelSiteConfig::$b_use_content_delivery_networks_for_JavaScript_dependency_libs=FALSE;

sirelSiteConfig::$site_titleprefix='';
sirelSiteConfig::$site_URL=NULL;


sirelSiteConfig::$s_root_username='444';
sirelSiteConfig::$s_root_configfile_password='424243';
sirelSiteConfig::$b_root_configfile_password_overrides_root_password_in_database=TRUE;

$i_file_max_size_in_bytes=100*1024*1024;
ini_set('upload_max_filesize',$i_file_max_size_in_bytes);

//=========================================================================
