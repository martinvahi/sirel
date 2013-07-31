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


//-------------------------------------------------------------------------
class sirel_test_sirel_operators_set_1 {

//-------------------------------------------------------------------------
	private static function test_percentage_a_is_of_b() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='percentage_a_is_of_b';
			$op=sirel_operators::exec($s_oper_name,32,64);
			$fd_x=$op->value;
			if($fd_x!=50) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='23dc6e49-1231-4420-81cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$sb=$op->sb_failure;
			if($sb!='f') {
				$test_case['msg']='test Err1a $sb=='.$sb.
					"\n GUID='37af0924-d113-44ae-a2cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_oper_name='percentage_a_is_of_b';
			$op=sirel_operators::exec($s_oper_name,7.056,56);
			$fd_x=$op->value;
			if($fd_x!=12.6) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='70c37520-9f55-416c-a3cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$sb=$op->sb_failure;
			if($sb!='f') {
				$test_case['msg']='test Err2a $sb=='.$sb.
					"\n GUID='feecde15-0a03-477a-93cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_oper_name='percentage_a_is_of_b';
			$op=sirel_operators::exec($s_oper_name,7.056,0);
			$sb=$op->sb_failure;
			if($sb!='t') {
				$test_case['msg']='test Err3 $sb=='.$sb.
					"\n GUID='cc05ec1b-4a79-4f69-b4cf-b14121015dd7'";
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
	} // test_percentage_a_is_of_b

//-------------------------------------------------------------------------
	private static function test_to_fd() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$fd_x=sirel_operators::exec('to_fd','7')+2;
			if($fd_x!=9.0) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='3b661bd3-4e1f-441d-bbcf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=sirel_operators::exec('to_fd','23.7')+2;
			if($fd_x!=25.7) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='7fd20f11-1bec-4cd2-93cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=sirel_operators::exec('to_fd',21.1)+2;
			if($fd_x!=23.1) {
				$test_case['msg']='test Err3 $fd_x=='.$fd_x.
					"\n GUID='4f0cb11b-9f1b-45e1-b5cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=sirel_operators::exec('to_fd',41)+2;
			if($fd_x!=43.0) {
				$test_case['msg']='test Err4 $fd_x=='.$fd_x.
					"\n GUID='f89e3142-079a-4ec1-83cf-b14121015dd7'";
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
	} // test_to_fd

//-------------------------------------------------------------------------
	private static function test_to_fd_in_map() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$ar=array('42',55,3.3);
			$ar_x=func_sirel_map('to_fd',$ar);
			//-----
			$fd_x=$ar_x[0]+4;
			if($fd_x!=46) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='b9fb6d39-1da0-4bbb-92cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=$ar_x[1]+7.1;
			if($fd_x!=62.1) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='ecaccf4b-e5a8-4cad-b1cf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$fd_x=$ar_x[2]+2;
			if($fd_x!=5.3) {
				$test_case['msg']='test Err3 $fd_x=='.$fd_x.
					"\n GUID='72933a4a-9f78-4f44-82bf-b14121015dd7'";
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
	} // test_to_fd_in_map


//-------------------------------------------------------------------------
	private static function test_sirelOP_round_with_sb_failure_handling_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='sirelOP_round_with_sb_failure_handling_t1';
			$op=new sirelOP();
			$op->sb_failure='f';
			$op->value=7.5462;
			$op_x=sirel_operators::exec($s_oper_name,$op,1);
			$fd_x=$op_x->value;
			if($fd_x!=7.5) {
				$test_case['msg']='test Err1 $fd_x=='.$fd_x.
					"\n GUID='a7fc5230-61fb-43a9-91bf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$op_x=sirel_operators::exec($s_oper_name,$op,2);
			$fd_x=$op_x->value;
			if($fd_x!=7.55) {
				$test_case['msg']='test Err2 $fd_x=='.$fd_x.
					"\n GUID='16838d85-b866-44ea-b2bf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$op_x=sirel_operators::exec($s_oper_name,$op,0);
			$fd_x=$op_x->value;
			if($fd_x!=8.0) {
				$test_case['msg']='test Err3 $fd_x=='.$fd_x.
					"\n GUID='57b4e63f-0595-451f-94bf-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$op_x=sirel_operators::exec($s_oper_name,$op,3);
			$fd_x=$op_x->value;
			if($fd_x!=7.546) {
				$test_case['msg']='test Err4 $fd_x=='.$fd_x.
					"\n GUID='fc21c410-3260-40a7-95bf-b14121015dd7'";
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
	} // test_sirelOP_round_with_sb_failure_handling_t1

//-------------------------------------------------------------------------
	private static function test_replace_by_regex_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='replace_by_regex_t1';
			$s_regex='[b]{2}';
			$s_new='W';
			$s_hay='ybbaaa';
			$s_x=sirel_operators::exec($s_oper_name,$s_regex,$s_new,$s_hay);
			if($s_x!='yWaaa') {
				$test_case['msg']='test Err1 $s_x=='.$s_x.
					"\n GUID='8be11e1e-f7d4-4239-917f-b14121015dd7'";
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
	} // test_replace_by_regex_t1

//-------------------------------------------------------------------------
	private static function test_sirelOP_fd_to_s_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$s_oper_name='sirelOP_fd_to_s_t1';
			$op=new sirelOP();
			$op->value=2.47;
			$s_new_dot='W';
			$s_if_failure='ehee';
			$s_x=sirel_operators::exec($s_oper_name,$op,
				2,$s_if_failure,$s_new_dot);
			if($s_x!='ehee') {
				$test_case['msg']='test Err1 $s_x=='.$s_x.
					"\n GUID='2a7c0312-4e8d-46f2-927f-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$op->sb_failure='f';
			$s_x=sirel_operators::exec($s_oper_name,$op,
				2,$s_if_failure,$s_new_dot);
			if($s_x!='2W47') {
				$test_case['msg']='test Err2 $s_x=='.$s_x.
					"\n GUID='126a7cd3-c11c-4113-957f-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$op->sb_failure='f';
			$s_x=sirel_operators::exec($s_oper_name,$op,
				1,$s_if_failure,$s_new_dot);
			if($s_x!='2W5') {
				$test_case['msg']='test Err3 $s_x=='.$s_x.
					"\n GUID='a2bc5652-a8a1-4a2c-b36f-b14121015dd7'";
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
	} // test_sirelOP_fd_to_s_t1

//-------------------------------------------------------------------------
	private static function test_str_reverse() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_pile='Abc';
			$s_x=sirel_operators::exec('str_reverse',$s_pile);
			if($s_x!='cbA') {
				$test_case['msg']='test Err1 $s_x=='.$s_x.
					"\n GUID='2083cc3f-d02d-4b79-926f-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_pile='';
			$s_x=sirel_operators::exec('str_reverse',$s_pile);
			if($s_x!='') {
				$test_case['msg']='test Err2 $s_x=='.$s_x.
					"\n GUID='df439633-6529-4d7e-916f-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_pile='X';
			$s_x=sirel_operators::exec('str_reverse',$s_pile);
			if($s_x!='X') {
				$test_case['msg']='test Err3 $s_x=='.$s_x.
					"\n GUID='172fa9b4-397b-4d6c-b46f-b14121015dd7'";
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
	} // test_str_reverse

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_percentage_a_is_of_b();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_to_fd();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_to_fd_in_map();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_sirelOP_round_with_sb_failure_handling_t1();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_replace_by_regex_t1();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_sirelOP_fd_to_s_t1();
			$ar_test_results[]=sirel_test_sirel_operators_set_1::test_str_reverse();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

} // class sirel_test_sirel_operators_set_1


?>
