<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script type='text/javascript'>

function ShowText() {
  $('.HiddenText').toggle();
    // $('.HiddenText').css('background-color', 'red');
}

function changeColor() {
	// make a post request to that URL; can pass the parameters through the {}; need to get the values out of the text with jQuery to select the form element and pass the values
	// so endpoint knows to save the correct comment
	// passing the post function in a call back function
	$.post('endpoint.php', {}, function(Data){
    $('.HiddenText').html(Data);
    // $('.HiddenText').css('background-color', 'red');
  });
}

// $(function(){
//     alert('test');
// });

</script>

<div>
  <a href='#' onclick='ShowText();'>Click here</a><br>
  <a href='#' onclick='changeColor();'>Click here again</a>
</div>
<div class='HiddenText' style='display:none;'>
  this is some text
</div>