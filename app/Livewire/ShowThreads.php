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
    public string $search = '';

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::get();

        $threads = Thread::query();
        $threads->where('title', 'like', "%$this->search%");
        $threads->withCount('replies');
        $threads->latest();

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads->get()
        ]);
    }
}
