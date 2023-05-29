<?php
function sha256($str) {
  return hash('sha256', $str);
}

function encrypt($word) {
  $salt = constant('CHECK_PASS_SALT');
  $method = constant('ENC_METHOD');
  $encrypt = openssl_encrypt($word, $method, $salt);

  return $encrypt;
}

function decrypt($word) {
  $salt = constant('CHECK_PASS_SALT');
  
  $method = constant('ENC_METHOD');
  $encrypt = openssl_decrypt($word, $method, $salt);

  return $encrypt;
}

function encryptthis($value){
  return base64_encode(encrypt($value));
}

function decryptthis($value){
  return decrypt(base64_decode($value));
}