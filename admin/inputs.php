<?php
include_once('config/init.php');

function formTextInput($name, $type, $length, $holder) {
	global $errors;

	echo "<input name='$name' type='$type' maxlength='$length' placeholder='$holder' value='"
	.(@$_REQUEST[$name] ? $_REQUEST[$name] : "")."'/>"
	.(@$errors[$name] ? "<span class='error'>"
		.$errors[$name]."</span>" : "")."<br>
	<div style='height:5px;'>&nbsp;</div>";
}

function formTextArea($class, $name, $holder) {
	global $errors;
	
	echo "<textarea class='$class' name='$name' placeholder='$holder' value='' "
	.(@$_REQUEST[$name] ? $_REQUEST[$name] : "")."'></textarea>"
	.(@$errors[$name] ? "<span class='error'>"
		.$errors[$name]."</span>" : "")."<br>
	<div style='height:5px;'>&nbsp;</div>";
}

function inputBtn($class, $name, $value) {
	echo "<input class='$class' name='$name' type='submit' value='$value'>";
}