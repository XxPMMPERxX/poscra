<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Setting extends Component {

    public User $user;
    protected $rules = [
        'user.name' => 'required|string|max:15'
    ];

    public function mount() {
        $this->user = auth()->user();
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function save() {
        $this->validate();
        $this->user->save();

        $this->js('window.location.reload()');
    }

    public function deleteAccount() {
        User::destroy($this->user->id);

        return redirect('/');
    }
}