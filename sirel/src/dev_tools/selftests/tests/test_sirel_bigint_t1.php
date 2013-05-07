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

class sirel_test_sirel_bigint_t1 {
//-------------------------------------------------------------------------
	private static function test_ar_int2baseX() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ar_x=sirel_operators::exec('ar_int2baseX',2,2);
			if(count($ar_x)!=2) {
				$test_case['msg']='test Err1, count($ar_x)=='.count($ar_x);
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[0];
			if($i_x!=0) {
				$test_case['msg']='test Err2, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[1];
			if($i_x!=1) {
				$test_case['msg']='test Err3, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_x=sirel_operators::exec('ar_int2baseX',0,2);
			if(count($ar_x)!=1) {
				$test_case['msg']='test Err4, count($ar_x)=='.count($ar_x);
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[0];
			if($i_x!=0) {
				$test_case['msg']='test Err5, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_x=sirel_operators::exec('ar_int2baseX',5,2);
			if(count($ar_x)!=3) {
				$test_case['msg']='test Err6, count($ar_x)=='.count($ar_x);
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[0];
			if($i_x!=1) {
				$test_case['msg']='test Err7, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[1];
			if($i_x!=0) {
				$test_case['msg']='test Err8, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[2];
			if($i_x!=1) {
				$test_case['msg']='test Err9, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_x=sirel_operators::exec('ar_int2baseX',2,3);
			if(count($ar_x)!=1) {
				$test_case['msg']='test Err10, count($ar_x)=='.count($ar_x);
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[0];
			if($i_x!=2) {
				$test_case['msg']='test Err11, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ar_x=sirel_operators::exec('ar_int2baseX',5,3);
			if(count($ar_x)!=2) {
				$test_case['msg']='test Err12, count($ar_x)=='.count($ar_x);
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[0];
			if($i_x!=2) {
				$test_case['msg']='test Err13, $i_x=='.$i_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$i_x=$ar_x[1];
			if($i_x!=1) {
				$test_case['msg']='test Err14, $i_x=='.$i_x;
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
	} // test_ar_int2baseX

//-------------------------------------------------------------------------
	private static function test_BigInt_t1_instantiation() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$i=7;
			$ibi_x=new sirel_BigInt_t1($i);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='111') {
				$test_case['msg']='test Err1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i=(-1);
			$ibi_x=new sirel_BigInt_t1($i);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='1') {
				$test_case['msg']='test Err3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i=0;
			$ibi_x=new sirel_BigInt_t1($i);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='0') {
				$test_case['msg']='test Err5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err6, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s='101';
			$s_sign='+';
			$ibi_x=new sirel_BigInt_t1($s,$s_sign);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='101') {
				$test_case['msg']='test Err7, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err8, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s='0000';
			$s_sign='-';
			$ibi_x=new sirel_BigInt_t1($s,$s_sign);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='0') {
				$test_case['msg']='test Err9, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err10, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s='0010110';
			$s_sign='-';
			$ibi_x=new sirel_BigInt_t1($s,$s_sign);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='10110') {
				$test_case['msg']='test Err11, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err12, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s='10';
			$s_sign='-';
			$ibi_1=new sirel_BigInt_t1($s,$s_sign);
			$ibi_x=new sirel_BigInt_t1($ibi_1);
			$i=44;
			$ibi_1->set_value($i);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='10') {
				$test_case['msg']='test Err13, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err14, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_1_gnu=gmp_init('-101',2);
			$ibi_x=new sirel_BigInt_t1($ibi_1_gnu);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='101') {
				$test_case['msg']='test Err15, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err16, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_1_gnu=gmp_init('11',2);
			$ibi_x=new sirel_BigInt_t1($ibi_1_gnu);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='11') {
				$test_case['msg']='test Err17, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err18, $s_x=='.$s_x;
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
	} // test_BigInt_t1_instantiation

//-------------------------------------------------------------------------
	private static function test_BigInt_t1_add() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ibi_a=new sirel_BigInt_t1(3);
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_b->add($ibi_a);
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='111') {
				$test_case['msg']='test Err1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i=(-3);
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_b->add($i);
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='1') {
				$test_case['msg']='test Err3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(-6);
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_b->add($ibi_a);
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='10') {
				$test_case['msg']='test Err5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err6, $s_x=='.$s_x;
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
	} // test_BigInt_t1_add

//-------------------------------------------------------------------------
	private static function test_BigInt_t1_mul() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ibi_a=new sirel_BigInt_t1(3);
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_b->mul($ibi_a);
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='1100') {
				$test_case['msg']='test Err1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$i=(-3);
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_b->mul($i);
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='1100') {
				$test_case['msg']='test Err3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(-6);
			$ibi_b=new sirel_BigInt_t1(-4);
			$ibi_b->mul($ibi_a);
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='11000') {
				$test_case['msg']='test Err5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err6, $s_x=='.$s_x;
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
	} // test_BigInt_t1_mul

//-------------------------------------------------------------------------
	private static function test_BigInt_t1_neg() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_b->neg();
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='100') {
				$test_case['msg']='test Err1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_b=new sirel_BigInt_t1(0);
			$ibi_b->neg();
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='0') {
				$test_case['msg']='test Err3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_b=new sirel_BigInt_t1(-5);
			$ibi_b->neg();
			$s_x=$ibi_b->s_get_absolute_value_in_base_2();
			if($s_x!='101') {
				$test_case['msg']='test Err5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_b->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err6, $s_x=='.$s_x;
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
	} // test_BigInt_t1_neg

//-------------------------------------------------------------------------
	private static function test_BigInt_t1_operator_plus() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ibi_a=new sirel_BigInt_t1(4);
			$ibi_x=sirel_operators::exec('+',$ibi_a,5);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='1001') {
				$test_case['msg']='test Err1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(1);
			$ibi_x=sirel_operators::exec('+',3,$ibi_a);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='100') {
				$test_case['msg']='test Err3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(-5);
			$ibi_x=sirel_operators::exec('+',$ibi_a,$ibi_a);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='1010') {
				$test_case['msg']='test Err5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err6, $s_x=='.$s_x;
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
	} // test_BigInt_t1_operator_plus

//-------------------------------------------------------------------------
	private static function test_BigInt_t1_operator_minus() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ibi_a=new sirel_BigInt_t1(8);
			$ibi_x=sirel_operators::exec('-',$ibi_a,5);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='11') {
				$test_case['msg']='test Err1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(8);
			$ibi_x=sirel_operators::exec('-',3,$ibi_a);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='101') {
				$test_case['msg']='test Err3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(5);
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_x=sirel_operators::exec('-',$ibi_a,$ibi_b);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='1') {
				$test_case['msg']='test Err5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err6, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(5);
			$ibi_x=sirel_operators::exec('-',$ibi_a,5);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='0') {
				$test_case['msg']='test Err7, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err8, $s_x=='.$s_x;
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
	} // test_BigInt_t1_operator_minus

//-------------------------------------------------------------------------
	private static function test_BigInt_t1_operator_star() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			//-----
			$ibi_a=new sirel_BigInt_t1(3);
			$ibi_x=sirel_operators::exec('*',$ibi_a,5);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='1111') {
				$test_case['msg']='test Err1, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err2, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(-2);
			$ibi_x=sirel_operators::exec('*',3,$ibi_a);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='110') {
				$test_case['msg']='test Err3, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='-') {
				$test_case['msg']='test Err4, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$ibi_a=new sirel_BigInt_t1(5);
			$ibi_b=new sirel_BigInt_t1(4);
			$ibi_x=sirel_operators::exec('*',$ibi_a,$ibi_b);
			$s_x=$ibi_x->s_get_absolute_value_in_base_2();
			if($s_x!='10100') {
				$test_case['msg']='test Err5, $s_x=='.$s_x;
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			$s_x=$ibi_x->s_get_sign();
			if($s_x!='+') {
				$test_case['msg']='test Err6, $s_x=='.$s_x;
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
	} // test_BigInt_t1_operator_star

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_ar_int2baseX();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_BigInt_t1_instantiation();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_BigInt_t1_add();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_BigInt_t1_mul();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_BigInt_t1_neg();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_BigInt_t1_operator_plus();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_BigInt_t1_operator_minus();
			$ar_test_results[]=sirel_test_sirel_bigint_t1::test_BigInt_t1_operator_star();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest
//-------------------------------------------------------------------------
} // sirel_test_sirel_bigint_t1

//-------------------------------------------------------------------------
?>
