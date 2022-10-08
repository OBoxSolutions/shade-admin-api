<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MessageCollection(Message::all());
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
            'social' => 'required',
            'contact' => 'required|unique:messages',
            'text' => 'required'
        ]);

        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
        }

        $message = Message::create($input);

        return response()->json([
            "success" => true,
            "msg" => "Message created successfully.",
            "message" => new MessageResource($message)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return response()->json([
            'message' => new MessageResource($message),
            'msg' => 'Success'],
            200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $message->update($request->all());

        return response()->json([
            "success" => true,
            "msg" => "Message updated successfully.",
            "message" => new MessageResource($message)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        // try{
            $message->delete();

            return response()->json([
            "success" => 1,
            "msg" => "Message deleted successfully.",
            "message" => new MessageResource($message)
            ]);

        // }catch(Throwable $e){
        //     throw new $e;
        // }
    }
        /**
     * Filter messages.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function filter(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'category' => 'required',
            'value' => 'required',
        ]);

        if($validator->fails()){
            // return $this->sendError('Validation Error.', $validator->errors());
            return response()->json([
                "success" => 0,
                "msg" => "Error.", $validator->errors()
            ]);
        }

        switch($input['category']) {
            case('name'):

                $filterMessages = Message::where('name', 'ILIKE', '%'.$input['value'].'%')->paginate(7);

                break;

            case('social'):

                $filterMessages = Message::where('social', 'ILIKE', $input['value'])->paginate(7);

                break;
            case('contact'):

                $filterMessages = Message::where('contact', 'ILIKE', $input['value'])->paginate(7);

                break;
            case('text'):

                $filterMessages = Message::where('text', 'ILIKE', '%'.$input['value'].'%')->paginate(7);

                break;

            default:
                return response()->json([
                    "success" => false,
                    "msg" => 'Something went wrong.'
                ]);
        }

        $messages = new MessageCollection($filterMessages);
        return $messages->additional(['success'=>true, 'msg'=>'Filter successfully.']);

        // return response()->json([
        //     "success" => true,
        //     "msg" => 'Filter successfully.',
        //     "message" => new MessageCollection($filterMessages)
        // ]);
    }
}
