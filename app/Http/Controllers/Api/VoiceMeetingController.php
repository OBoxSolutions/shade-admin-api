<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoiceMeetingCollection;
use App\Http\Resources\VoiceMeetingResource;
use App\Models\VoiceMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class VoiceMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VoiceMeetingCollection(VoiceMeeting::all());
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
            'email' => 'required|unique:voice_meetings',
            'country' => 'required',
            'birthdate' => 'required',
            'app' => 'required',
            'meeting-date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "msg" => "Failed",
                "errors" => $validator->errors()
            ]);
        }

        $voiceMeeting = VoiceMeeting::create($input);

        return response()->json([
            "success" => true,
            "msg" => "Voice meeting created successfully.",
            "voice-meeting" => new VoiceMeetingResource($voiceMeeting)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoiceMeeting  $voiceMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(VoiceMeeting $voiceMeeting)
    {
        return response()->json([
            'voice-meeting' => new VoiceMeetingResource($voiceMeeting),
            'msg' => 'Success'],
            200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoiceMeeting  $voiceMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit(VoiceMeeting $voiceMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoiceMeeting  $voiceMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoiceMeeting $voiceMeeting)
    {
        $voiceMeeting->update($request->all());

        return response()->json([
            "success" => true,
            "msg" => "Voice meeting updated successfully.",
            "voice-meeting" => new VoiceMeetingResource($voiceMeeting)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoiceMeeting  $voiceMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoiceMeeting $voiceMeeting)
    {
        $voiceMeeting->delete();

        return response()->json([
        "success" => true,
        "msg" => "Voice meeting deleted successfully.",
        "voice-meeting" => new VoiceMeetingResource($voiceMeeting)
        ]);
    }
}
