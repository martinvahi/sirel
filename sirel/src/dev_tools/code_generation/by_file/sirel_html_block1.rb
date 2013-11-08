#!/usr/bin/ruby
#==========================================================================
=begin
 Copyright 2010, martin.vahi@softf1.com that has an
 Estonian personal identification code of 38108050020.
 All rights reserved. This file is licensed under the
 BSD license: http://www.opensource.org/licenses/bsd-license.php
=end
#==========================================================================
SIREL_HOME=ENV["SIREL_HOME"] if !defined? SIREL_HOME
require SIREL_HOME+"/src/dev_tools/code_generation/sirel_cg0.rb"

#require KIBUVITS_HOME+"/src/include/kibuvits_msgc.rb"

#--------------------------------------------------------------------------

s_name="css"
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem='<link rel=\"stylesheet\" href=\"'."+
"$elem.'\"  type=\"text/css\">';"
ar_spec=[s_name," ",s_elemeval," ","\"\\n\""]
kibuvits_writeln Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
kibuvits_writeln "\n\n"

#-----------------------------------------------

s_name="css_inline"
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
s_0=Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)
s_1=s_0.gsub(/[$]s_value/,"$s_fp_file_or_folder")
kibuvits_writeln s_1

s_elemeval="$s_elem=sirel_htmlcg_funcset_1::s_css_inclusions_t1($elem);"
ar_spec=[s_name," ",s_elemeval," ","\"\\n\""]
kibuvits_writeln Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
kibuvits_writeln "\n\n"

#-----------------------------------------------
s_name="javascript"
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem='<script type=\"text/javascript\" src=\"'.$elem.'\"></script>';"
ar_spec=[s_name," ",s_elemeval," ","\"\\n\""]
kibuvits_writeln Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
kibuvits_writeln "\n\n"

#-----------------------------------------------
s_name="head_section"
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem=$elem;"
ar_spec=[s_name," ",s_elemeval," ","\"\\n\""]
kibuvits_writeln Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
kibuvits_writeln "\n\n"

#-----------------------------------------------
s_name="body"
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem=$elem;"
ar_spec=[s_name," ",s_elemeval," ","''"]
kibuvits_writeln Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
kibuvits_writeln "\n\n"

#-----------------------------------------------
s_name="body_attribute"
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_arht)
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_arht_add_s)

s_elemeval="$s_elem=$a_key.'=\"'.$elem.'\"';"
ar_spec=[s_name," ",s_elemeval," ","' '"]
kibuvits_writeln Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_arht_to_s)
kibuvits_writeln "\n\n"

#-----------------------------------------------
s_name="data_section"
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_arht)
kibuvits_writeln Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_arht_add_s)

s_to_s_prefix="$s_prefix='<div id=\""+
"webpage_initiation_data_from_server_div\" "+
"style=\"visibility:hidden;\">'.\"\\n\";"
s_elemeval="$s_elem='<p "+
"id=\"webpage_initiation_data_from_server_'.$a_key.'\" >'.$elem.\'</p>';"
s_to_s_suffix="$s_suffix='</div> <!-- "+
"id==\"webpage_initiation_data_from_server_div\" -->'.\"\\n\";"
ar_spec=[s_name,s_to_s_prefix,s_elemeval,s_to_s_suffix,"\"\\n\""]
kibuvits_writeln Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_arht_to_s)
kibuvits_writeln "\n\n"


#==========================================================================
