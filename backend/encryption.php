<?php
$ini = parse_ini_file('/home/u967747021/env/radiantprod.ini');
$secret_key = hex2bin($ini['secret_key']);
$secret_iv = hex2bin($ini['secret_iv']);

function decrypt_password($encrypted_password, $key, $iv) {
    return openssl_decrypt(base64_decode($encrypted_password), 'AES-256-CBC', $key, 0, $iv);
}

function encrypt_password($password, $key, $iv) {
    return base64_encode(openssl_encrypt($password, 'AES-256-CBC', $key, 0, $iv));
}
?>
