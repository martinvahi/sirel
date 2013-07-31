<?php
//------------------------------------------------------------------------
// Copyright (c) 2009, martin.vahi@softf1.com that has an
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

class sirel_test_sirel_type_normalizations {

	private static function test_to_i() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x='1,000';
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=1) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='33bc30a1-b42f-4def-ba14-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=1.000;
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=1) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='b5d2f5ad-9a33-4041-9a54-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=1.001;
				$i_x=sirel_type_normalizations::to_i($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 1 $x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='8a525a01-6f2a-40e6-8844-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=0;
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='e9f03a79-6ddf-4242-b944-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=(-3);
			$i_x=sirel_type_normalizations::to_i($x);
			if($i_x!=(-3)) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='5b651461-e29a-43a7-ac14-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=array();
				$i_x=sirel_type_normalizations::to_i($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 2 $x=="'.$x.
					'"  $i_x=='.$i_x.
					"\n GUID='35e5e0f4-48d4-4e9f-b344-c14121015dd7'";
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
	} // test_to_i

	private static function test_to_fd() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x='1.000'; // with a point
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='4f7844d4-ba08-4b35-ad14-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x='1,030'; // with a comma
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.03) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='145fc893-acdd-48dd-9e14-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=1.001; // a float
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.001) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='7504d1be-ecad-41e9-afc4-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=1; // an integer
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=1.0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='b40c9a76-4b59-41dd-8434-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=0;
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=0.0) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='d2e757a2-136a-47a6-9e43-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x='1.00,1'; // multiple points after replacement
				$i_x=sirel_type_normalizations::to_fd($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 1 $x=="'.$x.
					'"  $i_x=='.$i_x.
					"\n GUID='a480fa55-0d7a-44f7-b453-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=(-3);
			$i_x=sirel_type_normalizations::to_fd($x);
			if($i_x!=(-3.0)) {
				$test_case['msg']='$x=="'.$x.'"  $i_x=='.$i_x.
					"\n GUID='176ef5a1-e518-4ef6-8813-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=array();
				$i_x=sirel_type_normalizations::to_fd($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='errdetection 2 $x=="'.$x.
					'"  $i_x=='.$i_x.
					"\n GUID='28b9ca55-aa51-4bc5-8623-c14121015dd7'";
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

	private static function test_to_b() {
		try {
			$test_result=array();
			$ar_tc=array();
			//----tests-cases-start----------------------
			$x='t';
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=True) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='207dff23-7c89-42d2-8433-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x='f';
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='44f86143-0cf5-40dc-b923-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=True;
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=True) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='14029202-aedd-4cb3-8723-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$x=False;
			$b_x=sirel_type_normalizations::to_b($x);
			if($b_x!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='26fb42d1-d83c-4063-b753-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x='x'; // only 't' and 'b' have a meaning
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='f65e91d4-40d3-4172-bd23-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=''; // only 't' and 'b' have a meaning
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='4eb65542-6771-45f9-9743-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=0; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='f5eed0e0-20b2-4f54-a423-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=1; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='2e084b64-c142-4e00-a422-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=NULL; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='9cb0f44d-b41e-4edb-a322-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=1.0; // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='91e3d69e-903a-4580-ad22-c14121015dd7'";
				$test_case['line_number']=__LINE__;
				$ar_tc[]=$test_case;
			} // if
			//-----
			$b_error_not_detected=True;
			try {
				$x=array('t'=>'t'); // wrong type
				$b_x=sirel_type_normalizations::to_b($x);
			}catch (Exception $err_exception) {
				$b_error_not_detected=False;
			} // catch
			if($b_error_not_detected!=False) {
				$test_case['msg']='$x=="'.$x.'"  $b_x=='.$b_x.
					"\n GUID='85fa2774-bf43-4e0c-a432-c14121015dd7'";
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
	} // test_to_b


	public static function selftest() {
		try {
			$ar_test_results=array();
			$ar_test_results[]=sirel_test_sirel_type_normalizations::test_to_i();
			$ar_test_results[]=sirel_test_sirel_type_normalizations::test_to_fd();
			$ar_test_results[]=sirel_test_sirel_type_normalizations::test_to_b();
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // selftest

} // class sirel_test_sirel_type_normalizations

?>
