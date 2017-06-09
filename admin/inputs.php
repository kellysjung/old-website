<?php
include_once('config/init.php');

function formTextInput($name, $type, $length, $holder) {
	return "<input name='$name' type='$type' maxlength='$length' placeholder='$holder' value='"
	.(@$_REQUEST['$name'] ? $_REQUEST['$name'] : "")."'/>"
	.(@$errors['$name'] ? "<span class='error'>"
		.$errors['$name']."</span>" : "")."<br>";
}

function formTextarea($class, $name, $holder) {
	return "<textarea class='$class' name='$name' placeholder='$holder' value='' ".(@$_REQUEST['$name'] ? $_REQUEST['$name'] : "")."'></textarea>".(@$errors['$name'] ? "<span class='error'>".$errors['$name']."</span>" : "")."<br>";
}
 
function inputBtn($class, $name, $type, $value) {
	echo "<br><input class='$class' name='$name' type='$type' value='$value'";
}
