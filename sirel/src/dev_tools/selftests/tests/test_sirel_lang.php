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
					'$str1=="'.$str1.'".'.
					"\n GUID='4bf0b063-2e1d-49ee-b35f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Humba-Mumba';
			$str2='a';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='37abd3c1-2f51-4726-a84f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='VirtualMachine';
			$str2='VirtualMachine';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='50df2831-a48c-4ac7-944e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='MoreThanZero';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='355372c5-2f8d-4448-ab1e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='fb5bba32-6e4d-4e16-842e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Test for multibyte characters: жউᚸฌ╛ሐઆŏõäöüÕÄÖÜ';
			$str2='આ';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='16770301-b432-405a-b45e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='haunted house';
			$str2='A ghost';
			if(sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is seen in the '.
					'$str1=="'.$str1.'".'.
					"\n GUID='27be6aa5-d84d-48f7-a01e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='7180001f-db2f-41c8-bd3e-916031614dd7'");
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
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='de3a9566-2485-4714-872d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='tRuE';
			$b=sirelLang::str2boolean($s);
			if($b!==True) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='2a38d2d7-39f4-4468-843d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='f';
			$b=sirelLang::str2boolean($s);
			if($b!==False) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='71319e6e-4b8b-436e-a87d-916031614dd7'";
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
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='7c922b48-1dfe-4836-89ad-916031614dd7'";
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
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='1e5ba971-df1a-469c-973d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='0117a8ba-4379-42f7-b03d-916031614dd7'");
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
					'$s_actual=="'.$s_actual.'"'.
					"\n GUID='8f4bbc39-e175-42eb-951d-916031614dd7'";
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
					'$s_actual=="'.$s_actual.'"'.
					"\n GUID='348591d4-3f43-447d-984c-916031614dd7'";
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
					'$s_actual=="'.$s_actual.'"'.
					"\n GUID='499dbaf3-b98a-45b2-8f4c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='c2466e85-c2e0-4221-8b4c-916031614dd7'");
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
				$test_case['msg']='spaces'.
					"\n GUID='183eae84-dbc4-4c79-b35c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('');
			if($x->a_==False) {
				$test_case['msg']='an empty string'.
					"\n GUID='5448e8b3-0242-4ecf-8a1c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5.5 ');
			if($x->a_==True) {
				$test_case['msg']='5.5 is OK by spec, but considered invalid.'.
					"\n GUID='216e38c1-7edf-4052-971c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(5.5)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (5.5)'.
					"\n GUID='346fb3d1-84e8-49d4-b22b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5,5 ');
			if($x->a_==False) {
				$test_case['msg']='5,5 is NOT OK by spec, '.
					'but it was considered valid.'.
					"\n GUID='64ffe0b7-8f60-4c5e-b54b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 4.3 ');
			if($x->b_!=4.3) {
				$test_case['msg']='4.3'.
					"\n GUID='4930f7c2-72c3-4546-bafb-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' -4.4 ');
			if($x->a_==True) {
				$test_case['msg']='-4.4 is OK by spec, but considered invalid.'.
					"\n GUID='b59eaefd-97da-4d59-885b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-4.4)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-4.4)'.
					"\n GUID='d1a8959b-1f27-401c-b05b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('6'); // An integer.
			if($x->a_==True) {
				$test_case['msg']='6 is OK by spec, but considered invalid.'.
					"\n GUID='7d70741f-7172-4ec3-925b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=6) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 6'.
					"\n GUID='b5665111-c007-43a6-bbba-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-7');
			if($x->a_==True) {
				$test_case['msg']='-7 is OK by spec, but considered invalid.'.
					"\n GUID='52e1536a-3a7b-4c30-8d2a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-7)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-7)'.
					"\n GUID='59843662-d8a5-4fb4-952a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-f8');
			if($x->a_==False) {
				$test_case['msg']='-f8'.
					"\n GUID='25ac9782-0e27-445d-941a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-');
			if($x->a_==False) {
				$test_case['msg']='-'.
					"\n GUID='4f7c3fd3-8010-4cda-b15a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('--');
			if($x->a_==False) {
				$test_case['msg']='--'.
					"\n GUID='6b532d3f-1645-41f9-97fa-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1-');
			if($x->a_==False) {
				$test_case['msg']='1-'.
					"\n GUID='183fa835-3edd-485a-b849-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-0');
			if($x->a_==True) {
				$test_case['msg']='1-'.
					"\n GUID='4fba7654-bb61-4c32-8239-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0'.
					"\n GUID='5f0f8144-1781-4b0f-9559-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('0');
			if($x->a_==True) {
				$test_case['msg']='1-'.
					"\n GUID='4803ace3-4311-4e32-bf19-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0'.
					"\n GUID='927183b8-469b-47ee-8f49-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1..1');
			if($x->a_==False) {
				$test_case['msg']='1..1'.
					"\n GUID='4da5e885-baef-4b51-b059-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1.2.');
			if($x->a_==False) {
				$test_case['msg']='1.2.'.
					"\n GUID='302f7fd5-22cc-45b2-9d38-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='34bd01f5-e204-4912-9c18-916031614dd7'");
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
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='3b321841-18be-4f27-a658-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='$';
			$s_expected='[$]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='4c8c7cf3-19b7-4183-8718-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='^';
			$s_expected='[\\^]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='ec9358f3-7ac3-479b-9718-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='(';
			$s_expected='[(]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='eec07f21-2351-4ca4-b338-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=')';
			$s_expected='[)]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='847c71c8-9e2c-45bd-8317-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='[';
			$s_expected='[\[]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='a169c304-fee1-4c0f-8d17-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=']';
			$s_expected='[\]]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='3ffda984-6de9-4818-9017-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='6432189e-031f-4240-a017-916031614dd7'");
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
				$test_case['msg']='test1 $s0=='.$s0.
					"\n GUID='d1d4f565-bba0-44ad-be97-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('haystack', 'needle')!=0) {
				$test_case['msg']='test2 mb_substr_count'.
					"\n GUID='df25fb11-7bed-4cfb-b656-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('he-he-ho', 'he')!=2) {
				$test_case['msg']='test3 mb_substr_count'.
					"\n GUID='71233fc3-4dd1-40a1-9a46-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('1', '1')!=1) {
				$test_case['msg']='test4 mb_substr_count'.
					"\n GUID='818e55f6-6934-452a-8956-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='515d737c-e60d-4771-b246-916031614dd7'");
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
					'", $x=='.$x.
					"\n GUID='31478d63-e76b-4a8f-9056-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[0], 'A');
			if($x!==True) {
				$test_case['msg']='test 2, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[0]=='.$ar[0].
					"\n GUID='11e444b8-ca88-4e37-b426-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[1], 'B');
			if($x!==True) {
				$test_case['msg']='test 3, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[1]=='.$ar[1].
					"\n GUID='41e156a3-5e6d-49ef-b655-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[2], 'C');
			if($x!==True) {
				$test_case['msg']='test 4, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[2]=='.$ar[2].
					"\n GUID='250d3af1-e2f7-495a-a825-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_hay='';
			$ar=sirelLang::str2array_of_characters($s_hay);
			$x=count($ar);
			if($x!==0) {
				$test_case['msg']='test 5, $s_hay=="'.$s_hay.
					'", $x=='.$x.
					"\n GUID='43c29012-c04a-46d6-8c55-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='474fb5f3-f2c7-4e0d-af55-916031614dd7'");
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
				$test_case['msg']='test 1, $x->a_=='.$x->a_.
					"\n GUID='1e215edc-2194-4669-9265-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==22) {
				$test_case['msg']='test 2, $x->b_=='.$x->b_.
					"\n GUID='2a47bdc4-5c1f-4766-a144-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::get_equivalent_or_store($p2,$arht_storage);
			if($x->a_!==2) {
				$test_case['msg']='test 3, $x->a_=='.$x->a_.
					"\n GUID='8a5c196f-19e7-47a4-b824-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==3) {
				$test_case['msg']='test 4, $x->b_=='.$x->b_.
					"\n GUID='13866882-a742-44f1-9834-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='46ff0514-bdab-4b8f-9624-916031614dd7'");
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
				$test_case['msg']='test 1, $x=='.$x.
					"\n GUID='946c523b-0bac-4274-a534-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_test[1];
			if($x!=="bbb") {
				$test_case['msg']='test 2, $x=='.$x.
					"\n GUID='254d5058-1188-47c1-9834-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='2026bf33-fd40-4c0d-be13-916031614dd7'");
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
				$test_case['msg']='test 1, $i_len=='.$i_len.
					"\n GUID='114c0bea-f003-4cf3-a933-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='450e9981-f004-4e6c-8633-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='2f240a84-3629-446f-8843-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\n GUID='d3ffe488-3205-4319-8fa3-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 5, $i_len=='.$i_len.
					"\n GUID='2c3c6c04-4a7e-4636-bc42-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\n GUID='64e86fad-0430-4e18-b432-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 7, $i_len=='.$i_len.
					"\n GUID='9839a1d0-2245-4cde-9012-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\n GUID='72d99283-d287-4765-b45d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\n GUID='20580851-defc-47db-935c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x.
					"\n GUID='925790d8-a4a3-4aec-bd5c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||AAbbcc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 11, $i_len=='.$i_len.
					"\n GUID='d1b7f263-67f3-4529-891c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 12, $s_x=='.$s_x.
					"\n GUID='4ed33925-a3ba-416f-ad3c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 13, $s_x=='.$s_x.
					"\n GUID='83c4f971-acf4-45bf-bd3c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 14, $s_x=='.$s_x.
					"\n GUID='54be25e9-7af4-4187-ab9b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 15, $i_len=='.$i_len.
					"\n GUID='f3e61702-8d34-4bc4-8c2b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 16, $s_x=='.$s_x.
					"\n GUID='1dcb0d71-1584-4ad2-a92b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 17, $s_x=='.$s_x.
					"\n GUID='651f91b4-ba15-4956-903b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb|||cc') {
				$test_case['msg']='test 18, $s_x=='.$s_x.
					"\n GUID='2d5d47b3-2873-49ad-b43b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 19, $i_len=='.$i_len.
					"\n GUID='3f03bf01-9675-47f5-901a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 20, $s_x=='.$s_x.
					"\n GUID='339b00e5-c594-4202-b95a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='19a7f970-e1f7-4759-962a-916031614dd7'");
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
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='3417b872-4ec5-48fc-b43a-916031614dd7'";
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
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='a395b6ac-b052-4faa-8b3a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='29e72e03-4f81-4920-9539-916031614dd7'");
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
				$test_case['msg']='test 1, $i_len=='.$i_len.
					"\n GUID='f4b28b80-6273-49ab-9839-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='2a6cc234-7b71-4c06-a559-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='6187e2e3-d11c-4280-8a29-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 4, $i_len=='.$i_len.
					"\n GUID='defb86f2-a72f-435e-9349-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\n GUID='2555aa93-e39b-4d9d-a358-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 6, $i_len=='.$i_len.
					"\n GUID='c5395705-3e2d-4b7e-9918-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\n GUID='9be48173-fcc0-4f88-8818-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\n GUID='1b1adb31-30d6-4a65-9d48-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 9, $i_len=='.$i_len.
					"\n GUID='3f8c5f24-c6d2-40f3-9e48-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x.
					"\n GUID='4bc87c32-e943-4102-a847-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 11, $s_x=='.$s_x.
					"\n GUID='4cd96012-3e1f-402c-b317-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 12, $i_len=='.$i_len.
					"\n GUID='736e2d73-334e-4386-bc17-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 13, $s_x=='.$s_x.
					"\n GUID='b578e91e-4f62-4687-ae47-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb') {
				$test_case['msg']='test 14, $s_x=='.$s_x.
					"\n GUID='1f1b5d35-c394-4522-b237-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='cc') {
				$test_case['msg']='test 15, $s_x=='.$s_x.
					"\n GUID='fd214281-3886-40be-9946-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 16, $i_len=='.$i_len.
					"\n GUID='7a1bfc62-97e3-4cc0-a026-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 17, $s_x=='.$s_x.
					"\n GUID='1eabce45-3dd9-4bd0-8a36-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='||||||ee';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 18, $i_len=='.$i_len.
					"\n GUID='1d5a5333-5db4-468b-af26-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 19, $s_x=='.$s_x.
					"\n GUID='e5f423ab-dbf5-4254-8585-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 20, $s_x=='.$s_x.
					"\n GUID='9e3f8cc4-2dc8-43b0-8195-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 21, $s_x=='.$s_x.
					"\n GUID='403802e5-9aed-44e7-b245-916031614dd7'";
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
				$test_case['msg']='test 22, $i_len=='.$i_len.
					"\n GUID='5a698362-5eda-4ed5-bd25-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 23, $s_x=='.$s_x.
					"\n GUID='87e62dd1-0d6c-461d-af25-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 24, $s_x=='.$s_x.
					"\n GUID='5e5c0d95-e2ac-4822-9d54-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 25, $s_x=='.$s_x.
					"\n GUID='ef75197c-0580-4248-9654-916031614dd7'";
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
				$test_case['msg']='test 26, $i_len=='.$i_len.
					"\n GUID='2d545b63-0f18-4470-ad24-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 27, $s_x=='.$s_x.
					"\n GUID='b48a69f5-dbbc-42b1-a954-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 28, $s_x=='.$s_x.
					"\n GUID='2838cb82-af57-42a5-a523-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 29, $s_x=='.$s_x.
					"\n GUID='b2184bc3-f795-416c-9f43-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='329681b1-63ba-4ceb-b833-916031614dd7'");
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
				$test_case['msg']='test 1, $i_len=='.$i_len.
					"\n GUID='133d1f13-f612-477a-b623-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 2, $x=='.$x.
					"\n GUID='45b6bf45-b561-431b-8023-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 3, $x=='.$x.
					"\n GUID='4becc833-6756-4ab8-8042-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!="cc") {
				$test_case['msg']='test 4, $x=='.$x.
					"\n GUID='410f86b4-a40c-4ad3-a732-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_in='AA, ,, , bb';
			$ar_x=sirelLang::commaseparated_list_2_array($s_in);
			$i_len=count($ar_x);
			if($i_len!==2) {
				$test_case['msg']='test 5, $i_len=='.$i_len.
					"\n GUID='6a99feac-89c8-44f8-8c22-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 6, $x=='.$x.
					"\n GUID='3b8b8854-eb0a-4803-a652-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 7, $x=='.$x.
					"\n GUID='cf96e465-42be-4329-af21-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='b35d00b7-78ec-41f8-99e1-916031614dd7'");
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
				$test_case['msg']='test 1, $s_msg=='.$s_msg.
					"\n GUID='f6cf6058-2229-4b3c-9551-916031614dd7'";
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
				$test_case['msg']='test 2, $s_msg=='.$s_msg.
					"\n GUID='f5fd4cc4-06ca-438c-a211-916031614dd7'";
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
				$test_case['msg']='test 3, $s_msg=='.$s_msg.
					"\n GUID='837847f1-2db0-4fc6-a231-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='732e6ca3-b15a-42cd-9120-916031614dd7'");
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
				$test_case['msg']='test 1, $s_left=='.$s_left.
					"\n GUID='b1f7dbb1-4067-4aeb-8110-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='bc') {
				$test_case['msg']='test 2, $s_right=='.$s_right.
					"\n GUID='415a9ab5-8ca5-46cb-8850-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,0);
			$s_left=$ar_x[0];
			if($s_left!='') {
				$test_case['msg']='test 3, $s_left=='.$s_left.
					"\n GUID='200311e3-9e6c-4280-9030-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='abc') {
				$test_case['msg']='test 4, $s_right=='.$s_right.
					"\n GUID='489a6d33-ddc3-49cb-bc1f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,3);
			$s_left=$ar_x[0];
			if($s_left!='abc') {
				$test_case['msg']='test 5, $s_left=='.$s_left.
					"\n GUID='c19ba991-38d3-4e26-aa2f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='') {
				$test_case['msg']='test 6, $s_right=='.$s_right.
					"\n GUID='1d3f3793-85a7-4668-914f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,2);
			$s_left=$ar_x[0];
			if($s_left!='ab') {
				$test_case['msg']='test 7, $s_left=='.$s_left.
					"\n GUID='3f6d3d24-55e5-4312-a84f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='c') {
				$test_case['msg']='test 8, $s_right=='.$s_right.
					"\n GUID='47f215a4-a370-4162-841e-916031614dd7'";
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
				$test_case['msg']='test 9, $s_left=='.$s_left.
					"\n GUID='6c3d43c1-1a15-4446-b95e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=3) {
				$test_case['msg']='test 10, count($ar_right)=='.$i_count.
					"\n GUID='1e2ff9e4-5fb7-4ad5-a2ee-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='a')||($ar_right[1]!='b')||($ar_right[2]!='c')) {
					$test_case['msg']='test 11'.
						"\n GUID='eea3392f-16bc-4755-a54e-916031614dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,1);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=1) {
				$test_case['msg']='test 12, $s_left=='.$s_left.
					"\n GUID='3520a7d1-458e-455d-8f4e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')) {
					$test_case['msg']='test 14'.
						"\n GUID='52fdfc18-ce9c-476b-8e5d-916031614dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=2) {
				$test_case['msg']='test 13, count($ar_right)=='.$i_count.
					"\n GUID='971e0063-a62f-4c3b-833d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='b')||($ar_right[1]!='c')) {
					$test_case['msg']='test 14'.
						"\n GUID='0a15dfb9-3f60-482a-a77d-916031614dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,2);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=2) {
				$test_case['msg']='test 15, $s_left=='.$s_left.
					"\n GUID='2560caac-cf9c-42d1-802d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')) {
					$test_case['msg']='test 16'.
						"\n GUID='324f49c4-8bd4-46bb-a14c-916031614dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=1) {
				$test_case['msg']='test 17, count($ar_right)=='.$i_count.
					"\n GUID='46f35111-ddef-4324-ab1c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='c')) {
					$test_case['msg']='test 18'.
						"\n GUID='612c698f-351c-4492-8e1c-916031614dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			//-----
			$ar_x=sirelLang::ar_bisect_by_sindex($ar_hay,3);
			$ar_left=$ar_x[0];
			$i_count=count($ar_left);
			if($i_count!=3) {
				$test_case['msg']='test 19, $s_left=='.$s_left.
					"\n GUID='371cb599-0d17-4549-a03c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')||($ar_left[2]!='c')) {
					$test_case['msg']='test 20'.
						"\n GUID='c2376743-3472-4c0c-b44b-916031614dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=0) {
				$test_case['msg']='test 21, count($ar_right)=='.$i_count.
					"\n GUID='43430685-a517-46f2-9e2b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='53f31621-d024-4afd-9f2b-916031614dd7'");
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
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='4939c571-8b2b-4609-823b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 1, 'X');
			if($s_x!='aXc') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='d2eb278f-f3ad-4074-ba4a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 2, 'X');
			if($s_x!='abX') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='5a242eb3-fd4f-4036-bd4a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='e111b379-835d-49e5-a93a-916031614dd7'");
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
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='42d0b855-eeaa-4853-b535-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 1);
			if($s_x!='b') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='2143794b-ac73-4372-be24-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 2);
			if($s_x!='c') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='936deef6-fcbd-448c-8214-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='42b3bb55-c916-4c40-8c14-916031614dd7'");
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
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='701644c2-efb0-4371-9b63-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abc') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='599a42c5-2b3a-4b2f-aa23-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="a	b\rcc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abcc') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='4fa703a4-ea03-4cea-8313-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='45d1dcc5-a26d-4f8e-9223-916031614dd7'");
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
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='20d9b792-53d6-4ce4-bc42-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='0f94bae3-e245-45eb-8222-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="abc";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='c9442024-ccd3-46e1-a822-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='10762a54-6751-4269-b121-916031614dd7'");
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
				$test_case['msg']='test 1, $s_hay=='.$s_hay.
					"\n GUID='154863e6-f94c-4458-b551-916031614dd7'";
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
				$test_case['msg']='test 2, $s_hay=='.$s_hay.
					"\n GUID='5fe66633-714c-4bf8-ac31-916031614dd7'";
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
				$test_case['msg']='test 3, $s_hay=='.$s_hay.
					"\n GUID='84360dcf-3cc6-45ce-9740-916031614dd7'";
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
				$test_case['msg']='test 4, $s_hay=='.$s_hay.
					"\n GUID='28ff0443-d912-4a9d-9530-916031614dd7'";
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
				$test_case['msg']='test 5, $s_hay=='.$s_hay.
					"\n GUID='240a554e-899b-4f86-8f20-916031614dd7'";
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
				$test_case['msg']='test 6, $s_hay=='.$s_hay.
					"\n GUID='4d71eeb4-31fe-49fc-bc3f-916031614dd7'";
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
				$test_case['msg']='test 7, $s_hay=='.$s_hay.
					"\n GUID='2584689f-a7f5-4aea-9b3f-916031614dd7'";
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
				$test_case['msg']='test 8, $s_hay=='.$s_hay.
					"\n GUID='2b449b2e-8ba8-4b99-941f-916031614dd7'";
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
				$test_case['msg']='test 9, $s_hay=='.$s_hay.
					"\n GUID='706b2a12-09ce-46e4-8e5f-916031614dd7'";
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
				$test_case['msg']='test 10, $s_hay=='.$s_hay.
					"\n GUID='3fc65103-575b-44c1-b73e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='47a26791-f8bf-4a8f-b53e-916031614dd7'");
		} // catch
	} // selftest_b_string_is_interpretable_as_a_positive_number

//-------------------------------------------------------------------------

	private static function selftest_assert_monotonic_increase_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-7;
			$ar_x[]=-7;
			$ar_x[]=-6;
			$ar_x[]=0;
			$ar_x[]=0;
			$ar_x[]=7;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='217b8a64-bdb9-4ba8-874e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-7;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='5d037854-9d5a-42ea-942d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='6d2f1ed2-617c-4de6-9d1d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0.0;
			$ar_x[]=0.1;
			$ar_x[]=0.1;
			$ar_x[]=0.11;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='50038b25-39df-48b2-833d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			//-------test-style-change-2-compulsory-throwing---
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=-0.01;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='52533e04-2d2c-4a76-961c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=0.01;
			$ar_x[]=0.001;
			$ar_x[]=0.01;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='27334401-0462-47b2-b73c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=1;
			$ar_x[]=0;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='857e5a85-8ea7-4b97-ac3c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=1;
			$ar_x[]=0.9999;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='55bdfee5-a414-428d-b28b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-1;
			$ar_x[]=-2;
			try {
				sirelLang::assert_monotonic_increase_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\nGUID='52012283-2001-4ef3-ac4b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='45a89f43-7f4d-4cef-8d3b-916031614dd7'");
		} // catch
	} // selftest_assert_monotonic_increase_t1

//-------------------------------------------------------------------------

	private static function selftest_assert_monotonic_decrease_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=7;
			$ar_x[]=7;
			$ar_x[]=0;
			$ar_x[]=-5;
			$ar_x[]=-7;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='d0294be3-6b3d-445f-a73b-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-7;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='27623a75-b822-457e-b32a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='c2b006d0-8b24-4b21-b52a-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0.0;
			$ar_x[]=-0.1;
			$ar_x[]=-0.1;
			$ar_x[]=-0.11;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws!=False) {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='fe5731b0-b8a9-41c6-93ea-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			//-------test-style-change-2-compulsory-throwing---
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=0.01;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='4e7cf722-dfad-4e1e-9e29-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=-0.01;
			$ar_x[]=-0.001;
			$ar_x[]=-0.01;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='12f95904-ab9d-4040-8149-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0;
			$ar_x[]=1;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='2faf0491-6556-4e60-bb29-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=0.9999;
			$ar_x[]=1;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='e5059c5d-900c-4086-9358-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x='';
			$b_throws=FALSE;
			$ar_x=array();
			$ar_x[]=-2;
			$ar_x[]=-1;
			try {
				sirelLang::assert_monotonic_decrease_t1($ar_x);
			}catch (Exception $err_exception) {
				$b_throws=TRUE;
				$s_x=$err_exception;
			} // catch
			if($b_throws==False) {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\nGUID='01a86b21-5588-437f-bc28-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='f7fe7f82-7ede-4a58-9b38-916031614dd7'");
		} // catch
	} // selftest_assert_monotonic_decrease_t1

//-------------------------------------------------------------------------

	private static function selftest_s_sar() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_0='';
			$ixs_low=0;
			$ixs_high=0;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='3cd3c4fc-c084-43f1-9d18-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ixs_low=0;
			$ixs_high=0;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='6fb36c29-7976-4c2e-a747-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ixs_low=1;
			$ixs_high=1;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='c2d53375-cc7e-48be-8637-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ixs_low=0;
			$ixs_high=1;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='a') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='35f73a22-f56a-433d-a657-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='ab';
			$ixs_low=1;
			$ixs_high=2;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='b') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='1f7e3a95-5bbb-428c-8447-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ixs_low=1;
			$ixs_high=2;
			$s_x=sirelLang::s_sar($s_0,$ixs_low,$ixs_high);
			if($s_x!='b') {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='55fc4a00-8034-4157-9c76-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='3dacf071-f02c-48e8-b826-916031614dd7'");
		} // catch
	} // selftest_s_sar

//-------------------------------------------------------------------------

	private static function selftest_ar_sar() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ar_0=array();
			$ixs_low=0;
			$ixs_high=0;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 1, count($ar_x)=='.
					count($ar_x).
					"\nGUID='2135cf6c-89cf-42f2-9246-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ixs_low=0;
			$ixs_high=0;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 2, count($ar_x)=='.
					count($ar_x).
					"\nGUID='1b2a23d2-7b83-4382-8145-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ixs_low=1;
			$ixs_high=1;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 3, count($ar_x)=='.
					count($ar_x).
					"\nGUID='0595d767-8154-45ff-9155-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=1;
			$ixs_high=1;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=0) {
				$test_case['msg']='test 4, count($ar_x)=='.
					count($ar_x).
					"\nGUID='37be7614-9f71-4489-b925-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=0;
			$ixs_high=2;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=2) {
				$test_case['msg']='test 5, count($ar_x)=='.
					count($ar_x).
					"\nGUID='51cdd9c1-f5ec-4afc-bc55-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=42) {
				$test_case['msg']='test 6, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='59abb945-4515-4118-9e54-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[1]!=66) {
				$test_case['msg']='test 7, $ar_x[1]=='.
					$ar_x[1].
					"\nGUID='a21b9cb5-b104-4920-ab34-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=0;
			$ixs_high=1;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=1) {
				$test_case['msg']='test 8, count($ar_x)=='.
					count($ar_x).
					"\nGUID='229bb471-e061-4cc3-b114-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=42) {
				$test_case['msg']='test 9, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='1b276913-9221-4fbe-9343-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ixs_low=1;
			$ixs_high=2;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=1) {
				$test_case['msg']='test 10, count($ar_x)=='.
					count($ar_x).
					"\nGUID='ec27c30e-0010-40f4-a253-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=66) {
				$test_case['msg']='test 11, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='3e762fa1-db26-46dd-8b23-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ar_0[]=75;
			$ixs_low=0;
			$ixs_high=3;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=3) {
				$test_case['msg']='test 12, count($ar_x)=='.
					count($ar_x).
					"\nGUID='25d588a1-0f9f-4b87-9013-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[2]!=75) {
				$test_case['msg']='test 13, $ar_x[2]=='.
					$ar_x[2].
					"\nGUID='13fa385f-399b-489d-8b52-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]=42;
			$ar_0[]=66;
			$ar_0[]=75;
			$ixs_low=1;
			$ixs_high=2;
			$ar_x=sirelLang::ar_sar($ar_0,$ixs_low,$ixs_high);
			if(count($ar_x)!=1) {
				$test_case['msg']='test 14, count($ar_x)=='.
					count($ar_x).
					"\nGUID='13240623-667a-4acf-a232-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=66) {
				$test_case['msg']='test 15, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='11376e85-3fdc-45a0-9312-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='52581c33-2b76-474a-a052-916031614dd7'");
		} // catch
	} // selftest_ar_sar

//-------------------------------------------------------------------------

	private static function selftest_s_sar_rubystyle() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_0='a';
			$ix_low=0;
			$ix_high=0;
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='829b73c1-7a22-4d3f-9831-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='a';
			$ix_low=(-1);
			$ix_high=(-1);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='a') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='19c176e2-8f98-4578-9531-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='ab';
			$ix_low=0;
			$ix_high=1;
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='ab') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\nGUID='40486163-f9d6-411e-bd21-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=1;
			$ix_high=1;
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='b') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='12cdc802-16ce-4bd5-bb30-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(-2);
			$ix_high=(-2);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='b') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='48f0aba3-a5d8-4314-af30-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(0);
			$ix_high=(-2);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='ab') {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\nGUID='5c364935-085d-4019-8950-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(0);
			$ix_high=(-1);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='abc') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='23a8d623-e0b8-4222-be30-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_0='abc';
			$ix_low=(-1);
			$ix_high=(-1);
			$s_x=sirelLang::s_sar_rubystyle($s_0,$ix_low,$ix_high);
			if($s_x!='c') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='2cb72c95-ad8f-4002-8f4f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				$err_exception.
				"\nGUID='9bc74483-57dc-4d34-8b2f-916031614dd7'");
		} // catch
	} // selftest_s_sar_rubystyle

//-------------------------------------------------------------------------

	private static function selftest_ar_sar_rubystyle() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ix_low=0;
			$ix_high=0;
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 1js, $i_len=='.$i_len.
					"\nGUID='55c372b5-c699-4c25-b04f-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='4ae84623-690a-459c-803e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ix_low=(-1);
			$ix_high=(-1);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 2js, $i_len=='.$i_len.
					"\nGUID='f3e24e33-02c3-422e-864e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='824b9e08-aaee-4a9c-b72e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ix_low=0;
			$ix_high=1;
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 3js, $i_len=='.$i_len.
					"\nGUID='2fd78884-eeb5-4ee2-923e-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 3a, $s_x=='.$s_x.
					"\nGUID='40efe5a3-395f-457e-8c4d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 3b, $s_x=='.$s_x.
					"\nGUID='176b9d04-e525-4125-8c2d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=1;
			$ix_high=1;
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 4js, $i_len=='.$i_len.
					"\nGUID='3ad1baf2-1077-4953-a05d-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='b') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='c2d04f17-f5cb-468a-8f2c-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(-2);
			$ix_high=(-2);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 5js, $i_len=='.$i_len.
					"\nGUID='2fa713c5-a9c3-4e6e-8437-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='b') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='9b60af22-b8e6-4e59-9846-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(0);
			$ix_high=(-2);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 6js, $i_len=='.$i_len.
					"\nGUID='20914c64-2624-416d-bc16-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 6a, $s_x=='.$s_x.
					"\nGUID='2bc31982-c7bb-4aba-8126-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 6b, $s_x=='.$s_x.
					"\nGUID='9484ac1a-6a3e-4e12-9a45-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(0);
			$ix_high=(-1);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 6js, $i_len=='.$i_len.
					"\nGUID='2e1a1fd4-af00-4860-9455-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='10656871-f24f-4763-b325-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='f3741b82-f7ed-499e-9724-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='c') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='f4a0325d-4c95-43de-a754-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_0=array();
			$ar_0[]='a';
			$ar_0[]='b';
			$ar_0[]='c';
			$ix_low=(-1);
			$ix_high=(-1);
			$ar_x=sirelLang::ar_sar_rubystyle($ar_0,$ix_low,$ix_high);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 8js, $i_len=='.$i_len.
					"\nGUID='2a7bace1-c673-430d-a834-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='c') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='3922b354-4770-43f1-b733-916031614dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				$err_exception.
				"\nGUID='ad4ca5e9-0a1b-4ef3-8e43-916031614dd7'");
		} // catch
	} // selftest_ar_sar_rubystyle

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
			$ar_test_results[]=sirel_test_sirel_lang::selftest_assert_monotonic_increase_t1();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_assert_monotonic_decrease_t1();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_sar();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_ar_sar();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_s_sar_rubystyle();
			$ar_test_results[]=sirel_test_sirel_lang::selftest_ar_sar_rubystyle();
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
