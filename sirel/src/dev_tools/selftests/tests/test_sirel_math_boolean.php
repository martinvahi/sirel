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
//------------------------------------------------------------------------

class sirel_test_sirel_math_boolean {

//-------------------------------------------------------------------------
	private static function test_conjunction_arht() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='d55602d1-1b0c-453f-8c11-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>False);
			$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			if($b_x!=False) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='e3e37632-1788-4397-a751-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>'f');
			$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			if($b_x!=False) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='d147e54a-a163-4194-ae24-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$arht_in=array('aa'=>'t','bb'=>42); // a nonboolean
				$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='test Err1, $b_x=='.$b_x.
					"\n GUID='910314ce-87be-43bd-bc74-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$arht_in=array('aa'=>'t','bb'=>'X'); // a nonboolean
				$b_x=sirel_math_boolean::conjunction_arht($arht_in,'aa','bb');
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='test Err2, $b_x=='.$b_x.
					"\n GUID='c73e11fa-13bf-4d00-a361-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$arht_in=array('bb'=>'t'); // OK
				$b_x=sirel_math_boolean::conjunction_arht($arht_in); // n_of_args<2
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='test Err3, $b_x=='.$b_x.
					"\n GUID='ca2f85cb-43aa-44a7-b5e3-b14121015dd7'";
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
	} // test_conjunction_arht

//-------------------------------------------------------------------------
	private static function test_disjunction_arht() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//The errorous situations are the same as they are
			// with the conjunction_arht. That's why they are not
			// retested here.

			$arht_in=array('aa'=>'f','bb'=>False);
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=False) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='885421ae-9c1b-416d-ad44-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>False);
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 2, $b_x=='.$b_x.
					"\n GUID='31b80a0b-06fb-4264-ae61-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>'f');
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 3, $b_x=='.$b_x.
					"\n GUID='95685de6-8d7e-4402-8181-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$arht_in=array('aa'=>'t','bb'=>'t');
			$b_x=sirel_math_boolean::disjunction_arht($arht_in,'aa','bb');
			if($b_x!=True) {
				$test_case['msg']='test 4, $b_x=='.$b_x.
					"\n GUID='54a1d46c-97de-43e2-8031-b14121015dd7'";
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
	} // test_disjunction_arht

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_math_boolean::test_conjunction_arht();
			$ar_test_results[]=sirel_test_sirel_math_boolean::test_disjunction_arht();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

} // class sirel_test_sirel_math_boolean


?>
