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

class sirel_test_sirel_fs {

//-------------------------------------------------------------------------

	private static function test_arht_has_keys() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			/*
			$arht_in=array('aa'=>'t','bb'=>True);
			$b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			if($b_x!=True) {
				$test_case['msg']='test 1, $b_x=='.$b_x.
					"\n GUID='7a0730be-d338-4a25-82c4-126131318dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			*/
			//------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='afb16264-a838-4b7f-83c4-126131318dd7'");
		} // catch
	} // test_arht_has_keys

//-------------------------------------------------------------------------

	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_fs::test_arht_has_keys();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='c42efb85-2f76-4851-bdc4-126131318dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_fs
//-------------------------------------------------------------------------
?>
