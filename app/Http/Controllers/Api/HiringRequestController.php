<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HiringRequestCollection;
use App\Http\Resources\HiringRequestResource;
use App\Models\HiringRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HiringRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new HiringRequestCollection(HiringRequest::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|unique:hiring_requests',
            'country' => 'required',
            'applying_for' => 'required',
            'birthdate' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "msg" => "Failed",
                "errors" => $validator->errors()
            ]);
        }

        $hiringRequest = HiringRequest::create($input);

        return response()->json([
            "success" => true,
            "msg" => "Hiring request created successfully.",
            "hiring_request" => new HiringRequestResource($hiringRequest)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HiringRequest  $hiringRequest
     * @return \Illuminate\Http\Response
     */
    public function show(HiringRequest $hiringRequest)
    {
        return response()->json([
            'hiring_request' => new HiringRequestResource($hiringRequest),
            'msg' => 'Success'],
            200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HiringRequest  $hiringRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(HiringRequest $hiringRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HiringRequest  $hiringRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HiringRequest $hiringRequest)
    {
        $hiringRequest->update($request->all());

        return response()->json([
            "success" => true,
            "msg" => "Hiring request updated successfully.",
            "hiring_request" => new HiringRequestResource($hiringRequest)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HiringRequest  $hiringRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(HiringRequest $hiringRequest)
    {
        $hiringRequest->delete();

        return response()->json([
            "success" => true,
            "msg" => "Hiring request deleted successfully.",
            "hiring_request" => new HiringRequestResource($hiringRequest)
        ]);
    }
}
