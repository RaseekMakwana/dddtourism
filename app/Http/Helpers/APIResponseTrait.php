<?php

namespace App\Http\Helpers;
use Illuminate\Http\JsonResponse;

trait APIResponseTrait
{
    /**
     * API Name: Api success response.
     */
    public function success($data = [], $message = "Success", $meta = []) : JsonResponse
    {
        $meta = [
            'status' => true,
            'message' => $message,
            'data' => $data,
            'meta'  => $meta
        ];
        return response()->json($meta);
    }

    /**
     * API Name: Api error response.
     */
    public function error($message = 'Error', $data = []) : JsonResponse
    {
        $meta = [
            'status'       => false,
            'message'      => $message,
        ];
        return response()->json(['meta' => $meta, 'errors' => $data]);
    }

    /**
     * Response - Server side validation error message
     */
    public function validationError($validation, $message = 'Validation Error', $code = 422) : JsonResponse
    {
        $fieldMessages = is_array($validation) ? $validation : $validation->errors();
        $meta = [
            'status' => 'false',
            'message' => 'Server side validation',
            'message_code' => $message,
            'status_code' => $code
        ];
        return response()->json(['meta' => $meta, 'errors' => $fieldMessages], $code);
    }

    public function errorOnException($exp): JsonResponse
    {
        if (env('APP_DEBUG') == true) {
            return $this->error('Exception Error: ' . $exp->getMessage());
        } else {

            return $this->error("Something Went to Wrong.Please try again");
        }
    }
}
