<?php
try {
	$s_path_lib_sirel=realpath('./../../../'); // == $SIREL_HOME
	define('s_path_lib_sirel',$s_path_lib_sirel);
	$s_path_lib_sirel_dev_tools=realpath($s_path_lib_sirel.'/src/dev_tools/');
	require_once ($s_path_lib_sirel.'/src/src/sirel.php');
	require_once ($s_path_lib_sirel_dev_tools.
			'/etc/sirel_dev_tools_settings.php');
	sirelSiteConfig::partialreset2defaults($s_path_lib_sirel);

	$ob_html=new sirelHTMLPage();
	$ob_html->set_title('Sirel Selftests');
	$ob_html->add_2_ar_body('<h2>Sirel Library Selftests</h2><br/><br/>');

	$arht_fp_tests=glob($s_path_lib_sirel_dev_tools.'/selftests/tests/*.php');
	if ($arht_fp_tests==FALSE) {
		sirelThrowLogicException(__FILE__, __LINE__,
			__CLASS__.'->'.__FUNCTION__.': '.
			'The glob function could not comlete without complications.'.
			"\nGUID='533478e3-be34-4887-b25e-e25310115dd7'");
	} // if
	$i_len=count($arht_fp_tests);
	$s_fp=NULL;
	for($i=0;$i<$i_len;$i++) {
		$s_fp=$arht_fp_tests[$i];
		require_once ($s_fp);
	} // for

	function exec_tests() {
		try {
			$ar_test_results=array();
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_core_utilities::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_lang::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_ProgFTE::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_type_normalizations::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_units::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_units::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_math_boolean::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_ix::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_operators::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_operators_set_1::selftest());
			//$ar_test_results=array_merge($ar_test_results,
			//		sirel_test_sirel_bigint_t1::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_GUID::selftest());
			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_security_utilities::selftest());

			$ar_test_results=array_merge($ar_test_results,
				sirel_test_sirel_cg_set_1::selftest());


			$ar_test_results=array_merge($ar_test_results,
				sirel_test_various_1::selftest());

			//$ar_test_results=array_merge($ar_test_results,
			//	sirel_test_db_sqlite3::selftest());
			//$ar_test_results=array_merge($ar_test_results,
			//	sirel_test_db_postgresql::selftest());
			//$ar_test_results=array_merge($ar_test_results,
			//		sirelInternetVerifications::selftest());
			//$ar_test_results=array_merge($ar_test_results,
			//		sirelTXTnorm::selftest());
			return $ar_test_results;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='19a81943-8ed4-4961-af5e-e25310115dd7'\n");
		} // catch
	} // exec_tests

	function dump_err_2_GUID_trace_GUID_stack_txt($b_all_tests_passed,
		$s_err) {
		try {
			$s_fp_info=sirel_dev_tools_settings::$s_fp_mmmv_devel_tools_info_bash;
			if(file_exists($s_fp_info)!=True) {
				return;
			} // if
			$s_cmd=$s_fp_info.' get_config '.
				's_GUID_trace_errorstack_file_path ;';
			$s_fp_candidate=''.shell_exec($s_cmd);
			if(mb_strlen($s_fp_candidate)<2) {
				return;
			} // if
			$s_fp=mb_ereg_replace("\n",'',
				mb_ereg_replace(' ','',$s_fp_candidate));
			$ob_file= fopen($s_fp, 'w');
			if($b_all_tests_passed==True) {
				fwrite($ob_file, '');
			} else {
				fwrite($ob_file, $s_err);
			} // else
			fclose($ob_file);
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='d70d193b-d30c-4f8b-835e-e25310115dd7'");
		} // catch
	} // dump_err_2_GUID_trace_GUID_stack_txt

	function test_results_2_s(&$ar_test_results) {
		try {
			$s_out='';
			$s_out='<table border="1"><tbody>';
			$s_file_name='';
			$ar_tc;
			$b_file_name_printed=True;
			$b_all_tests_passed=True;
			foreach ($ar_test_results as $test_result) {
				if(!sirelLang::str1EqualsStr2($test_result['file_name'],$s_file_name)) {
					// One will deal with the self-testing
					// consistency of the str1EqualsStr2(...)
					// when there's time for it.
					$b_file_name_printed=False;
					$s_file_name=$test_result['file_name'];
				} // if
				$ar_tc=$test_result['test_cases'];
				foreach ($ar_tc as $test_case) {
					$b_all_tests_passed=False;
					if(!$b_file_name_printed) {
						$b_file_name_printed=True;
						$s_out=$s_out.'<tr><td colspan="3">'.
							$s_file_name."</td></tr><br/>\n";
					}
					$s_msg=mb_ereg_replace("\n",
						"\n<br/>", $test_case['msg']);
					$s_out=$s_out."<tr>\n";
					$s_out=$s_out.'<td style="visibility:hidden;">xx</td>';
					$s_out=$s_out.'<td>'.$test_case['line_number'].'</td>';
					$s_out=$s_out.'<td>'.$s_msg.'</td>';
					$s_out=$s_out."</tr>\n";
				} // foreach
			} // foreach
			$s_out=$s_out.'</tbody></table>';
			if($b_all_tests_passed) {
				$s_out='All tests passed successfully.';
			} // if
			dump_err_2_GUID_trace_GUID_stack_txt($b_all_tests_passed,
				$s_out);
			return $s_out;
		}catch (Exception $err_exception) {
			sirelBubble(__FILE__,__LINE__,$err_exception,
				__CLASS__.'->'.__FUNCTION__.': '.
				"\nGUID='155ab63c-aca2-48bc-b55e-e25310115dd7'\n");
		} // catch
	} // test_results_2_s

	$ar_test_results=exec_tests();
	$s=test_results_2_s($ar_test_results);
	$s_log=sirelLogger::to_s('debug');
	$s=$s."\n".$s_log;
	$ob_html->add_2_ar_body($s);
	echo $ob_html->to_s();
} catch (Exception $err_exception) {
	sirelDisplayException(__FILE__,__LINE__,$err_exception);
} // catch
?>
