<?php

namespace App\Traits;

trait  ResponseTrait {

    /**
     * Return a success JSON response.
     *
     * 
     * @param  string  $message
     * @param  array|string  $data
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnSusscess($msg=null,$code=200,$data=null)
    {
        return response()->json([
            'status' => true,
            'msg'    => $msg,
            'code'   =>$code,
            'data'   =>$data
        ]);
    }

     /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnError($msg=null,$code=500)
    {
        return response()->json([
            'status' => false,
            'msg'    => $msg,
            'code'   =>$code
            
        ]);
    }
}