<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $chat = Chat::with(['users', 'messages'])->find($id);
        if(!$chat->users->contains(auth()->user())) {
            abort(403);
        }
        $messages = $chat->messages()->with('user')->get();

        return view('chatroom', compact('chat', 'messages'));
    }
}
