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

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.show-reply');
    }
}
