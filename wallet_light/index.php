<?php
require_once('config.inc.php');
require('php/phpbitadmin.class.php');
include('php/init_ui_vars.php'); 
include('php/www_rd_bconf_request.php'); 
include "php/populate_btconf.php";
include "php/populate_bitnodes_reg.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bitcoin Node</title>
<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="css/m_phpbitadmin.css" />
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script src="js/button_controls.js"</script>
<script src="js/ui_functions.js"</script>

<script type="text/javascript">
    $(document).bind("pagecreate", function () {
					    $.mobile.ajaxEnabled = false;
						});
</script>

<!-- Not sure what the style below is for.  This should 
     probably be removed.
-->
<style>
input.normal {
     width: 45px !important;
    display: inline-block; }
</style>

</head>
<body>

<!-------------------------------------------------
HOME Page
---------------------------------------------------->
<div data-role="page" id="home" data-theme="a">
    <?php include "html/menu.html"; ?>
    <?php include "html/header.html"; ?>
    <?php include "html/home_page.php"; ?>
</div>

<!-------------------------------------------------
DEVICE STATUS Page
---------------------------------------------------->
<div data-role="page" id="device-status" data-theme="a">
    <?php include "html/menu.html"; ?>
    <?php include "html/header.html"; ?>
   <?php include "html/dev_status_page.php"; ?>
</div>

<!-------------------------------------------------
BITNODES Page
---------------------------------------------------->
<div data-role="page" id="bitnodes" data-theme="a">
    <?php include "html/menu.html"; ?>
    <?php include "html/header.html"; ?>
    <?php include "html/bitnodes_page.php"; ?>
</div>


<!-------------------------------------------------
BITNODES Registration Page
---------------------------------------------------->
<div data-role="page" id="bitnodesreg" data-theme="a">
    <?php include "html/menu.html"; ?>
    <?php include "html/header.html"; ?>
   <?php include "html/bitnodes_reg_page.php"; ?>
</div> 

<!-------------------------------------------------
CONTROLS Page
---------------------------------------------------->
<div data-role="page" id="controls" data-theme="a">

    <?php include "html/menu.html"; ?>
    <?php include "html/header.html"; ?>
    <?php include "php/www_rd_bconf_request.php"; ?> 
    <?php include "html/dev_control_page.php"; ?>
    <?php include "php/www_wr_bconf_mbox.php"; ?> 

</div>

<script>
// -----------------------------------------------------------------
//  This is the Ajax call for the bitcoin.conf updates to transfer 
//  data to the server-side.  The form elements are driectly above.
//  NOTE:  Can I put this in the header with the document.ready() function?
// -----------------------------------------------------------------
$("#bitcoinconf_form").submit(function( e ) {
      e.preventDefault();
      var postData = $("#bitcoinconf_form").serialize();
      var formURL = $(this).attr("action");
      var request = $.ajax({
          url: formURL,
          type: 'POST',
          dataType: "html",
          data: postData 
     });
     request.done(function(msg) {
        $("#bitcoin_status").html(msg);          
     });
     request.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus );
     });
});
// -----------------------------------------------------------------
</script>

<script>
// -----------------------------------------------------------------
//  This is the Ajax call for the actual Bitnodes registration
// -----------------------------------------------------------------
$("#bitnodes_reg_form").submit(function( e ) {
     e.preventDefault();
     var postData = $("#bitnodes_reg_form").serialize();
     var formURL = $(this).attr("action");
     var request = $.ajax({
         url: formURL,
         type: 'POST',
         dataType: "html",
         data: postData 
     });
     request.done(function(msg) {
       $("#bitcoin_status").html(msg);
    });
     request.fail(function(jqXHR, textStatus) {
         alert( "Request failed: " + textStatus );
    });
});
// -----------------------------------------------------------------
</script>

</body>
</html>
<?php // ob_flush(); ?>

