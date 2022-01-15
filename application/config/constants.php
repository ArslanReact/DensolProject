<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

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



/* 
| Custom 
*/
defined('ADMIN_FOLDER')         OR define('ADMIN_FOLDER', 'admin'); // admin access url
defined('ADMIN_VIEW_FOLDER')    OR define('ADMIN_VIEW_FOLDER', 'tecadmin'); // admin templete directory name
defined('DEVELOPER_NAME')       OR define('DEVELOPER_NAME', 'Tecmyer IT Services'); // admin templete directory name
defined('DEVELOPER_URL')        OR define('DEVELOPER_URL', 'https://tecmyer.com.au/'); // admin templete directory name
defined('LOGIN_ATTAMPT')        OR define('LOGIN_ATTAMPT', 3); // maximum number of attempts
defined('ATTAMPT_WAIT')         OR define('ATTAMPT_WAIT', 15); // attampt wait time in minuts
defined('WEBSITE_TYPE')         OR define('WEBSITE_TYPE', 'shopping'); // shopping store or inquiry base or cms base values(shopping,inquiry,cms)
defined('GUEST_CHECKOUT')       OR define('GUEST_CHECKOUT', TRUE); // shopping store or inquiry base or cms base values(shopping,inquiry,cms)
defined('WEBSITE_CURRENCY')     OR define('WEBSITE_CURRENCY', 'USD'); // shopping store Currency
defined('GEOPLUGIN')            OR define('GEOPLUGIN', TRUE); // shopping store Currency
defined('EMAIL_PROTOCOL')       OR define('EMAIL_PROTOCOL', 'smtp'); // attampt wait time in minuts
defined('EMAIL_TYPE_SECURE')    OR define('EMAIL_TYPE_SECURE', 'tls'); // attampt wait time in minuts
defined('EMAIL_SMTP_AUTH')      OR define('EMAIL_SMTP_AUTH', TRUE); // attampt wait time in minuts
defined('EMAIL_HOST')           OR define('EMAIL_HOST', 'smtp.office365.com'); // (mail.intercel.com.au) attampt wait time in minuts
defined('EMAIL_PORT')           OR define('EMAIL_PORT', 587); // (465) attampt wait time in minuts
defined('EMAIL_USER')           OR define('EMAIL_USER', 'online@densol.com.au'); // (no-reply@intercel.com.au) attampt wait time in minuts
defined('EMAIL_PASS')           OR define('EMAIL_PASS', 'dnklqvwgjsrdjzrc'); // (123456) attampt wait time in minuts
defined('UPLOADPATH')           OR define('UPLOADPATH', FCPATH.'uploads/'); // attampt wait time in minuts
defined('TIMEZONE')             OR define('TIMEZONE', 'Asia/Karachi'); // attampt wait time in minuts
defined('NOSTORE_URLLINK')      OR define('NOSTORE_URLLINK', 'https://intercel.com.au/'); // attampt wait time in minuts
defined('ORDER_NUMBER_PREFIX')      OR define('ORDER_NUMBER_PREFIX', 'DEN-'); // attampt wait time in minuts

defined('CONVERT_EDITOR_URL')             OR define('CONVERT_EDITOR_URL', 'true'); // attampt wait time in minuts
defined('EDITOR_stylesheet')             OR define('EDITOR_stylesheet', 'files/frontend/css/style.min.css,files/frontend/css/bootstrap.min.css,//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css,files/frontend/css/extra.css'); // attampt wait time in minuts


defined('PRD_S_W')           OR define('PRD_S_W', 300); // attampt wait time in minuts
defined('PRD_S_H')           OR define('PRD_S_H', 300); // attampt wait time in minuts

defined('PRD_M_W')           OR define('PRD_M_W', 500); // attampt wait time in minuts
defined('PRD_M_H')           OR define('PRD_M_H', 500); // attampt wait time in minuts

defined('PRD_L_W')           OR define('PRD_L_W', 1000); // attampt wait time in minuts
defined('PRD_L_H')           OR define('PRD_L_H', 1000); // attampt wait time in minuts






// Regex101 reference: https://regex101.com/r/pJ7lO1
defined('SHORTOCODE_REGEXP')           OR define('SHORTOCODE_REGEXP', "/(?P<shortcode>(?:(?:\\s?\\[))(?P<name>[\\w\\-]{3,})(?:\\s(?P<attrs>[\\w\\d,\\s=\\\"\\'\\-\\+\\#\\%\\!\\~\\`\\&\\.\\s\\:\\/\\?\\|]+))?(?:\\])(?:(?P<content>[\\w\\d\\,\\!\\@\\#\\$\\%\\^\\&\\*\\(\\\\)\\s\\=\\\"\\'\\-\\+\\&\\.\\s\\:\\/\\?\\|\\<\\>]+)(?:\\[\\/[\\w\\-\\_]+\\]))?)/u");

// Regex101 reference: https://regex101.com/r/sZ7wP0
defined('ATTRIBUTE_REGEXP')           OR define('ATTRIBUTE_REGEXP', "/(?<name>\\S+)=[\"']?(?P<value>(?:.(?![\"']?\\s+(?:\\S+)=|[>\"']))+.)[\"']?/u"); // attampt wait time in minuts

