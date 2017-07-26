<?php
include('config/init.php');
?>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Modal Login Window Demo</title>
<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
<link rel="icon" href="http://designshack.net/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="/css/modal.css">
<!-- <link rel="stylesheet" type="text/css" media="all" href="/css/style-old.css"> -->
<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
<!-- jQuery plugin leanModal under MIT License http://leanmodal.finelysliced.com.au/ -->


<a href='#loginmodal' class='flatbtn' id='modaltrigger'>Login</a>
<div id="loginmodal" style="display:none;">
  <h1>User Login</h1>
  <form id="loginform" name="loginform" method="post" action="index.html">
    <label for="username">Username:</label>
    <input type="text" name="username"  class="txtfield">

    <label for="password">Password:</label>
    <input type="password" name="password"  class="txtfield">

    <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="Log In" tabindex="3"></div>
    <br>
    <center><a href="/login/register.php">Don't have an account? Create one here!</a></center>
  </form>
</div>


<script type="text/javascript">
  $(function(){
    $('#loginform').submit(function(e){
      return false;
    });

    $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
  });
</script>