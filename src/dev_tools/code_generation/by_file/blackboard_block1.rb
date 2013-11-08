#!/usr/bin/env ruby
#==========================================================================
=begin
 Copyright 2010, martin.vahi@softf1.com that has an
 Estonian personal identification code of 38108050020.
 This file is licensed under the BSD license:
 http://www.opensource.org/licenses/bsd-license.php
=end
#==========================================================================
SIREL_HOME=ENV["SIREL_HOME"] if !defined? SIREL_HOME
require SIREL_HOME+"/src/dev_tools/code_generation/sirel_cg0.rb"

require KIBUVITS_HOME+"/src/include/kibuvits_msgc.rb"
require KIBUVITS_HOME+"/src/include/kibuvits_cg.rb"

#--------------------------------------------------------------------------
s_name="ZZ"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_arht)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_arht_add_s)

s_elemeval="$s_elem='$s_key=='.$a_key.'  $elem=='.$elem;"
ar_spec=[s_name," ",s_elemeval," ","'<br/>'"]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_arht_to_s)
puts "\n\n"


#==========================================================================
