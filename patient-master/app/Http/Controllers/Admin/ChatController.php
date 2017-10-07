<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ChatMessage;
use App\Staff;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function groupChat(Request $request) {
        if(Auth::check() && $request->type == 'group') {
            Artisan::call('chat:message', ['message' => $request->msg, 'user' => auth()->user()]);
        }
    }
    public function index(Staff $staff)
    {
        $staffs = isset($staff['id']) ?  Staff::whereIn('id', [$staff['id'], Auth::id()])->get() : Staff::all();
        $chatMessages = ChatMessage::with('user')->get();
        return view('chat.index',  compact('staffs', 'chatMessages'));
    }
}
