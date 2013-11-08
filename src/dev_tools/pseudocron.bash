#!/usr/bin/env bash 

S_FP_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

nice -n2 $S_FP_DIR/lib/mmmv_devel_tools/src/mmmv_devel_tools/breakdancemake/src/breakdancemake pseudocron run_bash_t1 "--s_bash_command=rake b" --i_n_of_days=2 --i_interval_in_seconds=5


