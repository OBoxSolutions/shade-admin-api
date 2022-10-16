<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChatMeetingCollection;
use App\Http\Resources\ChatMeetingResource;
use App\Models\ChatMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ChatMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ChatMeetingCollection(ChatMeeting::all());
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
            'email' => 'required|unique:chat_meetings',
            'country' => 'required',
            'app' => 'required',
            'birthdate' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "msg" => "Failed",
                "errors" => $validator->errors()
            ]);
        }

        $chatMeeting = ChatMeeting::create($input);

        return response()->json([
            "success" => true,
            "msg" => "Chat meeting created successfully.",
            "chat-meeting" => new ChatMeetingResource($chatMeeting)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChatMeeting  $chatMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(ChatMeeting $chatMeeting)
    {
        return response()->json([
            'chat-meeting' => new ChatMeetingResource($chatMeeting),
            'msg' => 'Success'],
            200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatMeeting  $chatMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatMeeting $chatMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChatMeeting  $chatMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatMeeting $chatMeeting)
    {
        $chatMeeting->update($request->all());

        return response()->json([
            "success" => true,
            "msg" => "Chat meeting updated successfully.",
            "chat-meeting" => new ChatMeetingResource($chatMeeting)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatMeeting  $chatMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatMeeting $chatMeeting)
    {
        $chatMeeting->delete();

        return response()->json([
            "success" => true,
            "msg" => "Chat meeting deleted successfully.",
            "chat-meeting" => new ChatMeetingResource($chatMeeting)
        ]);
    }
}
