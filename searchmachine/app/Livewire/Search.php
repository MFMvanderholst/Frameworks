<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $search = '%'.$this->search.'%';

        return view('livewire.search', [
            'users' => User::where('name', 'like', $search)->get()
        ]);
    }
}
