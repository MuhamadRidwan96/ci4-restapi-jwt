<?php


use App\Model\ModelAuth;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getJWT($authHeader){

    if(is_null($authHeader)){
        throw new Exception("Authentikasi gagal");
    } else {
        return explode(" ",$authHeader)[1];
    }
}

function validateJWT($encodeToken){
    $key = getenv('JWT_SECRET_KEY');
    $decodedToken = JWT::decode($encodeToken,new Key($key,'HS256'));
    $mods = new ModelAuth();
    $mods->getEmail($decodedToken->email);
    
}

function createJWT($email){
    $key = getenv('JWT_SECRET_KEY');
    $timeReq = time();
    $timeToken = getenv('JWT_TIME_TO_LIVE');
    $timeExp = $timeReq + $timeToken;

    $payload = [

        'email' => $email,
        'iat'   => $timeReq,
        'exp'   => $timeExp

    ];

    $jwt = JWT::encode($payload,$key,'HS256');
    return $jwt;
}