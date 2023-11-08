<?php

namespace App\Livewire\Table;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $search;
    public $perPage = 5;
    public $admin;
    use WithPagination;

    public function delete($id){
        User::find($id)->delete();
    }
    

    public function render()
    {
        return view('livewire.table.index',[
            'users' => User::latest()
            ->when($this->admin !== '',function($query){
                $query->where('is_admin', $this->admin);
            })
            ->search($this->search)
            ->paginate($this->perPage)
        ]);
    }
}
