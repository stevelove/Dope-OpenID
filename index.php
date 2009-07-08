<?php
/**
*	This file is part of Dope OpenID.
*   Author: Steve Love (http://www.stevelove.org)
*   
*   Some code has been modified from Simple OpenID:
*   http://www.phpclasses.org/browse/package/3290.html
*
*   Yadis Library provided by JanRain:
*   http://www.openidenabled.com/php-openid/
*
*	Dope OpenID is free software: you can redistribute it and/or modify
*	it under the terms of the GNU General Public License as published by
*	the Free Software Foundation, either version 3 of the License, or
*	(at your option) any later version.
*
*	Dope OpenID is distributed in the hope that it will be useful,
*	but WITHOUT ANY WARRANTY; without even the implied warranty of
*	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
*	GNU General Public License for more details.
*
*	You should have received a copy of the GNU General Public License
*	along with Dope OpenID. If not, see <http://www.gnu.org/licenses/>.
**/

/*
* YOU MUST EDIT THIS LINE
* This must be discoverable by sites like Yahoo to prevent security warnings.
* Make sure this line points to the location of your XRDF file. It must be located
* in the directory you specify as the "trust root". See login.php (line 104).
*/
header('X-XRDS-Location:http://www.stevelove.org/projects/dope-openid/demo/yadis.xrdf');

/*
* Example uses default PHP sessions.
* Feel free to use whatever session management you prefer.
*/
session_start();

if (isset($_GET['openid_mode'])) {
	// $_SESSION is used here for example purposes. You can use
	// whatever session management method your script uses instead. 
	// If the user is not logged in, redirect to login script.
    if(!isset($_SESSION['loggedin'],$_SESSION['username']) || $_SESSION['username'] == ''){
        header("Location: login.php");
        exit;
    }    
}

/*
* This is just a welcome message. Your default index page may differ.
* The second and fourth lines use the ternary operator for conciseness. 
* Info: http://us2.php.net/ternary#language.operators.comparison.ternary
*/
$message  = "Welcome, ";
$message .= ($_SESSION['loggedin'])?$_SESSION['username']:"guest";
$message .= "!<br /><br />";
$message .= ($_SESSION['loggedin'])?'<a href="logout.php">Log Out</a>':'<a href="login.php">Log In</a>';


/* 
* Begin HTML display below.
* Again, this is just an example. Your index page may differ.
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Dope OpenID Demo</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
</head>

<body>
<?php echo $message; ?>
</body>

</html>
