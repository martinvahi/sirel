<?php
//=========================================================================
// Copyright (c) 2013, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.
//
// Redistribution and use in source and binary forms, with or
// without modification, are permitted provided that the following
// conditions are met:
//
// * Redistributions of source code must retain the above copyright
//   notice, this list of conditions and the following disclaimer.
// * Redistributions in binary form must reproduce the above copyright
//   notice, this list of conditions and the following disclaimer
//   in the documentation and/or other materials provided with the
//   distribution.
// * Neither the name of the Martin Vahi nor the names of its
//   contributors may be used to endorse or promote products derived
//   from this software without specific prior written permission.
//
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
//
//=========================================================================
// This file is part of the sirel_core.php and should be
// used only by using "require_once('sirel_core.php')".
//-------------------------------------------------------------------------

// As the web server might host multiple web applications that
// might have different requirements, it is not possible to
// rely on the mbstring.internal_encoding setting in the php.ini file.
// Same applies for the rest of the php.ini file settings.

mb_internal_encoding('UTF-8');

mb_regex_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_language('uni');

// http://www.php.net/manual/en/function.ini-set.php
// http://www.php.net/manual/en/ini.list.php
//----------------
$b_0=TRUE;
ini_set('zend.multibyte',$b_0);
if($b_0) {
	// http://www.php.net/manual/en/ini.core.php#ini.zend.multibyte
	// As of 2013_11 the doc. resides a few lines downwards from
	// the doc. of the zend.multibyte .
	ini_set('detect_unicode', TRUE); // to increase reliability
} // if
//----------------

$i_apc_num_files_hint=100;
ini_set('apc.num_files_hint',$i_apc_num_files_hint);
ini_set('apc.ttl', 60); // PHP files cache entry life-time in seconds
ini_set('apc.gc_ttl', 0); // cached PHP file garbage collection delay in seconds
ini_set('apc.localcache', TRUE); // process specific cache, reduces locking
ini_set('apc.localcache.size', $i_apc_num_files_hint);
ini_set('apc.stat_ctime', 120); // to increase reliability
ini_set('zend.signal_check', TRUE); // to increase reliability

// http://stackoverflow.com/questions/14397321/does-apc-lazy-loading-increase-performance
ini_set('apc.lazy_functions',$i_apc_num_files_hint*60 ); // only global functions, not methods
ini_set('apc.lazy_classes', $i_apc_num_files_hint*2); // helpful, if the "require" clause is not used efficiently

if (TRUE) {
	// http://php.net/manual/en/zlib.configuration.php
	// Flush-ing disables compression regardless of the ini_set settings.
	ini_set('zlib.output_compression', 131072);
} else {
	ob_start('mb_output_handler');
} // else

//ini_set('memory_limit', 128*1024*1024); // of the PHP process, bytes

//-------------------------------
// Set in the sirel_core_configuration.php
// $i_file_max_size_in_bytes=100*1024*1024;
// ini_set('upload_max_filesize',$i_file_max_size_in_bytes);
//-------------------------------

class sirelCore_engine_configuration {
	//public static $s_a_nice_constant='a value';
} // class sirelCore_engine_configuration
