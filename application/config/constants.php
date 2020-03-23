<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$project_folder = "docustudy/";
if($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "192.168.1.135") 
{
	$project_folder = "kelly/docustudy/";
	define('BASEURL_TLG', 'http://192.168.1.135/the-learning-guide');
}

$allowed_domains = array('bhimani.com.au','thelearningguide.com.au');
$domain  = $_SERVER['HTTP_HOST'];
$request_scheme = "http";
if (in_array($_SERVER['HTTP_HOST'], $allowed_domains, TRUE))
{
    $project_folder = $project_folder;
	if(! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
	{
		$request_scheme = "https";
	}
    $domain = $_SERVER['HTTP_HOST'];
    define('BASEURL_TLG', 'http://thelearningguide.com.au/school/');
}
$base_url = $request_scheme."://".$domain."/".$project_folder;

defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/* Custom Contstant Define */
//define('BASEURL_TLG', 'http://192.168.1.135/the-learning-guide');
define('BASEURL', $base_url);
define('ASSETPATH', BASEURL.'assets/');
define('FRONTENDPATH', ASSETPATH.'user/');
define('ADMINPATH', ASSETPATH.'admin/');
define('FRONTEND', 'user/');
define('ADMIN', 'admin/');
define('ADMIN_LINK', BASEURL.'admin/');
define('F_CSSPATH', FRONTENDPATH.'css/');
define('F_JSPATH', FRONTENDPATH.'js/');
define('F_IMGPATH', FRONTENDPATH.'images/');

/**/
define('MyPath', 'assets/uploads/files/');
define('DemoPath', 'assets/uploads/image/demo/');
define('IMG_INDUSTRY','assets/uploads/image/industry/');
define('IMG_DOC','assets/uploads/image/document/');
define('IMG_SMILY','assets/uploads/image/smily/');
define('StoryPath', 'assets/uploads/image/story/');
/**/

define('LOGOPATH', ASSETPATH.'images/logo/');
define('UPLOADPATH', 'assets/uploads/');
define('UPLOADPATHADMIN', 'assets/images/logo/');
define('UPLOADPATHFRONT', 'assets/images/logo/');
define('FRONTLOGOPATH', ASSETPATH.'user/images/');
define('PROFILEPATH', UPLOADPATH.'profile/');
define('BLOGPATH', UPLOADPATH.'blog/');

//New Added
define('TESTIMONIALPATH', UPLOADPATH.'testimonial/');

//New Constant
define('HOMEPATH', UPLOADPATH.'home/');
define('TOURPATH', UPLOADPATH.'product/');
define('SUBPRODUCTPATH', UPLOADPATH.'subproduct/');

//Email
define('FROMNAME','Docustyudy');
define('FROMMAIL','info@docustudy.com.au');

//Error MSG
define('ERRMSG','Not Define');
//Profile
define('PROFILEPICHEIGHT', '423');
define('PROFILEPICWIDTH', '324');

//Currency
define('CURRENCY', '$');


//Admin Blog
define('PERPAGE', '10');


// Date Format
define('DATEFORMATREVIEW', 'd F Y');//10 March 2017
define('DATEFORMAT', 'F j- Y');//13th April, 2017

//New Added 23-08-2017
define('UPDATEDFORMAT', 'F jS, Y');
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code




/* Docustudy Review points*/
define('REW_UPLOAD_DOC', '2');