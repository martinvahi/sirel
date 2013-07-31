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
//=========================================================================


class sirel_test_sirel_cg_set_1 {

//-------------------------------------------------------------------------

	private static function test_s_img_fp_2_armoured_img_tag() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$s_path_lib_sirel=constant('s_path_lib_sirel');
			$s_fp_datadir=$s_path_lib_sirel.'/src/dev_tools'.
				'/selftests/data_for_tests';
			//------------------
			$s_fp=$s_fp_datadir.
				'/2009_summer_Tallinn_Freedom_Square_1.jpg';
			$s_x=sirel_cg_set_1::s_img_fp_2_armoured_img_tag($s_fp);
			if(mb_strlen($s_x)<300) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='f8012027-8ab4-4849-a380-a21150b06dd7'";
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
	} // test_s_img_fp_2_armoured_img_tag

//-------------------------------------------------------------------------

	private static function test_s_txt_2_verbatim_html() {
		try {
			$test_result=array();
			$ar_tc=array();
			$s_rgx='[\n]';
			$s_lc_emptystring='';
			//----tests-cases-start----------------------
			$s_in='&';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre>&amp;</pre>') {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='13cd5059-bd56-450b-8180-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			$s_in='&;';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre>&amp;&semi;</pre>') {
				$test_case['msg']='test 2, $s_x=='.$s_x.
					"\n GUID='4021d3d5-5a18-4304-b580-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			$s_in=';';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre>&semi;</pre>') {
				$test_case['msg']='test 3, $s_x=='.$s_x.
					"\n GUID='5fcb1e95-018e-4120-8480-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			$s_in='';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre></pre>') {
				$test_case['msg']='test 4, $s_x=='.$s_x.
					"\n GUID='5fa2c9a0-93be-42c7-9180-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			$s_in='<';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre>&lt;</pre>') {
				$test_case['msg']='test 5, $s_x=='.$s_x.
					"\n GUID='5397e662-4e48-47da-a180-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			$s_in='>';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre>&gt;</pre>') {
				$test_case['msg']='test 6, $s_x=='.$s_x.
					"\n GUID='5ca17529-a264-4182-9570-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			$s_in='<>';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre>&lt;&gt;</pre>') {
				$test_case['msg']='test 7, $s_x=='.$s_x.
					"\n GUID='2006e948-c3ff-4818-8470-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			$s_in='"';
			$s_x=sirel_cg_set_1::s_txt_2_verbatim_html($s_in);
			$s_x=mb_ereg_replace($s_rgx,$s_lc_emptystring,$s_x);
			if($s_x!='<pre>&quot;</pre>') {
				$test_case['msg']='test 8, $s_x=='.$s_x.
					"\n GUID='3132628f-1d0c-49b2-8470-a21150b06dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//------------------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // test_s_txt_2_verbatim_html

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
			$s_x=sirel_cg_set_1::s_js_fp_2_embedded_js_script_tag($s_fp);
			if(mb_strlen($s_x)<10) {
				$test_case['msg']='test 1, $s_x=='.$s_x.
					"\n GUID='9712fb40-677a-4289-8370-a21150b06dd7'";
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
	} // test_s_js_fp_2_embedded_js_script_tag

//-------------------------------------------------------------------------

	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_cg_set_1::test_s_img_fp_2_armoured_img_tag();
			$ar_test_results[]=sirel_test_sirel_cg_set_1::test_s_txt_2_verbatim_html();
			$ar_test_results[]=sirel_test_sirel_cg_set_1::test_s_js_fp_2_embedded_js_script_tag();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='7679ac65-e8ca-46b2-b370-a21150b06dd7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_cg_set_1
//=========================================================================
?>
