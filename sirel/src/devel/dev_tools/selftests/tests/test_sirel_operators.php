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

function sirel_test_sirel_operators_operfunc_1($i) {
	$i_out=$i+4;
	return $i_out;
} // sirel_test_sirel_operators_operfunc1

function sirel_test_sirel_operators_operfunc_2($i,$ii) {
	$i_out=$i*$ii;
	return $i_out;
} // sirel_test_sirel_operators_operfunc1

function sirel_test_sirel_map_testfunc_1($i,$ii) {
	$i_out=$i+$ii+7;
	return $i_out;
} // sirel_test_sirel_map_testfunc_1

class sirel_test_sirel_operators {


	private static function test_1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$func1=NULL;
			$b_error_detected=False;
			$s_oper_name='sirel_test_sirel_operators_ooo1';
			try {
				$i=44;
				$func1='sirel_test_sirel_operators_operfunc_1';
				sirel_operators::declare_operator($func1,
						$s_oper_name,$i);
			}catch (Exception $err_exception) {
				$b_error_detected=True;
			} // catch
			if($b_error_detected==True) {
				$test_case['msg']='test Err1';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec($s_oper_name,50);
			if($i_x!=54) {
				$test_case['msg']='test Err2 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_oper_name2='sirel_test_sirel_operators_ooo2';
			$func1='sirel_test_sirel_operators_operfunc_2';
			sirel_operators::declare_operator($func1,
					$s_oper_name2,$i,33);
			$i_x=sirel_operators::exec($s_oper_name2,3,5);
			if($i_x!=15) {
				$test_case['msg']='test Err3 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec($s_oper_name,24);
			if($i_x!=28) {
				$test_case['msg']='test Err4 $i_x=='.$i_x;
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
	} // test_1

	private static function test_2() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$i_x=sirel_operators::exec('+',50,50);
			if($i_x!=100) {
				$test_case['msg']='test Err1 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('+',51.0,51.0);
			if($i_x!=102.0) {
				$test_case['msg']='test Err2 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('+',52.0,52);
			if($i_x!=104.0) {
				$test_case['msg']='test Err3 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('+',53,53.0);
			if($i_x!=106.0) {
				$test_case['msg']='test Err4 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if

			//-----
			$i_x=sirel_operators::exec('-',52,50);
			if($i_x!=2) {
				$test_case['msg']='test Err5 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('-',53.0,51.0);
			if($i_x!=2.0) {
				$test_case['msg']='test Err6 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('-',54.0,52);
			if($i_x!=2.0) {
				$test_case['msg']='test Err7 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('-',55,53.0);
			if($i_x!=2.0) {
				$test_case['msg']='test Err8 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if

			//-----
			$i_x=sirel_operators::exec('*',2,3);
			if($i_x!=6) {
				$test_case['msg']='test Err9 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('*',2.0,3.0);
			if($i_x!=6.0) {
				$test_case['msg']='test Err10 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('*',2.0,3);
			if($i_x!=6.0) {
				$test_case['msg']='test Err11 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('*',2,3.0);
			if($i_x!=6.0) {
				$test_case['msg']='test Err12 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if

			//-----
			$i_x=sirel_operators::exec('/',10,2);
			if($i_x!=5) {
				$test_case['msg']='test Err13 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',10.0,2.0);
			if($i_x!=5.0) {
				$test_case['msg']='test Err14 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',10.0,2);
			if($i_x!=5.0) {
				$test_case['msg']='test Err15 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',10,2.0);
			if($i_x!=5.0) {
				$test_case['msg']='test Err16 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i_x=sirel_operators::exec('/',7,2);
			if($i_x!=3.5) {
				$test_case['msg']='test Err17 $i_x=='.$i_x;
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
	} // test_2


	private static function test_3() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar=array(50,50);
			$i_x=sirel_operators::exec_ar('+',$ar);
			if($i_x!=100) {
				$test_case['msg']='test Err1 $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$b_operator_is_defined=sirel_operators::b_operator_defined_ar('+',$ar);
			if($b_operator_is_defined==False) {
				$test_case['msg']='test Err2 $b=='.$b_operator_is_defined;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$b_operator_is_defined=sirel_operators::b_operator_defined_ar('+====+XXThisPossiblYCANnotBe9',
					$ar);
			if($b_operator_is_defined) {
				$test_case['msg']='test Err3 $b=='.$b_operator_is_defined;
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
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // test_3

	private static function test_sirel_map_1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_1=array(50,42);
			$ar_results=func_sirel_map('+',$ar_1,3);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err1 $i_n=='.$i_n;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=53) {
				$test_case['msg']='test Err2 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=45) {
				$test_case['msg']='test Err3 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array(50,42);
			$ar_2=array(5,66);
			$ar_results=func_sirel_map('+',$ar_1,$ar_2);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err4 $i_n=='.$i_n;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=55) {
				$test_case['msg']='test Err5 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=108) {
				$test_case['msg']='test Err6 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array(2,5);
			$ar_2=array(3,7);
			$ar_results=func_sirel_map('sirel_test_sirel_map_testfunc_1',
					$ar_1,$ar_2);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err7 $i_n=='.$i_n;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=12) {
				$test_case['msg']='test Err8 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=19) {
				$test_case['msg']='test Err9 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array(2,5);
			$ar_2=array(3,7);
			$ar_of_ars=array($ar_1,$ar_2);
			$ar_results=func_sirel_map_ar('sirel_test_sirel_map_testfunc_1',
					$ar_of_ars);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err10 $i_n=='.$i_n;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[0];
			if($x!=12) {
				$test_case['msg']='test Err11 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results[1];
			if($x!=19) {
				$test_case['msg']='test Err12 $x=='.$x;
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
	} // test_sirel_map_1

	private static function test_sirel_map_htindexing() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar_1=array('aa'=>4,'bb'=>7);
			$ar_results=func_sirel_map('+',$ar_1,3);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err1 $i_n=='.$i_n;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['bb'];
			if($x!=10) {
				$test_case['msg']='test Err2 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['aa'];
			if($x!=7) {
				$test_case['msg']='test Err3 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_1=array('foo'=>42,'bar'=>71);
			$ar_2=array('foo'=>3,'bar'=>33);
			$ar_results=func_sirel_map('+',$ar_1,$ar_2);
			$i_n=count($ar_results);
			if($i_n!=2) {
				$test_case['msg']='test Err4 $i_n=='.$i_n;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['foo'];
			if($x!=45) {
				$test_case['msg']='test Err5 $x=='.$x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$x=$ar_results['bar'];
			if($x!=104) {
				$test_case['msg']='test Err6 $x=='.$x;
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
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // test_sirel_map_htindexing



	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_operators::test_1();
			$ar_test_results[]=sirel_test_sirel_operators::test_2();
			$ar_test_results[]=sirel_test_sirel_operators::test_3();
			$ar_test_results[]=sirel_test_sirel_operators::test_sirel_map_1();
			$ar_test_results[]=sirel_test_sirel_operators::test_sirel_map_htindexing();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

} // class sirel_test_sirel_operators


?>
