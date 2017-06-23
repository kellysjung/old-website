<script type='text/javascript'>

  function confirmDeleteTag(tagId) {
    if (confirm("Are you sure you want to delete this tag?") == true) {
      window.location = 'delete-tags.php?tagId='+tagId;
    } else { }
  }
  function confirmDeletePost(postId) {
    if (confirm("Are you sure you want to delete this post?") == true) {
      window.location = 'edit-post.php?postId='+postId+'&delete=1';
    } else { }
  }



  function popUpForm_show() {

    alert("hello");


  //  var x = document.getElementById('popUpForm');
  //  if (x.style.display === 'none') {
  //   x.style.display = 'block';
  // } else {
  //   x.style.display = 'none';
  // }
  // document.getElementById('popUpForm').style.display = "block";
}
function popUpForm_hide() {
  document.getElementById('popUpForm').style.display = "none";
}



// function checkErrors() {
//   $('.')


// }

</script>


<!-- <script
  src='https://code.jquery.com/jquery-3.2.1.min.js'
  integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4='
  crossorigin='anonymous'></script>

<script type='text/javascript'>

function popUpForm() {
  $('#commentForm').dialog({
    autoOpen: false,
    show: 'slide',
    resizable: false,
    position: 'center',
    stack: true,
    height: 'auto',
    width: 'auto',
    modal: true
});
}


</script>
-->