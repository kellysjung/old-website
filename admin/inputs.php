<?php
include_once('config/init.php');

function formTextInput($name, $type, $length, $holder) {
	echo "<input name='$name' type='$type' maxlength='$length' placeholder='$holder' value='"
	.(@$_REQUEST['$name'] ? $_REQUEST['$name'] : "")."'/>"
	.(@$errors['$name'] ? "<span class='error'>"
		.$errors['$name']."</span>" : "")."<br>";

}

function formTextArea($class, $name, $holder) {
	echo "<textarea class='$class' name='$name' placeholder='$holder' value='' "
	.(@$_REQUEST['$name'] ? $_REQUEST['$name'] : "")."'></textarea>"
	.(@$errors['$name'] ? "<span class='error'>"
		.$errors['$name']."</span>" : "")."<br>";
}

function inputBtn($class, $name, $value) {
	echo "<br><input class='$class' name='$name' type='submit' value='$value'>";
}