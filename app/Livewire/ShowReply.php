<?php

namespace App\Livewire;

use App\Models\Reply;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ShowReply extends Component
{
    public Reply $reply;

    public bool $is_creating = false;

    protected $listeners = ['refresh' => '$refresh'];
    private string $body = '';

    public function postChild(): void
    {
        if (!is_null($this->reply->reply_id)) return;

        // validate
        $this->validate(['body' => 'required']);

        // create
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body
        ]);

        // refresh
        $this->is_creating = false;
        $this->body = '';
        $this->emitSelf('refresh');
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.show-reply');
    }
}
