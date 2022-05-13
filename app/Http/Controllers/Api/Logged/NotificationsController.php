<?php

namespace App\Http\Controllers\Api\Logged;

use App\Http\Controllers\Controller;

class NotificationsController extends Controller {

    /*
     * 200: success   // Can have message
     * 201 created    //Always have message
     * 401: unauthorized  //Always have message
     * 422: Validation error   //Always have message and errors object with the field key that has error
     * 403: Forbidden //Always have message
     * 404: page not found //Always have message
     * 400: Bad Request //Always have message
     */
    public function __construct(\App\Models\Notification $model) {
        $this->model = $model;
    }

    public function index() {
        $rows = $this->model->own()->orderBy('seen_at', 'asc')->orderBy('id', 'desc')->paginate(env('PAGE_LIMIT'));
        return \App\Http\Resources\NotificationResource::collection($rows);
    }

    public function show($id) {
        $row = $this->model->own()->findOrFail($id);
        $row->seen_at = date('Y-m-d H:i:s');
        $row->save();
        if ($row)
            return new \App\Http\Resources\NotificationResource($row);
    }

    public function destroy($id) {
        $row = $this->model->own()->findOrFail($id);
        if ($row->delete()) {
            return response()->json(['message' => trans('api.Deleted successfully')], 200);
        }
        return response()->json(['message' => trans('api.Failed to handle your request')], 204);
    }

}
