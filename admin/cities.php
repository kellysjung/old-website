<?php
include_once('init.php');

// 
// CITIES
// 
function listCities() {
	$cities = dbQuery("SELECT * FROM cities ORDER BY name")->fetchAll();
	foreach ($cities as $city) {
		echo "<a href=view.php?cityId=".$city['cityId']."'>".$city['name']."</a>";
		echo "<br>";
	}
}

function getCity($cityId) {
	$city = dbQuery("SELECT * FROM cities WHERE cityId = :cityId",
		array("cityId"=>$cityId));
	return $city->fetch();
}

function viewCity($cityId) {
	$city = getCity($cityId);
	echo "<h2>".$city['name']."<h2>";
}

// 
// FORMS
// 
function formInput($id, $type, $class, $length, $holder) {
	echo "<input id='$id' name='$id' type='$type' class='$class' maxlength='$length' placeholder='$holder' value='".(@$_REQUEST['$id'] ? $_REQUEST['$id'] : "")."'>";
	echo (@$errors['$id'] ? $errors['$id'] : "")."<br>";
}

function errorMsg($id) {

}

// .(@$errors['$id'] ? $errors['$id'] : "")."<br>"

function imageSlider() {

}