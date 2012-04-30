<?php
//=========================================================================
// Copyright 2010, martin.vahi@softf1.com that has an
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
//
// The only reason for creating a special function for string
// concatentation is to gain some speed by optimizing
// the amount of memory that the concatenation uses. Smaller
// amount of memory usage comes with a smaller probablility
// that data falls out of the CPU cache. There may also be
// some speed increase due to the need to allocate smaller
// chunks of memory for temporary strings, but that depends
// on the PHP implementation. 
// 
// The main idea behind the sirel text concatenation speed 
// optimization is to minimize the length of the temporary
// strings. The minimization is done by concating smaller
// strings frist. For example, if one were to concat 3 strings 
// a.length==999, b.length==2, c.length==10, then:
// 
// suboptimal:  s_tmp=concat(a,b); s_all_in_one=concat(s_tmp,c);
//              s_tmp.length==(999+2)==1001
//
// optimal:     s_tmp=concat(b,c); s_all_in_one=concat(a,s_tmp);
//              s_tmp.length==(2+10)==12
//
// The thing to notice is that the s_tmp is discharded after the
// concatenation of strings a,b,c.
//
// The speed differences can be measured by using the 
// ./dev_tools/php_language_tests/string_concatenation_speedtest
//
// The optimal solution to the strinc concatenatin problem here
// is analogous to a situaton, where one has literally strings
// of rope all lined up and then one starts to concact them by
// droping glue to their intersections in an order, where the 
// smallest intact or glued-together segments are connected before
// the longer intact or glued-together segments. The trick here is
// that as this whole operation is is done only to increase speed,
// one has to be careful with the amount of calculations and sorting,
// and the allocation of temporary variables, because they also
// have a computational or memory usage related cost.
//
//-------------------------------------------------------------------------
require_once('sirel_core.php');
//-------------------------------------------------------------------------
// It is just a namespace. Client code should use the
// function sirel_txt_concat_ar(...).
class sirel_text_concatenation_implementation {
	// Actually, I'm not so sure that it's
	// OK to use a class here, because the whole
	// string concatenation code here is for speed only.
	// But, currently it's just a stub, so it doesn't hurt.

	public static function something() {
		try {
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // something

	private static function something_else() {
		try {
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
					__CLASS__.'->'.__FUNCTION__.': ');
		} // catch
	} // something_else

} // class sirel_text_concatenation_implementation

//-------------------------------------------------------------------------
// Comments are after the license information at the start of
// the file that contains the implementation of this function.
function sirel_txt_concat_ar($ar_strings) {
	try {
		// TODO: write a real, speed-optimized,
		// implementation in here in stead of the
		// current, fake, one.
		$s_out='';
		$i_len=count($ar_strings);
		$x_elem=NULL;
		for($i=0;$i<$i_len;$i++) {
			$x_elem=$ar_strings[$i];
			$s_out=$s_out.$x_elem;
		} // for
		return $s_out;
	}catch (Exception $err_exception) {
		sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': ');
	} // catch
} // sirel_txt_concat_ar

//=========================================================================
?>
