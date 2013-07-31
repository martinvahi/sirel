<?php
//-------------------------------------------------------------------------
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
//-------------------------------------------------------------------------

class sirel_test_sirel_ix {

//-------------------------------------------------------------------------

	private static function test_arht_has_keys() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			if($b_x!=True) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='8e3c7b66-57cb-475d-a7e6-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'cc');
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='a46a8d00-c55d-4974-a756-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='52e0e182-af14-44b0-9c16-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa','cc');
			if($b_x!=False) {
				$test_case['msg']='test 4, $b_x=='.$b_x.
					"\n GUID='bb3162a1-0c34-4988-be36-914121015dd7'";
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
	} // test_arht_has_keys

//-------------------------------------------------------------------------
	private static function test_assert_arht_keys() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$b_x=NULL;
			$b_error_detected=False;
			try {
				$arht_in=array('aa'=>'t','bb'=>42);
				$b_x=sirel_ix::assert_arht_keys($arht_in,'aa','bb');
			}catch (Exception $err_exception) {
				$b_error_detected=True;
			} // catch
			if($b_error_detected==True) {
				$test_case['msg']='test Err1, $b_x=='.$b_x.
					"\n GUID='684fa88e-3758-4764-bf46-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_detected=False;
			try {
				$arht_in=array('aa'=>'t','bb'=>42);
				$b_x=sirel_ix::assert_arht_keys($arht_in,'aa','cc');
			}catch (Exception $err_exception) {
				$b_error_detected=True;
			} // catch
			if($b_error_detected==False) {
				$test_case['msg']='test Err2, $b_x=='.$b_x.
					"\n GUID='24512a41-5b40-4e59-a156-914121015dd7'";
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
	} // test_assert_arht_keys

//-------------------------------------------------------------------------
	private static function test_arht_of_arht_2_arht_of_elemcounts() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ardim1=array();
			array_push($ardim1, array('x','x'));
			array_push($ardim1, array());
			array_push($ardim1, array('x','x','xx'));
			$arht_test=sirel_ix::arht_of_arht_2_arht_of_elemcounts($ardim1);
			$i=count($arht_test);
			if($i!=3) {
				$test_case['msg']='test Err1, $i=='.$i.
					"\n GUID='2b391c14-c059-47e9-a516-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test[0];
			if($i!=2) {
				$test_case['msg']='test Err2, $i=='.$i.
					"\n GUID='c55e5dcc-75cb-427a-a046-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test[1];
			if($i!=0) {
				$test_case['msg']='test Err3, $i=='.$i.
					"\n GUID='cd908b83-8cb0-47c8-a826-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test[2];
			if($i!=3) {
				$test_case['msg']='test Err4, $i=='.$i.
					"\n GUID='5d5ef073-32f8-40bb-bd15-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ardim1=array();
			$arht_test=sirel_ix::arht_of_arht_2_arht_of_elemcounts($ardim1);
			$i=count($arht_test);
			if($i!=0) {
				$test_case['msg']='test Err5, $i=='.$i.
					"\n GUID='74885858-52cf-4609-a035-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ardim1=array('foo'=>array("x","xx"),"gee"=>array());
			$arht_test=sirel_ix::arht_of_arht_2_arht_of_elemcounts($ardim1);
			$i=count($arht_test);
			if($i!=2) {
				$test_case['msg']='test Err6, $i=='.$i.
					"\n GUID='500207a4-8d9b-435d-ba45-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test['foo'];
			if($i!=2) {
				$test_case['msg']='test Err7, $i=='.$i.
					"\n GUID='40975831-e938-4f75-9f15-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i=$arht_test['gee'];
			if($i!=0) {
				$test_case['msg']='test Err8, $i=='.$i.
					"\n GUID='1c713c32-8264-4b0b-9135-914121015dd7'";
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
	} // test_arht_of_arht_2_arht_of_elemcounts

//-------------------------------------------------------------------------
	private static function test_arht_swap_keys_and_values() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_1=array('aa'=>42,'bb'=>54);
			$arht_2=sirel_ix::arht_swap_keys_and_values($arht_1);
			$i=count($arht_2);
			if($i!=2) {
				$test_case['msg']='test Err1, $i=='.$i.
					"\n GUID='a83ef9da-d927-4038-b9c5-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$arht_2[42];
			if($x!='aa') {
				$test_case['msg']='test Err2, $x=='.$x.
					"\n GUID='483181a1-be94-4bb3-b835-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$arht_2[54];
			if($x!='bb') {
				$test_case['msg']='test Err3, $x=='.$x.
					"\n GUID='2e53c575-bb76-4387-9525-914121015dd7'";
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
	} // test_arht_swap_keys_and_values

//-------------------------------------------------------------------------
	private static function test_arht_to_s() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_1=array('aa'=>42,'bb'=>54.5);
			$s_expected='sirelTD_is_mbstring aa sirelTD_is_int 42'."\n".
				'sirelTD_is_mbstring bb sirelTD_is_float 54.5'."\n";
			$s_x=sirel_ix::arht_to_s($arht_1, 'debug_1');
			$b_ok=sirelLang::str1EqualsStr2($s_x, $s_expected);
			if($b_ok!=True) {
				$test_case['msg']='test Err1, $i=='.$i.
					"\n GUID='1138893d-5fb2-44fb-94f5-914121015dd7'";
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
	} // test_arht_to_s

//-------------------------------------------------------------------------

	private static function test_1_for_JumpGUID_presentation_demo() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$i_meaning_of_life=42; // some test code
			$b_test_failed=($i_meaning_of_life!=43);
			if($b_test_failed==True) {
				$test_case['msg']='test 1, '. // test # for humans to read
					'$i_meaning_of_life=='.$i_meaning_of_life.
					"\n GUID='8e4c7b66-57cb-475d-a7e6-914121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$i_space_odyssey=2001; // by Arthur C. Clarke
			$b_test_failed=($i_space_odyssey!=2002);
			if($b_test_failed==True) {
				$test_case['msg']='test 2, '. // test # for humans to read
					'$i_space_odyssey=='.$i_space_odyssey.
					"\n GUID='1e9c7b76-57cb-415d-a7e6-914121015dd7'";
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
	} // test_1_for_JumpGUID_presentation_demo


//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_has_keys();
			$ar_test_results[]=sirel_test_sirel_ix::test_assert_arht_keys();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_of_arht_2_arht_of_elemcounts();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_swap_keys_and_values();
			$ar_test_results[]=sirel_test_sirel_ix::test_arht_to_s();
			//$ar_test_results[]=sirel_test_sirel_ix::test_1_for_JumpGUID_presentation_demo();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_ix
//-------------------------------------------------------------------------
?>
