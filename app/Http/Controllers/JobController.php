<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JobController extends Controller
{
    public function index(){
        return view('jobs.index');
    }

    public function create(){
        return view('jobs.create');
    }

    public function view($id){
        return view('jobs.view', compact('id'));
    }

    public function all(){
        $jobs = JobModel::query()->get();
        return $this->responseHandler(true, $jobs->count().' job(s) found', $jobs->toArray());
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'description' => 'string|sometimes|nullable'
        ]);
        if($validator->fails()){
            return $this->responseHandler(false, $validator->getMessageBag()->all());
        }
        $job = JobModel::query()->create($validator->validated());
        return $this->responseHandler(true, 'New job created', $job->toArray());
    }

    public function get(JobModel $job){
        return $this->responseHandler(true, 'Job found', $job->toArray());
    }

    private function responseHandler($status, $message, $data = null): \Illuminate\Http\JsonResponse
    {
        $statusCode = $status ? 200 : 422;
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
