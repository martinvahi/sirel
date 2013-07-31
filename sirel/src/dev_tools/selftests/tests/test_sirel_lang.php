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
					"\n GUID='70d64b5e-486c-4907-b500-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Humba-Mumba';
			$str2='a';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='40c1d9c1-d867-48f7-a600-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='VirtualMachine';
			$str2='VirtualMachine';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='48ea4b04-362d-4ce1-a1ff-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='MoreThanZero';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='358d2a52-e755-490d-91ff-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='';
			$str2='';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='5bd13388-649d-431e-a5ff-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='Test for multibyte characters: жউᚸฌ╛ሐઆŏõäöüÕÄÖÜ';
			$str2='આ';
			if(!sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is not seen within '.
					'$str1=="'.$str1.'".'.
					"\n GUID='3bd39133-1113-4a04-a3ff-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$str1='haunted house';
			$str2='A ghost';
			if(sirelLang::str1ContainsStr2($str1,$str2,0)) {
				$test_case['msg']='$str2=="'.$str2.'" is seen in the '.
					'$str1=="'.$str1.'".'.
					"\n GUID='4f19c1b4-874d-476c-92ff-a14121015dd7'";
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
				"\nGUID='30c7db41-48bc-4a77-b4ff-a14121015dd7'");
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
					"\n GUID='562dd694-0838-4d87-a1ef-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='tRuE';
			$b=sirelLang::str2boolean($s);
			if($b!==True) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='e8485d2a-c084-432e-82ef-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='f';
			$b=sirelLang::str2boolean($s);
			if($b!==False) {
				$test_case['msg']='$s=="'.$s.'".'.
					"\n GUID='7bd2f038-a953-46ee-81ef-a14121015dd7'";
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
					"\n GUID='db896c20-d552-4f98-82ef-a14121015dd7'";
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
					"\n GUID='62b2153f-4bb3-4372-84ef-a14121015dd7'";
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
				"\nGUID='e62ab930-843b-4307-85df-a14121015dd7'");
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
					"\n GUID='01a83137-e538-42c6-98df-a14121015dd7'";
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
					"\n GUID='53681f1c-4750-4479-b3df-a14121015dd7'";
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
					"\n GUID='65015019-f91b-4a68-84df-a14121015dd7'";
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
				"\nGUID='3e2cd84b-5c3e-4767-8fdf-a14121015dd7'");
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
					"\n GUID='1c342529-3252-42dd-a3df-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('');
			if($x->a_==False) {
				$test_case['msg']='an empty string'.
					"\n GUID='bce90c85-5f26-40ee-a2cf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5.5 ');
			if($x->a_==True) {
				$test_case['msg']='5.5 is OK by spec, but considered invalid.'.
					"\n GUID='8b5aec35-69c0-4c12-94cf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(5.5)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (5.5)'.
					"\n GUID='f3e10755-dfc1-45d4-b5cf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 5,5 ');
			if($x->a_==False) {
				$test_case['msg']='5,5 is NOT OK by spec, '.
					'but it was considered valid.'.
					"\n GUID='502a2c64-344d-40a2-99cf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' 4.3 ');
			if($x->b_!=4.3) {
				$test_case['msg']='4.3'.
					"\n GUID='6cd8aa1c-8512-4177-b5cf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float(' -4.4 ');
			if($x->a_==True) {
				$test_case['msg']='-4.4 is OK by spec, but considered invalid.'.
					"\n GUID='3bfe0619-1a99-4fc3-81cf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-4.4)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-4.4)'.
					"\n GUID='73601840-53f4-46dd-85bf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('6'); // An integer.
			if($x->a_==True) {
				$test_case['msg']='6 is OK by spec, but considered invalid.'.
					"\n GUID='b4f4e228-fdca-4932-94bf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=6) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 6'.
					"\n GUID='2db43052-57be-4ee4-b1bf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-7');
			if($x->a_==True) {
				$test_case['msg']='-7 is OK by spec, but considered invalid.'.
					"\n GUID='fbdbd12e-b9f1-4398-93bf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=(-7)) {
				$test_case['msg']='$x->b_=='.$x->b_.' != (-7)'.
					"\n GUID='3b008019-d46b-482a-a2bf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-f8');
			if($x->a_==False) {
				$test_case['msg']='-f8'.
					"\n GUID='794d692b-c34b-4d7f-b2bf-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-');
			if($x->a_==False) {
				$test_case['msg']='-'.
					"\n GUID='419ff281-3e15-4a65-a4af-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('--');
			if($x->a_==False) {
				$test_case['msg']='--'.
					"\n GUID='48a20871-9cfd-43f8-a4af-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1-');
			if($x->a_==False) {
				$test_case['msg']='1-'.
					"\n GUID='55175144-acad-4f09-91af-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('-0');
			if($x->a_==True) {
				$test_case['msg']='1-'.
					"\n GUID='a4b841b3-8c14-4bd1-b5af-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0'.
					"\n GUID='5ed72044-6cc0-42bf-95af-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('0');
			if($x->a_==True) {
				$test_case['msg']='1-'.
					"\n GUID='cc77e237-157d-4742-95af-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!=0) {
				$test_case['msg']='$x->b_=='.$x->b_.' != 0'.
					"\n GUID='cb20f987-6319-41d9-859f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1..1');
			if($x->a_==False) {
				$test_case['msg']='1..1'.
					"\n GUID='2b6b3675-d670-4cb0-949f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str2float('1.2.');
			if($x->a_==False) {
				$test_case['msg']='1.2.'.
					"\n GUID='47d3d5d2-cc9e-45d4-b59f-a14121015dd7'";
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
				"\nGUID='79f9e257-ef8b-4f98-839f-a14121015dd7'");
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
					"\n GUID='fb07ce53-2d26-4898-b49f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='$';
			$s_expected='[$]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='3304fbdf-6814-47c4-859f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='^';
			$s_expected='[\\^]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='39f80b56-fea3-43d0-918f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='(';
			$s_expected='[(]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='b8499623-d742-4daa-b38f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=')';
			$s_expected='[)]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='29d01723-80c0-4e3f-858f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s='[';
			$s_expected='[\[]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='68898224-fd1e-4c44-848f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s=']';
			$s_expected='[\]]';
			$s_rgx=sirelLang::mb_str2regexstr($s);
			if(!sirelLang::str1EqualsStr2($s_rgx,$s_expected)) {
				$test_case['msg']='$s=="'.$s.'" $s_rgx="'.$s_rgx.'"'.
					"\n GUID='367d2912-34a6-4327-a18f-a14121015dd7'";
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
				"\nGUID='5823be83-6b44-44d1-888f-a14121015dd7'");
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
					"\n GUID='8182d812-ec02-421b-9a7f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('haystack', 'needle')!=0) {
				$test_case['msg']='test2 mb_substr_count'.
					"\n GUID='2d2d1905-ef52-46ba-a47f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('he-he-ho', 'he')!=2) {
				$test_case['msg']='test3 mb_substr_count'.
					"\n GUID='cc5a1446-54bd-465e-a37f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if(mb_substr_count('1', '1')!=1) {
				$test_case['msg']='test4 mb_substr_count'.
					"\n GUID='28c5603c-946b-4f89-847f-a14121015dd7'";
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
				"\nGUID='8f02e663-5a51-41fd-877f-a14121015dd7'");
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
					"\n GUID='85e04552-360a-459d-a17f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[0], 'A');
			if($x!==True) {
				$test_case['msg']='test 2, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[0]=='.$ar[0].
					"\n GUID='40323355-96db-4c0f-846f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[1], 'B');
			if($x!==True) {
				$test_case['msg']='test 3, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[1]=='.$ar[1].
					"\n GUID='45648133-f692-45e0-b16f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::str1EqualsStr2($ar[2], 'C');
			if($x!==True) {
				$test_case['msg']='test 4, $s_hay=="'.$s_hay.
					'", $x=='.$x.'  $ar[2]=='.$ar[2].
					"\n GUID='8cf11a2b-6ec6-440a-846f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_hay='';
			$ar=sirelLang::str2array_of_characters($s_hay);
			$x=count($ar);
			if($x!==0) {
				$test_case['msg']='test 5, $s_hay=="'.$s_hay.
					'", $x=='.$x.
					"\n GUID='0c551716-4daa-478b-a56f-a14121015dd7'";
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
				"\nGUID='bfb9c551-fdc8-48a4-a15f-a14121015dd7'");
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
					"\n GUID='99e48d50-f6e1-4687-915f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==22) {
				$test_case['msg']='test 2, $x->b_=='.$x->b_.
					"\n GUID='33d84392-fe5f-4452-a45f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=sirelLang::get_equivalent_or_store($p2,$arht_storage);
			if($x->a_!==2) {
				$test_case['msg']='test 3, $x->a_=='.$x->a_.
					"\n GUID='852ebb2f-3a8d-4c07-b15f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($x->b_!==3) {
				$test_case['msg']='test 4, $x->b_=='.$x->b_.
					"\n GUID='4ed4e932-89e8-47c1-b55f-a14121015dd7'";
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
				"\nGUID='693a652e-d676-41e7-b35f-a14121015dd7'");
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
					"\n GUID='2cfb5b75-b0d4-4f32-894f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_test[1];
			if($x!=="bbb") {
				$test_case['msg']='test 2, $x=='.$x.
					"\n GUID='511511e5-67b6-4fdf-814f-a14121015dd7'";
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
				"\nGUID='0f43c420-49ce-48f9-824f-a14121015dd7'");
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
					"\n GUID='27abb1a6-1abb-4bf0-934f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='bf636346-5003-4481-a54f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='d744e114-0aae-459e-813f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\n GUID='973f2255-8f9e-497a-b33f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 5, $i_len=='.$i_len.
					"\n GUID='1eaa1069-5eea-4a56-a13f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\n GUID='a2beb256-fc5e-4197-b33f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 7, $i_len=='.$i_len.
					"\n GUID='fcc79230-e091-4930-943f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\n GUID='56e3ad49-4479-40a1-a23f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 9, $s_x=='.$s_x.
					"\n GUID='66e1f15d-6467-4478-a12f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x.
					"\n GUID='12005f10-480b-4dd0-b22f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||AAbbcc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 11, $i_len=='.$i_len.
					"\n GUID='43d57520-2c6d-4bb2-952f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 12, $s_x=='.$s_x.
					"\n GUID='b1b19e54-0236-4419-a52f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 13, $s_x=='.$s_x.
					"\n GUID='c6e8852d-3db2-44ea-a52f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 14, $s_x=='.$s_x.
					"\n GUID='c031b846-5b3d-469f-921f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 15, $i_len=='.$i_len.
					"\n GUID='179daa44-61a7-40bc-851f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 16, $s_x=='.$s_x.
					"\n GUID='11559256-7696-432d-911f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='AA') {
				$test_case['msg']='test 17, $s_x=='.$s_x.
					"\n GUID='333b8b62-9f8c-457c-841f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='bb|||cc') {
				$test_case['msg']='test 18, $s_x=='.$s_x.
					"\n GUID='c04a685c-51da-48cf-831f-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::bisectStr($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 19, $i_len=='.$i_len.
					"\n GUID='55982834-77f3-4d2e-93be-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 20, $s_x=='.$s_x.
					"\n GUID='78157112-b50f-4191-a1be-a14121015dd7'";
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
				"\nGUID='d366c910-81a9-4b68-81be-a14121015dd7'");
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
					"\n GUID='246cb254-025d-4a3b-8cae-a14121015dd7'";
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
					"\n GUID='61bed231-0527-437c-81ae-a14121015dd7'";
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
				"\nGUID='2f9afaf1-1c7c-4f34-bfae-a14121015dd7'");
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
					"\n GUID='4886844c-e2fb-464b-95ae-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='abe42b3f-8fb1-48b7-a2ae-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb,cc') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='a2ea5954-8fe5-46a4-859e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbb,cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 4, $i_len=='.$i_len.
					"\n GUID='41346c32-7ab1-488f-9f9e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\n GUID='42a28a53-ea4d-400a-b49e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AAbbcc|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 6, $i_len=='.$i_len.
					"\n GUID='37f63c44-0484-4d8b-b59e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AAbbcc') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\n GUID='e3dfab2d-5f30-48bd-929e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\n GUID='44ebf922-b9b8-4e81-988e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='|||';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=2) {
				$test_case['msg']='test 9, $i_len=='.$i_len.
					"\n GUID='1e9a923b-b183-4b1b-a18e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 10, $s_x=='.$s_x.
					"\n GUID='77addc33-c91d-47d1-a58e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 11, $s_x=='.$s_x.
					"\n GUID='a21a6e1d-3386-409f-a38e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='AA|||bb|||cc';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 12, $i_len=='.$i_len.
					"\n GUID='7b6b5442-9b4e-47b7-a18e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='AA') {
				$test_case['msg']='test 13, $s_x=='.$s_x.
					"\n GUID='e8b0ac4a-e054-46e3-b27e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='bb') {
				$test_case['msg']='test 14, $s_x=='.$s_x.
					"\n GUID='343cb301-b01d-49dc-927e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='cc') {
				$test_case['msg']='test 15, $s_x=='.$s_x.
					"\n GUID='f1be5e4d-5eb2-4904-837e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=1) {
				$test_case['msg']='test 16, $i_len=='.$i_len.
					"\n GUID='524f7013-80dc-4cd5-a17e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!=$s_hay) {
				$test_case['msg']='test 17, $s_x=='.$s_x.
					"\n GUID='3e524852-7d03-4fad-927e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='||||||ee';
			$ar_x=sirelLang::mb_explode($s_hay, $s_needle);
			$i_len=count($ar_x);
			if($i_len!=3) {
				$test_case['msg']='test 18, $i_len=='.$i_len.
					"\n GUID='214ca15f-8d61-4d13-b36e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 19, $s_x=='.$s_x.
					"\n GUID='45a8dd1e-e16e-45ae-826e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 20, $s_x=='.$s_x.
					"\n GUID='ea334415-e494-47b6-a56e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 21, $s_x=='.$s_x.
					"\n GUID='24b2b5a3-dfcb-4259-a26e-a14121015dd7'";
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
					"\n GUID='aa505d3f-335a-4a92-b15e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 23, $s_x=='.$s_x.
					"\n GUID='0171004e-aa69-4686-935e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 24, $s_x=='.$s_x.
					"\n GUID='f17fa83f-8f1f-46dd-a35e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 25, $s_x=='.$s_x.
					"\n GUID='349a6523-745c-40be-b45e-a14121015dd7'";
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
					"\n GUID='ff0d195c-5c9f-4d2c-855e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='') {
				$test_case['msg']='test 27, $s_x=='.$s_x.
					"\n GUID='fc4b8a27-b039-436c-a44e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='') {
				$test_case['msg']='test 28, $s_x=='.$s_x.
					"\n GUID='3428032e-311b-45d5-944e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='ee') {
				$test_case['msg']='test 29, $s_x=='.$s_x.
					"\n GUID='55b11c85-0a76-45ae-924e-a14121015dd7'";
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
				"\nGUID='999b2a59-096e-46bd-b14e-a14121015dd7'");
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
					"\n GUID='9e769e49-7e8e-4756-b43e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 2, $x=='.$x.
					"\n GUID='2cdf5c33-1fe1-4d25-923e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 3, $x=='.$x.
					"\n GUID='203bba5f-4e0b-429c-b33e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!="cc") {
				$test_case['msg']='test 4, $x=='.$x.
					"\n GUID='65ae5121-cc7c-404e-a33e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_in='AA, ,, , bb';
			$ar_x=sirelLang::commaseparated_list_2_array($s_in);
			$i_len=count($ar_x);
			if($i_len!==2) {
				$test_case['msg']='test 5, $i_len=='.$i_len.
					"\n GUID='0622454e-0074-4f37-a43e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!="AA") {
				$test_case['msg']='test 6, $x=='.$x.
					"\n GUID='aafc5a54-ed97-44ab-a42e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!="bb") {
				$test_case['msg']='test 7, $x=='.$x.
					"\n GUID='b864cc33-8f69-41a2-922e-a14121015dd7'";
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
				"\nGUID='3af04026-b38a-4845-822e-a14121015dd7'");
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
					"\n GUID='b14f88a7-abbe-4297-9c2e-a14121015dd7'";
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
					"\n GUID='70076555-ecd4-4772-821e-a14121015dd7'";
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
					"\n GUID='d9dacb5f-c6d7-43cd-811e-a14121015dd7'";
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
				"\nGUID='03c6990f-2c79-4bbd-b51e-a14121015dd7'");
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
					"\n GUID='7b417627-bbcc-486a-911e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='bc') {
				$test_case['msg']='test 2, $s_right=='.$s_right.
					"\n GUID='04d03c44-247a-4304-920e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,0);
			$s_left=$ar_x[0];
			if($s_left!='') {
				$test_case['msg']='test 3, $s_left=='.$s_left.
					"\n GUID='ae8434de-19e4-4b3f-a40e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='abc') {
				$test_case['msg']='test 4, $s_right=='.$s_right.
					"\n GUID='1a35d044-7bc3-472f-a50e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,3);
			$s_left=$ar_x[0];
			if($s_left!='abc') {
				$test_case['msg']='test 5, $s_left=='.$s_left.
					"\n GUID='f0ecaa3f-f24d-41f5-950e-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='') {
				$test_case['msg']='test 6, $s_right=='.$s_right.
					"\n GUID='0aa39646-d262-4d87-81fd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay='abc';
			$ar_x=sirelLang::ar_bisect_by_sindex($s_hay,2);
			$s_left=$ar_x[0];
			if($s_left!='ab') {
				$test_case['msg']='test 7, $s_left=='.$s_left.
					"\n GUID='5c6b3020-4803-4141-81fd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_right=$ar_x[1];
			if($s_right!='c') {
				$test_case['msg']='test 8, $s_right=='.$s_right.
					"\n GUID='ed3c172f-f0d2-4005-a2fd-a14121015dd7'";
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
					"\n GUID='58d2d243-c617-40be-81fd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=3) {
				$test_case['msg']='test 10, count($ar_right)=='.$i_count.
					"\n GUID='d3b76926-bb21-45b1-82fd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='a')||($ar_right[1]!='b')||($ar_right[2]!='c')) {
					$test_case['msg']='test 11'.
						"\n GUID='80651c47-8db1-4ec5-93ed-a14121015dd7'";
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
					"\n GUID='0de51e35-274f-4b68-b5ed-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')) {
					$test_case['msg']='test 14'.
						"\n GUID='58eb20b5-5972-44c1-b2ed-a14121015dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=2) {
				$test_case['msg']='test 13, count($ar_right)=='.$i_count.
					"\n GUID='88786321-0bfc-4343-b5ed-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='b')||($ar_right[1]!='c')) {
					$test_case['msg']='test 14'.
						"\n GUID='c607834e-a393-4f5e-91dd-a14121015dd7'";
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
					"\n GUID='76471918-a85a-4d5f-85dd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')) {
					$test_case['msg']='test 16'.
						"\n GUID='47bc5178-e983-4cbb-a5dd-a14121015dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=1) {
				$test_case['msg']='test 17, count($ar_right)=='.$i_count.
					"\n GUID='c548fa10-4653-4892-82dd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_right[0]!='c')) {
					$test_case['msg']='test 18'.
						"\n GUID='c68c0842-3292-4703-a4cd-a14121015dd7'";
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
					"\n GUID='3ecf721d-c077-4d22-b2cd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} else {
				if(($ar_left[0]!='a')||($ar_left[1]!='b')||($ar_left[2]!='c')) {
					$test_case['msg']='test 20'.
						"\n GUID='ec0c8944-f908-4531-b5cd-a14121015dd7'";
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // else
			$ar_right=$ar_x[1];
			$i_count=count($ar_right);
			if($i_count!=0) {
				$test_case['msg']='test 21, count($ar_right)=='.$i_count.
					"\n GUID='438096b4-7981-4862-87cd-a14121015dd7'";
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
				"\nGUID='59b30c28-6064-4e1e-b3bd-a14121015dd7'");
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
					"\n GUID='c3b51343-3d40-4014-81bd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 1, 'X');
			if($s_x!='aXc') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='716af21c-739c-476d-91bd-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_set_char($s_hay, 2, 'X');
			if($s_x!='abX') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='32aec24a-58f8-45d2-a1bd-a14121015dd7'";
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
				"\nGUID='4efa04e5-8edd-4eab-95ad-a14121015dd7'");
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
					"\n GUID='2d60a833-7ed1-498b-b4ad-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 1);
			if($s_x!='b') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='c3bb8588-9fa3-4a90-a1ad-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_x=sirelLang::s_get_char($s_hay, 2);
			if($s_x!='c') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='b4ed95f3-92ac-45a3-82ad-a14121015dd7'";
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
				"\nGUID='1ad9d71f-3136-4533-b29d-a14121015dd7'");
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
					"\n GUID='6ebd432f-4773-4424-a49d-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abc') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='7116f38e-8345-4d1a-819d-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="a	b\rcc ";
			$s_x=sirelLang::s_remove_all_spaces_tabs_linebreaks($s_hay);
			if($s_x!='abcc') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='3cd52c4f-5b60-4ab1-a39d-a14121015dd7'";
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
				"\nGUID='4e36904e-cc22-4581-a18d-a14121015dd7'");
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
					"\n GUID='8d39c248-bb45-4fa5-918d-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="\rab\nc ";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='1df40043-bc66-4ec0-828d-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_hay="abc";
			$b_x=sirelLang::b_is_free_of_spaces_tabs_linebreaks($s_hay);
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='1b928f1a-867a-43c1-b17d-a14121015dd7'";
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
				"\nGUID='b7d6864c-8b2c-4652-912d-a14121015dd7'");
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
					"\n GUID='11866244-a33f-4f58-a51d-a14121015dd7'";
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
					"\n GUID='128ef5e0-2bcd-4ffd-a71d-a14121015dd7'";
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
					"\n GUID='206ef4f5-2adc-410e-a91d-a14121015dd7'";
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
					"\n GUID='d1d41258-19ba-47db-b10d-a14121015dd7'";
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
					"\n GUID='2c9f6739-15f1-4ec1-940d-a14121015dd7'";
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
					"\n GUID='fe75c528-42e6-44a3-950d-a14121015dd7'";
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
					"\n GUID='5e542e5d-ca45-4667-a1fc-a14121015dd7'";
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
					"\n GUID='42d27045-da95-43d7-b2fc-a14121015dd7'";
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
					"\n GUID='449d6d27-20d8-436b-82fc-a14121015dd7'";
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
					"\n GUID='54db9d5f-3f4b-4b09-85fc-a14121015dd7'";
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
				"\nGUID='2a15fea1-1551-4b20-a5ec-a14121015dd7'");
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
					"\nGUID='98b2c42d-ab00-4c27-95ec-a14121015dd7'";
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
					"\nGUID='33ba657d-1afc-4dd6-b4dc-a14121015dd7'";
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
					"\nGUID='de1b9a42-9f92-4234-a2dc-a14121015dd7'";
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
					"\nGUID='90ce413b-a9c5-4c52-83dc-a14121015dd7'";
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
					"\nGUID='4c81c9dd-f3e4-4f95-a4dc-a14121015dd7'";
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
					"\nGUID='4d8334a3-aeee-43be-a1cc-a14121015dd7'";
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
					"\nGUID='2b409e91-e868-402a-81cc-a14121015dd7'";
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
					"\nGUID='3c2d3753-e58f-4de8-a2cc-a14121015dd7'";
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
					"\nGUID='051ca586-f52b-4f9a-a4bc-a14121015dd7'";
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
				"\nGUID='170d7427-dab6-438c-92bc-a14121015dd7'");
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
					"\nGUID='3eb67ce3-d615-455f-b9bc-a14121015dd7'";
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
					"\nGUID='96975620-ee97-48ac-93ac-a14121015dd7'";
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
					"\nGUID='c9173c49-7de7-458a-a5ac-a14121015dd7'";
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
					"\nGUID='64dea543-a1ec-492e-a5ac-a14121015dd7'";
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
					"\nGUID='7ff28c4a-1977-4c6b-959c-a14121015dd7'";
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
					"\nGUID='bc048653-ee76-445f-a39c-a14121015dd7'";
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
					"\nGUID='d0004050-1c15-4925-849c-a14121015dd7'";
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
					"\nGUID='282f9614-f25d-4468-848c-a14121015dd7'";
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
					"\nGUID='af84ce39-2bcd-4c8e-b28c-a14121015dd7'";
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
				"\nGUID='21c2a5d4-fb47-4034-a28c-a14121015dd7'");
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
					"\nGUID='4043b12b-ed23-4862-818c-a14121015dd7'";
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
					"\nGUID='d2040152-f07f-408a-a17c-a14121015dd7'";
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
					"\nGUID='7fdfdb3f-9db2-46ca-927c-a14121015dd7'";
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
					"\nGUID='0d985726-70a2-48cc-947c-a14121015dd7'";
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
					"\nGUID='eaae5819-bef6-40a5-a16c-a14121015dd7'";
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
					"\nGUID='4723aa92-9d05-40f8-956c-a14121015dd7'";
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
				"\nGUID='2f54b2c1-feea-4909-a36c-a14121015dd7'");
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
					"\nGUID='37a70e3c-a925-4a6b-b35c-a14121015dd7'";
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
					"\nGUID='77d1bf23-0226-4cbc-a45c-a14121015dd7'";
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
					"\nGUID='4f584215-163f-4477-b15c-a14121015dd7'";
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
					"\nGUID='33e45711-94a5-47fb-a84c-a14121015dd7'";
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
					"\nGUID='3b649d24-8630-4bbc-b74c-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=42) {
				$test_case['msg']='test 6, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='7b9cb638-d7c7-4ec7-834c-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[1]!=66) {
				$test_case['msg']='test 7, $ar_x[1]=='.
					$ar_x[1].
					"\nGUID='72fc8e44-784a-4b9e-823c-a14121015dd7'";
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
					"\nGUID='3bb0135a-f28b-4444-a33c-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=42) {
				$test_case['msg']='test 9, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='3d6902d5-2a38-4a00-8b3c-a14121015dd7'";
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
					"\nGUID='40c7161a-7962-4592-952c-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=66) {
				$test_case['msg']='test 11, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='57ffa4a7-2428-405e-842c-a14121015dd7'";
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
					"\nGUID='9b447e46-43d6-4b4a-a12c-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[2]!=75) {
				$test_case['msg']='test 13, $ar_x[2]=='.
					$ar_x[2].
					"\nGUID='cc9b8f1a-2ec0-459e-a22c-a14121015dd7'";
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
					"\nGUID='46e32a5f-daa1-4493-931c-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($ar_x[0]!=66) {
				$test_case['msg']='test 15, $ar_x[0]=='.
					$ar_x[0].
					"\nGUID='9b3a6956-68f3-419b-931c-a14121015dd7'";
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
				"\nGUID='e6e53f5a-aae5-4a56-931c-a14121015dd7'");
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
					"\nGUID='08efbf38-5930-4c31-910c-a14121015dd7'";
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
					"\nGUID='2c08b231-27f6-40c7-940c-a14121015dd7'";
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
					"\nGUID='c1440c57-3cfb-4f23-930c-a14121015dd7'";
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
					"\nGUID='c268389c-927d-4ade-920c-a14121015dd7'";
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
					"\nGUID='6569c323-dc58-4432-92fb-a14121015dd7'";
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
					"\nGUID='57a58cd3-3e44-4d18-b3fb-a14121015dd7'";
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
					"\nGUID='4a552b43-f3e7-4524-8afb-a14121015dd7'";
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
					"\nGUID='44bfa93f-057d-4bae-81eb-a14121015dd7'";
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
				"\nGUID='339fd611-3c9f-407e-83eb-a14121015dd7'");
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
					"\nGUID='4fa9e419-3d02-470a-92eb-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\nGUID='1681a43d-dc67-4feb-b1eb-a14121015dd7'";
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
					"\nGUID='90405227-330c-464c-82db-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\nGUID='1173374a-04e0-4983-a5db-a14121015dd7'";
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
					"\nGUID='479b9e45-4174-4b9b-84db-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 3a, $s_x=='.$s_x.
					"\nGUID='59aabc46-d916-42b1-82cb-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 3b, $s_x=='.$s_x.
					"\nGUID='2f359bd0-321e-4bc5-93cb-a14121015dd7'";
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
					"\nGUID='f3877615-4e48-4b3b-85cb-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='b') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\nGUID='9aaa2722-f6e3-451e-93cb-a14121015dd7'";
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
					"\nGUID='b054a11a-0391-41eb-b1bb-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='b') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\nGUID='4377dd4f-9fd1-42fc-83bb-a14121015dd7'";
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
					"\nGUID='13a51033-5e3a-4d24-b2bb-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 6a, $s_x=='.$s_x.
					"\nGUID='2e5e42f3-565f-41c6-a3ab-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 6b, $s_x=='.$s_x.
					"\nGUID='e5adf001-9d4f-4657-b1ab-a14121015dd7'";
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
					"\nGUID='5c84515d-fd3a-491f-b1ab-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='a') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='613e56b5-e462-40c2-839b-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[1];
			if($s_x!='b') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='24f8ef43-970c-4d36-b19b-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[2];
			if($s_x!='c') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\nGUID='27749e2f-44d4-498b-a49b-a14121015dd7'";
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
					"\nGUID='955ece36-66cb-4c6e-839b-a14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ar_x[0];
			if($s_x!='c') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\nGUID='2864a223-052d-4d33-b58b-a14121015dd7'";
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
				"\nGUID='49ba6d28-b4a3-4416-848b-a14121015dd7'");
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
