<?php
//------------------------------------------------------------------------
// Copyright (c) 2009, martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// All rights reserved.
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
//
//------------------------------------------------------------------------
// This file is part of the sirel_core.php and should be
// used only by using "require_once('sirel_core.php')".
//
// Practically this file is a small collection of OS independent
// versions of some of the most common UNIX console tools,
// but it is not limited to that.
//------------------------------------------------------------------------


// The reason for such an old fashioned approach is that there's
// no function pointers in PHP5. The "exec('funcname(plapla)')"
// won't help, because it won't return anything, unless one
// starts to save the result to some intermediary location, like
// memcached, database, file, etc.
interface sirelCompareWrapper {
	// Returns True, if $a<$b. It is important that it
	// uses the "<" opearator in stead of the "<=" operator.
	public function compare(&$a,&$b);
} // interface sirelCompareWrapper

// It's meant to be used with the sirelUtils::sort2columnTable(...).
// The STD comes from the fact that it's good enough for anything
// that has the standard "<" operator defined.
//
// TODO: refactor the architecture to use the existing operator framework.
//       The operator operator is a function and has a string 
//       representation.
class  sirelCompareWrapperSTD implements sirelCompareWrapper {
	public function compare(&$a,&$b) {
		if($a<$b) {
			return True;
		}
		return False;
	} // compare
} // class  sirelCompareWrapperSTD


// The PHP namespaces are just plain hassleing. So, this class is a
//  namespace. :-)
class sirelUtils {

	// Quick-sorts the table according to the first column, which is
	// sirelPair->a_. The $compare_func_wrapper is a class that
	// implements the sirelCompareWrapper interface. An usage demo:
	//
	// $ar=array();
	// $ar[]=new sirelPair(4,'four');
	// $ar[]=new sirelPair(2,'two');
	// $ar[]=new sirelPair(3,'three');
	// $ar[]=new sirelPair(2,'two');
	// $cmprer=new sirelCompareWrapperSTD();
	// echo '<br/>Unsorted input is: ';
	// foreach ($ar as $x){
	//     echo $x->a_.' '.$x->b_.'   |';
	// }
	// sirelUtils::sort2columnTable($ar,$cmprer);
	// echo '<br/>The sorted output is: ';
	// foreach ($ar as $x){
	//     echo $x->a_.' '.$x->b_.'   |';
	// }
	public static function sort2columnTable(&$array_of_sirelPairs,
			&$compare_func_wrapper) {
		$ar=&$array_of_sirelPairs;
		$cnt=count($ar);
		if($cnt<2) {
			return ;
		}
		$upper=array();
		$lower=array();
		$divide=$ar[0]->a_;
		$divide_pair=$ar[0];
		$max=$divide;
		$min=$divide;
		$all_equal=True;
		for($i=1;$i<$cnt;$i++) {
			;
			$pair=$ar[$i];
			if($compare_func_wrapper->compare($pair->a_,$divide)) {
				$lower[]=$pair;
				$min=$pair->a_;
			} else {
				$upper[]=$pair;
				if($compare_func_wrapper->compare($divide,$pair->a_)) {
					$max=$pair->a_;
				} // if
			} // else
		} //for
		if($max==$min) {
			// There's nothing to sort. All of the elements in the initial
			// array were equal.
			return;
		}
		sirelUtils::sort2columnTable($upper,$compare_func_wrapper);
		sirelUtils::sort2columnTable($lower,$compare_func_wrapper);
		$cnt1=count($upper);
		$cnt=0;
		$b=True;
		if($max==$divide) {
			$ar[$cnt++]=$divide_pair;
			$b=False;
		}
		for($i=0;$i<$cnt1;$i++) {
			$ar[$cnt++]=$upper[$i];
		} // for
		if(($min<$divide)&&$b) {
			$ar[$cnt++]=$divide_pair;
			$b=False;
		}
		$cnt1=count($lower);
		for($i=0;$i<$cnt1;$i++) {
			$ar[$cnt++]=$lower[$i];
		} // for
		if($b) {
			$ar[$cnt++]=$divide_pair;
		}
	} // sirelSort2columnTable


	private static function fileperms_unix_h1($key,$bitinteger,
			&$file_perms, &$ar) {
		if(0<($file_perms&$bitinteger)) {
			$ar[$key]=True;
		} else {
			$ar[$key]=False;
		} // else
	} // fileperms_unix_h1

	private static function fileperms_unix(&$file_path) {
		$fp=fileperms($file_path);
		$answer=array();
		sirelUtils::fileperms_unix_h1('everybody_execute',1,$fp,$answer);
		sirelUtils::fileperms_unix_h1('everybody_write',2,$fp,$answer);
		sirelUtils::fileperms_unix_h1('everybody_read',4,$fp,$answer);
		sirelUtils::fileperms_unix_h1('group_execute',8,$fp,$answer);
		sirelUtils::fileperms_unix_h1('group_write',16,$fp,$answer);
		sirelUtils::fileperms_unix_h1('group_read',32,$fp,$answer);
		sirelUtils::fileperms_unix_h1('owner_execute',64,$fp,$answer);
		sirelUtils::fileperms_unix_h1('owner_write',128,$fp,$answer);
		sirelUtils::fileperms_unix_h1('owner_read',256,$fp,$answer);
		return $answer;
	} //fileperms_unix

	// It's a wrapper to the PHP built-in fileperms() function.
	// Returns an array of booleans. Each of
	// them is a single character string from set {r,w,x,-}.
	// If the result is in array r, then the keys are:
	// {everybody_execute, everybody_write, everybody_read,
	//  group_execute, group_write, group_read, owner_execute,
	//  owner_write, owner_read}
	public static function fileperms($file_path) {
		switch (sirelSiteConfig::$operating_system) {
			case 'unix':
				return sirelUtils::fileperms_unix($file_path);
				break;
			case 'windows':
				throw new Exception(__CLASS__.'->'.__FUNCTION__.
						" needs to be tested for Windows first. The unix ".
						"version of it will probably work without modification. ");
				break;
			default:
				throw new Exception(__CLASS__.'->'.__FUNCTION__.
						": operating system ".sirelSiteConfig::$operating_system.
						" is not yet supported by this method. ");
				break;
		} // switch
	} // fileperms


	private static function uid_unix() {
		$s=exec('id ;');
		return substr($s, 4, mb_strpos($s,'(',3)-4);
	} // uid_unix

	private static function uid_windows() {
		throw new Exception(__CLASS__.'->'.__FUNCTION__.
				' has not been implemented yet. ');
	} // uid_windows

	// Returns the operating system user ID.
	public static function uid() {
		switch (sirelSiteConfig::$operating_system) {
			case 'unix':
				return sirelUtils::uid_unix();
				break;
			case 'windows':
				return sirelUtils::uid_windows();
				break;
			default:
				throw new Exception(__CLASS__.'->'.__FUNCTION__.
						": operating system ".sirelSiteConfig::$operating_system.
						" is not yet supported by this method. ");
				break;
		} // switch
	} // uid

	// Returns a string.
	public static function s_concat_array_of_strings(&$ar_strings) {
		$i_n=count($ar_strings);
		if($i_n<3) {
			if($i_n==2) {
				$s_out=$ar_strings[0].$ar_strings[1];
				return $s_out;
			} else {
				if($i_n==1) {
					// For the sake of consistency one
					// wants to make sure that the returned
					// string instance always differs from those
					// that are within the $ar_strings.
					$s_out=''.$ar_strings[0];
					return $s_out;
				} else { // $i_n==0
					$s_out='';
					return $s_out;
				} // else
			} // else
		} // if
		$s_out=''; // needs to be inited to the ''

		//if(False) {
		//// The classic part for testing and playing.
		//$i_len=count($ar_strings);
		//for($i=0;$i<$i_len;$i++) {
		//$s_out=$s_out.$ar_strings[$i];
		//} // for
		//return $s_out;
		//} // if

		// In its essence the rest of the code here implements
		// a tail-recursive version of this function. The idea is that
		//
		// s_out='something_very_long'.'short_string_1'.short_string_2';
		// uses a temporary string of length
		// 'something_very_long'.'short_string_1'
		// but
		// s_out='something_very_long'.('short_string_1'.short_string_2');
		// uses a much more CPU-cache friendly temporary string of length
		// 'short_string_1'.short_string_2';
		//
		// Believe it or not, but the speed difference
		// in PHP is at least about 20% and in Ruby about 50%.
		// Please do not take my word on it. Try it out yourself by
		// modifying this function and assembling strings of length
		// 10000 from single characters.
		//
		// This here  is not the most optimal solution, because
		// within the more optimal solution the order of
		// "concatenation glue placements" depends on the lengths
		// of the tokens/strings, but the analysis and "glueing queue"
		// assembly also has a computational cost.
		$arht_1=&$ar_strings;
		$arht_2=array();
		$b_take_from_arht_1=True;
		$b_not_ready=True;
		$i_reminder=NULL;
		$i_loop=NULL;
		$i_arht_in_len=NULL;
		$i_arht_out_len=0; // code after the while loop needs a number
		$s_1=NULL;
		$s_2=NULL;
		$s_3=NULL;
		$i_2=NULL;
		while($b_not_ready) {
			// The next if-statement is to avoid copying temporary
			// strings between the $arht_1 and the $arht_2.
			if($b_take_from_arht_1) {
				$i_arht_in_len=count($arht_1);
				$i_reminder=$i_arht_in_len%2;
				$i_loop=($i_arht_in_len-$i_reminder)/2;
				for($i=0;$i<$i_loop;$i++) {
					$i_2=$i*2;
					$s_1=$arht_1[$i_2];
					$s_2=$arht_1[$i_2+1];
					$s_3=$s_1.$s_2;
					$arht_2[]=$s_3;
				} // for
				if($i_reminder==1) {
					$s_3=$arht_1[$i_arht_in_len-1];
					$arht_2[]=$s_3;
				} // if
				$i_arht_out_len=count($arht_2);
				if(1<$i_arht_out_len) {
					$arht_1=array();
				} else {
					$b_not_ready=False;
				} // else
			} else { // $b_take_from_arht_1==False
				$i_arht_in_len=count($arht_2);
				$i_reminder=$i_arht_in_len%2;
				$i_loop=($i_arht_in_len-$i_reminder)/2;
				for($i=0;$i<$i_loop;$i++) {
					$i_2=$i*2;
					$s_1=$arht_2[$i_2];
					$s_2=$arht_2[$i_2+1];
					$s_3=$s_1.$s_2;
					$arht_1[]=$s_3;
				} // for
				if($i_reminder==1) {
					$s_3=$arht_2[$i_arht_in_len-1];
					$arht_1[]=$s_3;
				} // if
				$i_arht_out_len=count($arht_1);
				if(1<$i_arht_out_len) {
					$arht_2=array();
				} else {
					$b_not_ready=False;
				} // else
			} // else
			$b_take_from_arht_1=!$b_take_from_arht_1;
		} // while
		if($i_arht_out_len==1) {
			if($b_take_from_arht_1) {
				$s_out=$arht_1[0];
			} else {
				$s_out=$arht_2[0];
			} // else
		}else {
			// The $s_out has been inited to ''.
			if(0<$i_arht_out_len) {
				throw(new Exception('This function is flawed.'));
			} // else
		} // else
		return $s_out;
	} // s_concat_array_of_strings

} // class sirelUtils

?>
