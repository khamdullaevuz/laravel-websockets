<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\Message;
use Livewire\Component;

class SendMessage extends Component
{
    public string $body = '';
    public $chat;

    public function mount()
    {
        $this->chat = request()->route('id');
    }
    public function sent()
    {
        $message = new Message();
        $message->body = $this->body;
        $message->user()->associate(auth()->user());
        $message->chat()->associate($this->chat);
        $message->save();

        $message->load('user');
        $message->load('chat');

        event(new MessageSent($message));
        $this->reset('body');
    }
    public function render()
    {
        return view('livewire.send-message');
    }

}
