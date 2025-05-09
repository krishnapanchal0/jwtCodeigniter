<?php
require_once APPPATH . 'Libraries/JWT.php';
require_once APPPATH . 'Libraries/ExpiredException.php';
require_once APPPATH . 'Libraries/SignatureInvalidException.php';
require_once APPPATH . 'Libraries/BeforeValidException.php';

use App\Libraries\JWT;

function getJWT($userData)
{
    $key = getenv('JWT_SECRET');
    $payload = [
        'iat' => time(),
        'exp' => time() + 3600,
        'data' => $userData
    ];
    return JWT::encode($payload, $key, 'HS256');
}

function decodeJWT($token)
{
    $key = getenv('JWT_SECRET');
    return JWT::decode($token, new App\Libraries\JWT\Key($key, 'HS256'));
}
