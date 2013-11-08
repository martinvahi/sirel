<?php
//=========================================================================
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

class sirel_test_sirel_htmlcg_funcset_1 {

//-------------------------------------------------------------------------

	private static function test_s_html_reference_local_CSS_files_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_fp_datadir="./data_for_tests/set_of_css_files_1";
			//--------------------------
			$s_x=sirel_htmlcg_funcset_1::s_html_reference_local_CSS_files_t1($s_fp_datadir);
			// The order of the CSS files is random, which
			// makes it inpractical to exactly
			// test for the combined output.
			//------
			$s_x=sirel_htmlcg_funcset_1::s_html_reference_local_CSS_files_t1($s_fp_datadir.
				'/aa.css');
			$s_expected='<link rel="stylesheet" '.
				'href="./data_for_tests/set_of_css_files_1/aa.css" '.
				'type="text/css">'."\n";
			if($s_x!=$s_expected) {
				$test_case['msg']='test 1, '.
					"\n".'________$s_x=='.
					sirel_adhoc_funcset_t1::s_textfilter_t1($s_x).
					"\n".'$s_expected=='.
					sirel_adhoc_funcset_t1::s_textfilter_t1($s_expected).
					"\n GUID='c4604e49-26e3-4cce-85d5-8111d080bdd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------
			$s_x=sirel_htmlcg_funcset_1::s_html_reference_local_CSS_files_t1($s_fp_datadir.
				'/bb.css');
			$s_expected='<link rel="stylesheet" '.
				'href="./data_for_tests/set_of_css_files_1/bb.css" '.
				'type="text/css">'."\n";
			if($s_x!=$s_expected) {
				$test_case['msg']='test 2, '.
					"\n".'________$s_x=='.
					sirel_adhoc_funcset_t1::s_textfilter_t1($s_x).
					"\n".'$s_expected=='.
					sirel_adhoc_funcset_t1::s_textfilter_t1($s_expected).
					"\n GUID='3c4b44ef-2abe-44b8-81d5-8111d080bdd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='8812b23f-f385-4941-a2d5-8111d080bdd7'");
		} // catch
	} // test_s_html_reference_local_CSS_files_t1

//-------------------------------------------------------------------------

	private static function test_s_html_inline_local_CSS_files_t1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_fp_datadir="./data_for_tests/set_of_css_files_1";
			//--------------------------
			$s_x=sirel_htmlcg_funcset_1::s_html_reference_local_CSS_files_t1($s_fp_datadir);
			// The order of the CSS files is random, which
			// makes it inpractical to exactly
			// test for the combined output.
			//------
			$s_x=sirel_htmlcg_funcset_1::s_html_inline_local_CSS_files_t1($s_fp_datadir.
				'/aa.css');
			$s_lc_1='<style type="text/css">'."\n";
			$s_lc_2='</style>'."\n";
			$s_expected=$s_lc_1." \n \n\n".$s_lc_2;
			if($s_x!=$s_expected) {
				$test_case['msg']='test 1, '.
					"\n".'________$s_x=='.
					sirel_adhoc_funcset_t1::s_textfilter_t1($s_x).
					"\n".'$s_expected=='.
					sirel_adhoc_funcset_t1::s_textfilter_t1($s_expected).
					"\n GUID='91672a17-31bd-4e36-91c5-8111d080bdd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------------
			$s_x=sirel_htmlcg_funcset_1::s_html_inline_local_CSS_files_t1($s_fp_datadir.
				'/');
			if(mb_strlen($s_x)<mb_strlen($s_expected)) {
				$test_case['msg']='test 2, '.
					"\n".'________$s_x=='.
					sirel_adhoc_funcset_t1::s_textfilter_t1($s_x).
					"\n GUID='a5659b58-b222-4a79-b4c5-8111d080bdd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='23b929b2-6d92-498a-b1c5-8111d080bdd7'");
		} // catch
	} // test_s_html_inline_local_CSS_files_t1

//-------------------------------------------------------------------------

	private static function test_s_js_fp_2_embedded_js_script_tag() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_path_lib_sirel=constant('s_path_lib_sirel');
			$s_fp_datadir=$s_path_lib_sirel.'/src/dev_tools'.
				'/selftests/data_for_tests';
			//------------------
			$s_fp=$s_fp_datadir.'/test_x1.js';
			$s_x=sirel_htmlcg_funcset_1::s_js_fp_2_embedded_js_script_tag($s_fp);
			if(mb_strlen($s_x)<10) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='a3191fd9-de07-44dc-acc5-8111d080bdd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='4130e188-deb0-433e-aac5-8111d080bdd7'");
		} // catch
	} // test_s_js_fp_2_embedded_js_script_tag

//-------------------------------------------------------------------------
	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_htmlcg_funcset_1::test_s_html_reference_local_CSS_files_t1();
			$ar_test_results[]=sirel_test_sirel_htmlcg_funcset_1::test_s_html_inline_local_CSS_files_t1();
			$ar_test_results[]=sirel_test_sirel_htmlcg_funcset_1::test_s_js_fp_2_embedded_js_script_tag();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='35734c6e-36c6-4e38-94c5-8111d080bdd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_htmlcg_funcset_1

//=========================================================================

