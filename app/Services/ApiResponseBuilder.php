<?php

namespace App\Services;

class ApiResponseBuilder
{
    private ApiResponseService $responseService;
    public function __construct(){
        $this->responseService=new ApiResponseService();
    }

    public function message(string $message)
    {
        $this->responseService->setMessage($message);
        return $this;
    }

    public function data(mixed $data)
    {
        $this->responseService->setData($data);
        return $this;
    }

    public function code(int $code)
    {
        $this->responseService->setCode($code);
        return $this;
    }

    public function response()
    {
        return $this->responseService->response();
    }
}
