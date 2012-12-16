<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
    <head>
		<style type="text/css">
			/*According to the Yahoo YUI framework creators,
			  the margin and padding on body element
			  can introduce errors in determining
			  element position and are not recommended;
			  we turn them off as a foundation for YUI
			  CSS treatments. */
			body {
				margin:0;
				padding:0;
			}
		</style>
        <title>Sirel Selftests</title>
    </head>
    <body>
		<h2>Sirel Library Selftests</h2><br/><br/>
		<?php
		$s_path_lib_sirel=realpath('./../../'); // == $SIREL_HOME/src/devel
		define('s_path_lib_sirel',$s_path_lib_sirel);
		$s_path_lib_sirel_dev_tools=realpath($s_path_lib_sirel.'/dev_tools/');
		require_once ($s_path_lib_sirel.'/src/sirel.php');
		sirelSiteConfig::partialreset2defaults($s_path_lib_sirel);
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_core_utilities.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_lang.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_type_normalizations.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_units.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_math_boolean.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_operators.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_operators_set_1.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_bigint_t1.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_ix.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_guid.php');
		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_sirel_security_utilities.php');

		require_once ($s_path_lib_sirel_dev_tools.'/selftests/tests/test_various_1.php');

		function exec_tests() {
			try {
				$ar_test_results=array();
				$ar_test_results=array_merge($ar_test_results,
						sirel_test_sirel_core_utilities::selftest());
				$ar_test_results=array_merge($ar_test_results,
						sirelLang::selftest());
				$ar_test_results=array_merge($ar_test_results,
						sirel_test_sirel_lang::selftest());
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
						sirel_test_various_1::selftest());

				//$ar_test_results=array_merge($ar_test_results,
				//		sirelInternetVerifications::selftest());
				//$ar_test_results=array_merge($ar_test_results,
				//		sirelTXTnorm::selftest());
				return $ar_test_results;
			}catch (Exception $err_exception) {
				sirelBubble(__FILE__,__LINE__,$err_exception,
						__CLASS__.'->'.__FUNCTION__.': ');
			} // catch
		} // exec_tests

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
						$s_out=$s_out."<tr>\n";
						$s_out=$s_out.'<td style="visibility:hidden;">xx</td>';
						$s_out=$s_out.'<td>'.$test_case['line_number'].'</td>';
						$s_out=$s_out.'<td>'.$test_case['msg'].'</td>';
						$s_out=$s_out."</tr>\n";
					} // foreach
				} // foreach
				$s_out=$s_out.'</tbody></table>';
				if($b_all_tests_passed) {
					$s_out='All tests passed successfully.';
				} // if
				return $s_out;
			}catch (Exception $err_exception) {
				sirelBubble(__FILE__,__LINE__,$err_exception,
						__CLASS__.'->'.__FUNCTION__.': ');
			} // catch
		} // test_results_2_s

		$ar_test_results=exec_tests();
		$s=test_results_2_s($ar_test_results);
		$s_log=mb_ereg_replace('[\\n]','<br/>', sirelLogger::to_s());
		$s=$s.'<br/><br/>'.$s_log.'<br/><br/>';
		echo $s;
		?>
    </body>
</html>
