<?php

namespace App\Http\Controllers\Backend;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('backend.message.index',get_defined_vars());
    }

    public function show(Message $message)
    {
        return view('backend.message.show',get_defined_vars());
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return to_route('message.index')->with('success', __('messages.success'));
    }
}
