<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title></title>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel='stylesheet' href='/css/dialog.css'>

<script type="text/javascript">

$(document).ready(function () {
    // if user clicked on button, the overlay layer or the dialogbox, close the dialog  
    $('a.btn-ok, #dialog-overlay, #dialog-box').click(function () {     
        $('#dialog-overlay, #dialog-box').hide();       
        return false;
    });
    // if user resize the window, call the same function again
    // to make sure the overlay fills the screen and dialogbox aligned to center    
    $(window).resize(function () {
        //only do it if the dialog box is not hidden
        if (!$('#dialog-box').is(':hidden')) popup();       
    }); 
});

//Popup dialog
function popup(message) {
    // get the screen height and width  
    var maskHeight = $(document).height();  
    var maskWidth = $(window).width();
    // calculate the values for center alignment
    var dialogTop =  (maskHeight/3) - ($('#dialog-box').height());  
    var dialogLeft = (maskWidth/2) - ($('#dialog-box').width()/2); 
    // assign values to the overlay and dialog box
    $('#dialog-overlay').css({height:maskHeight, width:maskWidth}).show();
    $('#dialog-box').css({top:dialogTop, left:dialogLeft}).show();
    // display the message
    $('#dialog-message').html(message);      
}
</script>

</head>
<body>
<!-- <body onload="popup('<p>You can pass html code to it as well:</p><ul><li>List item 1</li><li>List item 2</li><li>List item 3</li><li>List item 4</li></ul>')"> -->

<a href="javascript:popup('

<input name=\'username\' type=\'text\'\>
<input name=\'button\' type=\'submit\'\>





.')">Popup!</a>

<div id="dialog-overlay"></div>
<div id="dialog-box">
    <div class="dialog-content">
        <div id="dialog-message"></div>
        <a href="#" class="button">Close</a>
    </div>
</div>

</body>
</html>