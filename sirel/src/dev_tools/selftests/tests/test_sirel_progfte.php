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
					"\nGUID='1fa77e01-cd75-424c-a3cd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='0c33cc32-45c0-4002-a2cd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='3712da53-4740-4728-b3cd-b14121015dd7'\n";
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
				"\nGUID='d3027033-216e-4c9e-92cd-b14121015dd7'\n");
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
					"\nGUID='15e30bf4-b35e-478b-8ecd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='1d0fcd58-802f-4ffd-83bd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='56b0e51d-2bb8-4507-a1bd-b14121015dd7'\n";
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
				"\nGUID='7101ec36-361d-408c-a2bd-b14121015dd7'\n");
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
					"\nGUID='2615dbc1-434a-436b-afbd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['aa']!='AAAA') {
				$test_case['msg']='test Err 1b, '.
					"\nGUID='1afe292d-ecaa-43e8-92bd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['bb']!='BBBB') {
				$test_case['msg']='test Err 1c, '.
					"\nGUID='c37dd512-0b3f-4181-a5bd-b14121015dd7'\n";
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
					"\nGUID='2e36e156-9cad-4081-95bd-b14121015dd7'\n";
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
					"\nGUID='2a3dc835-15ac-4abc-a2bd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['c']!='') {
				$test_case['msg']='test Err 3b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'c\']=='.$arht_1['c'].
					"\nGUID='0e402952-f531-4c17-82bd-b14121015dd7'\n";
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
					"\nGUID='b72fb53b-b37a-46b3-a1bd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['c']!='C') {
				$test_case['msg']='test Err 4b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'c\']=='.$arht_1['c'].
					"\nGUID='1710ee2f-99d3-4765-92bd-b14121015dd7'\n";
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
					"\nGUID='2638c55c-cdfe-494d-b4bd-b14121015dd7'\n";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			if($arht_1['']!='xx') {
				$test_case['msg']='test Err 5b, '.
					"\n".'$s_x=='.$s_x.
					"\n".'$arht_1[\'\']=='.$arht_1['c'].
					"\nGUID='42687573-3df3-46d2-b2ad-b14121015dd7'\n";
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
				"\nGUID='754b4c29-4967-41fc-95ad-b14121015dd7'\n");
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
				"\nGUID='51a47f4b-0c51-4c8c-a3ad-b14121015dd7'\n");
		} // catch
	} // selftest

} // class sirel_test_sirel_ProgFTE

//=========================================================================
?>
