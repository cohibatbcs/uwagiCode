<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Uwagi</title>
   <link href="main.css" rel="stylesheet" type="text/css" />
   <style type="text/css">
   </style>
   
<script type="text/javascript" src="http://konami-js.googlecode.com/svn/trunk/konami.js"></script>
<script type="text/javascript">
        konami = new Konami()
        konami.load("http://www.uwagibox.com/");
</script>
   
  </head>
  
  <body>
  <center>
   <div id="wrapper">
   
   	<div id="midiDiv">
      <embed 
      	src="media/base.mid" 
        width="60" 
        height="18"
        onloadstart="true"
      </embed>
	</div>
   
   <div id="usingUwagi01">
   
    <?php
     $imagedir = "images/random/";
     $images = array();
 
     $directory = opendir($imagedir);
      while($filename = readdir($directory)){
       if(strlen($filename) > 2){
        $localext = substr($filename, -3);
       if(!((strcasecmp($localext, "gif") == 0) || (strcasecmp($localext, "jpg") == 0) || (strcasecmp($localext, "bmp") == 0) || (strcasecmp($localext, "png") == 0)))
        continue;
        array_push($images, $filename);
       }
      }

     #choose a random image from the array
     srand((double)microtime() * 1000000); 
     $selection = $images[rand(0, sizeof($images)-1)];

     #display the image

     echo "<img src=\"$imagedir$selection \" alt=\"$selection  (" . filesize("$imagedir/$selection") . " bytes)\">";
    ?>

  </div>

    <div id="uwagiLogo01"><img src="images/logo001.gif" title="Uwagi Logo" width="274" height="118" alt="Uwagi Logo" />
    </div>

    <div class="menu" id="menuDiv01"> 
 
    <?php 
 
     //define Link Array
     $menuLink[1]="home";
     $menuLink[2]="clientLogin";
     $menuLink[3]="triviaLogin";
     $menuLink[4]="locations";
     $menuLink[5]="aboutUs";
 
     //define Text Array
     $menuText[1]="home";
     $menuText[2]="client page";
     $menuText[3]="trivia players";
     $menuText[4]="locations";
     $menuText[5]="about us";

     //output array values
 
     for ($i = 1; $i <= 4; $i++){
      print "<a href=$menuLink[$i].php target=contentFrame>$menuText[$i]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n";
     } // end for loop
     print "<a href=$menuLink[5].php target=contentFrame>$menuText[5]</a>";
 
    ?> 
 
    </div>

    <div id="blackFooter">
		<table border="0" bgcolor="#FFFFFF"  cellpadding="0" cellspacing="0" height="45" width="1025" align="center">
        	<tr>
                <td width="1025" align="center" valign="bottom">
					<font color="#000000">
                   	<a href="mailto:info@uwagibox.com">
                        	info@uwagibox.com
					</a>
                        &nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;333 N Commercial St. Ste. 200&nbsp;&nbsp;&nbsp;Neenah, WI 54956&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;p(920) 886-2530&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;f(920) 886-2540<br />
                    </font>
                  <br />
                	<font size="-2" color="#666666">© 2011 Uwagi, LLC. All Rights Reserved.</font>
                </td>
			</tr>
        </table>
	</div>

  <div id="mainContentBody">
     <iframe id="contentFrame"
             name="contentFrame"
             scrolling="auto" 
             src="home.php" 
             width="100%" 
             height="620" 
             frameBorder="0">
     </iframe>

    </div>    
    </div>
    </center>
  </body>
</html>