<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;

class ApiController {

    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not Found!'){
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * [respondNotFound When the problem is me]
     * @param  string $message
     * @return [type]
     */
    public function respondInternalError($message = 'Internal Error!'){
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data , $headers= []){

        return response()->json($data , $this->getStatusCode(), $headers);

    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message){
        return $this->respond([
            'error' =>[
                'message' => $message,
                'statusCode' => $this->getStatusCode()
            ]
        ]);
    }

}
