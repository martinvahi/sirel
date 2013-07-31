<?php
//=========================================================================
// Copyright (c) 2013, martin.vahi@softf1.com that has an
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

class sirel_test_db_postgresql {


	private static function ob_get_db_descriptor() {
		try {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				'Not yet implemented.'.
				"\nGUID=='17a45755-1b76-4ec6-a3b8-814121015dd7'");
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID=='5352470e-6407-416b-a4b8-814121015dd7'");
		} // catch
	} // ob_get_db_descriptor

	private static function b_db_is_accessible() {
		try {
			//$ob_db_descriptor=sirel_test_db_postgresql::ob_get_db_descriptor();
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				'Not yet implemented.'.
				"\nGUID=='43981311-0388-43ad-94b8-814121015dd7'");
			return false;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID=='17d246a4-f1bd-454d-a1b8-814121015dd7'");
		} // catch
	} // b_db_is_accessible

//-------------------------------------------------------------------------

	private static function test_db_connect() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$test_case['msg']='The class sirel_test_db_postgresql '.
				'is inclomplete and it should not be part of selftestss.'.
				"\nGUID=='3721db57-cd55-41e1-a1b8-814121015dd7'";
			$test_case['line_number']=__LINE__;
			$ar_tc[]=$test_case;
			//$ob_db_descriptor=sirel_test_db_postgresql::ob_get_db_descriptor();

			// $arht_in=array('aa'=>'t','bb'=>True);
			// $b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			// if($b_x!=True) {
			// $test_case['msg']='test 1, $b_x=='.$b_x;
			// $test_case['line_number']=__LINE__;
			// $ar_tc[]=$test_case;
			// } // if
			//------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // test_db_connect


	private static function test_init_filicle() {
		try {
			$test_result=array();
			$ar_tc=array();
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			//if (sirel_test_db_postgresql::b_db_is_accessible()!=True) {
			//	return $test_result;
			//} // if
			//sirel_test_db_postgresql::del_db_file_if_it_exists();
			//----tests-cases-start----------------------
			$test_case['msg']='The class sirel_test_db_postgresql '.
				'is inclomplete and it should not be part of selftestss.'.
				"\nGUID=='c0229840-703c-4baf-81b8-814121015dd7'";
			$test_case['line_number']=__LINE__;
			$ar_tc[]=$test_case;
			//$ob_db_descriptor=sirel_test_db_postgresql::ob_get_db_descriptor();

			// $arht_in=array('aa'=>'t','bb'=>True);
			// $b_x=sirel_ix::arht_has_keys($arht_in,'aa');
			// if($b_x!=True) {
			// $test_case['msg']='test 1, $b_x=='.$b_x;
			// $test_case['line_number']=__LINE__;
			// $ar_tc[]=$test_case;
			// } // if
			//------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // test_init_filicle

//-------------------------------------------------------------------------

	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_db_postgresql::test_db_connect();
			$ar_test_results[]=sirel_test_db_postgresql::test_init_filicle();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_db_postgresql
//=========================================================================
?>
