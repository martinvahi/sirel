<?php
//=========================================================================
// Copyright (c) 2012, martin.vahi@softf1.com that has an
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

class sirel_test_sirel_security_utilities {

	private static function test_1() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			// The reason, why lenghts 1,2,3 and "more"
			// have different tests is that internally
			// there can be (at least are in one of the versions)
			// optimization branches in either the
			// sirel_security_utilities::s_generate_random_ASCIIstyle_string(...)
			// or its sub-parts.
			//--------------------
			$i_expected=1;
			$s_x=sirel_security_utilities::s_generate_random_ASCIIstyle_string($i_expected);
			$i_x=mb_strlen($s_x);
			if($i_x!=$i_expected) {
				$test_case['msg']='$i_x=='.$i_x.
					' $i_expected=='.$i_expected.
					"\n GUID='2cb9ab58-c023-4fa7-83bb-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$i_expected=2;
			$s_x=sirel_security_utilities::s_generate_random_ASCIIstyle_string($i_expected);
			$i_x=mb_strlen($s_x);
			if($i_x!=$i_expected) {
				$test_case['msg']='$i_x=='.$i_x.
					' $i_expected=='.$i_expected.
					"\n GUID='f534231a-6ea8-4a72-b1bb-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$i_expected=3;
			$s_x=sirel_security_utilities::s_generate_random_ASCIIstyle_string($i_expected);
			$i_x=mb_strlen($s_x);
			if($i_x!=$i_expected) {
				$test_case['msg']='$i_x=='.$i_x.
					' $i_expected=='.$i_expected.
					"\n GUID='a2220af6-aa92-427d-95ab-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			$i_expected=300;
			$s_x=sirel_security_utilities::s_generate_random_ASCIIstyle_string($i_expected);
			$i_x=mb_strlen($s_x);
			if($i_x!=$i_expected) {
				$test_case['msg']='$i_x=='.$i_x.
					' $i_expected=='.$i_expected.
					"\n GUID='821bfc6f-f4ea-44a1-a3ab-b14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//--------------------
			//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // test_1


	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_security_utilities::test_1();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

} // class sirel_test_sirel_security_utilities

//=========================================================================

?>
