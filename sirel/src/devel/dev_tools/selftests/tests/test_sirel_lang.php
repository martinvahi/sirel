<?php
//-------------------------------------------------------------------------
// Copyright (c) 2009, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
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

//-------------------------------------------------------------------------
class sirel_test_sirel_lang {
//-------------------------------------------------------------------------
	private static function selftest_str1ContainsStr2() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$str1='Hi there!';
			$str2='Hi';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
						'$str1=="'.$str1.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Humba-Mumba';
			$str2='a';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
						'$str1=="'.$str1.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='VirtualMachine';
			$str2='VirtualMachine';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
						'$str1=="'.$str1.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='MoreThanZero';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
						'$str1=="'.$str1.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
						'$str1=="'.$str1.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Test for multibyte characters: жউᚸฌ╛ሐઆŏõäöüÕÄÖÜ';
			$str2='આ';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
						'$str1=="'.$str1.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='haunted house';
			$str2='A ghost';
			if(sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is seen in the '.
						'$str1=="'.$str1.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_str1ContainsStr2

//-------------------------------------------------------------------------
	private static function selftest_str2boolean() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s='t';
			$b=sirelLang::str2boolean($s);
			if($b!==True) {
				$test_case['msg']='$s=="'.$s.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='tRuE';
			$b=sirelLang::str2boolean($s);
			if($b!==True) {
				$test_case['msg']='$s=="'.$s.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='f';
			$b=sirelLang::str2boolean($s);
			if($b!==False) {
				$test_case['msg']='$s=="'.$s.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='somethingCrazy1';
			$b_throws=False;
			try {
				$b=sirelLang::str2boolean($s);
			}catch (Exception $err_exception) {
				$b_throws=True;
			} // catch
			if($b_throws!==True) {
				$test_case['msg']='$s=="'.$s.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='somethingCrazy2 with spaces';
			$b_throws=False;
			try {
				$b=sirelLang::str2boolean($s);
			}catch (Exception $err_exception) {
				$b_throws=True;
			} // catch
			if($b_throws!==True) {
				$test_case['msg']='$s=="'.$s.'".';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_str2boolean

//-------------------------------------------------------------------------
	private static function selftest_generateMissingNeedlestring_t2() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$haystack='44x';
			$s_start='ZZ';
			$s_middle='|';
			$s_end='<';
			$s_expected=$s_start.$s_end;
			$s_actual=sirelLang::generateMissingNeedlestring_t2($haystack,
					$s_start,$s_middle,$s_end);
			if(!sirelLang::str1EqualsStr2($s_expected, $s_actual)) {
				$test_case['msg']='$s_expected=="'.$s_expected.'"  '.
						'$s_actual=="'.$s_actual.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$haystack='ZZ<';
			$s_start='ZZ';
			$s_middle='|';
			$s_end='<';
			$s_expected='ZZ|<';
			$s_actual=sirelLang::generateMissingNeedlestring_t2($haystack,
					$s_start,$s_middle,$s_end);
			if(!sirelLang::str1EqualsStr2($s_expected, $s_actual)) {
				$test_case['msg']='$s_expected=="'.$s_expected.'"  '.
						'$s_actual=="'.$s_actual.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$haystack='ZZ<ZZ|<';
			$s_start='ZZ';
			$s_middle='|';
			$s_end='<';
			$s_expected='ZZ||<';
			$s_actual=sirelLang::generateMissingNeedlestring_t2($haystack,
					$s_start,$s_middle,$s_end);
			if(!sirelLang::str1EqualsStr2($s_expected, $s_actual)) {
				$test_case['msg']='$s_expected=="'.$s_expected.'"  '.
						'$s_actual=="'.$s_actual.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_generateMissingNeedlestring_t2

//-------------------------------------------------------------------------
	private static function selftest_str2float() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x=sirelLang::str2float('  ');
			if($x->a_==False) {
				$test_case['msg']='spaces';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('');
			if($x->a_==False) {
				$test_case['msg']='an empty string';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5.5 ');
			if($x->a_==True) {
				$test_case['msg']='5.5 is OK by spec, but considered invalid.';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(5.5)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (5.5)';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5,5 ');
			if($x->a_==False) {
				$test_case['msg']='5,5 is NOT OK by spec, '.
						'but it was considered valid.';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 4.3 ');
			if($x->b_!=4.3) {
				$test_case['msg']='4.3';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' -4.4 ');
			if($x->a_==True) {
				$test_case['msg']='-4.4 is OK by spec, but considered invalid.';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-4.4)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-4.4)';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('6'); // An integer.
			if($x->a_==True) {
				$test_case['msg']='6 is OK by spec, but considered invalid.';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=6) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 6';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-7');
			if($x->a_==True) {
				$test_case['msg']='-7 is OK by spec, but considered invalid.';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-7)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-7)';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-f8');
			if($x->a_==False) {
				$test_case['msg']='-f8';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-');
			if($x->a_==False) {
				$test_case['msg']='-';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('--');
			if($x->a_==False) {
				$test_case['msg']='--';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1-');
			if($x->a_==False) {
				$test_case['msg']='1-';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-0');
			if($x->a_==True) {
				$test_case['msg']='1-';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('0');
			if($x->a_==True) {
				$test_case['msg']='1-';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1..1');
			if($x->a_==False) {
				$test_case['msg']='1..1';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1.2.');
			if($x->a_==False) {
				$test_case['msg']='1.2.';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_str2float

//-------------------------------------------------------------------------
	private static function selftest_mb_str2regexstr() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s='.';
			$s_expected='[.]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='$';
			$s_expected='[$]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='^';
			$s_expected='[\\^]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='(';
			$s_expected='[(]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=')';
			$s_expected='[)]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='[';
			$s_expected='[\[]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=']';
			$s_expected='[\]]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_mb_str2regexstr

//-------------------------------------------------------------------------
	private static function selftest_mb_stdlib() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$haystack='hi-hi-hi';
			$needle='hi';
			$s0=mb_ereg_replace($needle,'so', $haystack);
			if(!sirelLang::str1EqualsStr2($s0,'so-so-so')) {
				$test_case['msg']='test1 $s0=='.$s0;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('haystack', 'needle')!=0) {
				$test_case['msg']='test2 mb_substr_count';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('he-he-ho', 'he')!=2) {
				$test_case['msg']='test3 mb_substr_count';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('1', '1')!=1) {
				$test_case['msg']='test4 mb_substr_count';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_mb_stdlib

//-------------------------------------------------------------------------
	private static function selftest_str2array_of_characters() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='ABC';
			$ar=sirelLang::str2array_of_characters($s_hay);
			$x=count($ar);
			if($x!==3) {
				$test_case['msg']='test 1, $s_hay=="'.$s_hay.
						'", $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[0], 'A');
			if($x!==True) {
				$test_case['msg']='test 2, $s_hay=="'.$s_hay.
						'", $x=='.$x.'  $ar[0]=='.$ar[0];
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[1], 'B');
			if($x!==True) {
				$test_case['msg']='test 3, $s_hay=="'.$s_hay.
						'", $x=='.$x.'  $ar[1]=='.$ar[1];
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[2], 'C');
			if($x!==True) {
				$test_case['msg']='test 4, $s_hay=="'.$s_hay.
						'", $x=='.$x.'  $ar[2]=='.$ar[2];
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_hay='';
			$ar=sirelLang::str2array_of_characters($s_hay);
			$x=count($ar);
			if($x!==0) {
				$test_case['msg']='test 5, $s_hay=="'.$s_hay.
						'", $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_str2array_of_characters

//-------------------------------------------------------------------------
	private static function selftest_get_equivalent_or_store() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$p1=new sirelPair(1,2);
			$p2=new sirelPair(2,3);
			$arht_storage=array();
			$x=sirelLang::get_equivalent_or_store($p1,$arht_storage);
			$x=sirelLang::get_equivalent_or_store($p2,$arht_storage);
			$p1->b_=22;
			$x=sirelLang::get_equivalent_or_store($p1,$arht_storage);
			if($x->a_!==1) {
				$test_case['msg']='test 1, $x->a_=='.$x->a_;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==22) {
				$test_case['msg']='test 2, $x->b_=='.$x->b_;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::get_equivalent_or_store($p2,$arht_storage);
			if($x->a_!==2) {
				$test_case['msg']='test 3, $x->a_=='.$x->a_;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==3) {
				$test_case['msg']='test 4, $x->b_=='.$x->b_;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_get_equivalent_or_store

//-------------------------------------------------------------------------
	private static function selftest_convert_all_strings_in_array_to_lowercase() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_in=array();
			$s="AAA";
			array_push($ar_in, $s);
			$s="BbB";
			array_push($ar_in, $s);
			$ar_test=sirelLang::convert_all_strings_in_array_to_lowercase($ar_in);
			$x=$ar_test[0];
			if($x!=="aaa") {
				$test_case['msg']='test 1, $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_test[1];
			if($x!=="bbb") {
				$test_case['msg']='test 2, $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_convert_all_strings_in_array_to_lowercase

//-------------------------------------------------------------------------
	private static function selftest_bisectStr() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_needle='|||';
			$s_hay='AA|||bb,cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 1, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 5, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 6, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 7, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 8, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 9, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||AAbbcc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 11, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 12, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 13, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 14, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 15, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 16, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 17, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb|||cc') {
				$test_case['msg']='test 18, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 19, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 20, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_bisectStr

//-------------------------------------------------------------------------
	private static function selftest_mb_ereg_replace_till_no_change() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_regex='[|]{3}';
			$s_substitution='g';
			$s_haystack='AA|||bb|||cc';
			$i_max_number_of_iterations=3;
			$s_x=sirelLang::mb_ereg_replace_till_no_change($s_regex,
					$s_substitution,$s_haystack,
					$i_max_number_of_iterations);
			$s_expected='AAgbbgcc';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='test 1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_regex='([|]{3})|([g][b])';
			$s_substitution='g';
			$i_max_number_of_iterations=5;
			$s_x=sirelLang::mb_ereg_replace_till_no_change($s_regex,
					$s_substitution,$s_haystack,
					$i_max_number_of_iterations);
			$s_expected='AAggcc';
			if(!sirelLang::str1EqualsStr2($s_x, $s_expected)) {
				$test_case['msg']='test 2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_mb_ereg_replace_till_no_change

//-------------------------------------------------------------------------
	private static function selftest_mb_explode() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_needle='|||';
			$s_hay='AA|||bb,cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 1, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 4, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 6, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 7, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 8, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 9, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 11, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 12, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 13, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb') {
				$test_case['msg']='test 14, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='cc') {
				$test_case['msg']='test 15, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 16, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 17, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='||||||ee';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 18, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 19, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 20, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 21, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||  |||ee   ';
			$b_trim=True;
			$ar_x=sirelLang::mb_explode($s_hay,$s_needle,
					$b_trim);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 22, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 23, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 24, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 25, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||xx|||eexxx';
			$b_trim=True;
			$s_trimming_regex='(^[x]+)|([x]+$)';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle,
					$b_trim,$s_trimming_regex);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 26, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 27, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 28, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 29, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_mb_explode

//-------------------------------------------------------------------------
	private static function selftest_commaseparated_list_2_array() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_in='AA,bb ,cc ';
			$ar_x=sirelLang::commaseparated_list_2_array($s_in);
			$i_len=count($ar_x);
			if($i_len!==3) {
				$test_case['msg']='test 1, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 2, $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 3, $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!="cc") {
				$test_case['msg']='test 4, $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_in='AA, ,, , bb';
			$ar_x=sirelLang::commaseparated_list_2_array($s_in);
			$i_len=count($ar_x);
			if($i_len!==2) {
				$test_case['msg']='test 5, $i_len=='.$i_len;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 6, $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 7, $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_commaseparated_list_2_array

//-------------------------------------------------------------------------
	private static function selftest_assert_type() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$b_error=True;
			$s_msg='';
			try {
				$x=4.5;
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
						__FUNCTION__,'sirelTD_is_mbstring,sirelTD_is_int',$x);
			}catch (Exception $err_exception) {
				$b_error=False;
			} // catch
			if($b_error) {
				$test_case['msg']='test 1, $s_msg=='.$s_msg;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error=False;
			$s_msg='';
			try {
				$x=42;
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
						__FUNCTION__,'sirelTD_is_mbstring,sirelTD_is_int',$x);
			}catch (Exception $err_exception) {
				$b_error=True;
				$s_msg=$err_exception->getMessage();
			} // catch
			if($b_error) {
				$test_case['msg']='test 2, $s_msg=='.$s_msg;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error=False;
			$s_msg='';
			try {
				$x='this is a string';
				sirelLang::assert_type(__FILE__, __LINE__, __CLASS__,
						__FUNCTION__,'sirelTD_is_mbstring,sirelTD_is_int',$x);
			}catch (Exception $err_exception) {
				$b_error=True;
				$s_msg=$err_exception->getMessage();
			} // catch
			if($b_error) {
				$test_case['msg']='test 3, $s_msg=='.$s_msg;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_assert_type

//-------------------------------------------------------------------------
	private static function selftest_ar_bisect_by_sindex() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,1);
			$s_left=$ar_x[0];
			if($s_left!='a') {
				$test_case['msg']='test 1, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='bc') {
				$test_case['msg']='test 2, $s_right=='.$s_right;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,0);
			$s_left=$ar_x[0];
			if($s_left!='') {
				$test_case['msg']='test 3, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='abc') {
				$test_case['msg']='test 4, $s_right=='.$s_right;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,3);
			$s_left=$ar_x[0];
			if($s_left!='abc') {
				$test_case['msg']='test 5, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='') {
				$test_case['msg']='test 6, $s_right=='.$s_right;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,2);
			$s_left=$ar_x[0];
			if($s_left!='ab') {
				$test_case['msg']='test 7, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='c') {
				$test_case['msg']='test 8, $s_right=='.$s_right;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_hay=array();
			array_push($ar_hay, 'a');
			array_push($ar_hay, 'b');
			array_push($ar_hay, 'c');
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,0);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=0) {
				$test_case['msg']='test 9, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=3) {
				$test_case['msg']='test 10, count($ar_right)=='.$i_count;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='a')||($ar_right[1]!='b')||($ar_right[2]!='c')) {
					$test_case['msg']='test 11';
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,1);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=1) {
				$test_case['msg']='test 12, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')) {
					$test_case['msg']='test 14';
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=2) {
				$test_case['msg']='test 13, count($ar_right)=='.$i_count;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='b')||($ar_right[1]!='c')) {
					$test_case['msg']='test 14';
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,2);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=2) {
				$test_case['msg']='test 15, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')) {
					$test_case['msg']='test 16';
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=1) {
				$test_case['msg']='test 17, count($ar_right)=='.$i_count;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='c')) {
					$test_case['msg']='test 18';
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,3);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=3) {
				$test_case['msg']='test 19, $s_left=='.$s_left;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')||($ar_left[2]!='c')) {
					$test_case['msg']='test 20';
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=0) {
				$test_case['msg']='test 21, count($ar_right)=='.$i_count;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_ar_bisect_by_sindex

//-------------------------------------------------------------------------
	private static function selftest_s_set_char() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='abc';
			$s_x=sirelLang::s_set_char($s_hay, 0, 'X');
			if($s_x!='Xbc') {
				$test_case['msg']='test 1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 1, 'X');
			if($s_x!='aXc') {
				$test_case['msg']='test 2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 2, 'X');
			if($s_x!='abX') {
				$test_case['msg']='test 3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_s_set_char

//-------------------------------------------------------------------------
	private static function selftest_s_get_char() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay='abc';
			$s_x=sirelLang::s_get_char($s_hay, 0);
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 1);
			if($s_x!='b') {
				$test_case['msg']='test 2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 2);
			if($s_x!='c') {
				$test_case['msg']='test 3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_s_get_char


//-------------------------------------------------------------------------
	private static function selftest_s_remove_all_spaces_tabs_linebreaks() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay=' a  bc ';
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abc') {
				$test_case['msg']='test 1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abc') {
				$test_case['msg']='test 2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="a	b\rcc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abcc') {
				$test_case['msg']='test 3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_s_remove_all_spaces_tabs_linebreaks

//-------------------------------------------------------------------------
	private static function selftest_b_is_free_of_spaces_tabs_linebreaks() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay=' a  bc ';
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=False) {
				$test_case['msg']='test 1, $b_x=='.$b_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="abc";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_b_is_free_of_spaces_tabs_linebreaks

//-------------------------------------------------------------------------
	private static function selftest_b_string_is_interpretable_as_a_positive_number() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_hay="1 4";
			$b_require_int=True;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 1, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="14.5";
			$b_require_int=True;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 2, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="4..4";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 3, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="4a4";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 4, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="4,2";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=True) {
				$test_case['msg']='test 5, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay=".";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 6, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 7, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="   ";
			$b_require_int=False;
			$b_allow_comma=False;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 8, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="-4.5";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 9, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="-32";
			$b_require_int=False;
			$b_allow_comma=True;
			$b_x=sirelLang::b_string_is_interpretable_as_a_positive_number($s_hay,
					$b_require_int,$b_allow_comma);
			if($b_x!=False) {
				$test_case['msg']='test 10, $s_hay=='.$s_hay;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest_b_string_is_interpretable_as_a_positive_number

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str1ContainsStr2();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_generateMissingNeedlestring_t2();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str2float();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_mb_stdlib();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str2array_of_characters();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_get_equivalent_or_store();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_str2boolean();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_convert_all_strings_in_array_to_lowercase();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_bisectStr();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_mb_ereg_replace_till_no_change();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_mb_explode();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_commaseparated_list_2_array();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_assert_type();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_ar_bisect_by_sindex();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_set_char();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_get_char();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_remove_all_spaces_tabs_linebreaks();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_b_is_free_of_spaces_tabs_linebreaks();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_b_string_is_interpretable_as_a_positive_number();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_lang
//-------------------------------------------------------------------------

?>
