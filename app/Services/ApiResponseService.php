<?php

namespace App\Services;

class ApiResponseService
{
    public ?string $message = null;
    public mixed $data = null;
    public int $code = 200;

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
    public function setData(mixed $data): void{
        $this->data = $data;
    }
    public function setCode(int $code){
        $this->code = $code;
    }

    public function response()
    {
        $body=[];
        $this->message!=null && $body['message']=$this->message;
        $this->data!=null && $body['data']=$this->data;
        return response()->json($body,$this->code);
    }
}
