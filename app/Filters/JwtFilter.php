<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;
use Exception;
use CodeIgniter\API\ResponseTrait;

class JwtFilter implements FilterInterface
{
    use ResponseTrait;
    public function before(RequestInterface $request, $arguments = null)
    {
        $header = $request->getServer('HTTP_AUTHORIZATION');
        try{
            helper('jwt');
            $encodeToken = getJWT($header);
            validateJWT($encodeToken);
            return $request;

        } catch(Exception $e){
            return Services::response()->setJSON([
                'errors' => $e->getMessage()
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}