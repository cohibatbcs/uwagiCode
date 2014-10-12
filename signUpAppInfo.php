<?php
$business = $_GET['business'];
$email = $_GET['email'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uwagi</title>
<link href="main.css" rel="stylesheet" type="text/css" />  
<style type="text/css">
#aboutUsBody{
	padding: 15px;
	border: none;
	margin-top: -75px;
}

.bold {
	font-weight: bold;
}
</style>

    <script type="text/javascript">
		var count = "1600";
		function limiter(){
		var tex = document.appInfo.desc.value;
		var len = tex.length;
		if(len > count){
   	    tex = tex.substring(0,count);
   			document.appInfo.desc.value =tex;
    		return false;
		}
		document.appInfo.limit.value = count-len;
		}
	</script>
    
 <script type="text/javascript" src="jquery/jquery/jquery-1.6.1.js">
 
 $(document).ready(function() {

	$("#desc img[title]").tooltip();

});
 
 </script>  

</head>
<body>
 <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>


<div id=contentDiv>


	<div id=aboutUsBody>
    <form name="appInfo" action="signUpAppScript.php" method="post">
		<table width="519">
        <tr>
            	<td colspan="2" class="bold">
                	<span style="font-size: 12pt; color: #090;">Complete the form below to sign up for Uwagi.</span>
                </td>
             
			</tr>
                 <tr>
            	<td colspan="2">
           			<hr/>
            	</td>
            </tr>
        	
        	<tr>
            	<td class="bold">
                	Establishment Name: 
                </td>
                <td>
                	<input type="text" name="name" value="<?php echo $business; ?>" size="24" maxlength="128"/>
                </td>
			</tr>
        	
        	
        	<tr>
            	<td class="bold">
                	Phone Number: 
                </td>
            <td>
                	<input type="text" name="phone" value="" size="15" maxlength="12"/> 
               	Ex. 920-555-1234
            </td>
			</tr>
        	<tr>
            	<td class="bold">
                	Address: 
                </td>
                <td>
                	<input type="text" name="address" value="" size="24" maxlength="128"/>
                </td>
			</tr>
        	<tr>
            	<td class="bold">
                	City: 
                </td>
                <td>
                	<input type="text" name="city" value="" size="24" maxlength="128"/>
                </td>
			</tr>
        	<tr>
            	<td class="bold">
                	State: 
                </td>
                <td>
                	<input type="text" name="state" value="" size="3" maxlength="2"/>
                </td>
			</tr>
        	<tr>
            	<td class="bold">
                	Postal Code: 
                </td>
                <td>
                	<input type="text" name="zip" value="" size="6" maxlength="5"/>
                </td>
			</tr>
            <tr>
            	<td width="167" class="bold">
                	Email Address: 
                </td>
                <td width="340">
                	<input type="text" name="email" value="<?php echo $email; ?>" size="24" maxlength="128"/>
                </td>
			</tr>
            <tr>
            	<td colspan="2">
           			<hr/>
            	</td>
            </tr>
            <tr>
            	<td class="bold">
                	Establishment Type: 
                </td>
                <td>
                	<input type="checkbox" name="type[]" value="bar" />Bar<br />
                    <input type="checkbox" name="type[]" value="restaurant" />Restaurant<br />
                </td>
			</tr>
           
        <tr>
            	<td height="24" class="bold">
                	Description: <a href="#"><img src="images/question.gif" id="desc" title="Enter any information about your business that you would like potential customers to see. For example, you may want to let people know what your establishment is famous for, or what your business hours are.  It's really up to you to be creative here so you can draw new customers in to your establishment." width="18" height="18" /></a>

</td>
                <td>
                	<!--<input type="textarea" name="desc" value="" size="45" maxlength="1600"/>-->
                  <textarea name=desc wrap=physical rows=4 cols=40 onkeyup=limiter()></textarea> 
                	</td>
			</tr>
            <tr>
            <td>
            </td>
            	<td height="24" >
            	<script type="text/javascript">
				document.write("Characters Remaining: <input type=text name=limit size=4 readonly value="+count+">");
			</script>
                </td>
               
			</tr>
         
        	<tr>
            	<td class="bold">
                	Number of Tables: 
                </td>
                <td>
                	<input type="text" name="tables" value="" size="4" maxlength="4"/>
                </td>
			</tr>
			</tr>
        	<tr>
            	<td class="bold">
                	Establishment Capacity: 
                </td>
                <td>
                	<input type="text" name="capacity" value="" size="4" maxlength="4"/>
                </td>
			</tr>
        	<tr>
            	<td class="bold">
                	Uwagi Special Offer: 
              <a href="#"><img src="images/question.gif" id="desc" title='This is the "Special Offer" you would like to extend to your customers. For example you might offer a "Buy One, Get One Free Drink", or "Buy One Burger, Get One Free".' width="18" height="18" /></a></td>
                <td>
                	<input type="text" name="offer" value="" size="40" maxlength="128"/>
                </td>
			</tr>
            
        	<tr>
            	<td class="bold">
                	Offer Length (in hours):
                </td>
                <td>
                	<input type="text" name="offerLength" value="" size="24" maxlength="4"/> 
                	<em> Ex. 168 hours = 1 week</em>
                </td>
			</tr>
        	<tr>
            	<td class="bold">
                	Website address: 
                </td>
                <td>
                	<input type="text" name="website" value="" size="40" maxlength="128"/>
                </td>
			</tr>
                 <tr>
            	<td colspan="2">
           			<hr/>
            	</td>
            </tr>
        	<tr>
            	<td>
                	
                </td>
                <td>
                	<input type="submit" name="submit" value="Submit Form" />
                </td>
			</tr>
		</table>
	</form>
	</div>
    
</div>
</body>
</html>