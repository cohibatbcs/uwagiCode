<?php
session_start();
require_once('dbConnect/uwagi.php');

	//SESSION Variables
	$cell = $_SESSION['cell'];
	$fName = $_SESSION['fName'];
	$lName = $_SESSION['lName'];
	$email = $_SESSION['email'];
	$userID = $_SESSION['userID'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<style type="text/css"></style>
</head>
<body> 

<div id=contentDiv>

	<div id=adHeaderDiv>
    	Use the forms below to enter information into your trivia account & earn bonus trivia points!!
    </div>


	<div id=triviaBody>

		<?php
		
		
		
//			Query database for info on last question
$lastQuest = mysql_query("Select * from preference_match where userID = '$userID' order by time_stamp DESC limit 1") or die(mysql_error());
$lastQuestNum = mysql_num_rows($lastQuest);
$row= mysql_fetch_array($lastQuest);
$string = $row['questionID'] . $row['answer'];
$new_string = str_replace(' ','',$string);
$nextQuest = $new_string;
// echo $nextQuest;
//			query to see if there is a questionID that matches the answer to the last question.
$match = mysql_query("select * from user_questions where questionID = '$nextQuest'") or die(mysql_error());
$matchNum = mysql_num_rows($match);

	if ($matchNum == 0){
		$getQuest = mysql_query("SELECT * FROM user_questions WHERE questionID NOT IN (SELECT questionID FROM preference_match WHERE userID = '$userID') AND length(questionID) = 3 LIMIT 1")
			or die(mysql_error());
		$row2=mysql_fetch_array($getQuest);
		$next = $row2['questionID'];
	}
	else{
		$getQuest = mysql_query("SELECT * FROM user_questions WHERE questionID = '$nextQuest' LIMIT 1") or die(mysql_error());
		$row2=mysql_fetch_array($getQuest);
		$next = $row2['questionID'];
	}	

	print $next;
	print "<br>";
	
print $row['questionID'];			
	print "<form name=triviaEdit action=triviaEditScript.php method=post>";
		print "<table width=550 border=0 cellspacing=0 cellpadding=0>";
			if ($next = '001l') {
				print "<tr>";
					print "<td width=350>"; 
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What do you consider to be your favorite drink?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001l>";
						print "<option value=Beer>Beer</option>";
						print "<option value=Wine>Wine</option>";
						print "<option value=Mixed Drinks>Mixed Drinks</option>";
						print "<option value=Don't Drink>Don't Drink</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lBeer') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What is your favorite type of beer?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lBeer>";
						print "<option value=Light>Light</option>";
						print "<option value=Dark>Dark</option>";
						print "<option value=Ales>Ales</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lBeerLight') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What brand of light beer do you like best?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lBeerLight>";
						print "<option value=Bud>Bud</option>";
						print "<option value=Miller>Miller</option>";
						print "<option value=Coors>Coors</option>";
						print "<option value=Sam Adams>Sam Adams</option>";
						print "<option value=Michelob>Michelob</option>";
						print "<option value=Corona>Corona</option>";
						print "<option value=Natural>Natural</option>";
						print "<option value=Heineken>Heineken</option>";
						print "<option value=Busch>Busch</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lBeerDark') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What brand of dark beer do you like best?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lBeerDark>";
						print "<option value=Guinness>Guinness</option>";
						print "<option value=Smithwicks>Smithwicks</option>";
						print "<option value=Killians>Killians</option>";
						print "<option value=Sam Adams>Sam Adams</option>";
						print "<option value=Bass>Bass</option>";
						print "<option value=New Castle>New Castle</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lBeerAles') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What ale beer do you like best?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lBeerAles>";
						print "<option value=Killians>Killians</option>";
						print "<option value=Bass>Bass</option>";
						print "<option value=New Castle>New Castle</option>";
						print "<option value=Sierra Nevada>Seirra Nevada</option>";
						print "<option value=Red Stripe>Red Stripe</option>";
						print "<option value=Sam Adams>Sam Adams</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lWine') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What type of wine do you consider your favorite?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lWine>";
						print "<option value=Reds>Reds</option>";
						print "<option value=Whites>Whites</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lWineReds') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What type of wine do you consider your favorite?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lWineReds>";
						print "<option value=Shiraz>Shiraz</option>";
						print "<option value=Merlot>Merlot</option>";
						print "<option value=Cabernet>Cabernet</option>";
						print "<option value=Malbec>Malbec</option>";
						print "<option value=Pinot Noir>Pinot Noir</option>";
						print "<option value=Zinfandel>Zinfandel</option>";
						print "<option value=Barbera>Barbera</option>";
						print "<option value=Sangiovese>Sangiovese</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lWineWhites') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What type of wine do you consider your favorite?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lWineWhites>";
						print "<option value=Chardonnay>Chardonnay</option>";
						print "<option value=Pinot Grigio>Pinot Grigio</option>";
						print "<option value=Riesling>Riesling</option>";
						print "<option value=Moscato>Moscato</option>";
						print "<option value=Sauvignon Blanc>Sauvignon Blanc</option>";
						print "<option value=Semillion>Semillion</option>";
						print "<option value=Gewurztraminer>Gewurztraminer</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '001lMixedDrinks') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What type of wine do you consider your favorite?";
					print "</td>";
					print "<td width=200>";
						print "<select name=001lMixedDrinks>";
						print "<option value=Rum>Rum</option>";
						print "<option value=Vodka>Vodka</option>";
						print "<option value=Whiskey>Whiskey</option>";
						print "<option value=Tequila>Tequila</option>";
						print "<option value=Gin>Gin</option>";
						print "<option value=Brandy>Brandy</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '002') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "How many nights per week do you go out?";
					print "</td>";
					print "<td width=200>";
						print "<select name=002>";
						print "<option value=1-2>1-2</option>";
						print "<option value=3-4>3-4</option>";
						print "<option value=5-6>5-6</option>";
						print "<option value=7>7</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '003') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "Are you male or female?";
					print "</td>";
					print "<td width=200>";
						print "<select name=003>";
						print "<option value=Male>Male</option>";
						print "<option value=Femal>Female</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '005') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "Which of these foods to you most prefer?";
					print "</td>";
					print "<td width=200>";
						print "<select name=005>";
						print "<option value=Pizza>Pizza/option>";
						print "<option value=Burgers>Burgers</option>";
						print "<option value=Wings>Wings</option>";
						print "<option value=Tacos>Tacos</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '006') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "Do you love \"Happy Hours\"?";
					print "</td>";
					print "<td width=200>";
						print "<select name=006>";
						print "<option value=Yes>Yes</option>";
						print "<option value=No>No</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '007') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "Would you take advantage of texted drink specials?";
					print "</td>";
					print "<td width=200>";
						print "<select name=007>";
						print "<option value=Yes>Yes</option>";
						print "<option value=No>No</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '008') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "What is your favorite sport?";
					print "</td>";
					print "<td width=200>";
						print "<select name=008>";
						print "<option value=Baseball>Baseball</option>";
						print "<option value=Football>Football</option>";
						print "<option value=Basketball>Basketball</option>";
						print "<option value=Hockey>Hockey</option>";
						print "<option value=Racing>Racing</option>";
						print "<option value=Soccer>Soccer</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '010') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "Do you prefer men or women?";
					print "</td>";
					print "<td width=200>";
						print "<select name=010>";
						print "<option value=Men>Men</option>";
						print "<option value=Women>Women</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			elseif ($next = '011') {
				print "<tr>";
					print "<td width=350>";
						print "<b>Earn 40 points for answering this question:</b>";
					print "</td>";
				print "</tr>";
				print "<tr>";
					print "<td width=350>";
						print "Who is your cell phone carrier?";
					print "</td>";
					print "<td width=200>";
						print "<select name=011>";
						print "<option value=Verizon>Verizon</option>";
						print "<option value=ATT>ATT</option>";
						print "<option value=Sprint>Sprint</option>";
						print "<option value=T-Mobile>T-Mobile</option>";
						print "<option value=Alltel>Alltel</option>";
						print "<option value=Boost Mobile>Boost Mobile</option>";
						print "<option value=Cellcom>Cellcom</option>";
						print "<option value=US Cellular>US Cellular</option>";
						print "<option value=Virgin Mobile>Virgin Mobile</option>";
						print "<option value=Nextel>Nextel</option>";
						print "<option value=Cricket>Cricket</option>";
						print "<option value=nTelos>nTelos</option>";
						print "<option value=Cellular South>Cellular South</option>";
						print "<option value=Cincinnati Bell>Cincinnati Bell</option>";
						print "</select>";
					print "</td>";
				print "</tr>";
			}
			print "<tr>";
				print "<td width=350>";
					print "<input type=submit name=submit value=Submit>";
				print "</td>";
			print "</tr>";
		print "</table>";
	print "</form>";

		?>

	</div>
</div>
</body>
</html>



<?php
//                                     ##############
//									   # SAVED CODE #
//                                     ##############

//					***********************************************
//					* Steve's Code for cycling personal questions *
//					***********************************************

  //Query database for info on last question
//$lastQuest = mysql_query("Select * from preference_match where userID = '$userID' order by time_stamp DESC limit 1") or die(mysql_error());
//$lastQuestNum = mysql_num_rows($lastQuest);
//$row= mysql_fetch_array($lastQuest);
//$string = $row['questionID'] . $row['answer'];
//$new_string = str_replace(' ','',$string);
//$nextQuest = $new_string;
//echo $nextQuest;
  //query to see if there is a questionID that matches the answer to the last question.
//$match = mysql_query("select * from user_questions where questionID = '$nextQuest'") or die(mysql_error());
//$matchNum = mysql_num_rows($match);
//
//
//
//if ($matchNum == 0){
//$getQuest = mysql_query("Select * from user_questions where questionID not in (select questionID from preference_match where userID = '$userID') and length(questionID) = 3 limit 1") or die(mysql_error());
//}else{
//
//$getQuest = mysql_query("Select * from user_questions where questionID = '$nextQuest' limit 1") or die(mysql_error());
//}
		






//		$result = mysql_query("SELECT concat('q', questionID) FROM user_questions")
//			or die(mysql_error());
//
//				while ($row = mysql_fetch_assoc($result)){
//					${$row["concat('q', questionID)"]} = substr($row["concat('q', questionID)"],1,60);
//				}
//		
//		$result = mysql_query("SELECT concat('r', questionID) FROM preference_match WHERE userID = '$userID'")
//			or die(mysql_error());
//			
//				while ($row = mysql_fetch_assoc($result)){
//					${$row["concat('r', questionID)"]} = substr($row["concat('r', questionID)"],1,60);
//					
//				}
//				
//		$result = mysql_query("SELECT * FROM preference_match WHERE userID = '$userID'")
//			or die(mysql_error());
//			
//				while ($row = mysql_fetch_assoc($result)){
//					${$row["concat('r', questionID)"]} = substr($row["concat('r', questionID)"],1,60);
//					
//				}







//		print $userID;
//		print "<br>";
//		print "q001 = " . $q001l;
//		print "<br>";
//		print "r001 = " . $r001l;
//		print "<br>";
//		print "<br>";
//		print "q001B = " . $q001lBeer;
//		print "<br>";
//		print "r001B = " . $r001lBeer;
//		print "<br>";
//		print "<br>";
//		print "q001BL = " . $q001lBeerLight;
//		print "<br>";
//		print "r001BL = " . $r001lBeerLight;
//		print "<br>";
//		print "<br>";
//		print "q001BD = " . $q001lBeerDark;
//		print "<br>";
//		print "r001BD = " . $r001lBeerDark;
//		print "<br>";
//		print "<br>";
//		print "q001BA = " . $q001lBeerAles;
//		print "<br>";
//		print "r001BA = " . $r001lBeerAles;
//		print "<br>";
//		print "<br>";
//		print "q001W = " . $q001lWine;
//		print "<br>";
//		print "r001W = " . $r001lWine;
//		print "<br>";
//		print "<br>";
//		print "q001WR = " . $q001lWineReds;
//		print "<br>";
//		print "r001WR = " . $r001lWineReds;
//		print "<br>";
//		print "<br>";
//		print "q001WW = " . $q001lWineWhites;
//		print "<br>";
//		print "r001WW = " . $r001lWineWhites;
//		print "<br>";
//		print "<br>";
//		print "q001MD = " . $q001lMixedDrinks;
//		print "<br>";
//		print "r001MD = " . $r001lMixedDrinks;
//		print "<br>";
//		print "<br>";
//		print "q002 = " . $q002;
//		print "<br>";
//		print "r002 = " . $r002;
//		print "<br>";
//		print "<br>";
//		print "q003 = " . $q003;
//		print "<br>";
//		print "r003 = " . $r003;
//		print "<br>";
//		print "<br>";
//		print "q004 = " . $q004;
//		print "<br>";
//		print "r004 = " . $r004;
//		print "<br>";
//		print "<br>";
//		print "q005 = " . $q005;
//		print "<br>";
//		print "r005 = " . $r005;
//		print "<br>";
//		print "<br>";
//		print "q006 = " . $q006;
//		print "<br>";
//		print "r006 = " . $r006;
//		print "<br>";
//		print "<br>";
//		print "q007 = " . $q007;
//		print "<br>";
//		print "r007 = " . $r007;
//		print "<br>";
//		print "<br>";
//		print "q008 = " . $q008;
//		print "<br>";
//		print "r008 = " . $r008;
//		print "<br>";
//		print "<br>";
//		print "q010 = " . $q010;
//		print "<br>";
//		print "r010 = " . $r010;
//		print "<br>";
//		print "<br>";
//		print "q011 = " . $q011;
//		print "<br>";
//		print "r011 = " . $r011;
//		print "<br>";
//		print "<br>";

?>