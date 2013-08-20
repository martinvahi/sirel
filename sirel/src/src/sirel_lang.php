<?php
//-------------------------------------------------------------------------
// Copyright (c) 2009, martin.vahi@softf1.com that has an
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
//-------------------------------------------------------------------------

require_once('sirel_core.php');
require_once('sirel_text_concatenation.php');

//-------------------------------------------------------------------------
// The class sirelLang is in a role of a namespace.
// (The PHP built in namespace support s__ks.)
//
// The sirelLang is a semirandom collection of functions that
// just seem to be missing from the PHP-5 standard Libraries or their
// standard version is too unconfortable to use.
class sirelLang {

//-------------------------------------------------------------------------

	// Returns a string that represents a type name.
	public static function type_2_s(&$var) {
		if(is_array($var)) {
			return 'sirelTD_is_array';
		} // if
		if(is_int($var)) {
			return 'sirelTD_is_int';
		} // if
		if(is_float($var)) {
			return 'sirelTD_is_float';
		} // if
		if(is_bool($var)) {
			return 'sirelTD_is_bool';
		} // if
		if(is_null($var)) {
			return 'sirelTD_is_null';
		} // if
		if(is_resource($var)) {
			return 'sirelTD_is_resource';
		} // if
		if(is_string($var)) {
			// If we're here, we've virtually implemented the is_mbstring(...)
			// or we have stumbled across a function, because there's no
			// such thing as a function instance in PHP userland and
			// the functions are looked up in a scope specific manner by
			// interpreting the string as a relative function search path.
			// http://php.net/manual/en/functions.variable-functions.php
			return 'sirelTD_is_mbstring';
		} // if
		if(is_numeric($var)) {
			// One should actually never reach this place, but reaching
			// this place is not that much of a fault, it's a kind of
			// "grey area", hence the logging in stead of an exception.
			sirelLogger::log(__FILE__,__LINE__,
				'is_numeric reaced. Value==|||'.$var);
			return 'sirelTD_is_numeric';
		} // if
		// The get_class has to be after the check
		// for strings, because otherwise a PHP
		// warning is displaied.
		$x=get_class($var);
		if($x!=NULL) {
			return 'sirelTD_is_class_'.$x;
		} // if
		sirelThrowLogicException(__FILE__, __LINE__,__CLASS__.'->'.
			__FUNCTION__.': Could not detect type for |||'.$var);
	}// type_2_s

//-------------------------------------------------------------------------

	// Throws a logic exception, if sirelLang::type_2_s($var)!=
	// $expected_type. Call example:
	// sirelLang::assert_type(__FILE__,__LINE__,__CLASS__,__FUNCTION__,
	//         'sirelTD_is_mbstring',$my_array_candidate);
	public static function assert_type($file,$line,$a_class,
		$a_function,$s_commaseparated_list_of_expected_types,
		&$var,$s_error_message_complement='') {
		$ar_allowed_types=sirelLang::commaseparated_list_2_array($s_commaseparated_list_of_expected_types);
		$b_thorw=True;
		$s_type=sirelLang::type_2_s($var);
		$i_len=count($ar_allowed_types);
		$s_allowed_type=NULL;
		for($i=0;$i<$i_len;$i++) {
			$s_allowed_type=$ar_allowed_types[$i];
			if(sirelLang::str1EqualsStr2($s_type, $s_allowed_type)) {
				$b_thorw=False;
			} // if
		} // for
		if($b_thorw) {
			sirelThrowLogicException($file, $line,
				$a_class.'->'.$a_function.': Type mismatch. '.
				'The list of allowed types in the '.
				'sirelLang::type_2_s output format is '.
				$s_commaseparated_list_of_expected_types.
				', but the variable had a type of '.$s_type.'. '.
				'The variable had a value of '.$var.'. '.
				$s_error_message_complement.
				"\n GUID='2857c919-0bba-4829-93d2-b12021318dd7'");
		} // if
	} // assert_type

//-------------------------------------------------------------------------

	public static function assert_type_is_a_numeric($file,$line,$a_class,
		$a_function,$var,$error_message_complement='') {
		$x=sirelLang::type_2_s($var);
		if($x!='sirelTD_is_int') {
			if($x!='sirelTD_is_float') {
				sirelThrowLogicException($file, $line,
					$a_class.'->'.$a_function.': Type mismatch. The required '.
					'sirelLang::type_2_s(...) output is '.
					'\'sirelTD_is_int\' or \'sirelTD_is_float\', '.
					'but the actual sirelLang::type_2_s(...) output is '.$x.'. '.
					'The variable had a value of '.$var.'. '.
					$error_message_complement.
					"\n GUID='c1009b19-bcd7-4c04-93d2-b12021318dd7'");
			} // if
		} // if
	} // assert_type_is_a_numeric

//-------------------------------------------------------------------------

	public static function assert_file_exists($file,$line,$a_class,
		$a_function,$var,$error_message_complement='') {
		sirelLang::assert_is_string_nonempty_after_trimming($file,
			$line, $a_class, $a_function,
			'sirelTD_is_mbstring',$var,$error_message_complement);
		if(file_exists($var)!=TRUE) {
			sirelThrowLogicException($file, $line,
				$a_class.'->'.$a_function.': The file, '.
				"\n\"".$var."\"\n".
				'does not exist. '."\n".
				$error_message_complement.
				"\n GUID='847840dd-f221-4084-89d2-b12021318dd7'");
		} // if
	} // assert_file_exists

//-------------------------------------------------------------------------

	// This function has been 99% written by a person, who
	// call him/her self Moriyoshi.
	// http://osdir.com/ml/php.internationalization/2003-05/msg00004.html
	public static function mb_trim(&$str, $spc='\t\s') {
		// Input verification omitted for speed.
		// TODO: test with \n and \r added to the space definition.
		try {
			return mb_ereg_replace("[$spc]*$", '',
				mb_ereg_replace("^[$spc]*", '', $str));
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='77d45d3e-4c0c-4e52-94d2-b12021318dd7'");
		} // catch
	} // mb_trim

//-------------------------------------------------------------------------

	// Returns a string. Applies the mb_ereg_replace till the
	// string does not change any more or the maximum allowed
	// number of replacement iterations is reached.
	public static function mb_ereg_replace_till_no_change(&$s_regex,
		&$s_substitution,&$s_haystack,
		$i_max_number_of_iterations) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				// Due to dependencies the use of the
				// sirelLang::assert_type here introduces an infinite recursion.
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_regex,
					"\n GUID='f7918034-e37f-40f0-a1d2-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_substitution,
					"\n GUID='8f356caa-fb88-4f1f-99d2-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_haystack,
					"\n GUID='24c3f12e-ee9a-4b74-b2c2-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_int',
					$i_max_number_of_iterations,
					"\n GUID='104ac6c1-62bb-4b51-b3c2-b12021318dd7'");
				if($i_max_number_of_iterations<1) {
					sirelBubble_t2($err_exception,
						' $i_max_number_of_iterations == '.
						$i_max_number_of_iterations.' < 1'.
						"\n GUID='6a266022-e232-4467-94c2-b12021318dd7'");
				} // if
			} // if
			$s_1=$s_haystack;
			$s_2=NULL;
			$i_n=0;
			$b_go_on=True;
			if(sirelSiteConfig::$debug_PHP) {
				while($b_go_on) {
					$s_2=mb_ereg_replace($s_regex, $s_substitution, $s_1);
					if(sirelLang::str1EqualsStr2($s_1, $s_2)) {
						$b_go_on=False;
					} else {
						$s_1=$s_2; // Using a reference here introduces a flaw.
					} // else
					$i_n++;
					if($i_max_number_of_iterations<=$i_n) {
						$b_go_on=False;
						sirelThrowLogicException(__FILE__, __LINE__,
							__CLASS__.'->'.__FUNCTION__.
							': $i_max_number_of_iterations=='.
							$i_max_number_of_iterations.
							' number of iterations have been performed,'.
							'but that means that either the '.
							'regular expression allows infinite number '.
							'substitution iterations or the value of the '.
							'$i_max_number_of_iterations has been set '.
							'too low.');
					} // if
				} // while
			} else {
				while($b_go_on) {
					$s_2=mb_ereg_replace($s_regex, $s_substitution, $s_1);
					if(sirelLang::str1EqualsStr2($s_1, $s_2)) {
						$b_go_on=False;
					} else {
						$s_1=$s_2; // Using a reference here introduces a flaw.
					} // else
					$i_n++;
					if($i_max_number_of_iterations<=$i_n) {
						$b_go_on=False;
					} // if
				} // while
			} // else
			return $s_2;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4f67cc3c-eb52-4fd4-b1c2-b12021318dd7'");
		} // catch
	} // mb_ereg_replace_till_no_change

//-------------------------------------------------------------------------

	// Example of (44.5,55]:
	// sirelLang::assert_range(44.5,'<',$x,'<=',55,'$x');
	//
	// An example of (-infinity,5]:
	// sirelLang::assert_range(42,'*',$x,'<=',5,'$x');
	//
	// An example of [24,infinity):
	// sirelLang::assert_range(24,'<=',$x,'*',42,'$x');
	public static function assert_range($i_or_fd_low,$s_mark1,$x,
		$s_mark2,$i_or_fd_high,$s_x_name,
		$s_error_message_complement='') {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_mark1,
				"\n GUID='464cdbb5-fdb5-47f0-b3c2-b12021318dd7'");
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_mark2,
				"\n GUID='29514dc8-029a-4466-b4c2-b12021318dd7'");
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring', $s_x_name,
				"\n GUID='b364225f-b87d-41f3-83c2-b12021318dd7'");
			sirelLang::assert_type_is_a_numeric(__FILE__, __LINE__, __CLASS__,
				__FUNCTION__,$i_or_fd_low);
			sirelLang::assert_type_is_a_numeric(__FILE__, __LINE__, __CLASS__,
				__FUNCTION__,$i_or_fd_high);
			$b_i_low_is_in_use=False;
			$b_i_high_is_in_use=False;
			if($s_mark1!='*') {
				$b_i_low_is_in_use=True;
				if($s_mark1!='<') {
					if($s_mark1!='<=') {
						throw new Exception('$s_mark1==\''.$s_mark1.
							'\', but it is allowed to be only '.
							'\'<\' or \'<=\' or \'*\'.'.
							"\n GUID='2286bec2-4b25-4a2b-95b2-b12021318dd7'");
					} // if
				} // if
			} // if
			if($s_mark2!='*') {
				$b_i_high_is_in_use=True;
				if($s_mark2!='<') {
					if($s_mark2!='<=') {
						throw new Exception('$s_mark2==\''.$s_mark2.
							'\', but it is allowed to be only '.
							'\'<\' or \'<=\' or \'*\'.'.
							"\n GUID='4e43cf32-a12a-4922-b5b2-b12021318dd7'");
					} // if
				} // if
			} // if
			if($b_i_low_is_in_use&&$b_i_high_is_in_use) {
				if($i_or_fd_high<$i_or_fd_low) {
					throw new Exception('$i_or_fd_high=='.$i_or_fd_high.
						' < $i_or_fd_low=='.$i_or_fd_low.
						"\n GUID='266c1441-8112-4f2f-93b2-b12021318dd7'");
				} // if
			} // if
		} // if debug
		$s_err_msg=NULL;
		if (mb_strlen($s_error_message_complement)==0) {
			$s_err_msg=$s_error_message_complement;
		} else {
			$s_err_msg="\n".$s_error_message_complement;
		} // else
		if($s_mark1!='*') {
			if($s_mark1=='<') { // $i_or_fd_low < $x
				if($x<=$i_or_fd_low) {
					throw new Exception($s_x_name.'=='.$x.
						' <= $i_or_fd_low=='.$i_or_fd_low.
						$s_err_msg);
				} // if
			} else { // $i_or_fd_low <= $x
				if($x<$i_or_fd_low) {
					throw new Exception($s_x_name.'=='.$x.
						' < $i_or_fd_low=='.$i_or_fd_low.
						$s_err_msg);
				} // if
			} // else
		} // if
		if($s_mark2!='*') {
			if($s_mark2=='<') { // $x < $i_or_fd_high
				if($i_or_fd_high<=$x) {
					throw new Exception('$i_or_fd_high=='.$i_or_fd_high.
						' <= $x=='.$x.
						$s_err_msg);
				} // if
			} else { // $x <= $i_or_fd_high
				if($i_or_fd_high<$x) {
					throw new Exception('$i_or_fd_high=='.$i_or_fd_high.
						' < $x=='.$x.
						$s_err_msg);
				} // if
			} // else
		} // if
	} // assert_range

//-------------------------------------------------------------------------

	// It does not return anything, but it does alter the string
	// typed fields of the $a_hashtable
	public static function trim_all_string_fields(&$a_PHP_array_as_a_hashtable) {
		try {
			$x=array();
			$ar_keys=array_keys($a_PHP_array_as_a_hashtable);
			foreach($ar_keys as $a_key) {
				$elem=$a_PHP_array_as_a_hashtable[$a_key];
				$elem_type=sirelLang::type_2_s($elem);
				if($elem_type=='sirelTD_is_mbstring') {
					$s_n=sirelLang::mb_trim($elem);
					$a_PHP_array_as_a_hashtable[$a_key]=$s_n;
				} // if
			} // foreach
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='434aada4-aeba-4fb3-b6b2-b12021318dd7'");
		} // catch
	} // trim_all_string_fields

	// It duplicates the  mb_substr_count but with a difference
	// that it accepts also empty strings. So, unlike the
	// mb_substr_count, the  mb_count acts as a complete function.
	//
//	public static function mb_count($needle, &$haystack){
//		// Input verification omitted for speed.
//		try {
//			return mb_ereg_replace("[$spc]*$", '',
//					mb_ereg_replace("^[$spc]*", '', $str));
//		} catch (Exception $err_exception) {
//                  sirelBubble_t2($err_exception,
//                      " GUID='5518f9a3-37eb-432d-8ab2-b12021318dd7'");
//		} // catch
//	} // mb_count

//-------------------------------------------------------------------------

	// Returns a trimmed version of the string. Call example:
	// sirelLang::assert_is_string_nonempty_after_trimming(__FILE__,
	//         __LINE__,__CLASS__,__FUNCTION__,$variable_to_verify);
	public static function assert_is_string_nonempty_after_trimming($file,
		$line,$a_class, $a_function,$var,$error_message_complement='') {
		sirelLang::assert_type_CSL_free($file, $line, $a_class, $a_function,
			'sirelTD_is_mbstring', $var, $error_message_complement);
		$s=sirelLang::mb_trim($var);
		if($s=='') {
			sirelThrowLogicException($file, $line,
				$a_class.'->'.$a_function.
				': String consisted of only spaces or tabs.'.
				"\n GUID='51f3fa34-eab2-4027-b8b2-b12021318dd7'");
		} // if
		return $s;
	} // assert_is_string_nonempty_after_trimming(...)

//-------------------------------------------------------------------------

	public static function assert_sirel_Memcached_is_in_use($file,$line,
		$class,$function) {
		if(sirelSiteConfig::$memcached_in_use!=True) { // Might be also NULL.
			sirelThrowLogicException($file, $line,$class.'->'.
				$function.': sirelSiteConfig::$memcached_in_use!=True'.
				"\n GUID='d88d8c28-f267-4b8d-a2b2-b12021318dd7'");
		} // if
	} // assert_sirel_Memcached_is_in_use(...)

//-------------------------------------------------------------------------

	public static function assert_string_does_not_contain_substrings($file,$line,
		$class,$function,$a_string,$a_commaseparated_list_of_forbidden_strings) {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring',$a_string,
				"\n GUID='a6cb4e4a-b05a-4d4d-a2a2-b12021318dd7'");
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring',
				$a_commaseparated_list_of_forbidden_strings,
				"\n GUID='59530450-da77-48ab-83a2-b12021318dd7'");
		} // if
		$ar_forbidden_strings=sirelLang::commaseparated_list_2_array($a_commaseparated_list_of_forbidden_strings);
		mb_ereg_search_init($a_string);
		foreach($ar_forbidden_strings as $s_forbidden) {
			if(mb_ereg_search($s_forbidden)) {
				sirelThrowLogicException($file, $line,$class.'->'.$function.
					': string "'.$a_string.
					'" contained substring "'.
					$s_forbidden.'"'.
					"\n GUID='be689631-b4e6-47e7-94a2-b12021318dd7'");
			} // if
		} // foreach
	} // assert_string_does_not_contain_substrings

//-------------------------------------------------------------------------

	// A debugging function that converts an ordinary UTF-8 string
	// to a html-suitable form. It returns a string.
	public static function htmlize($a_string) {
		$answer='';
		try {
			sirelLang::assert_type_CSL_free(__FILE__,__LINE__,
				__CLASS__,__FUNCTION__,
				'sirelTD_is_mbstring',$a_string,
				"\n GUID='307dec94-c328-4533-a9a2-b12021318dd7'");
			$answer=htmlentities($a_string, ENT_QUOTES,'UTF-8');
			$answer=str_replace("\n",'<br/>',$answer);
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='27d8b322-4bb4-4808-81a2-b12021318dd7'");
		} // catch
		return $answer;
	} // htmlize


//-------------------------------------------------------------------------

	// It's the same as the assert_type, except that it's without
	// the support for the comma separated list of expected types, i.e.
	// accepts only one expected type, and it's meant to be used
	// only within the sirelLang.
	private static function assert_type_CSL_free($file,$line,$a_class,
		$a_function,$expected_type,$var,$error_message_complement='') {
		$x=sirelLang::type_2_s($var);
		if($x!=$expected_type) {
			sirelThrowLogicException($file, $line,
				$a_class.'->'.$a_function.': Type mismatch. The required '.
				'sirelLang::type_2_s(...) output ||| is '.$expected_type.
				' but the actual sirelLang::type_2_s(...) output is '.$x.'. '.
				'The variable had a value of '.$var.'. '.
				$error_message_complement.
				"\n GUID='89839b29-1fab-4eeb-84a2-b12021318dd7'");
		} // if
	} // assert_type_CSL_free

//-------------------------------------------------------------------------

	public static function assert_monotonic_increase_t1(&$ar_in,
		$s_error_message_complement='') {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__, __FUNCTION__,
					'sirelTD_is_array',$ar_in,
					"\n GUID='87f13c33-d062-4dd7-9292-b12021318dd7'");
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',
					$s_error_message_complement,
					"\n GUID='36fb8024-460d-4860-a592-b12021318dd7'");
				$error_message_complement=''.
					"\nGUID='2bbe1a49-23c2-47a8-b592-b12021318dd7'\n ".
					$s_error_message_complement;
				$i_len=count($ar_in);
				$x_elem=NULL;
				for($i=0;$i<$i_len;$i++) {
					$x_elem=$ar_in[$i];
					sirelLang::assert_type_is_a_numeric(__FILE__,
						__LINE__, __CLASS__,__FUNCTION__,
						$x_elem,' $i=='.$i.
						' x_elem=='.$x_elem."\n ".
						$error_message_complement);
				} // for
			} // if
			$i_len=count($ar_in);
			if($i_len==0) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'count($ar_in)==0'.
					"\nGUID='5284ffd3-13c1-43cf-a292-b12021318dd7'\n ".
					$s_error_message_complement);
			} // if
			$x_0=$ar_in[0];
			$x_elem=NULL;
			for($i=1;$i<$i_len;$i++) {
				$x_elem=$ar_in[$i];
				if($x_elem<$x_0) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						' $ar_in['.$i.']=='.$x_elem.
						' < $x_0 == '.$x_0.
						"\nGUID='31b5eeb2-98d5-4572-b292-b12021318dd7'\n ".
						$s_error_message_complement);
				} else {
					$x_0=$x_elem;
				} // else
			} // for
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='085bd223-3655-402e-94f1-b12021318dd7'");
		} // catch
	} // assert_monotonic_increase_t1


	public static function assert_monotonic_decrease_t1(&$ar_in,
		$s_error_message_complement='') {
		// Can't use the
		// assert_monotonic_increase_t1(array_reverse($ar_in))
		// in here because the GUID's and error messages differ.
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__, __FUNCTION__,
					'sirelTD_is_array',$ar_in,
					"\n GUID='111411f4-c88f-41e5-99f1-b12021318dd7'");
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',
					$s_error_message_complement,
					"\n GUID='1d3e0bb5-1b60-47dc-a5e1-b12021318dd7'");
				$error_message_complement=''.
					"\nGUID='dfc42437-f844-4605-82e1-b12021318dd7'\n ".
					$s_error_message_complement;
				$i_len=count($ar_in);
				$x_elem=NULL;
				for($i=0;$i<$i_len;$i++) {
					$x_elem=$ar_in[$i];
					sirelLang::assert_type_is_a_numeric(__FILE__,
						__LINE__, __CLASS__,__FUNCTION__,
						$x_elem,' $i=='.$i.
						' x_elem=='.$x_elem."\n ".
						$error_message_complement);
				} // for
			} // if
			$i_len=count($ar_in);
			if($i_len==0) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'count($ar_in)==0'.
					"\nGUID='ce56d2cc-9209-4de7-b1e1-b12021318dd7'\n ".
					$s_error_message_complement);
			} // if
			$x_0=$ar_in[0];
			$x_elem=NULL;
			for($i=1;$i<$i_len;$i++) {
				$x_elem=$ar_in[$i];
				if($x_0<$x_elem) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'$x_0 == '.$x_0.
						' < $ar_in['.$i.']=='.$x_elem.
						"\nGUID='cf07c756-5172-47dc-85e1-b12021318dd7'\n ".
						$s_error_message_complement);
				} else {
					$x_0=$x_elem;
				} // else
			} // for
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='561b5584-cda0-48d0-b5e1-b12021318dd7'");
		} // catch
	} // assert_monotonic_decrease_t1

//-------------------------------------------------------------------------

	// Always retunrs an array that has at least one element in it.
	//
	// If the $b_trim==True, all of the strings within the array are trimmed
	// according to the $s_trimming_regex. If the $s_trimming_regex==NULL,
	// tabs and spaces are trimmed. The value NULL is used for the
	// $s_trimming_regex due to speed considerations.
	public static function mb_explode(&$s_haystack,&$s_needle,
		$b_trim=False,$s_trimming_regex=NULL) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_haystack,
					"\n GUID='8a67f93f-ce69-4902-b5d1-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_needle,
					"\n GUID='44c82d2d-d1dc-43e9-93d1-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_bool',$b_trim,
					"\n GUID='5f862c15-ea3d-4dd9-a1d1-b12021318dd7'");
				if($s_trimming_regex!=NULL) {
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__, __FUNCTION__,
						'sirelTD_is_mbstring',$s_trimming_regex,
						"\n GUID='ed53be56-ee7c-4bd1-a4d1-b12021318dd7'");
				} // if
			} // if
			if($b_trim) {
				if(is_null($s_trimming_regex)) {
					// (^[\t\s]+)|([\t\s]+$)
					$s_trimming_regex='(^[\t\s]+)|([\t\s]+$)';
				} // if
			} // if
			//$s_1=sirelLang::mb_trim($s_haystack);
			$ar_out=array();
			$s_hay=$s_haystack;
			$b_go_on=True;
			$ar=NULL;
			$i_len=NULL;
			$s_leftside=NULL;
			$s_lc_emptystring='';
			if($b_trim) { // to get the if-statement outside of the loop
				$s_trimmed=NULL;
				while($b_go_on) {
					$ar=sirelLang::bisectStr($s_hay, $s_needle);
					$i_len=count($ar);
					if($i_len==1) {
						$b_go_on=False;
						$s_leftside=$ar[0];
					} else {
						$s_leftside=$ar[1];
						$s_hay=$ar[2];
					} // else
					$s_trimmed=sirelLang::mb_ereg_replace_till_no_change($s_trimming_regex,
						$s_lc_emptystring,$s_leftside,3);
					$ar_out[]=$s_trimmed;
				} // while
			} else {
				while($b_go_on) {
					$ar=sirelLang::bisectStr($s_hay, $s_needle);
					$i_len=count($ar);
					if($i_len==1) {
						$b_go_on=False;
						$s_leftside=$ar[0];
					} else {
						$s_leftside=$ar[1];
						$s_hay=$ar[2];
					} // else
					$ar_out[]=$s_leftside;
				} // while
			} // else
			return $ar_out;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='44679c15-75b3-43ad-a5d1-b12021318dd7'");
		} // catch
	}// mb_explode

//-------------------------------------------------------------------------

	// Always retunrs an array that has at least one element in it.
	// The strings within the array are trimmed.
	public static function commaseparated_list_2_array(&$s_commaseparated_list) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__,__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_commaseparated_list,
					"\n GUID='ffbf7e2a-088f-4a24-a2c1-b12021318dd7'");
			} // if
			$s_needle=',';
			$b_trim=True;
			$ar=sirelLang::mb_explode($s_commaseparated_list, $s_needle,
				$b_trim);
			$ar_out=array();
			$i_len=count($ar);
			$x_elem=NULL;
			$i_s_len=NULL;
			for($i=0;$i<$i_len;$i++) {
				$x_elem=$ar[$i];
				$i_s_len=mb_strlen($x_elem);
				if(0<$i_s_len) {
					$ar_out[]=$x_elem;
				} // if
			} // for
			return $ar_out;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='ecf51740-c5dd-4752-b4c1-b12021318dd7'");
		} // catch
	}// commaseparated_list_2_array

//-------------------------------------------------------------------------

	// Returns True, if the element_candidate is within the array.
	// Otherwise returns False.
	public static function array_contains_an_element($an_array,$element_candidate) {
		sirelLang::assert_type_CSL_free(__FILE__,__LINE__,
			__CLASS__,__FUNCTION__,
			'sirelTD_is_array',$an_array,
			"\n GUID='8b35b717-cab9-406c-a4c1-b12021318dd7'");
		$answer=False;
		foreach($an_array as $ar_elem) {
			if($ar_elem==$element_candidate) {
				$answer=True;
				break;
			} // if
		} // foreach
		return $answer;
	} // array_contains_an_element

//-------------------------------------------------------------------------

	public static function YAML2array($file_path) {
		sirelLang::assert_is_string_nonempty_after_trimming(__FILE__, __LINE__, __CLASS__,
			__FUNCTION__, $file_path);
		try {
			require_once('lib/spyc/spyc.php');
			return Spyc::YAMLLoad($file_path);
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='44361a14-a7f8-4e15-81c1-b12021318dd7'");
		} // catch
	} // YAML2array

//-------------------------------------------------------------------------

	// Returns a string representatopm of the JavaScript/Ruby
	// version of the boolean.
	public static function str1ContainsStr2(&$haystack_string,$needle_string,
		$index_of_the_first_haystack_character_included_into_the_search_starting_from_zero) {
		try {
			$srchpos=&$index_of_the_first_haystack_character_included_into_the_search_starting_from_zero;
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$haystack_string,
					"\n GUID='dcb77847-d1fe-4d90-a2c1-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$needle_string,
					"\n GUID='38e14996-baf8-490a-81b1-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__,__FUNCTION__,
					'sirelTD_is_int', $srchpos,
					"\n GUID='209ee239-16e6-49af-91b1-b12021318dd7'");
			} // if
			$hay_len=mb_strlen($haystack_string);
			$needle_len=mb_strlen($needle_string);
			if(($needle_len==0)&&($hay_len==0)) { // Semantics: '' contains ''
				return True;
			} // if
			if($hay_len==0) {//Semantics: '' can't contain anything other than ''
				return False;
			} // if
			if(!(($srchpos+$needle_len)<=$hay_len)) {
				return False;
			} // if
			if($needle_len==0) {
				return True;
			} // if
			$x=mb_strpos($haystack_string, $needle_string,$srchpos);
			if(!is_bool($x)) {
				return True;
			} // if
			return False;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='3a82b320-adfd-4a64-82b1-b12021318dd7'");
		} // catch
	} // str1ContainsStr2

//-------------------------------------------------------------------------

	// Returns True, if $str1 is a substring of $str2 or $str2 is a
	// substring of $str1.
	public static function str1OrStr2ContainsOther(&$str1,&$str2) {
		try {
			$srchpos=&$index_of_the_first_haystack_character_included_into_the_search_starting_from_zero;
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$str1,
					"\n GUID='3169330d-8cba-4246-87b1-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$str2,
					"\n GUID='058ced44-084d-46c0-95a1-b12021318dd7'");
			} // if
			if(sirelLang::str1ContainsStr2($str1, $str2, 0)) {
				return True;
			} // if
			if(sirelLang::str1ContainsStr2($str2, $str1, 0)) {
				return True;
			} // if
			return False;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='b24a2d23-c65d-4667-a7a1-b12021318dd7'");
		} // catch
	} // str1OrStr2ContainsOther

//-------------------------------------------------------------------------

	public static function str1EqualsStr2(&$str1,$str2) {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring',$str1,
				"\n GUID='f3ef2236-5c67-418b-94a1-b12021318dd7'");
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring',$str2,
				"\n GUID='774b7f4c-d9fa-4bbc-b5a1-b12021318dd7'");
		} // if
		try {
			if(mb_strlen($str1)!=mb_strlen($str2)) {
				return False;
			}
			$answer=sirelLang::str1ContainsStr2($str1, $str2, 0);
			return $answer;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='181e1c21-d7a3-492c-bfa1-b12021318dd7'");
		} // catch
	} // str1EqualsStr2

//-------------------------------------------------------------------------

	public static function boolean2str(&$b_subject_to_conversion) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_bool',
					$b_subject_to_conversion,
					"\n GUID='5d20c74d-eb64-47dc-9391-b12021318dd7'");
			} // if
			$answer;
			if($b_subject_to_conversion==True) $answer='t';
			else $answer='f';
			return $answer;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='918b5a35-1290-4ef6-8191-b12021318dd7'");
		} // catch
	} // boolean2str

//-------------------------------------------------------------------------

	// Returs a boolean value, if the $s_bool can be
	// interpreted as a boolean value. It throws an exception,
	// if the conversion fails. Empty strings trigger an exception.
	// Valid values are "true","false","trUe","faLse", i.e.
	// case does not matter, but spaces/tabs/linebreaks are not allowed.
	public static function str2boolean(&$s_subject_to_conversion) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',
					$s_subject_to_conversion,
					"\n GUID='b0c29a39-2569-49f0-a491-b12021318dd7'");
			} // if
			$s=mb_convert_case($s_subject_to_conversion, MB_CASE_LOWER);
			$b_out=NULL;
			if(sirelLang::str1EqualsStr2($s,'t')==True) {
				$b_out=True;
				return $b_out;
			} // if
			if(sirelLang::str1EqualsStr2($s,'f')==True) {
				$b_out=False;
				return $b_out;
			} // if
			if(sirelLang::str1EqualsStr2($s,'true')==True) {
				$b_out=True;
				return $b_out;
			} // if
			if(sirelLang::str1EqualsStr2($s,'false')==True) {
				$b_out=False;
				return $b_out;
			} // if
			throw(new Exception('Failed to interpret string as a boolean. '.
				's_subject_to_conversion=="'.
				$s_subject_to_conversion.'".'));
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='39742c62-3e49-412f-b391-b12021318dd7'");
		} // catch
	} // str2boolean

//-------------------------------------------------------------------------

	public static function generateMissingNeedlestring_t1(&$haystack_string) {
		try {
			$s_needle='∇'.mt_rand(0,999);
			$pos1;
			// The mb_strpos stops at the linebreak.
			$s_all=mb_ereg_replace('[\n\r]', '', $haystack_string);
			while(True) {
				$pos1=mb_strpos($s_all, $s_needle);
				if(is_bool($pos1)) {
					break;
				} // if
				$s_needle=($s_needle.'«').(mt_rand(0,999).'¬');
			} // while
			return $s_needle;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='17d88d95-194d-4a81-9591-b12021318dd7'");
		} // catch
	} // generateMissingNeedlestring_t1

//-------------------------------------------------------------------------

	// Returns a string that starts with $needle_start_str, then
	// has at one or more $needle_middle_element-s and ends with
	// $needle_end_str.  The generateMissingNeedlestring_t2 is
	// computationally more expensive than the
	// sirelLang::generateMissingNeedlestring_t1 and the main
	// motivation for creating it is that sometimes it is necessary
	// to determine the characters that are used within the
	// generated needle string.
	public static function generateMissingNeedlestring_t2(&$haystack_string,
		$needle_start_str, $needle_middle_element, $needle_end_str) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$haystack_string,
					"\n GUID='3218882d-ca54-4ecc-8281-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$needle_start_str,
					"\n GUID='80fb1840-83a6-4c33-8581-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$needle_middle_element,
					"\n GUID='ac11a95e-ae78-4382-a281-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$needle_end_str,
					"\n GUID='e0990324-4698-46cc-8381-b12021318dd7'");
				if((mb_strlen($needle_start_str)==0)||(mb_strlen($needle_middle_element)==0)||(mb_strlen($needle_end_str)==0)) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'Empty strings are not allowed to be used for '.
						'composing the needle string.'.
						'$needle_start_str=="'.$needle_start_str.'" '.
						'$needle_middle_element=="'.$needle_middle_element.'" '.
						'$needle_end_str=="'.$needle_end_str.'" ');
				} // if
				// To avoid collisions at the extraction of the
				// generated needle string from a haystack that contains
				// expectedly different needles, the $needle_start_str,
				// the $needle_middle_element and the $needle_end_str
				// must not pairwise contain eachother. A graph with
				// 3 vertices has at most 3 edges. :-)
				if(sirelLang::str1OrStr2ContainsOther($needle_start_str, $needle_middle_element)) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'One string has anothr as its substring. '.
						'$needle_start_str=="'.$needle_start_str.'" '.
						'$needle_middle_element=="'.$needle_middle_element.'" ');
				} // if
				if(sirelLang::str1OrStr2ContainsOther($needle_start_str, $needle_end_str)) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'One string has anothr as its substring. '.
						'$needle_start_str=="'.$needle_start_str.'" '.
						'$needle_end_str=="'.$needle_end_str.'" ');
				} // if
				if(sirelLang::str1OrStr2ContainsOther($needle_end_str, $needle_middle_element)) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'One string has anothr as its substring. '.
						'$needle_end_str=="'.$needle_end_str.'" '.
						'$needle_middle_element=="'.$needle_middle_element.'" ');
				} // if
			} // if
			$s0=$needle_start_str;
			$s_needle_candidate=$s0.$needle_end_str;
			$pos1;
			// The mb_strpos stops at the linebreak.
			$s_all=mb_ereg_replace('[\n\r]', '', $haystack_string);
			while(True) {
				$pos1=mb_strpos($s_all, $s_needle_candidate);
				if(is_bool($pos1)) {
					break;
				} // if
				$s0=$s0.$needle_middle_element;
				$s_needle_candidate=$s0.$needle_end_str;
			} // while
			return $s_needle_candidate;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4a4cbc1a-d186-4f13-a171-b12021318dd7'");
		} // catch
	} // generateMissingNeedlestring_t2

//-------------------------------------------------------------------------

	// If the $s_haystack==' welcome|||  to|||Mars' and
	// the $s_needle=='|||', then the sirelLang::bisectStr
	// bisects a the haystack to ' welcome' and '  to|||Mars'. It
	// returns an array, where array[0]==' welcome|||  to|||Mars',
	// array[1]==' welcome' and array[2]=='  to|||Mars'.
	//
	// If there's no delimiter, $s_needle, in the $s_haystack,
	// it returns an array, where the only element is the $s_haystack.
	// It returns NULL, if the $s_haystack==NULL.
	public static function bisectStr(&$s_haystack,&$s_needle) {
		try {
			// A trick here is that if $s_haystack=='',
			// ($s_haystack==NULL)==True, i.e. an empty string is
			// equivalent to NULL from PHP == operator point of view.
			if(is_null($s_haystack)) {
				return NULL;
			} // if
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_haystack,
					"\n GUID='55c652e1-dd87-4991-b371-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_needle,
					"\n GUID='7050c962-1996-4727-b671-b12021318dd7'");
				$i_len=mb_strlen($s_needle);
				if($i_len==0) {
					// The idea is that it's not possible to determine,
					// how many empty strings have been concated
					// to string "A" before concating string "B"
					// to form a string like "AB".
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'The length of the $s_needle is 0, but '.
						'needle strings are not allowed to be '.
						'empty strings.');
				} // if
			} // if
			$ar_out=array();
			$ar_out[]=$s_haystack;
			$xx=mb_strpos($s_haystack, $s_needle);
			if(is_bool($xx)) {
				return $ar_out;
			} // if
			$s_first=mb_substr($s_haystack,0,$xx);
			$s_last=mb_substr($s_haystack,$xx+mb_strlen($s_needle));
			$ar_out[1]=&$s_first;
			$ar_out[2]=&$s_last;
			return $ar_out;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='dee934b2-ff32-4091-9471-b12021318dd7'");
		} // catch
	} // bisectStr

//-------------------------------------------------------------------------

	// Applies the sirelLang::bisectStr N times and returns
	// an array of the prefix sides of the bisections. If it is
	// not possible to bisect the string N times, an exception is thrown.
	public static function snatchNtimes(&$haystack_string,&$needle_string,$n) {
		try {
			if($n<1) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'$n=='.$n.'<1');
			} // if
			$s_hay=$haystack_string;
			$modulus=$n%2;
			$ar_tmp;
			$ar_tmp1;
			$ar=array();
			if(2<=$n) {
				$nn=$n;
				if($modulus==1) {
					$nn=$nn-1;
				} // if
				$nnn=$nn/2;
				$i=0;
				for($i=0;$i<$nnn;$i++) {
					$ar_tmp=sirelLang::bisectStr($s_hay, $needle_string);
					if(count($ar_tmp)<3) {
						sirelThrowLogicException(__FILE__, __LINE__,
							__CLASS__.'->'.__FUNCTION__.': '.
							'count($ar_tmp)=='.count($ar_tmp).'<3 '.
							'$haystack_string=='.$haystack_string.
							'$needle_string=='.$needle_string.' $n=='.$n.' ');
					} // if
					$ar[]=$ar_tmp[1];
					$ar_tmp1=sirelLang::bisectStr($ar_tmp[2], $needle_string);
					if(count($ar_tmp1)<3) {
						sirelThrowLogicException(__FILE__, __LINE__,
							__CLASS__.'->'.__FUNCTION__.': '.
							'count($ar_tmp1)=='.count($ar_tmp1).'<3 '.
							'$haystack_string=='.$haystack_string.
							' <\br>$needle_string=='.$needle_string.' $n=='.$n.
							' <br/>$ar_tmp[2]=='.$ar_tmp[2]);
					} // if
					$ar[]=$ar_tmp1[1];
					$s_hay=$ar_tmp1[2];
				} // for
			} // if
			if($modulus==1) {
				$ar_tmp=sirelLang::bisectStr($s_hay, $needle_string);
				if(count($ar_tmp)<3) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'count($ar_tmp)=='.count($ar_tmp).'<3 '.
						'$haystack_string=='.$haystack_string.
						'$needle_string=='.$needle_string.' $n=='.$n.' ');
				} // if
				$ar[]=$ar_tmp[1];
			} // if
			return $ar;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='7e215e5c-c27c-4e5d-b461-b12021318dd7'");
		} // catch
	} // snatchNtimes

//-------------------------------------------------------------------------

	public static function extractColumn($column_index_starting_from_0,
		&$array_of_rows) {
		sirelLang::assert_type_CSL_free(__FILE__,
			__LINE__, __CLASS__, __FUNCTION__,
			'sirelTD_is_array',$array_of_rows,
			"\n GUID='d2ba6e11-3ce4-4561-ba61-b12021318dd7'");
		try {
			$column=array();
			$ci=&$column_index_starting_from_0;
			foreach($array_of_rows as $row) {
				if(sirelSiteConfig::$debug_PHP) {
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__, __FUNCTION__,
						'sirelTD_is_array',$row,
						"\n GUID='f7c9a431-a2f6-4451-a261-b12021318dd7'");
				} // if
				if(count($row)<$ci) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'count($row)=='.count($row).'<$ci=='.$ci);
				}
				$column[]=$row[$ci];
			} // foreach
			return $column;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='238cd82d-2bc3-4dc6-8461-b12021318dd7'");
		} // catch
	} // extractColumn

//-------------------------------------------------------------------------

	public static function extractColumns($a_string_of_a_commaseparated_list_of_column_indices_starting_from_0,
		&$array_of_rows) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$array_of_rows,
					"\n GUID='6b579036-d480-418d-8261-b12021318dd7'");
				$a_string_of_a_commaseparated_list_of_column_indices_starting_from_0=sirelLang::assert_is_string_nonempty_after_trimming(__FILE__,
					__LINE__,__CLASS__,__FUNCTION__, $a_string_of_a_commaseparated_list_of_column_indices_starting_from_0);
			} // if
			$ar_column_indices=sirelLang::commaseparated_list_2_array($a_string_of_a_commaseparated_list_of_column_indices_starting_from_0);
			$columns=array();
			$columns_of_a_singe_row;
			foreach($array_of_rows as $row) {
				if(sirelSiteConfig::$debug_PHP) {
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__, __FUNCTION__,
						'sirelTD_is_array',$row,
						"\n GUID='7c3e9149-16cc-4969-9351-b12021318dd7'");
				} // if
				$columns_of_a_singe_row=array();
				foreach($ar_column_indices as $ci) {
					if(count($row)<$ci) {
						sirelThrowLogicException(__FILE__, __LINE__,
							__CLASS__.'->'.__FUNCTION__.': '.
							'count($row)=='.count($row).'<$ci=='.$ci);
					} // if
					$columns_of_a_singe_row[]=$row[$ci];
				} // foreach
				$columns[]=$columns_of_a_singe_row;
			} // foreach
			return $columns;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='e43e6057-ec5b-47fe-a551-b12021318dd7'");
		} // catch
	} // extractColumns

//-------------------------------------------------------------------------

	// The hashtable is the PHP array. The problem is that
	// as of PHP 5.x the ScriptKiddie-mentality design of the PHP
	// does not allow the standard associative hashtable to have a
	// standard element removal function that would remove an
	// array entry by specifying an array key. Nice job by the architect!!!
	// And yes, one understands, that this implementation here beutifully
	// summarizes multiple stupidities within the PHP 5.x: lack of native
	// UTF-8 support, the ht issues, lack of type checks (I probably missed
	// something.)
	//
	// It's OK to call this version of removal function in cases, where
	// the key actually does not exist in the hashtable. However, there
	// is an assumption that all of the keys are of mb_string type.
	public static function remove_from_ht($a_key,&$a_hashtable) {
		if(sirelSiteConfig::$debug_PHP) {
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_mbstring',$a_key,
				"\n GUID='25b60b55-3a69-4bbb-9551-b12021318dd7'");
			sirelLang::assert_type_CSL_free(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__,
				'sirelTD_is_array',$a_hashtable,
				"\n GUID='2efb2e29-67c4-4ad6-b451-b12021318dd7'");
		} // if
		try {
			if(!array_key_exists($a_key,$a_hashtable)) {
				return;
			} // if
			// Yes, now comes the sluggish part!!!!
			$keys=array_keys($a_hashtable);
			$arht_new=array();
			foreach($keys as $a_key_in_ht) {
				if(!sirelLang::str1EqualsStr2($a_key,$a_key_in_ht)) {
					$arht_new[$a_key_in_ht]=$a_hashtable[$a_key_in_ht];
				} // if
			} // for
			$a_hashtable=$arht_new;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='5ce015f4-5572-4808-a351-b12021318dd7'");
		} // catch
	} // remove_from_ht

//-------------------------------------------------------------------------

	// http://mathworld.wolfram.com/SetDifference.html
	// Hashtable keys are treated as set elements.
	// If $arht_A represents set A and $arht_B represents set B, then
	// the function set_difference returns a hashtable that represents
	// A\B.
	public static function set_difference(&$arht_A,&$arht_B) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$arht_A,
					"\n GUID='4d19bc48-b1e4-4fde-9241-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$arht_B,
					"\n GUID='5fa5811e-9b1a-4306-9541-b12021318dd7'");
			} // if
			$arht_diff=array();
			$arht_A_keys=array_keys($arht_A);
			foreach ($arht_A_keys as $key_A) {
				if(!array_key_exists($key_A, $arht_B)) {
					$arht_diff[$key_A]=$arht_A[$key_A];
				} // if
			} // foreach
			return $arht_diff;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='f0c7fe1f-1919-4f9a-8541-b12021318dd7'");
		} // catch
	} // set_difference

//-------------------------------------------------------------------------

	// http://mathworld.wolfram.com/SymmetricDifference.html
	// Hashtable keys are treated as set elements.
	// If $arht_A represents set A and $arht_B represents set B, then
	// the function set_symmetric_difference returns a hashtable
	// that represents  (A\B)U(B\A).
	public static function set_symmetric_difference(&$arht_A,&$arht_B) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$arht_A,
					"\n GUID='b6eb7e30-cf3d-4315-a441-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$arht_B,
					"\n GUID='22f2923c-012b-4d96-8541-b12021318dd7'");
			} // if
			$arht_diff_1=sirelLang::set_difference($arht_A, $arht_B);
			$arht_diff_2=sirelLang::set_difference($arht_B, $arht_A);
			$arht_symmetric_diff=array_merge($arht_diff_1, $arht_diff_2);
			return ht_symmetric_diff;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='3f5fb434-5312-4c00-a531-b12021318dd7'");
		} // catch
	} // set_symmetric_difference

//-------------------------------------------------------------------------

	// http://mathworld.wolfram.com/Intersection.html
	// Hashtable keys are treated as set elements.
	// If $arht_A represents set A and $arht_B represents set B, then
	// the function set_intersection_ht returns a hashtable
	// that contains only those keys that are present
	// in both of the hashtables.
	//
	// For arrays that have mb_strings as elements, one
	// should use sirelLang::set_intersection_ar_of_mbstrings
	public static function set_intersection_ht(&$arht_A,&$arht_B) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$arht_A,
					"\n GUID='7a4afa27-d246-4fa1-a331-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$arht_B,
					"\n GUID='bc215b4b-977f-454d-b231-b12021318dd7'");
			} // if
			$arht_intersection=array();
			$arht_A_keys=array_keys($arht_A);
			foreach ($arht_A_keys as $key_A) {
				if (array_key_exists($key_A, $arht_B)==True) {
					$arht_intersection[$key_A]=$arht_B[$key_A];
				} // if
			} // foreach
			return $arht_intersection;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='3df6e83b-0ec3-420b-8231-b12021318dd7'");
		} // catch
	} // set_intersection_ht

//-------------------------------------------------------------------------

	// http://mathworld.wolfram.com/Intersection.html
	public static function set_intersection_ar_of_mbstrings(&$ar_A,&$ar_B) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$ar_A,
					"\n GUID='45cdb972-aaea-45a3-8f31-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$ar_B,
					"\n GUID='71a52577-5b0f-4a08-b331-b12021318dd7'");
				foreach ($ar_A as $x) {
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__, __FUNCTION__,
						'sirelTD_is_mbstring',$x,
						"\n GUID='3c2ceb81-17d2-4b5b-8121-b12021318dd7'");
				} // foreach
				foreach ($ar_B as $x) {
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__, __FUNCTION__,
						'sirelTD_is_mbstring',$x,
						"\n GUID='feb9e522-c5e1-46ee-a421-b12021318dd7'");
				} // foreach
			} // if
			$ar_intersection=array();
			foreach ($ar_A as $s_a) {
				foreach ($ar_B as $s_b) {
					if(sirelLang::str1EqualsStr2($s_a,$s_b)) {
						array_push($ar_intersection,''.$s_a);
					} // if
				} // foreach
			} // foreach
			return $ar_intersection;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='b44f2823-c93c-4b5e-b121-b12021318dd7'");
		} // catch
	} // set_intersection_ar_of_mbstrings

//-------------------------------------------------------------------------

	public static function descape(&$a_string) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$a_string,
					"\n GUID='45e63a29-2445-417f-a521-b12021318dd7'");
			} // if
			$s_0=mb_ereg_replace('[\\\\]"', '"',$a_string);
			$s_1=mb_ereg_replace("[\\\\]'", '\'',$s_0);
			$s_0=mb_ereg_replace('[\\\\][\\\\]', '\\',$s_1);
			return $s_0;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='ccab7d2d-d366-4d4e-b421-b12021318dd7'");
		} // catch
	} // descape

//-------------------------------------------------------------------------

	// Returns a sirelPair, where a_pair->a_==True, if the operation
	// failed and a_pair->a_==False, if the operation succeeded. If the
	// operation succeeded, the
	// a_pair->b_==<The value in the PHP floating point type>.
	// Only the "." is accepted as a floating point delimiter. The
	// $a_string will be trimmed prior to processing.
	public static function str2float($a_string) {
		try {
			// TODO: refactor it and its client code so
			// that the str2float a sirelOP instance.
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring', $a_string, '',
					"\n GUID='acc8733c-04c3-47b2-a211-b12021318dd7'");
			} // if
			$a_pair=new sirelPair();
			$a_pair->a_=True;
			$s0=sirelLang::mb_trim($a_string);
			if(mb_strlen($s0)==0) {
				return $a_pair;
			} // if
			$b_negative=False;
			$s1=$s0;
			if(1<mb_strlen($s0)) {
				$s_minus=mb_substr($s0,0,1);
				if(sirelLang::str1EqualsStr2($s_minus,'-')) {
					$b_negative=True;
					$s1=mb_substr($s0,1);
				} // if
			} // if
			// floatval('4.5') returns 4.5, but
			// floatval('4,5') returns 4 in stead of throwing an exception.
			// 'x' in stead of '.' is for distinquishing '4z5' from '4.5'
			$s0=mb_ereg_replace('[^.\d]','x', $s1);
			if(0<mb_substr_count($s0,'x')) {
				return $a_pair;
			} // if
			if(1<mb_substr_count($s0,'.')) {
				// For cases like "1..1" and "1.3.".
				return $a_pair;
			} // if
			$fl=floatval($s0);
			if($b_negative) {
				$fl=$fl*(-1);
			} // if
			$a_pair->b_=$fl;
			$a_pair->a_=False;
			return $a_pair;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='9d106516-59f2-4326-b211-b12021318dd7'");
		} // catch
	} // str2float

//-------------------------------------------------------------------------

	// Changes $a_string syntax from ordinary string to a regex string.
	public static function mb_str2regexstr($a_string) {
		try {
			$s1=$a_string;
			// The "missing needle" generation part is due to collisions that
			// would occur due to the fact that the regex
			// syntax uses square brackets and backslashes.
			$arht_rpls=array();
			$arht_rpls['\\']=sirelLang::generateMissingNeedlestring_t2($s1,
				'sss','m','endd');

//			$s0=mb_ereg_replace('[\\\]', '[\\\]', $s1); // Wow, what a quirk.
//			$s1=mb_ereg_replace('[\\[]', '[\\[]', $s0);
//			$s0=mb_ereg_replace('[\\]]', '[\\]]', $s1);
//			$s1=mb_ereg_replace('[(]', '[(]', $s0);
//			$s0=mb_ereg_replace('[)]', '[)]', $s1);
//			$s1=mb_ereg_replace('[.]', '[.]', $s0);
//			$s0=mb_ereg_replace('[$]', '[$]', $s1);
//			$s1=mb_ereg_replace('[\^]', '[\^]', $s0);
//			$s0=mb_ereg_replace('[?]', '[?]', $s1);
//			$s1=mb_ereg_replace('[*]', '[*]', $s0);
//			$s0=mb_ereg_replace('[+]', '[+]', $s1);
//			$s1=mb_ereg_replace('[-]', '[-]', $s0);
//			$s0=mb_ereg_replace('[\t]', '[\t]', $s1);
//			$s1=mb_ereg_replace('[\n]', '[\n]', $s0);
//			$s0=mb_ereg_replace('[\r]', '[\r]', $s1);
//			$s1=mb_ereg_replace('[{]', '[{]', $s0);
//			$s0=mb_ereg_replace('[}]', '[}]', $s1);
			// TODO: complete it. The Raudrohi JavaScript library
			// already has a fucntion like that.
			return $s0;
		} catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='acd21238-d808-45d8-a511-b12021318dd7'");
		} // catch
	} // mb_str2regexstr

//-------------------------------------------------------------------------

	// It uses a reference for the $s_haystack, because this
	// function is extensively used in searchstree generation.
	public static function str2array_of_characters(&$s_haystack) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_haystack,
					"\n GUID='135990d0-249b-4103-b511-b12021318dd7'");
			} // if
			$ar_out=array();
			$i_ar_outlen=mb_strlen($s_haystack);
			$s=NULL;
			for ($i = 0; $i <$i_ar_outlen; $i++) {
				$s=mb_substr($s_haystack, $i, 1);
				array_push($ar_out, $s);
			} // for
			return $ar_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1baf27e1-f391-40cc-af11-b12021318dd7'");
		} // catch
	} // str2array_of_characters

//-------------------------------------------------------------------------

	// It's for facilitating instance reuse.
	public static function get_equivalent_or_store(&$x_instance,
		&$arht_storage) {
		try {
			$s_hash=serialize($x_instance);
			$b=array_key_exists($s_hash, $arht_storage);
			$x_out=NULL;
			if($b===True) {
				$x_out=&$arht_storage[$s_hash];
			} else {
				$arht_storage[$s_hash]=&$x_instance;
				$x_out=&$x_instance;
			} // else
			return $x_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='28d02a62-86cc-45d5-a501-b12021318dd7'");
		} // catch
	} // get_equivalent_or_store

//-------------------------------------------------------------------------

	// Returns a new array.
	public static function convert_all_strings_in_array_to_lowercase(&$ar) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array',$ar,
					"\n GUID='2e3663c4-f32a-4bc4-8f01-b12021318dd7'");
				foreach ($ar as $s_tmp) {
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__, __FUNCTION__,
						'sirelTD_is_mbstring',$s_tmp,
						"\n GUID='68d0292e-ebcb-45e1-b401-b12021318dd7'");
				} // foreach
			} // if
			$ar_out=array();
			$i=0;
			$i_len=count($ar);
			$s1=NULL;
			$s2=NULL;
			for($i=0;$i<$i_len;$i++) {
				$s1=$ar[$i];
				$s2=mb_strtolower($s1);
				array_push($ar_out, $s2);
			} // for
			return $ar_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='341dc72b-9bc0-47aa-b201-b12021318dd7'");
		} // catch
	} // convert_all_strings_in_array_to_lowercase

//-------------------------------------------------------------------------

	// A word "sindex" stands for separator index.
	// One can read more about separator indices from
	// http://longterm.softf1.com/specifications/array_indexing_by_separators/
	//
	// Explanation by pseudo-example:
	// sirelLang::bisect_by_sindex('abc',0) ->    ar[0]=='',    ar[1]=='abc'
	// sirelLang::bisect_by_sindex('abc',1) ->    ar[0]=='a',   ar[1]=='bc'
	// sirelLang::bisect_by_sindex('abc',3) ->    ar[0]=='abc', ar[1]==''
	//
	// The keys of the array-hashtable are integers in stead of strings
	// due to speed considerations.
	public static function ar_bisect_by_sindex(&$ar_or_s,$i_separator) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__,'sirelTD_is_mbstring,sirelTD_is_array',$ar_or_s);
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_int',$i_separator,
					"\n GUID='42c44cf2-4876-4c7f-a8f0-b12021318dd7'");
			} // if
			if($i_separator<0) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'$i_separator == '.$i_separator.' < 0');
			} // if
			$s_type=sirelLang::type_2_s($ar_or_s);
			$i_len=NULL;
			$ar_in=NULL;
			$s_in=NULL;
			$b_array_mode=False;
			if($s_type=='sirelTD_is_array') {
				$b_array_mode=True;
				$ar_in=&$ar_or_s;
				$i_len=count($ar_in);
				if($i_len<$i_separator) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'length(<input array>) == '.$i_len.
						' < $i_separator == '.$i_separator);
				} // if
			} else { // $s_type=='sirelTD_is_mbstring'
				$s_in=&$ar_or_s;
				$i_len=mb_strlen($s_in);
				if($i_len<$i_separator) {
					sirelThrowLogicException(__FILE__, __LINE__,
						__CLASS__.'->'.__FUNCTION__.': '.
						'length(<input string>) == '.$i_len.
						' < $i_separator == '.$i_separator);
				} // if
			} // if
			$i_len_left=$i_separator;
			$i_len_right=$i_len-$i_separator;
			$x_left=NULL;
			$x_right=NULL;
			if($b_array_mode) {
				$x_left=array();
				$x_elem=NULL;
				for($i=0;$i<$i_len_left;$i++) {
					$x_elem=$ar_in[$i];
					array_push($x_left,$x_elem);
				} // for
				$x_right=array();
				$x_elem=NULL;
				for($i=$i_separator;$i<$i_len;$i++) {
					$x_elem=$ar_in[$i];
					array_push($x_right,$x_elem);
				} // for
			} else { // string mode
				if($i_len_left==0) {
					$x_left=utf8_encode('');
				} else {
					$x_left=mb_substr($s_in, 0,$i_len_left);
				} // else
				if($i_len_right==0) {
					$x_right=utf8_encode('');
				} else {
					$x_right=mb_substr($s_in, $i_separator,$i_len_right);
				} // else
			} // else
			$arht_out=array();
			array_push($arht_out, $x_left);
			array_push($arht_out, $x_right);
			return $arht_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='b8aea71b-c56c-4c9b-83f0-b12021318dd7'");
		} // catch
	} // ar_bisect_by_sindex

//-------------------------------------------------------------------------

	// In more decent programming languages than the PHP
	// is, one would do something like this:
	//
	// my_UTF8_string="some"
	// my_UTF8_string[0]="c" # "some"->"come"
	//
	// But, in the PHP world, one has to use some sort of a function
	// like the sirelLang::s_set_char here is.
	public static function s_set_char(&$s_haystack,$i_char_index,$s_new_char) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_haystack,
					"\n GUID='c6bf631d-2335-44cf-b1f0-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_int',$i_char_index,
					"\n GUID='48209552-6cce-4f33-b1f0-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_new_char,
					"\n GUID='2bd2c5b4-835f-47a2-b4f0-b12021318dd7'");
			} // if
			if($i_char_index<0) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'All of the character indices in '.
					'strings are greater than or equal to 0, '.
					'but the ||| $i_char_index == '.$i_char_index);
			} // if
			if(mb_strlen($s_new_char)!=1) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'The $s_new_char is meant to consist of only '.
					'a single character, but the ||| '.
					'$s_new_char=='.$s_new_char);
			} // if
			$i_hay_len=mb_strlen($s_haystack);
			if(($i_hay_len-1)<$i_char_index) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'The length($s_haystack)=='.$i_hay_len.
					', but the $i_char_index == '.$i_char_index);
			} // if
			$ar_x=sirelLang::ar_bisect_by_sindex($s_haystack,$i_char_index);
			$s_left=&$ar_x[0];
			$s_x=&$ar_x[1];
			$s_separator_index=1;
			$ar_x1=sirelLang::ar_bisect_by_sindex($s_x,$s_separator_index);
			// $s_old_char=$ar_x1[0];
			$s_right=&$ar_x1[1];
			$s_out=NULL;
			$i_s_left_len=mb_strlen($s_left);
			$i_s_right_len=mb_strlen($s_right);
			// The next if-clause is a small speed improvement hack.
			//
			// Think of a situation, where the $i_s_left_len==999 and
			// the $i_s_right_len==3. If one were to write
			// $s_out=$s_left.$s_new_char.$s_right
			// Then one would allocate a temporary string,
			// $s_tmp=$s_left.$s_new_char, of length 999+1=1000
			// UTF-8 characters and then dismiss it after
			// concating it to the 3-character $s_right.
			// But, if one were to do it like: $s_tmp=$s_new_char.$s_left
			// and then $s_out=$s_right.$s_tmp, then the temporary
			// memory requirement would be only for 1+3=4 characters
			// and the likelyhood of CPU cache misses is smaller.
			if($i_s_left_len<$i_s_right_len) {
				$s_tmp=$s_left.$s_new_char;
				$s_out=$s_tmp.$s_right;
			} else {
				$s_tmp=$s_new_char.$s_right;
				$s_out=$s_left.$s_tmp;
			} // else
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='c2dc0c57-db56-4e41-82e0-b12021318dd7'");
		} // catch
	} // s_set_char

//-------------------------------------------------------------------------

	// In more decent programming languages than the PHP
	// is, one would do something like this:
	//
	// my_UTF8_string="some"
	// s_character=my_UTF8_string[0] # -> "s"
	//
	// But, in the PHP world, one has to use some sort of a function
	// like the sirelLang::s_get_char here is.
	public static function s_get_char(&$s_haystack,$i_char_index) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_mbstring',$s_haystack,
					"\n GUID='bb4cba2c-928b-4040-85e0-b12021318dd7'");
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_int',$i_char_index,
					"\n GUID='40a30815-c6be-4e56-b2e0-b12021318dd7'");
			} // if
			if($i_char_index<0) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'All of the character indices in '.
					'strings are greater than or equal to 0, '.
					'but the ||| $i_char_index == '.$i_char_index);
			} // if
			$i_hay_len=mb_strlen($s_haystack);
			if(($i_hay_len-1)<$i_char_index) {
				sirelThrowLogicException(__FILE__, __LINE__,
					__CLASS__.'->'.__FUNCTION__.': '.
					'The length($s_haystack)=='.$i_hay_len.
					', but the $i_char_index == '.$i_char_index);
			} // if
			$ar_x=sirelLang::ar_bisect_by_sindex($s_haystack,$i_char_index);
			$s_x=&$ar_x[1];
			$ar_x1=sirelLang::ar_bisect_by_sindex($s_x,1);
			$s_char=&$ar_x1[0];
			return $s_char;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='9bbca449-e956-4b42-a3e0-b12021318dd7'");
		} // catch
	} // s_get_char


//-------------------------------------------------------------------------

	public static function s_remove_all_spaces_tabs_linebreaks($s_in) {
		try {
			$s_1=mb_ereg_replace(' ', '', $s_in); // space
			$s_2=mb_ereg_replace('	', '', $s_1); // tab
			$s_1=mb_ereg_replace("\n", '', $s_2);
			$s_2=mb_ereg_replace("\r", '', $s_1);
			return $s_2;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='42472d3a-6091-42c5-b4e0-b12021318dd7'");
		} // catch
	} // s_remove_all_spaces_tabs_linebreaks


//-------------------------------------------------------------------------

	public static function b_is_free_of_spaces_tabs_linebreaks($s_in) {
		try {
			$s_test=$s_in;
			$i_len_0=mb_strlen($s_test);
			// It's a fast-fast-fast, hurry-hurry-hurry hack.
			$s_2=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_test);
			$b_is_stlfree=True;
			$i_len_1=mb_strlen($s_2);
			if($i_len_1!=$i_len_0) {
				$b_is_stlfree=False;
			} // if
			return $b_is_stlfree;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='732524e2-6620-4849-82d0-b12021318dd7'");
		} // catch
	} // b_is_free_of_spaces_tabs_linebreaks

//-------------------------------------------------------------------------

	public static function b_string_is_interpretable_as_a_positive_number($s_in,
		$b_true_for_int_false_for_float,
		$b_allow_comma_in_addition_to_the_point) {
		// TODO: test the PHP standard function, "is_numeric(...) and see,
		// if the standard function is faulty. If not, then may be it can
		// be used here.
		try {
			$b_is_a_number=False;
			$i_len_s_in=mb_strlen($s_in);
			$s_stlfree=sirelLang::s_remove_all_spaces_tabs_linebreaks(''.$s_in);
			$i_len_s_stlfree=mb_strlen($s_stlfree);
			if($i_len_s_in!=$i_len_s_stlfree) { // contained spacestabslbrs
				return $b_is_a_number;
			} // if
			if($i_len_s_stlfree==0) { // an empty string or only of stlrbs
				return $b_is_a_number;
			} // if
			$s_digitless=mb_ereg_replace('0|1|2|3|4|5|6|7|8|9', '', ''.$s_stlfree);
			$i_len_digitless=mb_strlen($s_digitless);
			if($i_len_digitless==0) { // an integer, which is also a float
				$b_is_a_number=True;
				return $b_is_a_number;
			} // if
			$b_int_required=$b_true_for_int_false_for_float;
			// It could be that $s_in=="." or $s_in=="..." or $s_in=="abba"
			if($b_int_required==True) {
				return $b_is_a_number; // === <not a number>
			} // if
			// Only floats below this line
			if($i_len_s_stlfree==$i_len_digitless) {
				//  The $s_in did not contain any digits at all.
				return $b_is_a_number;
			} // if
			if(1<$i_len_digitless) { // "." or "," is allowed, but ".." is not
				return $b_is_a_number;
			} // if
			if($s_digitless=='.') {
				$b_is_a_number=True;
				return $b_is_a_number;
			} // if
			if($b_allow_comma_in_addition_to_the_point==True) {
				if($s_digitless==',') {
					$b_is_a_number=True;
					return $b_is_a_number;
				} // if
			} // if
			return $b_is_a_number; // === <not a number>
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='0768ff13-ba35-49aa-a5d0-b12021318dd7'");
		} // catch
	} // b_string_is_interpretable_as_a_positive_number

//-------------------------------------------------------------------------

	// SAR stands for "sub-array".
	//
	// The indexing scheme is explained at:
	// http://longterm.softf1.com/specifications/array_indexing_by_separators/
	//
	public static function s_sar(&$s_in,$ixs_low, $ixs_high) {
		try {
			// For the sake of speed, checks are done only
			// in debug mode.
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_in,
					"\n GUID='91d5521e-e344-4cb2-92d0-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ixs_low,
					"\n GUID='a23ab394-8833-4c85-a2d0-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ixs_high,
					"\n GUID='11c459f2-f339-47f2-b6d0-b12021318dd7'");
				$ar=array();
				$ar[]=0;
				$ar[]=$ixs_low;
				$ar[]=$ixs_high;
				$ar[]=mb_strlen($s_in);
				sirelLang::assert_monotonic_increase_t1($ar,
					"\n GUID='b5540faf-1ad2-456e-83c0-b12021318dd7'");
			} // if
			if ($ixs_low==$ixs_high) {
				$s_out='';
				return $s_out;
			} // if
			$i_len=$ixs_high-$ixs_low;
			$s_out=mb_substr($s_in, $ixs_low, $i_len);
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1e89d232-2fc7-4f7c-a2c0-b12021318dd7'");
		} // catch
	} // s_sar

	public static function ar_sar(&$ar_in,$ixs_low, $ixs_high) {
		try {
			// For the sake of speed, checks are done only
			// in debug mode.
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_array',$ar_in,
					"\n GUID='4143f952-f521-4d94-92c0-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ixs_low,
					"\n GUID='199dcf11-3917-497b-a5c0-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ixs_high,
					"\n GUID='5b492f3b-6e52-4753-b5b0-b12021318dd7'");
				$ar=array();
				$ar[]=0;
				$ar[]=$ixs_low;
				$ar[]=$ixs_high;
				$ar[]=count($ar_in);
				sirelLang::assert_monotonic_increase_t1($ar,
					"\n GUID='75a5bd41-9633-424e-8110-b12021318dd7'");
			} // if
			if ($ixs_low==$ixs_high) {
				$ar_out=array();
				return $ar_out;
			} // if
			$i_len=$ixs_high-$ixs_low;
			$ar_out=array_slice($ar_in, $ixs_low, $i_len);
			return $ar_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='b22c5c33-ff51-4657-a310-b12021318dd7'");
		} // catch
	} // ar_sar

//-------------------------------------------------------------------------

	public static function s_sar_rubystyle(&$s_in,$ix_low,$ix_high) {
		try {
			// For the sake of speed, checks are done only
			// in debug mode.
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_in,
					"\n GUID='126a611e-5f4e-40fd-9510-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ix_low,
					"\n GUID='7606d228-f45a-4f8e-b410-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ix_high,
					"\n GUID='ecf28b26-ce95-465d-8400-b12021318dd7'");
			} // if
			// In Ruby:
			// "a"[0..0]=="a"
			// "a"[0..(-1)]=="a"
			// "abc"[0..(-2)]=="ab"
			// "abc"[(-1)..(-1)]=="c"
			//
			// The "ixs" designates a "separator index".
			// http://longterm.softf1.com/specifications/array_indexing_by_separators/
			$ixs_low=NULL;
			if ($ix_low<0) {
				$i_len=mb_strlen($s_in);
				$ixs_low=$i_len+$ix_low;
			} else {
				$ixs_low=$ix_low;
			} // else
			$ixs_high=NULL;
			if ($ix_high<0) {
				$i_len=mb_strlen($s_in);
				$ixs_high=$i_len+$ix_high+1;
			} else {
				$ixs_high=$ix_high+1;
			} // else
			if(sirelSiteConfig::$debug_PHP) {
				$ar=array();
				$ar[]=0;
				$ar[]=$ixs_low;
				$ar[]=$ixs_high;
				$ar[]=mb_strlen($s_in);
				sirelLang::assert_monotonic_increase_t1($ar,
					"\n GUID='4ef07529-8041-433d-b500-b12021318dd7'");
			} // if
			//----s_sar--core--start--
			// Copy/pasted, duplicated, here for speed.
			// Essentially, it is equivalent to:
			// $s_out=sirelLang::s_sar($s_in, $ixs_low, $ixs_high);
			//
			if ($ixs_low==$ixs_high) {
				$s_out='';
				return $s_out;
			} // if
			$i_len=$ixs_high-$ixs_low;
			$s_out=mb_substr($s_in, $ixs_low, $i_len);
			//----s_sar--core--end----
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='b358d090-0184-45b7-8500-b12021318dd7'");
		} // catch
	} // s_sar_rubystyle

	public static function ar_sar_rubystyle(&$ar_in,$ix_low,$ix_high) {
		try {
			// For the sake of speed, checks are done only
			// in debug mode.
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_array',$ar_in,
					"\n GUID='94827a02-1562-4a99-8c5f-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ix_low,
					"\n GUID='563dda41-2bc5-4079-b23f-b12021318dd7'");
				sirelLang::assert_type(__FILE__,__LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_int',$ix_high,
					"\n GUID='4b13c761-4442-45e0-942f-b12021318dd7'");
			} // if
			// In Ruby:
			// "a"[0..0]=="a"
			// "a"[0..(-1)]=="a"
			// "abc"[0..(-2)]=="ab"
			// "abc"[(-1)..(-1)]=="c"
			//
			// The "ixs" designates a "separator index".
			// http://longterm.softf1.com/specifications/array_indexing_by_separators/
			$ixs_low=NULL;
			if ($ix_low<0) {
				$i_len=count($ar_in);
				$ixs_low=$i_len+$ix_low;
			} else {
				$ixs_low=$ix_low;
			} // else
			$ixs_high=NULL;
			if ($ix_high<0) {
				$i_len=count($ar_in);
				$ixs_high=$i_len+$ix_high+1;
			} else {
				$ixs_high=$ix_high+1;
			} // else
			if(sirelSiteConfig::$debug_PHP) {
				$ar=array();
				$ar[]=0;
				$ar[]=$ixs_low;
				$ar[]=$ixs_high;
				$ar[]=count($ar_in);
				sirelLang::assert_monotonic_increase_t1($ar,
					"\n GUID='c4d52fa4-c598-4d99-865f-b12021318dd7'");
			} // if
			//----s_sar--core--start--
			// Copy/pasted, duplicated, here for speed.
			// Essentially, it is equivalent to:
			// $s_out=sirelLang::ar_sar($ar_in, $ixs_low, $ixs_high);
			//
			if ($ixs_low==$ixs_high) {
				$ar_out=array();
				return $ar_out;
			} // if
			$i_len=$ixs_high-$ixs_low;
			$ar_out=array_slice($ar_in, $ixs_low, $i_len);
			return $ar_out;
			//----s_sar--core--end----
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1430c3d3-2e63-4845-b73e-b12021318dd7'");
		} // catch
	} // ar_sar_rubystyle

//-------------------------------------------------------------------------

	public function s_reverse_string($s_in) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_in,
					"\n GUID='14428835-f65f-46ef-953e-b12021318dd7'");
			} // if
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
					__FUNCTION__, 'sirelTD_is_mbstring', $s_in);
			} // if
			$i_str_len=mb_strlen($s_in);
			$s_out=NULL;
			if($i_str_len==0) {
				$s_out='';
				return $s_out;
			} // if
			$s_char=NULL;
			if ($i_str_len<32) {
				// A speed hack that is based on the
				// fact that all initial strings that
				// will be concatenated  have the length
				// of a single character, i.e. 1
				$s_out='';
				for($i=$i_str_len-1;0<=$i;$i--) {
					$s_char=mb_substr($s_in, $i, 1);
					$s_out=$s_out.$s_char;
				} // for
			} else {
				// According to
				// http://stackoverflow.com/questions/2556289/php-split-multibyte-string-word-into-separate-characters
				// it seems that there is no way to
				// split the string to characters in
				// some more efficient way.
				$arht_s=array();
				for($i=$i_str_len-1;0<=$i;$i--) {
					$s_char=mb_substr($s_in, $i, 1);
					array_push($arht_s, $s_char);
				} // for
				$s_out=s_concat_array_of_strings($arht_s);
			} // else
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='26b6ac91-a710-46b0-bf1e-b12021318dd7'");
		} // catch
	} // s_reverse_string

//-------------------------------------------------------------------------

	// s_get_tail('','abcd') -> ''
	// s_get_tail('XB','') -> ''
	// s_get_tail('Y','abcd') -> 'abcd'
	// s_get_tail('XB','abcdXBefg') -> 'efg'
	// s_get_tail('XB','abcdXB') -> ''
	// s_get_tail('XB','aXBbcdXB') -> ''
	// s_get_tail('XB','XBabcd') -> 'abcd'
	// s_get_tail('XB','Xabcd') -> 'Xabcd'
	// s_get_tail('XB','XB') -> ''
	public function s_get_tail($s_separator,$s_whole) {
		try {
			if(sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_separator,
					"\n GUID='814e2bea-ac6a-450d-a02e-b12021318dd7'");
				sirelLang::assert_type(__FILE__, __LINE__,
					__CLASS__,__FUNCTION__,
					'sirelTD_is_mbstring',$s_whole,
					"\n GUID='35a3741e-11a5-4bda-8f1e-b12021318dd7'");
			} // if
			$s_out=NULL;
			$i_len_separator=mb_strlen($s_separator);
			if($i_len_separator==0) {
				$s_out='';
				return $s_out;
			} // if
			$i_len_whole=mb_strlen($s_whole);
			if($i_len_whole==0) {
				$s_out='';
				return $s_out;
			} // if
			$s_whole_rev=sirelLang::s_reverse_string($s_whole);
			$s_separ_rev=sirelLang::s_reverse_string($s_separator);
			$arht_triple=sirelLang::bisectStr($s_whole_rev,
				$s_separ_rev);
			if(count($arht_triple)<3) { // $s_separator not part of the $s_whole
				$s_out=$s_whole;
				return $s_out;
			} // if
			$s_0=$arht_triple[1];
			$s_out=sirelLang::s_reverse_string($s_0);
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='f3a7d904-21fc-4e34-974d-b12021318dd7'");
		} // catch
	} // s_get_tail


//-------------------------------------------------------------------------

	public function s_mime_type($s_fp) {
		try {
			sirelLang::assert_file_exists(__FILE__,
				__LINE__, __CLASS__, __FUNCTION__, $s_fp);
			$s_fp_0=realpath($s_fp);
			$s_0=shell_exec('file --mime-type '. $s_fp_0);
			// Sample output of the shell_exec(blabla):
			//
			//     ./Tutorial_Logic.pdf: application/pdf
			//
			// File names might contain colons, but
			// mime types do not contain colons.
			$s_separator=':';
			$s_1=sirelLang::s_get_tail($s_separator,$s_0);
			$s_out=sirelLang::mb_trim($s_1);
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4a226c73-add2-4b13-8b2d-b12021318dd7'");
		} // catch
	} // s_mime_type

//-------------------------------------------------------------------------

} //class sirelLang
//=========================================================================

