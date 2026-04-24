<?php

namespace App;

trait HttpResponse
{
    public function success($data, $message = 'The request was successful', $code = 200)
    {
        if ($data instanceof \Illuminate\Http\Resources\Json\AnonymousResourceCollection && 
                $data->resource instanceof \Illuminate\Pagination\LengthAwarePaginator) {
                
            $pagination=$data->resource;
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data->items(),
                'pagination' => [
                    'total' => $pagination->total(),
                    'per_page' => $pagination->perPage(),
                    'current_page' => $pagination->currentPage(),
                    'last_page' => $pagination->lastPage(),
                    'from' => $data->firstItem(),
                    'to' => $data->lastItem(),
                    'links' => [
                        'next'  => $pagination->nextPageUrl(),
                        'first' => $pagination->url(1),
                        'last'  => $pagination->url($pagination->lastPage()),
                        'prev'  => $pagination->previousPageUrl(),
                    ],
                ],
            ], $code);
        }
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }
    public function error($message = 'The request failed', $code = 400, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
