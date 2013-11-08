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

class sirel_test_sirel_units {

//-------------------------------------------------------------------------

	private static function test_sirel_units_b_unit_not_supported() {
		try {
			$test_result=array();
			$ar_tc=array();
//----tests-cases-start----------------------
			$s_unit='kg'; // A Si unit.
			$b=sirel_units::b_unit_not_supported($s_unit);
			if($b==True) {
				$test_case['msg']='$s_unit=="'.$s_unit.'" ';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_unit='g'; // A non-Si unit.
			$b=sirel_units::b_unit_not_supported($s_unit);
			if($b==True) {
				$test_case['msg']='$s_unit=="'.$s_unit.'" ';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$s_unit='ThisUnitCanNotPossiblyBeSupported';
			$b=sirel_units::b_unit_not_supported($s_unit);
			if($b==False) {
				$test_case['msg']='$s_unit=="'.$s_unit.'" ';
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			if(sirelSiteConfig::$debug_PHP) {
				$b_error_not_detected=True;
				try {
					$x=array();
					$b=sirel_units::b_unit_not_supported($x); // type not supported
				}catch (Exception $err_exception) {
					$b_error_not_detected=False;
				} // catch
				if($b_error_not_detected) {
					$test_case['msg']='typecheck 1';
					$test_case['line_number']=__LINE__;
					$ar_tc[]=$test_case;
				} // if
			} // if
//----tests-cases-end------------------------
			$test_result['test_cases']=$ar_tc;
			$test_result['file_name']=__FILE__;
			return $test_result;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='2b2248d4-3e85-4315-a22a-1070a0b0add7'");
		} // catch
	} // test_sirel_units_b_unit_not_supported
//-------------------------------------------------------------------------

	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_units::test_sirel_units_b_unit_not_supported();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble_t2($err_exception,
				" GUID='1e8dfb8a-58cc-4b1a-822a-1070a0b0add7'");
		} // catch
	} // selftest

//-------------------------------------------------------------------------
} // class sirel_test_sirel_units

//=========================================================================

