<?php

function authorization($login, $password) {
  if(!isset($_SERVER['PHP_AUTH_USER']) or strcmp($_SERVER['PHP_AUTH_USER'],$login) or strcmp($_SERVER['PHP_AUTH_PW'],$password)) {
    header("WWW-Authenticate: Basic realm=Secured area");
    header("HTTP/1.0 401 Unauthorized");
    die("You don't have permission to talk! Goodbye!");
  }
}

function connect_db($mysql_hostname, $mysql_user, $mysql_pass, $db) {
  @$connect = mysql_connect("$mysql_hostname","$mysql_user","$mysql_pass") or die ("Could not connect to database!");
  @$select_db = mysql_select_db($db) OR die('Could not select database!');
}

function update_db($post, $cyear) {
  for ($i = 1; $i <= 12; $i++) {
    for ($y = 1; $y <= dni_mies($i,$cyear); $y++) {
      $mies = str_pad($i, 2, "0", STR_PAD_LEFT);
      $day = str_pad($y, 2, "0", STR_PAD_LEFT);
      $data = "$cyear-$mies-$day";

      if($post["g" . $data]==$data) {
        $sql = "SELECT status FROM dates WHERE date = '" . $data . "'";
        $result = mysql_query($sql) OR die(mysql_error());

        if(mysql_num_rows($result)) {
          if ($post['stan']=='R' or $post['stan']=='O')$sql="UPDATE dates SET status='$post[stan]' WHERE date='$data'";
          if ($post['stan']=='F')$sql ="DELETE FROM dates WHERE date='$data'";
          $result =mysql_query($sql);
        } else {
          if ($post['stan']=='R' or $post['stan']=='O')$sql ="insert into dates (date, status) values ('$data', '$post[stan]')";
          if ($post['stan']!=='F')$result =mysql_query($sql);
        }
      }
    }
  }
}

function escape_cyear() {
  (!isset($_GET['y'])
   || !is_numeric($_GET['y'])
   || !checkdate(1, 1, $_GET['y']))
    ? $cyear=date("Y") : $cyear=mysql_real_escape_string($_GET['y']);
  return $cyear;
}

function dni_mies($mies,$cyear) {
  $dni = 31;
  while (!checkdate($mies, $dni, $cyear)) $dni--;
  return $dni;
}

function wyswietl_dni($mies,$cyear,$admin=0) {
  $sql = "SELECT date, status FROM dates WHERE YEAR(date) = '$cyear' AND MONTH(date) = '$mies'";
  $result = mysql_query($sql) OR die(mysql_error());
  $dates = array();
  while ($row = mysql_fetch_array($result, MYSQL_NUM))$dates[$row[0]] = $row[1];
  mysql_free_result($result);

  for ($i = 1; $i <= dni_mies($mies,$cyear); $i++) {
    $mies = str_pad($mies, 2, "0", STR_PAD_LEFT);
    $day = str_pad($i, 2, "0", STR_PAD_LEFT);
    $data = "$cyear-$mies-$day";

    if(isset($dates[$data])) {
      if($dates[$data] == "R")$tdcolor="#FF0000";
      if($dates[$data] == "O")$tdcolor="#FFA042";
    } else $tdcolor="#00CC00";

    $td = "<td id=\"$data\" style=\"width: 15px; text-align: center; background: $tdcolor; font-size: 12px;\"";
    if ($admin)$td .= " onclick=\"daty(this.id,'$tdcolor')\" ";
    $td .= ">";

    if ($admin) {
      $hidden_form="<input type=\"hidden\" id=\"g$data\" name=\"g$data\" value=\"\">";
      (isset($html)) ? $html = $html . $td . $hidden_form . $i . "</td>"
                     : $html = $td . $hidden_form . $i . "</td>";
    } else {
      (isset($html)) ? $html = $html . $td . $i . "</td>"
                     : $html = $td . $i . "</td>";
    }
    unset($td);
  }
  return $html;
}

function calendar($cyear, $admin=0) {
  global $lang, $conf;

  $ym = $cyear - 1;
  $yp = $cyear + 1;

  echo('
  <table id="calendar" style="font-family: Verdana; border: 0px; padding: 1px;">
    <tr>
      <td>&nbsp;</td>
      <td colspan="31">
      <div style="margin-left: 220px; float: left; font-weight: bold;">
          <a href="' . basename($_SERVER['PHP_SELF']) . '?y=' . $ym . '"><img border=0 src=larrow.gif></a>
              '.$lang['year'].' '.$cyear.'
          <a href="' . basename($_SERVER['PHP_SELF']) . '?y=' . $yp . '"><img border=0 src=rarrow.gif></a>
      </div>
  ');

  if ($conf['copyright']=="Yes") {
    echo('
      <div style="text-align: right; font-size: 10px; float: right; color: grey;">
          Powered by<br />
          <a style="text-decoration: none; font-weight: bold; color: grey;" href="http://www.kreci.net/code/booking-calendar-lite/" title="Booking Calendar Lite">Booking Calendar Lite</a>
          &#169;
          <a style="text-decoration: none; font-weight: bold; color: grey;" href="http://www.kreci.net" title="Coding by KreCi">KreCi</a>
      </div>
    ');
  }

  echo('
      </td>
    </tr>
  ');

  $months = explode(",", $lang['months']);
  $months = array_slice($months, 0, 12);

  foreach($months as $month) {
    (!isset($counter)) ? $counter="1" : $counter++;
    echo("
    <tr>
      <td style=\"font-size: 10px; font-weight: bold;\">$month</td>
      " . wyswietl_dni($counter,$cyear,$admin) . "
    </tr>
    ");
  }
  $states = explode(",", $lang['states']);
  echo('
    <tr>
      <td colspan=32 style="text-align: center; font-size: 13px; font-weight: bold;">
        <span style="color: #FF0000;">');
  if ($admin) echo '<INPUT TYPE="radio" NAME="stan" VALUE="R">';
  echo($states[0]."</span>
        <span style=\"color: #FFA042;\">");
  if ($admin) echo '<INPUT TYPE="radio" NAME="stan" VALUE="O">';
  echo($states[1]."</span>
        <span style=\"color: #00CC00;\">");
  if ($admin) echo '<INPUT TYPE="radio" NAME="stan" VALUE="F">';
  echo($states[2]."</span>
      </td>
    </tr>
  ");
  if ($admin) echo('
    <tr>
      <td colspan="32" style="text-align: center;">
        <input style="font-size:8pt; border : 1px solid #90A3A9; width:125px; background-color:#f3f3f3;" type="submit" value="Submit" name="Submit" />
      </td>
    </tr>
  ');
  echo('
  </table>
  ');
}

function is_active($page, $get) {
  if ($page == $get) {
    print ' id="current"';
  }
}

function update_config($post, $config) {
  $config_str = "<?php\r\n\$".$config['type']." = array();\r\n";
  
  foreach($config as $key=>$val) {
    $new_val = false;
    
    (isset($post[$key]))
      ? $new_val = $post[$key]
      : $new_val = $config[$key];
    
    $config_str .= "\$".$config['type']."['{$key}'] = '{$new_val}'; \r\n";
  }

  $config_str .= "?>";

  if ($fp = @fopen($config['type'].".inc.php", 'w')) {
    fwrite($fp, $config_str, strlen($config_str));
    echo "<div class=\"message\">Configuration file \"".$config['type'].".inc.php\" successfully updated.</div>";
    return true;
  } else {
    echo "<div class=\"message\">Config file \"".$config['type'].".inc.php\" is unwritable! Please CHMOD!</div>";
    return false;
  }
}

function getFeed($feed_url) {
  $content = file_get_contents($feed_url);
  if ($content) {
    $x = new SimpleXmlElement($content);
    echo "<ul id=\"feedlist\">";
    echo "<li id='head'><a href='http://www.kreci.net' target='_blank'>RSS FEED: Latest@KreCi.net</a></li>";
    foreach($x->channel->item as $entry) {
      echo "<li><a href='$entry->link' title='$entry->title' target='_blank'>$entry->title</a></li>";
    }
    echo "</ul>";
  }
}

?>
