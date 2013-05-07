<?php
//-------------------------------------------------------------------------
// Copyright (c) 2013, martin.vahi@softf1.com that has an
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
//-------------------------------------------------------------------------

require_once('sirel_lang.php');

//
// http://longterm.softf1.com/specifications/progfte/
//
class sireProgFTE {

	private static $b_ProgFTE_v0_src_loaded=FALSE;
	private static $b_ProgFTE_v1_src_loaded=FALSE;

	// ProgFTE(Programmer Friendly Text Exchange) is a way to
	// serialize a hashtable that has strings as its keys and strings as
	// its values. The format in brief:
	// <number of hashtable entries>|||<triplepillars substitution string>|||<keyX>|||<valueX>|||<keyY>|||<valueY>|||etc.
	public static function ht2ProgFTE(&$arht_in) {
		try {
			if (sirelSiteConfig::$debug_PHP) {
				sirelLang::assert_type_CSL_free(__FILE__,
					__LINE__, __CLASS__, __FUNCTION__,
					'sirelTD_is_array', $arht_in);
				$keys=array_keys($arht_in);
				$x_value=null;
				foreach ($keys as $x_key) {
					$x_value=$arht_in[$x_key];
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__,__FUNCTION__,
						'sirelTD_is_mbstring', $x_key);
					sirelLang::assert_type_CSL_free(__FILE__,
						__LINE__, __CLASS__,__FUNCTION__,
						'sirelTD_is_mbstring', $x_value);
				} // foreach
			} // if
			if(sireProgFTE::$b_ProgFTE_v1_src_loaded==FALSE) {
				$s_path_lib_sirel=constant('s_path_lib_sirel');
				require_once($s_path_lib_sirel.'/src/src'.
						'/bonnet/sirel_progfte_v1.php');
				sireProgFTE::$b_ProgFTE_v1_src_loaded=TRUE;
			} // if
			$s_progte=sirelLang::ht2ProgFTE_v1_impl($arht_in);
			return $s_progte;
		} catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='3b036285-07eb-44c2-8543-6043b0914dd7'\n");
		} // catch
	} // ht2ProgFTE

	public static function htOfht_2ProgFTE(&$hashtable_of_hashtables) {
		try {
			$keys=array_keys($hashtable_of_hashtables);
			$elem_ht;
			$arht_sprogftes=array();
			foreach($keys as $key) {
				$elem_ht=$hashtable_of_hashtables[$key];
				$arht_sprogftes[$key]=sirelLang::ht2ProgFTE($elem_ht);
			} // foreach
			$s_progte=sireProgFTE::ht2ProgFTE($arht_sprogftes);
			return $s_progte;
		} catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='f5030812-bc42-4516-9443-6043b0914dd7'\n");
		} // catch
	} // htOfht_2ProgFTE

//-------------------------------------------------------------------------

	public static function ProgFTE2ht(&$s_progfte_candidate) {
		try {
			$s_singlepillar='|';
			$ar_0=sirelLang::snatchNtimes($s_progfte_candidate,
				$s_singlepillar, 1);
			$s_0=$ar_0[0]; // v[\d]+ or [\d]+
			$s_1=sirelLang::s_sar($s_0, 0, 1);
			$arht_out=NULL;
			if (sirelLang::str1EqualsStr2($s_1, 'v')==True) {
				$s_1=sirelLang::s_sar_rubystyle($s_0, 1,(-1));
				if (sirelLang::str1EqualsStr2($s_1, '1')==True) {
					if(sireProgFTE::$b_ProgFTE_v1_src_loaded==FALSE) {
						$s_path_lib_sirel=constant('s_path_lib_sirel');
						require_once($s_path_lib_sirel.'/src/src'.
								'/bonnet/sirel_progfte_v1.php');
						sireProgFTE::$b_ProgFTE_v1_src_loaded=TRUE;
					} // if
					$arht_out=sireProgFTE_v1::ProgFTE2ht($s_progfte_candidate);
				} else {
					sirelThrowLogicException(__FILE__,
						__LINE__,__CLASS__.'->'.__FUNCTION__.
						': ProgFTE_v'.$s_1.' is not yet '.
						'supported by this function. '.
						"\nGUID='579007a3-a388-4e90-b543-6043b0914dd7'");
				} // if
			} else { // ProgFTE_v0
				if(sireProgFTE::$b_ProgFTE_v0_src_loaded==FALSE) {
					$s_path_lib_sirel=constant('s_path_lib_sirel');
					require_once($s_path_lib_sirel.'/src/src'.
							'/bonnet/sirel_progfte_v0.php');
					sireProgFTE::$b_ProgFTE_v0_src_loaded=TRUE;
				} // if
				$arht_out=sireProgFTE_v0::ProgFTE2ht($s_progfte_candidate);
			} // if
			return $arht_out;
		} catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.
				': $a_string=='.$s_progfte_candidate.
				"  \nGUID='cc81bc5d-54e5-4b47-a443-6043b0914dd7'\n");
		} // catch
	} // ProgFTE2ht

} //class sireProgFTE


//=========================================================================
?>

