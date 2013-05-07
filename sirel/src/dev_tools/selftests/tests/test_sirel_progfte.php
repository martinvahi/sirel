<?php
//------------------------------------------------------------------------
// Copyright (c) 2011, martin.vahi@softf1.com that has an
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
//=========================================================================

$s_path_lib_sirel=constant('s_path_lib_sirel');
require_once($s_path_lib_sirel.'/src/src/bonnet/sirel_progfte_v0.php');
require_once($s_path_lib_sirel.'/src/src/bonnet/sirel_progfte_v1.php');

class sirel_test_sirel_ProgFTE {

	private static function test_ProgFTE_v0() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_x=array();
			//-------------
			$arht_x['aa']='AAAA';
			$arht_x['bb']='BBBB';
			$s_x=sireProgFTE_v0::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v0::ProgFTE2ht($s_x);
			if(count(array_keys($arht_1))!=2) {
				$test_case['msg']='test Err 1a, '.
					"\nGUID='34b9ada3-e859-4ed9-9420-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='445f02e4-8676-4ff2-bb40-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='696af001-b776-4730-8820-835341e14dd7'\n";
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
				"\nGUID='323ed105-bd1d-48b7-9f40-835341e14dd7'\n");
		} // catch
	} // test_ProgFTE_v0

	private static function test_ProgFTE_v0_detection() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_x=array();
			//-------------
			$arht_x['aa']='AAAA';
			$arht_x['bb']='BBBB';
			$s_x=sireProgFTE_v0::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE::ProgFTE2ht($s_x);
			if(count(array_keys($arht_1))!=2) {
				$test_case['msg']='test Err 1a, '.
					"\nGUID='5ef9c353-56e7-40ef-8240-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='e25181a3-0297-4136-ba3f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='2664d253-a36f-4824-b65f-835341e14dd7'\n";
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
				"\nGUID='1af8f512-aa00-42b0-ae2f-835341e14dd7'\n");
		} // catch
	} // test_ProgFTE_v0_detection

	private static function test_ProgFTE_v1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_x=array();
			$arht_x['aa']='AAAA';
			$arht_x['bb']='BBBB';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=2) {
				$test_case['msg']='test Err 1a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='c5ebac21-c724-4827-bb1f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='28da2c84-78b4-4750-ae2f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='cb58e068-50cf-4738-8d3f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=0) {
				$test_case['msg']='test Err 2a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='146818b2-d81e-46d7-aa1f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$arht_x['c']='';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=1) {
				$test_case['msg']='test Err 3a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='5b35db51-ff87-40ce-913f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['c']!='') {
				$test_case['msg']='test Err 3b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'c\']=='.$arht_1['c'].
					"\nGUID='5efce5e5-c510-4660-a74f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$arht_x['c']='C';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=1) {
				$test_case['msg']='test Err 4a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='57c28574-f838-4738-8c2f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['c']!='C') {
				$test_case['msg']='test Err 4b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'c\']=='.$arht_1['c'].
					"\nGUID='452b39f3-b7ec-4790-a73f-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_x=array();
			$arht_x['']='xx';
			$s_x=sireProgFTE_v1::ht2ProgFTE($arht_x);
			$arht_1=sireProgFTE_v1::ProgFTE2ht($s_x);
			$i_0=count(array_keys($arht_1));
			if($i_0!=1) {
				$test_case['msg']='test Err 5a, $i_0=='.$i_0.
					"\n".'$s_x=='.$s_x.
					"\nGUID='1493fe22-a03f-4aa9-a41e-835341e14dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['']!='xx') {
				$test_case['msg']='test Err 5b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'\']=='.$arht_1['c'].
					"\nGUID='8fb137c1-1645-434a-a93e-835341e14dd7'\n";
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
				"\nGUID='2451b211-6498-4865-8e5e-835341e14dd7'\n");
		} // catch
	} // test_ProgFTE_v1


	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_ProgFTE::test_ProgFTE_v0();
			$ar_test_results[]=sirel_test_sirel_ProgFTE::test_ProgFTE_v0_detection();
			$ar_test_results[]=sirel_test_sirel_ProgFTE::test_ProgFTE_v1();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='1316db56-6cba-47ef-bd1e-835341e14dd7'\n");
		} // catch
	} // selftest

} // class sirel_test_sirel_ProgFTE

//=========================================================================
?>
