<?php
function huruf($string) {
  $pattern = "/^[a-zA-Z ]*$/"; // karakter selain a-z A-Z & spasi
  if(preg_match($pattern,$string)) {
    return false;
  } else {
    return true;
  }
}
function pass($string){
  $pattern = "/^[a-zA-Z0-9]*$/"; // karakter selain a-z A-Z & spasi
  if(preg_match($pattern,$string)) {
    return false;
  } else {
    return true;
  }
}
function number($string){
  $pattern = "/^[0-9]*$/"; // karakter selain a-z A-Z & spasi
  if(preg_match($pattern,$string)) {
    return false;
  } else {
    return true;
  }
}

function email($string){

$email = filter_var($string, FILTER_SANITIZE_EMAIL);

	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false || $email != $string){
	    return false;
	}else{
		return true;
	}
}
?>