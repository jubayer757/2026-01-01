<?php
$message ='the quick brown fox jumps over the lazy dog';
$private_key =openssl_pkey_new(array(
    "private_key_bits"=>2048,
    "private_key_type"=>OPENSSL_KEYTYPE_RSA,
));
$details =openssl_pkey_get_details($private_key);
$public_key =$details['key'];
//encrypt with public key
openssl_public_encrypt($message,$encrypted_txt,$public_key);
echo "Encrypted Text :".base64_encode($encrypted_txt).PHP_EOL;
//decrypt with private key
openssl_private_decrypt($encrypted_txt,$decrypted_txt,$private_key);
echo "Decrypted Text :".$decrypted_txt.PHP_EOL;