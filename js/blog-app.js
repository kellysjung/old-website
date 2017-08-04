

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