<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::get();
        $threads = Thread::latest()->withCount('replies')->get();
        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
