#!/usr/bin/env ruby
#==========================================================================
=begin

 Copyright 2010, martin.vahi@softf1.com that has an
 Estonian personal identification code of 38108050020.
 All rights reserved.

 Redistribution and use in source and binary forms, with or
 without modification, are permitted provided that the following
 conditions are met:

 * Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer
   in the documentation and/or other materials provided with the
   distribution.
 * Neither the name of the Martin Vahi nor the names of its
   contributors may be used to endorse or promote products derived
   from this software without specific prior written permission.

 THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
 CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
 CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

=end
#==========================================================================

if !defined? RENESSAATOR_RB_INCLUDED
   RENESSAATOR_RB_INCLUDED=true
   if !defined? MMMV_DEVEL_TOOLS_HOME
      require 'pathname'
      s_0=Pathname.new(__FILE__).realpath.parent.parent.parent.parent.parent.parent.to_s
      MMMV_DEVEL_TOOLS_HOME=s_0.freeze
   end # if

   require MMMV_DEVEL_TOOLS_HOME+"/src/bonnet/mmmv_devel_tools_initialization_t1.rb"

   require KIBUVITS_HOME+"/src/include/kibuvits_shell.rb"
   require KIBUVITS_HOME+"/src/include/kibuvits_argv_parser.rb"
   require KIBUVITS_HOME+"/src/include/brutal_workarounds/kibuvits_str_configfileparser.rb"
   require KIBUVITS_HOME+"/src/include/kibuvits_comments_detector.rb"
   require KIBUVITS_HOME+"/src/include/kibuvits_fs.rb"
   require KIBUVITS_HOME+"/src/include/kibuvits_eval.rb"
   require KIBUVITS_HOME+"/src/include/kibuvits_file_intelligence.rb"
end # if

#==========================================================================

class Renessaator_core
   attr_reader :s_renessaator_selftests_home
   private
   def init_constants
      @lc_ht_block='ht_block'.freeze
      @lc_ht_blocks='ht_blocks'.freeze
      @lc_ht_s_blocks='ht_s_blocks'.freeze
      @lc_msgcs='msgcs'.freeze
      @lc_s_block_id_from_console='s_block_id_from_console'.freeze
      @lc_s_frame='s_frame'.freeze
      @lc_s_file_language='s_file_language'.freeze
      @lc_s_working_directory='s_working_directory'.freeze

      @lc_block_ht_params='block_ht_params'.freeze
      @lc_block_ht_gen='block_ht_gen'.freeze # the generated output
      @lc_block_ht_src='block_ht_s'.freeze
      @lc_block_src_lang='block_src_lang'.freeze
      @lc_block_s_stderr='block_s_stderr'.freeze # from the src processor.
      @lc_s_block='s_block'.freeze

      @lc_tl_s_block_start="RENESSAATOR_BLOCK_START".freeze
      @lc_tl_s_block_id="RENESSAATOR_BLOCK_ID".freeze
      @lc_tl_s_block_src_lang="RENESSAATOR_SOURCE_LANGUAGE".freeze
      @lc_tl_s_block_src_start="RENESSAATOR_SOURCE_START".freeze
      @lc_tl_s_block_src_end="RENESSAATOR_SOURCE_END".freeze
      @lc_tl_s_block_stderr_start="RENESSAATOR_STDERR_START".freeze
      @lc_tl_s_block_stderr_end="RENESSAATOR_STDERR_END".freeze
      @lc_tl_s_block_gen_start="RENESSAATOR_AUTOGENERATED_TEXT_START".freeze
      @lc_tl_s_block_gen_end="RENESSAATOR_AUTOGENERATED_TEXT_END".freeze
      @lc_tl_s_block_end="RENESSAATOR_BLOCK_END".freeze

      @lc_space=" ".freeze

      @s_renessaator_selftests_home=MMMV_DEVEL_TOOLS_HOME+
      "/src/mmmv_devel_tools/renessaator/src/bonnet/selftests"

   end # init_constants

   public
   def initialize
      init_constants
   end #initialize
   private

   def create_ht_opmem(id_of_the_single_block_to_be_processed,
      msgcs,s_file_language,s_working_directory)
      ht_opmem=Hash.new
      ht_opmem[@lc_ht_block]=nil
      ht_opmem[@lc_ht_blocks]=nil
      ht_opmem[@lc_ht_s_blocks]=nil
      ht_opmem[@lc_msgcs]=msgcs
      ht_opmem[@lc_s_block_id_from_console]=id_of_the_single_block_to_be_processed
      ht_opmem[@lc_s_frame]=nil
      ht_opmem[@lc_s_block]=nil
      ht_opmem[@lc_s_file_language]=s_file_language
      ht_opmem[@lc_s_working_directory]=s_working_directory


      ht_opmem[@lc_tl_s_block_src_lang]=nil
      return ht_opmem
   end # create_ht_opmem

   def s_block_2_ht_block_remove_gensource ht_opmem
      msgcs=ht_opmem[@lc_msgcs]
      ht_block=ht_opmem[@lc_ht_block]
      s_block_frame=ht_block[@lc_s_block_frame]
      s_file_language=ht_opmem[@lc_s_file_language]
      # The Kibuvits_str.pick_by_instance does not output an
      # error message, if there are no regions to extract, but
      # it will output an error message, if there are any start
      # or end tags without its complementary tag.
      s_block_frame,ht_s_gensource_regions=Kibuvits_str.pick_by_instance(
      @lc_tl_s_block_gen_start,@lc_tl_s_block_gen_end,s_block_frame,msgcs)
      return if msgcs.b_failure
      if ht_s_gensource_regions.length<1
         s_comment_start_tag=Kibuvits_comments_detector.get_singleliner_comment_start_tag(
         s_file_language,msgcs)
         s_block_frame=s_block_frame+$kibuvits_lc_linebreak+
         s_comment_start_tag+@lc_space+@lc_tl_s_block_gen_start+$kibuvits_lc_linebreak+
         s_comment_start_tag+@lc_space+@lc_tl_s_block_gen_end+$kibuvits_lc_linebreak+
         s_comment_start_tag+@lc_space
         s_block_frame,ht_s_gensource_regions=Kibuvits_str.pick_by_instance(
         @lc_tl_s_block_gen_start,@lc_tl_s_block_gen_end,
         s_block_frame,msgcs)
         return if msgcs.b_failure
      end # if
      x=ht_s_gensource_regions.length
      if 1<x
         msgcs.cre "Each Renessaator block is allowed to "+
         "contain at most one generated output block, "+
         "but "+x.to_s+" of them were found.",4.to_s
         msgcs.last['Estonian']="Igas Renessaator'i blokis võib "+
         "olla maksimaalselt 1 genereeritud väljundi blokk, kuid "+
         "antud juhtumil leiti neid "+x.to_s+" tükki."
      end # if
      return if msgcs.b_failure
      ht=Hash.new
      ht['GUID']=ht_s_gensource_regions.keys[0]
      ht['s_gen']=ht_s_gensource_regions[ht['GUID']]
      ht_block[@lc_block_ht_gen]=ht
      ht_block[@lc_s_block_frame]=s_block_frame
   end # s_block_2_ht_block_remove_gensource

   def s_block_2_ht_block_extract_src ht_opmem
      msgcs=ht_opmem[@lc_msgcs]
      ht_block=ht_opmem[@lc_ht_block]
      s_block_frame=ht_block[@lc_s_block_frame]
      s_block_frame,ht_s_src_regions=Kibuvits_str.pick_by_instance(
      @lc_tl_s_block_src_start,@lc_tl_s_block_src_end,
      s_block_frame,msgcs)
      return if msgcs.b_failure
      x=ht_s_src_regions.length
      if x!=1
         msgcs.cre "Each Renessaator block is required to "+
         "contain exactly one source block, "+
         "but "+x.to_s+" of them were found.",5.to_s
         msgcs.last['Estonian']="Igas Renessaator'i blokis peab "+
         "olema täpselt 1 genereerimiskoodi blokk, kuid "+
         "antud juhtumil leiti neid "+x.to_s+" tükki."
      end # if
      ht_block[@lc_s_block_frame]=s_block_frame
      ht=Hash.new
      ht['GUID']=ht_s_src_regions.keys[0]
      s_src=ht_s_src_regions[ht['GUID']]
      s_src=Kibuvits_str.trim(s_src)
      ht['s_src']=s_src
      ht_block[@lc_block_ht_src]=ht
   end # s_block_2_ht_block_extract_src

   def s_block_2_ht_block_extract_params ht_opmem
      msgcs=ht_opmem[@lc_msgcs]
      ht_block=ht_opmem[@lc_ht_block]
      s_block_frame=ht_block[@lc_s_block_frame]
      ht_params=Kibuvits_str_configfileparser.configstylestr_2_ht(s_block_frame,msgcs)
      if !ht_params.has_key? @lc_tl_s_block_src_lang
         msgcs.cre "Renessaator block parameter \""+
         @lc_tl_s_block_src_lang+"\" is missing.",6.to_s
         msgcs.last['Estonian']="Renessaator'i bloki parameeter "+
         "nimega \""+@lc_tl_s_block_src_lang+"\" on puudu."
      end # if
      if !ht_params.has_key? @lc_tl_s_block_id
         ht_params[@lc_tl_s_block_id]=nil # The block ID-s are optional.
      end # if
      ht_block[@lc_block_ht_params]=ht_params
   end # s_block_2_ht_block_extract_params

   def s_block_2_ht_block ht_opmem
      msgcs=ht_opmem[@lc_msgcs]
      s_block=ht_opmem[@lc_s_block]
      ht_block=Hash.new
      ht_opmem[@lc_ht_block]=ht_block
      ht_block[@lc_s_block_frame]=s_block
      # The generated source can also contain comments.
      # That's why the generated part is
      # removed prior to de-commenting the block.
      s_block_2_ht_block_remove_gensource ht_opmem
      return if msgcs.b_failure
      s_file_language=ht_opmem[@lc_s_file_language]
      s_block_frame=ht_block[@lc_s_block_frame]
      ar_comments=Kibuvits_comments_detector.run(
      s_file_language.downcase,s_block_frame,msgcs)
      return if msgcs.b_failure
      ar_commentstrings=Kibuvits_comments_detector.extract_commentstrings(
      ar_comments,true)
      return if msgcs.b_failure
      s_commentless_fame=$kibuvits_lc_emptystring
      ar_commentstrings.each{|s|s_commentless_fame=s_commentless_fame+s}
      ht_block[@lc_s_block_frame]=s_commentless_fame
      s_block_2_ht_block_extract_src ht_opmem
      s_block_2_ht_block_extract_params ht_opmem
   end # s_block_2_ht_block


   def ht_s_blocks_2_ht_blocks ht_opmem
      msgcs=ht_opmem[@lc_msgcs]
      ht_s_blocks=ht_opmem[@lc_ht_s_blocks]
      ht_blocks=Hash.new
      ht_opmem[@lc_ht_blocks]=ht_blocks
      s_block_id_from_console=ht_opmem[@lc_s_block_id_from_console]
      ht_block=nil
      ht_params=nil
      if s_block_id_from_console==nil # go for all blocks
         ht_s_blocks.each_pair do |s_guid,s_block|
            ht_opmem[@lc_s_block]=s_block
            s_block_2_ht_block ht_opmem
            return if msgcs.b_failure
            ht_block=ht_opmem[@lc_ht_block]
            ht_blocks[s_guid]=ht_block
         end # loop
      else
         ht_s_blocks.each_pair do |s_guid,s_block|
            ht_opmem[@lc_s_block]=s_block
            s_block_2_ht_block ht_opmem
            return if msgcs.b_failure
            ht_block=ht_opmem[@lc_ht_block]
            ht_params=ht_block[@lc_block_ht_params]
            if ht_params[@lc_tl_s_block_id]!=nil
               if ht_params[@lc_tl_s_block_id]==s_block_id_from_console
                  ht_blocks[s_guid]=ht_block
               end # if
            end # if
         end # loop
      end # if
      if s_block_id_from_console!=nil
         if 0<ht_s_blocks.length
            if ht_blocks.length==0
               msgcs.cre "There is no block with a block id of \""+
               s_block_id_from_console+"\".",3.to_s
               msgcs.last['Estonian']="Blokki, mille id on \""+
               s_block_id_from_console+"\", ei leitud."
            end # if
         end # if
      end # if
   end # ht_s_blocks_2_ht_blocks

   def execute_block_source ht_opmem
      msgcs=ht_opmem[@lc_msgcs]
      ht_block=ht_opmem[@lc_ht_block]
      ht_params=ht_block[@lc_block_ht_params]
      s_block_src_lang=ht_params[@lc_tl_s_block_src_lang].to_s.downcase
      s_block_src_lang="php5" if s_block_src_lang=="php"
      s_working_directory=ht_opmem[@lc_s_working_directory]
      ht_block[@lc_block_s_stderr]=nil
      ht_filesystemtest_failures=Kibuvits_fs.verify_access(
      s_working_directory,"is_directory,readable,writable")
      if 0<ht_filesystemtest_failures.length
         s_en=""
         s_en=Kibuvits_fs.access_verification_results_to_string(
         ht_filesystemtest_failures, 'English')
         s_ee=Kibuvits_fs.access_verification_results_to_string(
         ht_filesystemtest_failures, 'Estonian')
         msgcs.cre "There occurred some problems with the "+
         "working directory \""+s_working_directory+"\". "+s_en, 7.to_s
         msgcs.last['Estonian']="Töökataloogiga \""+
         s_working_directory+"\" tekkis mingi probleem. "+s_ee
         return
      end # if
      s_working_directory_0=Dir.getwd
      begin
         Dir.chdir(s_working_directory)
      rescue Exception =>e
         msgcs.cre "There occurred some problems with "+
         "the temporary changing of the working directory from "+
         "\""+s_working_directory_0+"\" to \""+
         s_working_directory+"\". e.message=="+
         e.message.to_s, 8.to_s
         msgcs.last['Estonian']="Ajutisel töökataloogi muutmisel "+
         "kataloogilt \""+s_working_directory_0+"\" kataloogile \""+
         s_working_directory+"\" tekkis mingi tõrge. e.message=="+
         e.message.to_s
      end # try-catch
      return if msgcs.b_failure
      Dir.chdir(s_working_directory_0)
      s_src=ht_block[@lc_block_ht_src]['s_src']
      ht_stdstreams=Kibuvits_eval.run(s_src,s_block_src_lang,msgcs)
      s_stderr=ht_stdstreams['s_stderr']
      ht_block[@lc_block_s_stderr]=s_stderr if s_stderr!=""
      ht_block[@lc_block_ht_gen]['s_gen']=ht_stdstreams['s_stdout']
   end # execute_block_source

   def ht_block_2_s_block ht_opmem
      msgcs=ht_opmem[@lc_msgcs]
      s_file_language=ht_opmem[@lc_s_file_language]
      s_oneliner_comment_start_tag=Kibuvits_comments_detector.get_singleliner_comment_start_tag(
      s_file_language,msgcs)
      return if msgcs.b_failure
      ht_block=ht_opmem[@lc_ht_block]
      s_commentless_frame=ht_block[@lc_s_block_frame]
      s_stderr=ht_block[@lc_block_s_stderr]
      # There's a comment tag at the same line, where the GUID is.
      # Hence the comment tag is skipped at first.
      s_gen=@lc_tl_s_block_gen_start+$kibuvits_lc_linebreak
      if s_stderr!=nil
         s_gen=s_gen+s_oneliner_comment_start_tag+@lc_space+
         @lc_tl_s_block_stderr_start+$kibuvits_lc_linebreak
         # The line-breaks of the stderr are probably OS specific.
         s_gen=s_gen+Kibuvits_str.surround_lines(
         s_oneliner_comment_start_tag+@lc_space,s_stderr,"",false)
         s_gen=s_gen+$kibuvits_lc_linebreak+s_oneliner_comment_start_tag+
         @lc_space+@lc_tl_s_block_stderr_end+$kibuvits_lc_linebreak
      end # if
      s_gen=s_gen+ht_block[@lc_block_ht_gen]['s_gen']+$kibuvits_lc_linebreak
      s_gen=s_gen+s_oneliner_comment_start_tag+
      @lc_space+@lc_tl_s_block_gen_end
      s_gen_guid=ht_block[@lc_block_ht_gen]['GUID']
      s_src=@lc_tl_s_block_src_start+$kibuvits_lc_linebreak
      s_src_without_file_commenttag=ht_block[@lc_block_ht_src]['s_src']
      s_src=s_src+Kibuvits_str.surround_lines(
      s_oneliner_comment_start_tag+@lc_space,
      s_src_without_file_commenttag,"",true)
      s_src=s_src+$kibuvits_lc_linebreak+s_oneliner_comment_start_tag+
      @lc_space+@lc_tl_s_block_src_end
      s_src_guid=ht_block[@lc_block_ht_src]['GUID']
      s_frame_with_filecommenttags=Kibuvits_str.surround_lines(
      s_oneliner_comment_start_tag,
      s_commentless_frame,"",true)
      ht_needles=Hash.new
      ht_needles[s_gen_guid]=s_gen
      ht_needles[s_src_guid]=s_src
      s_block=Kibuvits_str.s_batchreplace(ht_needles,
      s_frame_with_filecommenttags)
      # There is a file comment tag prior to the whole block GUID.
      # So, in order to avoid duplicating it, the first comment tag
      # of the block is skipped.
      s_block=@lc_tl_s_block_start+$kibuvits_lc_linebreak+
      s_block+@lc_tl_s_block_end
      ht_block[@lc_s_block]=s_block
   end # ht_block_2_s_block

   public
   # if the id_of_the_single_block_to_be_processed==nil,
   # the generative parts of all of the blocks will be processed.
   #
   # This method is thread-safe, despite being in a singleton.
   def run(s_file_content,s_file_language,s_working_directory,
      id_of_the_single_block_to_be_processed=nil, msgcs=Kibuvits_msgc_stack.new)
      if KIBUVITS_b_DEBUG
         bn=binding()
         kibuvits_typecheck bn, String, s_file_content
         kibuvits_typecheck bn, String, s_file_language
         kibuvits_typecheck bn, String, s_working_directory
         kibuvits_typecheck bn, [String,NilClass], id_of_the_single_block_to_be_processed
         kibuvits_typecheck bn, Kibuvits_msgc_stack, msgcs
      end # if
      ht_opmem=create_ht_opmem(id_of_the_single_block_to_be_processed,
      msgcs, s_file_language,s_working_directory)
      s_frame,ht_s_blocks=Kibuvits_str.pick_by_instance(
      @lc_tl_s_block_start,@lc_tl_s_block_end,s_file_content,msgcs)
      ht_opmem[@lc_s_frame]=s_frame
      ht_opmem[@lc_ht_s_blocks]=ht_s_blocks
      ht_s_blocks_2_ht_blocks(ht_opmem)
      ht_blocks=ht_opmem[@lc_ht_blocks]
      return if msgcs.b_failure
      s_block=nil
      ht_blocks.each_pair do |s_guid,ht_block|
         ht_opmem[@lc_ht_block]=ht_block
         execute_block_source ht_opmem
         return if msgcs.b_failure
         ht_block_2_s_block ht_opmem
         return if msgcs.b_failure
         ht_s_blocks[s_guid]=ht_block[@lc_s_block]
      end # loop
      s_out=Kibuvits_str.s_batchreplace ht_s_blocks,s_frame
      return s_out
   end # run

   # if the id_of_the_single_block_to_be_processed==nil,
   # the generative parts of all of the blocks will be processed.
   def Renessaator_core.run(s_source, msgcs=Kibuvits_msgc_stack.new,
      id_of_the_single_block_to_be_processed=nil)
      s_out=Renessaator_core.instance.run(s_source,
      id_of_the_single_block_to_be_processed)
      return s_out
   end # Renessaator_core.run

   def get_bloc_template s_file_language,msgcs
      if KIBUVITS_b_DEBUG
         bn=binding()
         kibuvits_typecheck bn, String, s_file_language
         kibuvits_typecheck bn, Kibuvits_msgc_stack, msgcs
      end # if
      s_start_tag=Kibuvits_comments_detector.get_singleliner_comment_start_tag(
      s_file_language,msgcs)
      s_lns=s_start_tag+@lc_space
      s_out=""
      # The start and end of the s_id are for simplifying
      # the use of vimscript based editing. The GUIDs are used
      # for preventing ID collisions.
      s_id="block_"+Kibuvits_GUID_generator.generate_GUID+"_city"
      s_out=s_out+s_lns+@lc_tl_s_block_start+$kibuvits_lc_linebreak
      s_out=s_out+s_lns+@lc_tl_s_block_id+"="+s_id+$kibuvits_lc_linebreak
      s_out=s_out+s_lns+@lc_tl_s_block_src_lang+"=Ruby\n"
      s_out=s_out+s_lns+@lc_tl_s_block_src_start+$kibuvits_lc_linebreak
      s_out=s_out+s_lns+$kibuvits_lc_linebreak
      s_out=s_out+s_lns+@lc_tl_s_block_src_end+$kibuvits_lc_linebreak
      # The generated text region is added during generation
      # step anyway. It's left out of here only to avoid the
      # cluttering of the initial view.
      s_out=s_out+s_lns+@lc_tl_s_block_end
      return s_out
   end # get_bloc_template

   def Renessaator_core.get_bloc_template(s_file_language,msgcs)
      s_out=Renessaator_core.instance.get_bloc_template(
      s_file_language,msgcs)
      return s_out
   end # Renessaator_core.get_bloc_template

   public
   include Singleton
   # The selftest part is done through the Renessaator_console_UI
   # selftests.
end # class Renessaator_core

#--------------------------------------------------------------------------
class Renessaator_console_UI
   public
   def initialize
      @lc_space=" "
      @s_renessaator_selftests_home=Renessaator_core.instance.s_renessaator_selftests_home
      @mx=Mutex.new
   end #initialize

   private
   def create_ht_grammar
      ht_grammar=Hash.new
      ht_grammar['--abi']=0
      ht_grammar['--appi']=0
      ht_grammar['--block-id']=1
      ht_grammar['--bloki-id']=1
      ht_grammar['--the_displaying_of_a_block_template']=0
      ht_grammar['--help']=0
      ht_grammar['-?']=0
      ht_grammar['-?bt']=0
      ht_grammar['-h']=0
      ht_grammar['--fail']=(-1)
      ht_grammar['--failid']=(-1)
      ht_grammar['--files']=(-1)
      ht_grammar['-f']=(-1)
      ht_grammar['--file']=(-1)
      ht_grammar['--keel']=1
      ht_grammar['--bloki_malli_kuvamine']=0
      ht_grammar['--juhusliku_bloki_malli_kuvamine']=0
      ht_grammar['--run-test']=1
      ht_grammar['--language']=1
      ht_grammar['--configuration']=1
      ht_grammar['--throw_on_input_verification_failures']=0
      ht_grammar['--the_displaying_of_a_random_block_example']=0
      return ht_grammar
   end # create_ht_grammar

   def help_requested_or_erroneous_console_input ht_args
      # This whole method assumes that the console args
      # have been normalized prior to a call to this method.
      return true if ht_args['--help']!=nil
      # The rest here implements a check that verifies that
      # the console arguments conform to the "business logic" of
      # the renessaator.
      b_1=(ht_args['--files']!=nil)
      b_2=(ht_args['--run-test']!=nil)
      b_3=(ht_args['--the_displaying_of_a_block_template']!=nil)
      b_4=(ht_args['--the_displaying_of_a_random_block_example']!=nil)

      b_1_only=((b_1)&&(!b_2)&&(!b_3)&&(!b_4)) # exec code generation
      b_2_only=((!b_1)&&(b_2)&&(!b_3)&&(!b_4))
      b_3_only=((!b_1)&&(!b_2)&&(b_3)&&(!b_4))
      b_4_only=((!b_1)&&(!b_2)&&(!b_3)&&(b_4))

      b_3_case_1=((b_1)&&(!b_2)&&(b_3)&&(!b_4))

      b_input_ok=(b_1_only||b_2_only||b_4_only||b_3_case_1)
      b_failure=(!b_input_ok)
      return b_failure
   end # help_requested_or_erroneous_console_input

   def helpstring ht_args
      s_out="\nConsole arguments: \n\n"+
      "  --help | \n"+
      "  (--block-id <block name>)?           (-f | --files) "+
      "<file path(s)>) |\n"+
      "  --the_displaying_of_a_block_template (-f | --file ) "+
      "<file path>  |\n"+
      "  --run-test (<name of the test>|Spooky <to list the names of the tests>)  |\n"+
      "  (--the_displaying_of_a_random_block_example | -?bt) \n"+
      "\n"
      s_langspec=ht_args['--language'][0]
      if (s_langspec=='Estonian')
         s_out="\nKonsooli argumendid: \n\n"+
         "  --abi | \n"+
         "  (--bloki-id <bloki nimi>)? (-f | --failid) "+
         "<failide rada/rajad> |\n"+
         "  --bloki_malli_kuvamine     (-f | --fail  ) "+
         "<faili rada>   |       \n"+
         "  (--juhusliku_bloki_malli_kuvamine | -?bt) \n"+
         "\n"
      end # if
      return s_out
   end # helpstring

   def exit_if_true ht_args,b_exit
      if b_exit
         kibuvits_writeln helpstring(ht_args)
         exit
      end # if
   end # exit_if_true

   def gather_filepath_candidates ht_args
      ar_out=Array.new
      ['-f','--file','--files'].each do |s_argname|
         x=ht_args[s_argname]
         next if x==nil
         x.each{|s_fp| ar_out<<s_fp}
      end # loop
      return ar_out
   end # gather_filepath_candidates

   def normalize_ht_args_lang ht_args
      s_lang=ht_args['--language']
      if s_lang!=nil
         s_lang=s_lang[0]
         s_l=s_lang.downcase
         case s_l
         when "eesti"
            ht_args['--language']=['Estonian']
         when "estonian"
            ht_args['--language']=['Estonian']
         when "english"
            ht_args['--language']=['English'] # for correct case
         else
            kibuvits_writeln "\n\n--language==\""+s_lang+
            "\", but the only\n"+
            "supported values are \"Estonian\" and \"English\".\n\n"
            exit
         end
      else
         ht_args['--language']=['English']
         ht_args['--language']=['Estonian'] if ht_args['--abi']!=nil
         ht_args['--language']=['Estonian'] if ht_args['--failid']!=nil
      end # if
   end # normalize_ht_args_lang

   def normalize_ht_args ht_args
      # List of argument names resides in the create_ht_grammar
      ht_normspec=Hash.new
      ht_normspec['--abi']=["--appi"]
      ht_normspec['--help']=["--abi","-h","-?"]
      ht_normspec['--language']=['--keel']
      ht_normspec['--failid']=['--fail']
      ht_normspec['--files']=['--failid','-f']
      ht_normspec['--block-id']=['--bloki-id']
      ht_normspec['--the_displaying_of_a_block_template']=['--bloki_malli_kuvamine']
      ht_normspec['--the_displaying_of_a_random_block_example']=['--juhusliku_bloki_malli_kuvamine',"-?bt"]
      Kibuvits_argv_parser.normalize_parsing_result(ht_normspec, ht_args)
      normalize_ht_args_lang ht_args
   end # normalize_ht_args

   def run_renessaator_file_path_2_file_container_directory s_file_path
      if s_file_path.length==0
         kibuvits_throw("\n\ns_file_path.length==0\n"+
         "\nGUID='917a8d42-cf62-4393-91a9-331301b13dd7'")
      end #if
      s_out=Pathname.new(s_file_path).realpath.parent.to_s
      return s_out
   end # run_renessaator_file_path_2_file_container_directory

   def run_renessaator ht_args, msgcs
      normalize_ht_args ht_args#for assumption localization, used in selftests
      ar_file_path_candidates=ht_args['--files']
      kibuvits_writeln helpstring(ht_args) if ar_file_path_candidates.length==0
      ht_filesystemtest_failures=Kibuvits_fs.verify_access(
      ar_file_path_candidates,"is_file,readable,writable")
      if 0<ht_filesystemtest_failures.length
         s_en=""
         s_en=Kibuvits_fs.access_verification_results_to_string(
         ht_filesystemtest_failures, 'English')
         s_ee=Kibuvits_fs.access_verification_results_to_string(
         ht_filesystemtest_failures, 'Estonian')
         msgcs.cre "There occurred some problems with "+
         "a list of file path candidates.\n"+s_en, 8.to_s
         msgcs.last['Estonian']="Failiradade nimekirjaga tekkis "+
         "mingi probleem.\n"+s_ee
         return
      end # if
      s_renessaator_block_id=ht_args['--block-id']
      if s_renessaator_block_id!=nil
         s_renessaator_block_id=ht_args['--block-id'][0]
      end # if
      s_file_path_for_errmsg="undetermined"
      s_working_directory=nil
      ar_file_path_candidates.each do |s_file_path|
         s_file_path_for_errmsg=s_file_path
         s_file_language=Kibuvits_file_intelligence.file_language_by_file_extension(
         s_file_path, msgcs)
         break if msgcs.b_failure
         s_in=file2str(s_file_path)
         s_working_directory=run_renessaator_file_path_2_file_container_directory(
         s_file_path)
         s_out=Renessaator_core.instance.run(s_in,
         s_file_language,s_working_directory,s_renessaator_block_id,msgcs)
         break if msgcs.b_failure
         str2file(s_out,s_file_path)
      end # loop
      if msgcs.b_failure
         msgcs.cre "The Renessaator had some trouble processing the "+
         "file that has a path of\n"+s_file_path_for_errmsg, 1.to_s
         msgcs.last['Estonian']="Renessaatoril tekkis faili \n"+
         s_file_path_for_errmsg+"\ntöötlemisel probleeme."
      end # if
   end # run_renessaator

   def run_selftests_from_console ht_args, msgcs
      b_test_name_ok=false
      ar_private_methods=self.private_methods
      s_out=""
      ar=ht_args['--run-test']
      s_method_name=nil
      if ar!=nil
         if 0<ar.length
            s_test_method_name=ar[0]
            ar_private_methods.each do |sym_method|
               s_method_name=sym_method.to_s
               if s_test_method_name==s_method_name
                  b_test_name_ok=true
                  break
               end # if
            end # loop
            if !b_test_name_ok
               s_out="\nThere is no method named \""+
               s_test_method_name+"\"\n"
            end # if
         end # if
      end # if
      if !b_test_name_ok
         s_out=s_out+"\nPossible tests are: "
         b=false
         ar_private_methods.each do |sym_method|
            s_method_name=sym_method.to_s
            if (/^test[_]/).match(s_method_name)!=nil
               s_out=s_out+"," if b
               b=true
               s_out=s_out+@lc_space+s_method_name
            end  # if
         end # loop
         kibuvits_writeln s_out+"\n\n"
         return
      end # if
      #eval("Renessaator_console_UI."+s_test_method_name,binding())
      sym=nil
      eval("sym=:"+s_test_method_name,binding())
      mth=self.method(sym)
      mth.call
   end # run_selftests_from_console

   # Returns true, if test is requested.
   # TODO: Get rid of this method by refactoring the argv parser.
   # Also replace the
   # ht_grammar['--run-test']=1 with ht_grammar['--run-test']=(-1)
   def dirty_workaround_to_the_lack_of_zeroormore_parse_option ar_argv,ht_args,msgcs
      return true if ht_args['--run-test']!=nil
      ht_grammar2=create_ht_grammar
      ht_grammar2['--run-test']=0
      ht_args2=Kibuvits_argv_parser.run ht_grammar2, ar_argv,msgcs
      return true if ht_args2['--run-test']!=nil
      ht_grammar2['--run-test']=(-1)
      ht_args2=Kibuvits_argv_parser.run ht_grammar2, ar_argv,msgcs
      return true if ht_args2['--run-test']!=nil
      return false
   end # dirty_workaround_to_the_lack_of_zeroormore_parse_option

   def exit_if_bloc_printing_requested ht_args, msgcs
      return if ht_args['--the_displaying_of_a_block_template']==nil
      s_fp=ht_args['--files'][0]
      s_file_language=Kibuvits_file_intelligence.file_language_by_file_extension(s_fp,msgcs)
      if msgcs.b_failure
         if ht_args['--language']!=nil
            s_language=ht_args['--language'][0]
            kibuvits_writeln msgcs.to_s[s_language]
         else
            kibuvits_writeln msgcs.to_s
         end # if
         exit
      end # if
      s_block_template=Renessaator_core.get_bloc_template(s_file_language,msgcs)
      kibuvits_writeln s_block_template
      exit
   end # exit_if_bloc_printing_requested

   # The exit_if_bloc_printing_requested partly duplicates this mehtod.
   def exit_if_template_printing_requested ht_args, msgcs
      return if ht_args['--the_displaying_of_a_random_block_example']==nil
      s_block_template=Renessaator_core.get_bloc_template("ruby",msgcs)
      if msgcs.b_failure
         if ht_args['--language']!=nil
            s_language=ht_args['--language'][0]
            kibuvits_writeln msgcs.to_s[s_language]
         else
            kibuvits_writeln msgcs.to_s
         end # if
         exit
      end # if
      s_msg="\nRenessaator block example for a Ruby file:\n\n"+
      s_block_template+$kibuvits_lc_doublelinebreak
      kibuvits_writeln s_msg
      exit
   end # exit_if_template_printing_requested

   public

   # It's separate from the method run() to allow
   # the Renessaator to be called from other ruby scripts
   # without renitializing it for every run. The clumbersome
   # ar_argv is used to use only a single point of entry.
   def run_by_ar_argv(ar_argv,msgcs)
      @mx.synchronize do
         ht_grammar=create_ht_grammar
         ht_args=Kibuvits_argv_parser.run ht_grammar, ar_argv,msgcs
         if dirty_workaround_to_the_lack_of_zeroormore_parse_option(ar_argv,ht_args,msgcs)
            run_selftests_from_console ht_args, msgcs
            exit
         end # if
         Kibuvits_argv_parser.verify_parsed_input ht_grammar, ht_args, msgcs
         normalize_ht_args ht_args
         # TODO: the language parameter gets lost with the ext_if funcs.
         exit_if_true ht_args,msgcs.b_failure
         exit_if_true ht_args,help_requested_or_erroneous_console_input(ht_args)
         exit_if_bloc_printing_requested ht_args,msgcs
         exit_if_template_printing_requested ht_args,msgcs
         run_renessaator ht_args, msgcs
         if msgcs.b_failure
            b_failure=false
            s_out=$kibuvits_lc_emptystring
            b_throw_on_input_verification_failures=false
            b_rescue_applied=false
            begin
               if ht_args['--throw_on_input_verification_failures']!=nil
                  b_throw_on_input_verification_failures=true
               end # if
               s_out=$kibuvits_lc_emptystring+msgcs.to_s[ht_args['--language'][0]]
            rescue
               b_failure=true
               # TODO: The next line should be outcommented,
               #b_rescue_applied=true
               # but here's a dirty workaround so this bug is left
               # to the future, because one is really busy at the
               # time of writing this comment.
            end # try-catch
            if b_failure
               b_failure=false
               begin
                  s_out=$kibuvits_lc_emptystring+msgcs.to_s
               rescue
                  b_failure=true
               end # try-catch
            end # if
            if b_failure
               kibuvits_throw "\nSomething went so wrong that there is \n"+
               "not even a decent error message available.\n\n"
            end # if
            kibuvits_throw s_out if b_rescue_applied #We're screwed.
            if b_throw_on_input_verification_failures
               # The idea behind the "textbraces" is that
               # IDE plugins can extract the input verification
               # message from the whole throw message.
               s_ceremony="RENESSAATOR_INPUT_VERIFICATION_FAILURE_MESSAGE_"
               s_out2=$kibuvits_lc_linebreak+s_ceremony+"START \n"+s_out+
               @lc_space+s_ceremony+"END\n"
               kibuvits_throw s_out2
            else
               kibuvits_writeln s_out
            end # if
         end # if
      end # synchronize
   end # run_by_ar_argv

   def run
      ar_argv=Array.new.concat(ARGV)
      msgcs=C_mmmv_devel_tools_global_singleton.msgcs()
      run_by_ar_argv(ar_argv,msgcs)
      ar_argv.clear
   end # run

   private

   def create_ht_args_for_running_a_test msgcs
      ht_grammar_template=create_ht_grammar
      ht_args=Hash.new
      ht_grammar_template.each_key {|s_arg| ht_args[s_arg]=nil}
      ht_args_from_console=Kibuvits_argv_parser.run(
      ht_grammar_template,ARGV,msgcs)
      normalize_ht_args ht_args_from_console
      ht_args['--language']=ht_args_from_console['--language']
      return ht_args
   end # create_ht_args_for_running_a_test

   # Nonstatic due to reflection.
   def run_test_with_testsource s_template_source_file_path,msgcs
      s_fp_template=s_template_source_file_path
      s_fp=@s_renessaator_selftests_home+"/subject_to_removal_t1_"+
      Kibuvits_GUID_generator.generate_GUID+".rb"
      if File.exists? s_fp
         # This block is to avoid bash script cp command
         # parameters. The hope is that in the future, when
         # the bash-batch translation is switched in, the
         # shell script stays "simple enough to translate".
         ht_filesystemtest_failures=Kibuvits_fs.verify_access(
         s_fp,"is_file,writable")
         Kibuvits_fs.exit_if_any_of_the_filesystem_tests_failed(
         ht_filesystemtest_failures)
         File.delete(s_fp)
      end # if
      sh "cp "+s_fp_template+@lc_space+s_fp+" ;"
      ht_filesystemtest_failures=Kibuvits_fs.verify_access(
      s_fp,"is_file,readable,writable")
      Kibuvits_fs.exit_if_any_of_the_filesystem_tests_failed(
      ht_filesystemtest_failures)
      ht_args=create_ht_args_for_running_a_test msgcs
      ht_args['-f']=[s_fp]
      run_renessaator ht_args,msgcs
      File.delete(s_fp)
   end # run_test_with_testsource

   def test_1
      s_fp_template=@s_renessaator_selftests_home+"/template1.rb"
      msgcs=Kibuvits_msgc_stack.new
      run_test_with_testsource s_fp_template,msgcs
      kibuvits_throw "test 1 msgcs.to_s=="+msgcs.to_s if msgcs.b_failure

      s_fp_template=@s_renessaator_selftests_home+"/template2.rb"
      msgcs.clear
      #run_test_with_testsource s_fp_template,msgcs
      kibuvits_throw "test 2" if msgcs.b_failure

      s_fp_template=@s_renessaator_selftests_home+"/template3.rb"
      msgcs.clear
      #run_test_with_testsource s_fp_template,msgcs
      #kibuvits_throw "test 3" if !msgcs.b_failure
      #kibuvits_throw "test 3.1" if msgcs[msgcs.length-2].i_message_code!=6

      s_fp_template=@s_renessaator_selftests_home+"/template4.rb"
      msgcs.clear
      #run_test_with_testsource s_fp_template,msgcs
      kibuvits_throw "test 4" if msgcs.b_failure
   end # test_1

   def Renessaator_console_UI.test_1
      rcui=Renessaator_console_UI.new
      rcui.send(:test_1)
   end # Renessaator_console_UI.test_1

   def test_2
   end # test_2

   def Renessaator_console_UI.test_2
      rcui=Renessaator_console_UI.new
      rcui.send(:test_2)
   end # Renessaator_console_UI.test_2

   public
   def Renessaator_console_UI.selftest
      ar_msgs=Array.new
      kibuvits_testeval binding(), "Renessaator_console_UI.test_1"
      #kibuvits_testeval binding(), "Renessaator_console_UI.test_2"
      return ar_msgs
   end # Renessaator_console_UI.selftest

end # class Renessaator_console_UI

#==========================================================================
#Renessaator_console_UI.new.run()

#==========================================================================