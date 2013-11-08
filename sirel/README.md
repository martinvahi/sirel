
Sirel PHP Library
===========================================================================

The word "sirel" stands for "lilac" in Estonian.

The Sirel PHP library is a general mixture of various PHP components
that might be (for some people, are) useful for building server
side software.

The Sirel PHP library (hereafter: Sirel)  depends on
bash and many standard Linux/BSD/Posix tools.
It might run under CygWin, but it has not been tested on Windows.

---------------------------------------------------------------------------

##                        W A R N I N G ! ! !

Sub-parts of it are pretty tried and tested and I as the
original author of this library have been using it for production,
but the whole library needs HEAVY REFACTORING.
The user of the Sirel really needs to know one's way
around the library to use it.

I do not promise that You will not run into trouble, if You
use this library, despite the fact that it's the main PHP library
that I use for all of my PHP projects.

---------------------------------------------------------------------------

##                         Introduction

The Sirel does not impose any particular architecture
to its client projects. Architecturally the Sirel is a
set of functions that have been divided to namespaces.
The namespaces are in the form of classes and
functions are in the form of static methods.

There are some exceptions. For example, database connection related
username, password, port, etc. have been wrapped to
a class, 

    sirelDatabaseDescriptor

and applications that use more than one database 
create as many instances of that class as there are 
simultaneous database connections. To reuse an 
established database connection, database
connections are managed by a singleton, 

    sirelDBgate_pool

There exists a database engine (PostgreSQL, MySQL, etc.)
abstraction layer that supports only the column types that
can be supported by all supported database engines.
That is to say, as long as an application uses databases 
only through the Sirel database abstraction layer, 
the application can use, without any changes to its code, 
any of the database engines that are supported by Sirel.

Currently the MySQL support is broken (needs refactoring,
update) and only PortgreSQL can be used. SQLite is not yet
supported, but planned. After SQLite, the next database
engine to support is the

http://www.h2database.com/

The Sirel can be used without using any of its
database related code.


To use the whole library, the

    ./src/devel/src/sirel.php

should be "required once", included.

Each of the Sirel PHP Library files includes, "requires once",
all other Sirel PHP Library files that it depends on.
This makes it possible to use the library by "requiring once" only
the files that seem necessary.

Code examples are provided in a form of small demo-applications that
reside in ./doc/examples


---------------------------------------------------------------------------

##                     Unincluded Dependencies

Client code mandatory dependencies:

*   Most of the Sirel PHP library has been written in PHP 5.2, but it
    runs also on PHP 5.4 and in the future the support for
    the PHP 5.2 will be dropped.

*   The PHP mbstring extension.
    The sirel_core.php switches the internal string
    representation to UTF-8 and all of the library
    source relies on an assumption that the internal
    string representation is UTF-8.

*   The PHP GNU Multiple Precision extension (GMP extension).

Optional dependencies for client code:

*   Memcached support.


Dependencies for developing (modifying) the Sirel PHP library:

*   Ruby 2.0.x or newer (http://ruby-lang.org/ )

*   mmmv_devel_tools (https://github.com/martinvahi/mmmv_devel_tools )

*   Linux, because all of the code generation scripts are Linux specific.

*   Optionally NetBeans version 6.8, because later versions of NetBeans
    have a code formatter that spoils the Sirel PHP library code by
    placing all single line comments that
    follow a curly closing brace to a new line.
    Explanation by an example:

            } // function_name_as_a_comment

    becomes

            }
            // function_name_as_a_comment

    A Linux version of the NetBeans 6.8 binary might
    be downloaded from

    http://technology.softf1.com/software_by_third_parties/netbeans_6_8/

    A historical side note (written in December 2012):
    the NetBeans version 6.8 seems to be the
    last version that got published under the Sun Microsystems.
    The NetBeans 6.9 seems to be already released under
    the Oracle, which acquired the Sun Microsystems.
    There have been rumors on the net that the Oracle
    crippled many of the original developers salaries,
    causing many former Sun Microsystems developers
    leave the company, the Oracle.

    As of NetBeans version 7.2.1 the PHP formatting
    bug has still not been fixed, although the
    JavaScript part of the NetBeans 7.2.1 seems to be
    more advanced and stable than in the NetBeans 6.8.


To use the Sirel, it is necessary to add some configuration
code to client source. For example, database username
and password have to be furnished.

Some projects that depend on Sirel depend on the environment variable
SIREL_HOME, which is meant to hold a full path to the folder that
contains the ./README.md that You are currently reading.


---------------------------------------------------------------------------

##                   Some of the Files in the ./src/src

*   sirel.php

    An inclusion file for client applications that
    use the whole library. This file should NOT
    be "included" ("required once") by any of the Sirel's
    own files. It contains a description of Sirel
    file dependencies.

*   sirel_core.php

    The core of the Sirel library. All other Sirel
    library PHP-files depend on that file.

*   sirel_core_configuration.php

    List of Sirel configuration parameters that
    Sirel client code should, sometimes must, over-write,
    explicitly specify. For example, the client code
    should contain the following line after Sirel
    inclusion:

    sirelSiteConfig::$debug_PHP=FALSE;

    It is imperative that deployments are tested
    in both modes, the mode, where

    sirelSiteConfig::$debug_PHP==TRUE;

    and the mode, where

    sirelSiteConfig::$debug_PHP=FALSE;


*   sirel_lang.php

    Mainly type verification routines and string operations.

*   sirel_db.php

    Database engine abstraction. Provides an SQL
    interface that does not depend on any of the
    supported database engines.

    Database engine is chosen by supplying
    a database engine name within web application
    configuration.

    Data types are abstracted away, because different database
    engines use slightly different type names.

*   sirel_dbcomm.php

    Higher level database access abstraction than
    the sirel_db.php. The sirel_db.php
    abstracted away the database engine specific issues,
    but sirel_dbcomm.php depends on the sirel_db.php
    and implements an interface, where the
    SQL statements are assembled automatically
    from hashtables.

*   sirel_resource.php

    Routines that are related to user interface media.
    For example user interface messages, menu item
    names in different languages, etc.

*   sirel_security.php

    More general than just crypto.

*   sirel_html.php

    Provides a class, sirelHTMLPage,
    that has a method "to_s()", which prints out
    a string representation of a HTML page. Different
    regions of the HTML page are public
    fields of the class sirelHTMLPage.

*   sirel_operators.php

    Set of functions that mimic the idea behind
    the C++ operators. The main feature, benefit,
    of those functions is that the function that
    is used for the operator is chosen dynamically
    according to the types of the operands.
    This file contains an enhanced version of
    the classical MAP function. The implementation
    entry point is a function named "func_sirel_map".

*   sirel_raudrohi_support.php

    Convenience code for applications that use
    the Raudrohi JavaScript Library.

*   sirel_request_handling.php

    Some rather high-level stuff that
    does not seem to fit anywhere else.


---------------------------------------------------------------------------

##                   Hall of Fame

There is no point of listing the PHP-scene participants that deserve
most of the credit, because they are already known and famous.

This "Hall of Fame" section is for listing some noteworthy
projects that have not caught that much public attention.


*   http://solarphp.com/

*   http://www.yiiframework.com/



Projects that are used for creating the Sirel:

*   https://github.com/mustangostang/spyc/

*   http://pirum.sensiolabs.org/



---------------------------------------------------------------------------
