=====================================
Apple Zen Template v2.6 for Zen Cart
=====================================

*~PLEASE READ THIS ENTIRE README.TXT BEFORE INSTALLING **SEE THE TIPS SECTION FOR LOTS OF HELPFUL HINTS!~*

Designed by Jade True - www.sagefish.com
Designed and tested on Zen Cart v1.3.0.2*, 1.3.5*, 1.3.6*, 1.3.7 and 1.3.8

Tested Browsers: FireFox v1.5.0.4, FireFox 2.0, Opera v9.0, Safari 2.0.4, IE6, IE7

You can view this template in action at:
http://www.zencart137.jadetrue.com

Template Support Thread:
http://www.zen-cart.com/forum/showthread.php?t=71295

*******************************************************
There are no restrictions on using this template. You may remove the "Template Designed by Sage Fish.com" if you like from the english.php file, but it is appreciated if it is left there. Donations are not required, but accepted via Paypal at these addresses:

payments@jadetrue.com
jade@jadetrue.com (funded payments only) 

Don't forget to donate to Zen Cart as well: http://www.zen-cart.com/index.php?main_page=infopages&pages_id=14
*******************************************************

*NOTE: IF YOU ARE USING A VERSION OF ZEN CART OLDER THAN 1.3.7, there are three files that need to be replaced:
1.includes/templates/apple_zen/common/tpl_main_page.php.
2.includes/templates/apple_zen/templates/tpl_checkout_payment_default.php
3.includes/templates/apple_zen/templates/tpl_checkout_success_default.php

These three files are found in the "pre_1.3.7_files" folder in this package.

*NOTE* The hover feature that you see on product images on my test site is made possible by a mod for zen cart called ImageHandler 2 (IH2). This is NOT included in this template. This can be found here:
http://www.zen-cart.com/index.php?main_page=product_contrib_info&cPath=40_47&products_id=117

=================================================================
This template has a few special features you should read about:
=================================================================
**NEW** in version 2.1
This template is now "source ordered" a bit, meaning that while the css dropdown menu shows up near the TOP of the site, the HTML coding for it appears at the BOTTOM of the site. This is done so that if you have a TON of categories, now the main content (text) of your site will appear earlier in the source. This can be helpful for search engine optimization. This new feature does make the template a little more css complicated, however for most users it will not have any issues.

This template is designed to increase in size as font size is increased in the browser, keeping the same aspect ratio. Even the logo is designed to resize (optional). In this template, I've also included some extra features, such as a horizontal drop down menu which includes your categories. Also included is the Order Steps Table-less module which gives your customer a visual indicator of where they are in the order process. In addition, in my horizontal drop down menu, I've added a link to an "About Us" page, and in the template are all the files needed to get the about us page to work. There are instructions below in the TIPS section on removing the about us page.

This template is designed to **ONLY** have sideboxes on the ONE side of the page, and by default will automatically move all left sideboxes over to the right side. If you forget to go to the Layout Boxes Controller in the admin and change all sideboxes to the right, your left boxes will still display, but they will display below any right sideboxes. There is a way to have sideboxes on the LEFT side, and this will be discussed further in this readme file (in the TIPS section), however, there is no way to have sideboxes on BOTH sides with this template. There are also instructions in the TIPS section for removing ALL sideboxes.

I've included three extra colors... red, blue, and grey. To change colors, simply open up includes/templates/apple_zen/css/stylesheet.css, and un-comment the color you want to use, and comment out the color you don't want to use. You'll also need to open up includes/templates/apple_zen/css/stylesheet_header_menu.css to change the colors in the drop down menu. This template also has fancy schmancy drop shadows, but these will not show up in IE6 or earlier.

=====================================
Steps to Install Apple Zen Template
=====================================

** STEP 1. Copy ONLY the "includes" folder to your website. These files are in the current zen cart structure. 

=====================================
File UPLOAD TIPS:
=====================================

=== Upload Method 1
Use an FTP program to upload the files. There are many free FTP programs available, simply do a google search to find one (Filezilla is a good one). You will need to ask your web host for your FTP password. Once you login to the folder that already contains your existing includes/ folder (the root folder of your store, where admin, cache, download, includes, etc. are located), simply upload ONLY the includes folder of this template to the web. All files will "magically" end up where they belong, since I've put all the files in the correct zen cart structure, and as long as you haven't uploaded an earlier version of my template, nothing will be overwritten. ** If you ARE updating from an earlier version of Apple Zen template, all of the "old" files will be over-written. If you want to start fresh, this is fine.

If you already have all the zen cart files on your home computer, and you're already using FTP to work with your site, simply drag and drop the includes folder for this template into the folder above "includes" and it will add all the files for the template in its correct spot without overwriting any files. Note: If you are a mac user, dropping the includes folder will *replace* the includes folder, so you can't do it that way (ChronoSync is a great program for mac for adding files to the zen cart structure easily).

== Upload Method 2
Use your online file manager to upload the files. Ask your web host how to get to your File Manager. A simple way to upload this template with File manager is to zip up the includes folder, and name it "includes.zip". So basically you upload includes.zip into the folder that contains the "includes" folder (the root of your zen cart store, where admin, cache, download, includes, etc. are located). After uploading includes.zip, click on it, and choose "extract file contents", and it will then magically place all files where they belong. NOTE! This is how MY file manager works, your mileage may vary! Be sure to BACKUP your includes folder before doing this. Also, this will only work for a NEW installation of this template, not an update (because extracting the zip will only add any new files, not overwrite any old files.

!NOTE! If you are very uncomfortable with installing the template, contact me at jade@jadetrue.com and we can work something out.


** STEP 2. Goto your Zen Cart admin...

Under the "Tools" menu choose 
   -Template Selection
   -Edit
   -Choose "Apple Zen" from the dropdown menu
   -Click update

If you do not see it, confirm that ALL files have been uploaded for this template, especially includes/templates/apple_zen/template_info.php


** STEP 3. Go to "Tools" then "Layout Boxes Controller"

And turn on the sideboxes you would like to use. This template is set to ONLY use the right sideboxes, whether or not you have left sideboxes turned on. All left sideboxes that happen to be "on" will show up on the right side, underneath any right sideboxes. It is possible to have sideboxes on the left side of the page with this template, see the tips section for instructions on how to do this. However, you cannot have left AND right sideboxes with this template. Be sure to turn on the tpl_search_header.php, by setting the "single column status" to on. This will put the search box on the top right of the site. 

** STEP 4. To remove the text: "To change any of the site colors, open up includes/templates/apple_zen/css/stylesheet.css. To overwrite your own logo, upload your logo.gif to includes/templates/apple_zen/images/" open up includes/languages/english/apple_zen/header.php. To remove the standard zen cart "Congratulations! You have successfully installed your Zen Cartª E-Commerce Solution.", open up includes/languages/english/index.php (then once you've changed it, SAVE the file in includes/languages/english/apple_zen/ folder, so that it is not over-written when you do a zen cart upgrade). To remove the "Welcome Guest! Would you like to log yourself in?", open up your admin, and turn it off under "Configuration", "Layout Settings", and turn off "Customer Greeting - Show on Index Page".

** STEP 5. To use your own logo, simply overwrite "logo.gif" that is located in includes/templates/apple_zen/images/ and upload. You can create an image that is larger than it is designed to be viewed, so that when someone increases their font size, the image will enlarge also. If your logo is a lot wider or narrower than the one I designed, you may need to adjust this section in the stylesheet (includes/templates/apple_zen/stylesheet.css):

#logo {
	width:19.1em
	}

To keep your logo from resizing, remove

#logo img {
	width:100%;
	}

from stylesheet.css, and enter your logo's exact width in the #logo section.


** STEP 6. To change the site colors, go to includes/templates/apple_zen/stylesheet.css and follow the instructions found there.


** STEP 7. Due to popular demand, I have added a second Layout style for this Template, it is called the "Narrow Header" version. Here is a screenshot of what it should look like:
http://www.zencart137.jadetrue.com/images/narrow_header.gif

To use this version, open up includes/templates/apple_zen/stylesheet.css and follow the instructions starting at #headerWrappera (approx line 191)


** STEP 8. For full compatibility with IE browsers prior to IE7, you can add the sample code within the "additions to .htaccess" file to your .htaccess file. The .htaccess file you will add this to is the one in the ROOT of your zen cart installation... it should be right above the admin folder, if not, just add it.


** STEP 9. (optional) I've added the ability to have your ezpages automatically shown in the INFORMATION drop down menu. To get this to work, follow these steps:

--> go to your admin, and go to "Tools", "Layout Boxes controller". There should be a new sidebox (ezpages_drop_menu.php). You must turn the SINGLE COLUMN STATUS TO ON, leave the LEFT/RIGHT COLUMN STATUS off.--> Under "Tools", "EZPages", make sure the ezpages are set to ON for the header. The sort orders also have to be greater than "0". 

--> If you want to have the regular zen cart horizontal header bar off, go to "Configuration", "EZPages Settings", and turn the header bar display status to off (0).


** STEP 10.(optional) If you'd like little drop down arrows for top-level items that have sub items, or little right facing arrows for categories that have subcategories, open up includes/templates/apple_zen/css/stylesheet_header_menu.css and un-comment (remove the beginning "/*" and the ending "*/") these two sections:

/*div#dropMenu li.submenu {background: url(../images/dropmenu.gif) 95% 50% no-repeat;} */

/*div#dropMenu li.submenu li.submenu {background: url(../images/submenu.gif) 95% 50% no-repeat;} */


Done!

==========
*TIPS*
==========
1. To change the order of or remove any of the links in the dropdown header menu, open up includes/templates/apple_zen/common/tpl_drop_menu.php

2. To change the text used for the dropdown header menu links, open up includes/languages/english/extra_definitions/apple_zen/headermenu.php

3. The grey color behind the sideboxes is controlled by the includes/templates/apple_zen/images/content_bg.gif. To change the color, open it in an image editing program, and simply replace the grey portion.

4. To remove the grey and white small striped image that is just above the breadcrumb section, remove:

<div id="centerColumnOuter"></div>

from includes/templates/YOUR_TEMPLATE/common/tpl_main_page.php

5. To move all sideboxes over to the LEFT side of the site, instead of the right, open up includes/templates/apple_zen/css/stylesheet.css and change:

#centerColumnWrapper2{
background:url(../images/content_bg.gif) repeat-y 80% 0;
}

to:

#centerColumnWrapper2{
background:url(../images/content_bg2.gif) repeat-y 20% 0;

Also change:

.centerColumn {	width:75%;	float:left;	margin:0 2% 2% 3%;	text-align:left;	line-height:1.6em;	display:inline; /* fixes IE Bug in IE6 and earlier - do not remove */	}

to:

.centerColumn {	width:75%;	float:right;	margin:0 2% 2% 3%;	text-align:left;	line-height:1.6em;	display:inline; /* fixes IE Bug in IE6 and earlier - do not remove */	}


6. To remove the about us page, open up includes/templates/apple_zen/common/tpl_drop_menu.php and remove this line (approx. line 61)

<li><a href="<?php echo zen_href_link(FILENAME_ABOUT_US); ?>"><?php echo HEADER_TITLE_ABOUT_US; ?></a></li>

Also open up includes/modules/sideboxes/apple_zen/information.php and remove this line (approx 26)

$information[] = '<a href="' . zen_href_link(FILENAME_ABOUT_US) . '">' . BOX_INFORMATION_ABOUT_US . '</a>';


7. If you would not like ANY sideboxes on this site, simply go to your admin under "Configuration", then "Layout Settings", and set the "Column Right Status - Global" to "0". This will turn off both left and right sideboxes globally, whether or not any of them are set to "on" under "Layout Boxes Controller". Then add this to your stylesheet:

#centerColumnWrapper2 {    background:#ffffff!important;}.centerColumn {     float:left!important;     width:95%!important;
}


=====================================
FILES INCLUDED IN THIS PACKAGE:
=====================================
(files for earlier versions of zen cart)
==pre_1.3.7_files/tpl_checkout_payment_default.php
==pre_1.3.7_files/tpl_checkout_success_default.php
==pre_1.3.7_files/tpl_main_page.php

(main files)
==additions_to_.htaccess
==includes/classes/categories_ul_generator.php
==includes/csshover.htc
==includes/extra_datafiles/about_us_filenames.php
==includes/languages/apple_zen/english.php 
*NOTE* If you have already customized your english.php file the way you want it, it would be easier to just make this change:
Remove: 
"&nbsp;&nbsp;[more]" from this section:
//text for sidebox heading links
  define('BOX_HEADING_LINKS', '&nbsp;&nbsp;[more]');

==includes/languages/english/apple_zen/about_us.php
==includes/languages/english/apple_zen/header.php
==includes/languages/english/extra_definitions/apple_zen/about_us.php
==includes/languages/english/extra_definitions/apple_zen/headermenu.php
==includes/languages/english/extra_definitions/apple_zen/order_steps_defines.php
==includes/languages/english/html_includes/define_about_us.php
==includes/modules/pages/about_us/header_php.php
==includes/modules/sideboxes/apple_zen/ezpages_drop_menu.php
==includes/modules/sideboxes/apple_zen/information.php
==includes/templates/apple_zen/buttons/* (buttons to match design)
==includes/templates/apple_zen/common/tpl_box_default_left.php
==includes/templates/apple_zen/common/tpl_box_default_right.php
==includes/templates/apple_zen/common/tpl_drop_menu.php
==includes/templates/apple_zen/common/tpl_footer.php
==includes/templates/apple_zen/common/tpl_header.php
==includes/templates/apple_zen/common/tpl_main_page.php  *IF USING A VERSION EARLIER THAN 1.3.7, please use the alternate tpl_main_page.php
==includes/templates/apple_zen/css/checkout_confirmation.css
==includes/templates/apple_zen/css/checkout_payment.css
==includes/templates/apple_zen/css/checkout_shipping.css
==includes/templates/apple_zen/css/checkout_success.css
==includes/templates/apple_zen/css/stylesheet_header_menu.css
==includes/templates/apple_zen/css/stylesheet.css
==includes/templates/apple_zen/images/* (logo, different color images, shadow images, etc.)
==includes/templates/apple_zen/sideboxes/tpl_ezpages_drop_menu.php
==includes/templates/apple_zen/sideboxes/tpl_search_header.php
==includes/templates/apple_zen/template_info.php
==includes/templates/apple_zen/templates/tpl_about_us_default.php
==includes/templates/apple_zen/templates/tpl_checkout_confirmation_default.php
==includes/templates/apple_zen/templates/tpl_checkout_payment_default.php
==includes/templates/apple_zen/templates/tpl_checkout_shipping_default.php
==includes/templates/apple_zen/templates/tpl_checkout_success_default.php

==================
Update History: 
==================
== v 2.6 Update 6/29/08 Updates to includes/templates/apple_zen/css/stylesheet.css (optimized it to be smaller, cleaned up code), made includes/templates/apple_zen/images/headerborder.gif smaller, added three files to fix issue with the specials page when there are no specials: includes/languages/english/apple_zen/specials.php, includes/modules/pages/specials/main_template_vars.php, includes/templates/apple_zen/templates/tpl_specials_default.php

==v 2.5 Update 3/17/2008 Updates to includes/templates/apple_zen/css/stylesheet.css


==v 2.4 Update 1/14/2008 Updates to includes/templates/apple_zen/common/tpl_main_page.php, includes/templates/apple_zen/css/stylesheet.css, includes/templates/apple_zen/css/stylesheet_header_menu.css, includes/templates/apple_zen/templates/tpl_checkout_confirmation_default.php, includes/templates/apple_zen/templates/tpl_checkout_shipping_default.php 

added: includes/templates/apple_zen/common/tpl_footer.php

This version addresses a lot of issues with IE6 and the drop down menu.

==v 2.3 Update 10/28/2007 Updates to includes/templates/apple_zen/common/tpl_drop_menu.php, includes/templates/apple_zen/css/stylesheet.css, includes/templates/apple_zen/css/stylesheet_header_menu.css, includes/templates/apple_zen/sideboxes/tpl_search_header.php.

==v 2.2 Update 10/07/2007 Updates to includes/templates/apple_zen/common/tpl_main_page.php and includes/templates/apple_zen/css/stylesheet.css

==v 2.1 Update 09/30/07: This is a fairly major update. I will list files that have NOT been changed:
includes/csshover.htc
includes/languages/apple_zen/english.php
includes/languages/english/apple_zen/header.php
includes/languages/english/extra_definitions/apple_zen/headermenu.php
includes/languages/english/extra_definitions/apple_zen/order_steps_defines.php
includes/templates/apple_zen/common/tpl_box_default_right.php
includes/templates/apple_zen/common/tpl_box_default_left.php
includes/templates/apple_zen/css/checkout_confirmation.css
includes/templates/apple_zen/css/checkout_payment.css
includes/templates/apple_zen/css/checkout_shipping.css
includes/templates/apple_zen/css/checkout_success.css
includes/templates/apple_zen/sideboxes/tpl_ezpages_drop_menu.php
includes/templates/apple_zen/sideboxes/tpl_search_header.php
includes/templates/apple_zen/templates/tpl_checkout_confirmation_default.php
includes/templates/apple_zen/templates/tpl_checkout_payment_default.php
includes/templates/apple_zen/templates/tpl_checkout_shipping_default.php
includes/templates/apple_zen/templates/tpl_checkout_success_default.php

Added files:
includes/extra_datafiles/about_us_filenames.php
includes/languages/english/apple_zen/about_us.php
includes/languages/english/extra_definitions/apple_zen/about_us.php
includes/languages/english/html_includes/define_about_us.php
includes/modules/pages/about_us/header_php.php
includes/modules/sideboxes/apple_zen/information.php
includes/templates/apple_zen/templates/tpl_about_us_default.php

==v 2.0 Update 5/09/07: This template has been updated for a second layout style called "Narrow Header". Updates to includes/templates/apple_zen/common/tpl_drop_menu.php, includes/templates/apple_zen/common/tpl_header.php, includes/templates/apple_zen/css/stylesheet.css, includes/templates/apple_zen/css/stylesheet_header_menu.css.

==v 1.9 Update 5/05/07: updates to includes/templates/apple_zen/common/tpl_drop_menu.php, includes/templates/apple_zen/css/stylesheet.css, includes/templates/apple_zen/templates/tpl_checkout_confirmation_default.php.

==v 1.8 Update 4/12/07: updates to additions_to.htaccess, includes/templates/apple_zen/css/stylesheet.css, and includes/templates/apple_zen/css/stylesheet_menu_header.php.

==v 1.7 Update 4/07/07: added additions_to.htaccess, Update to includes/csshover.htc, added includes/modules/sideboxes/apple_zen/ezpages_drop_menu.php (added ability to have ezpages in the drop down menu under the INFORMATION tab), updates includes templates/apple_zen/common/tpl_drop_menu.php, updates to includes/templates/apple_zen/css/stylesheet.css, added includes/templates/apple_zen/sideboxes/tpl_ezpages_drop_menu.php.

==v 1.6 Update 3/02/07: Update to includes/templates/apple_zen/common/tpl_main_page.php. Sorry for all of the changes, it *SHOULD* be good now!

==v 1.5 Update 3/02/07: Updates to includes/templates/apple_zen/common/tpl_main_page.php, includes/templates/apple_zen/common/tpl_header.php, and includes/templates/css/apple_zen/stylesheet.css. I rushed through 1.4's updates, and didn't fix the issue completely.

==v 1.4 Update 3/01/07: Updates to includes/templates/apple_zen/common/tpl_main_page.php, and includes/templates/css/apple_zen/stylesheet.css.

==v 1.3 Update 2/23/07: Updates to includes/templates/apple_zen/common/tpl_drop_menu.php, includes/templates/apple_zen/css/stylesheet.css, and includes/templates/apple_zen/css/stylesheet_menu_header.php. I've also added to image files for drop down arrows for the drop down menu.

==v 1.2 - Update 2/09/07: Updates to includes/templates/apple_zen/css/stylesheet.css. 
There was an issue with the order steps mod in IE, so these files were also adjusted: 
includes/templates/apple_zen/css/checkout_confirmation.cssincludes/templates/apple_zen/css/checkout_payment.cssincludes/templates/apple_zen/css/checkout_shipping.cssincludes/templates/apple_zen/css/checkout_success.css

==v 1.1 - Update 1/26/07: Updates to includes/templates/apple_zen/css/stylesheet.css (mostly cosmetic tweaks). Also updated includes/templates/apple_zen/css/tpl_header.php. There are 4 adjusted images: includes/templates/apple_zen/images/site-bg*.gif.

==First release (1.0)
