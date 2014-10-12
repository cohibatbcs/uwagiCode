<?php

include('lang.inc.php');
include('conf.inc.php');
include('mysql.inc.php');
include_once('functions.inc.php');

authorization($conf['login'], $conf['password']);

connect_db($mysql['hostname'], $mysql['user'], $mysql['pass'], $mysql['db']);

(isset($_GET['page'])) ? $page = $_GET['page'] : $page = 'manage';
$cyear = escape_cyear();

if (isset($_POST['Submit']) && isset($_POST['stan']))update_db($_POST, $cyear);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>Booking Calendar Lite 1.2 - Administration Area</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="admin.css" type="text/css" charset="utf-8" />
  <script language="javascript" src="ks.js"></script>
</head>
<body>

<div id="navcontainer">
<ul id="navlist">
  <li><a href="?page=manage"<?php is_active('manage', $page); ?>>Manage calendar</a></li>
  <li><a href="?page=config"<?php is_active('config', $page); ?>>General settings</a></li>
  <li><a href="?page=lang"<?php is_active('lang', $page); ?>>Language settings</a></li>
  <li><a href="http://blog.kreci.net/code/booking-calendar-lite/">Script homepage</a></li>
</ul>
</div>

<div id="content">
<?php if ($page == 'config') : ?>


<?php if (isset($_POST['conf']))update_config($_POST['conf'], $conf); ?>
<?php include('conf.inc.php'); ?>
<h2>General settings</h2>

<form method="post">
Administrator login: <br />
<input type="text" name="conf[login]" value="<?php print $conf['login'] ?>" class="text" /><br />
Administrator password: <br />
<input type="password" name="conf[password]" value="<?php print $conf['password'] ?>" class="text" /><br />
<div style="color: white; background-color: red; width: 485px; padding: 5px; margin: 15px;">
  Support developer as it took him a lot of work to make this script and show copyright notice above the calendar
  <strong>or consider making a donation</strong>.
  <br /><br />
  Show notice: 
  <select name="conf[copyright]">
    <option><?php echo $conf['copyright'] ?></option>
    <option>Yes</option>
    <option>No</option>
  </select><br />
</div>
<input type="submit" value="Update" name="conf[submit]" class="submit" />
</form>


<?php elseif ($page == 'lang') : ?>


<?php if (isset($_POST['lang']))update_config($_POST['lang'], $lang); ?>
<?php include('lang.inc.php'); ?>
<h2>Language settings</h2>

<form method="post">
Month names (separated with comma): <br />
<input type="text" name="lang[months]" value="<?php print $lang['months'] ?>" class="text" /><br />
Year: <br />
<input type="text" name="lang[year]" value="<?php print $lang['year'] ?>" class="text" /><br />
Calendar states (separated with comma): <br />
<input type="text" name="lang[states]" value="<?php print $lang['states'] ?>" class="text" /><br />
<input type="submit" value="Update" name="lang[submit]" class="submit" />
</form>


<?php else: ?>

<p>To edit please click on a date cells, choose state and submit your changes.</p>
<form name="myform" method="post">
<?php calendar($cyear, 1); ?>
</form>


<?php endif; ?>

<div id="footer" style="padding: 15px 7px;">
<div id="feedcontainer" style="float: left; width: 250px;">
  <?php getFeed("http://feeds.kreci.net/KreCiBlogger"); ?>
</div>
<div id="foot" style="float: left; width: 500px;">

<h2>Follow me!</h2>
For script updates, tips & freebies please <a href="http://www.twitter.com/KreCiDev">follow me</a> on twitter.

<h2>Script customization</h2>
If you want this script to be customized for your website please <a href="http://blog.kreci.net/contact-me/">contact me</a>.

<h2>Donations are welcome</h2>

<a href="http://blog.kreci.net/code/booking-calendar-lite/">Booking Calendar Lite</a> is free of charge but your donations help to pay some hosting bills and motivate me to continue my work.
<p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="TSA3SY523BSQC">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="KreCi.net">
<input type="hidden" name="item_number" value="Booking Calendar Lite">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHosted">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay 
online!">
<img alt="" border="0" src="https://www.paypal.com/pl_PL/i/scr/pixel.gif" width="1" height="1">
</form>
</p>
</div>
</div>

</div>

</body>
</html>

