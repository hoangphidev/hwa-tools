<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| Response API = ok_response | created_response | error_response
|--------------------------------------------------------------------------
*/

if (!function_exists('send_ok_response')) {

    /**
     * Ok response
     *
     * @param $msg
     * @param null $data
     * @param bool $paginate
     * @param int $code
     * @return JsonResponse
     */
    function send_ok_response($msg, $data = null, bool $paginate = false, $code = Response::HTTP_OK)
    {
        $hwa_res = [
            'success' => true,
            'message' => $msg ?: 'Successfully.'
        ];

        if ($paginate) {
            $result = [
                'results' => [], // data
                'meta' => [
                    'currentPage' => intval(1), // current page
                    'perPage' => intval(page_limit()), // record number per page
                    'total' => intval(0), // total record
                ],
            ];

            if ($data->total() > 0 && $data->currentPage() <= $data->lastPage()) {
                $result = [
                    'results' => $data->items(), // data
                    'meta' => [
                        'currentPage' => intval($data->currentPage()), // current page
                        'perPage' => intval($data->perPage()), // record number per page
                        'total' => intval($data->total()), // total record
                    ],
                ];
            }

            return response()->json(array_merge($hwa_res, [
                'data' => $result,
            ]), $code);

        } else {
            return response()->json(array_merge($hwa_res, [
                'data' => $data,
            ]), $code);
        }
    }
}

if (!function_exists('send_created_response')) {

    /**
     * Created response
     *
     * @param $msg
     * @param $id
     * @return JsonResponse
     */
    function send_created_response($msg, $id)
    {
        return response()->json([
            'success' => true,
            'message' => $msg . ' #' . $id . '.',
            'data' => [
                'id' => (isset($id) && !is_null($id)) ? intval($id) : ''
            ],
        ], Response::HTTP_CREATED);
    }
}

if (!function_exists('send_error_response')) {

    /**
     * Error response
     *
     * @param $msg
     * @param int $code
     * @return JsonResponse
     */
    function send_error_response($msg, $code = Response::HTTP_BAD_REQUEST)
    {
        // code 401
        if ($code == Response::HTTP_UNAUTHORIZED) {
            $msg = ($msg != null) ? $msg : 'You are not logged in.';
        }

        // code 403
        if ($code == Response::HTTP_FORBIDDEN) {
            $msg = ($msg != null) ? $msg : 'You do not have access permission.';
        }

        // code 404
        if ($code == Response::HTTP_NOT_FOUND) {
            $msg = ($msg != null) ? $msg : 'Not found.';
        }

        // code 500
        if ($code == Response::HTTP_INTERNAL_SERVER_ERROR) {
            $msg = ($msg != null) ? $msg : 'Server error.';
        }

        return response()->json([
            'success' => false,
            'message' => $msg,
        ], $code);
    }
}
