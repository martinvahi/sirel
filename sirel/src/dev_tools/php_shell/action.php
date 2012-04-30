<?php
// ------------------------------------------------------------------------
// Copyright (c) 2011, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.

// Redistribution and use in source and binary forms, with or
// without modification, are permitted provided that the following
// conditions are met:

// * Redistributions of source code must retain the above copyright
// notice, this list of conditions and the following disclaimer.
// * Redistributions in binary form must reproduce the above copyright
// notice, this list of conditions and the following disclaimer
// in the documentation and/or other materials provided with the
// distribution.
// * Neither the name of the Martin Vahi nor the names of its
// contributors may be used to endorse or promote products derived
// from this software without specific prior written permission.

// THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
// CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
// INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
// MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
// DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
// CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
// SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
// BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
// SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
// INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
// WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
// NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
// OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//=========================================================================
require_once('php_shell_config.php');
$s_path_lib_sirel=php_shell_config::$s_path_lib_sirel;
if(defined('s_path_lib_sirel')!=True) {
	define('s_path_lib_sirel',$s_path_lib_sirel);
} // if
require_once($s_path_lib_sirel.'/src/sirel.php');
require_once($s_path_lib_sirel.'/src/etc/sirel_engine_configuration.php');
//=========================================================================

$s=$_POST['the_php_source'];
$s_src=mb_ereg_replace("\\\\","",$s);

$s_file_path=realpath('./').'/index.php';
$f=fopen($s_file_path,'r');
$i_file_size=filesize($s_file_path);
$s_html_template=fread($f,$i_file_size);
fclose($f);

$s_html_out=mb_ereg_replace('<!-- THE_SOURCE -->',$s_src,$s_html_template);

$s_php_requires='';
$s_php_file_existence_checks='';
$i_len=count(php_shell_config::$ar_paths_to_PHP_files_that_get_loaded_by_default);
$s='';
if(0<$i_len) {
	foreach (php_shell_config::$ar_paths_to_PHP_files_that_get_loaded_by_default as $s_path) {
		$s_php_requires=$s_php_requires."require_once('".$s_path."');\n";
		$s="if(file_exists('".$s_path."')==False) {\n".
				"throw new Exception('<br/>The default inclusion file, <br/>\"'.\n".
				"       '".$s_path."\",<br/> does not exist.<br/>' );\n".
				"   \$b_inclusion_ok=False;\n".
				"} // if\n";
		$s_php_file_existence_checks=$s_php_file_existence_checks.$s;
	} // foreach
} // if
$s_php_requires=$s_php_requires."\n";

$s_cdfragment=''.
		'$s_path_lib_sirel="'.$s_path_lib_sirel.'";'."\n".
		"if(defined('s_path_lib_sirel')!=True) {\n".
		"	define('s_path_lib_sirel',".'$s_path_lib_sirel'.");\n".
		"} // if\n";

$s_tmpfile="<?php\n".$s_cdfragment.
		"\$b_inclusion_ok=True;\n".
		"try {\n".
		$s_php_file_existence_checks.
		$s_php_requires.
		"}catch (Exception \$err_exception) {\n".
		"   \$b_inclusion_ok=False;\n".
		"	echo '<br/>Inclusion of a PHP file that is described '.\n".
		"        'in the php_shell_config.php failed. The fault:<br/>'.\n".
		"			\$err_exception->getMessage().'<br/>';\n".
		"} // catch\n".
		"if(\$b_inclusion_ok==True){\n".
		"try {\n".$s_php_requires.
		"	echo '<br/>----PHP--shell--output--start------<br/>'.\"\\n\";\n".
		$s_src.
		"	echo '<br/>----PHP--shell--output--end--------<br/>';\n".
		"}catch (Exception \$err_exception) {\n".
		"	echo '<br/>The script was faulty. The fault:<br/>'.\n".
		"			\$err_exception->getMessage().'<br/>';\n".
		"} // catch\n".
		"} // if\n".
		"?>";

$s_tmpfile_path_src=realpath('./').'/tmp/tmpfile_'.time().'_'.
		mt_rand(0,99999).'.php';
$f_tmp=fopen($s_tmpfile_path_src,'w+');
fwrite($f_tmp,$s_tmpfile);
fclose($f_tmp);

$s_result="\n".'For security reasons, the shell has been <br/>'."\n".
		'turned off. It can be turned back on by editing the <br/>'."\n".
		'php_shell_config.php and making sure that the <br/>'."\n".
		'sirelSiteConfig::$debug_PHP==True. <br/>'."\n".
		'';
if(sirelSiteConfig::$debug_PHP!=True) {
	php_shell_config::$b_activated=False;
} // if
if(php_shell_config::$b_activated==True) {
	// The PHP shell can be turned off from php_shell_config.php
	$s_result=shell_exec('php5 '.$s_tmpfile_path_src);
} // if

unlink($s_tmpfile_path_src);
$s_html_out=mb_ereg_replace('<!-- EXECUTION_RESULT -->',$s_result,$s_html_out);
echo $s_html_out;
?>
