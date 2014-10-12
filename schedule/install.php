<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>Booking Calendar Lite - SETUP</title>
  <link rel="stylesheet" href="admin.css" type="text/css" charset="utf-8" />
  <script language="javascript" src="ks.js"></script>
</head>
<body>

<?php

include('lang.inc.php');
include('conf.inc.php');
include('mysql.inc.php');
include('functions.inc.php');

if (isset($_GET['createdb'])) {
  $connect = @mysql_connect($mysql['hostname'],$mysql['user'],$mysql['pass']) or die ("MySQL_Connect Error - please check your setup and try again.");
  $select_db = @mysql_select_db($mysql['db']) OR die("MySQL_DB Error - please check your setup and try again.");

  $sql = "CREATE TABLE `dates` (
	`date` date NOT NULL ,
	`status` varchar( 1 ) NOT NULL ,
	UNIQUE KEY `date` ( `date` )
	) ENGINE = MYISAM DEFAULT CHARSET = latin1;";

  @mysql_query($sql) or die ('MySQL_Query Error - please check your setup and try again.');
  echo ("Everything looks good - please remove install.php now!");
} elseif (isset($_POST['save'])) {
  if (update_config($_POST['mysql'], $mysql) && update_config($_POST['conf'], $conf)) {
    echo "<p>Now <a href=\"?createdb=1\">click here to create database</a>.</p>";
  } else {
    echo "<p>Please fix the problem and <a href=\"".basename($_SERVER['PHP_SELF'])."\">try again</a>.</p>";
  }
} else {

?>
<form method="post">
<h2>Set your administrator username and password:</h2>
Username: <br />
<input type="text" name="conf[login]" class="text" /><br />
Password: <br />
<input type="password" name="conf[password]" class="text" /><br />
<h2>Provide your MySQL database details:</h2>
MySQL hostname: <br />
<input type="text" name="mysql[hostname]" class="text" /><br />
MySQL username: <br />
<input type="text" name="mysql[user]" class="text" /><br />
MySQL password: <br />
<input type="password" name="mysql[pass]" class="text" /><br />
MySQL database name: <br />
<input type="text" name="mysql[db]" class="text" /><br /><br />
<input type="submit" value="Save" name="save" class="submit" />
</form>
<?php

}

?>

</body>
</html>