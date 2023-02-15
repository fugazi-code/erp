<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AccountsLivewire extends Component
{
    use LivewireAlert;

    public array $detail = [];

    protected $listeners = ['bind'];

    public function render()
    {
        return view('livewire.accounts-livewire');
    }

    public function store()
    {
        $this->validate([
            'detail.name' => 'required',
            'detail.email' => 'required|unique:users,email',
            'detail.password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->name = $this->detail['name'];
        $user->email = $this->detail['email'];
        $user->password = bcrypt($this->detail['password_confirmation']);
        $user->save();

        $this->detail = [];
        $this->emit('refreshDatatable');
        $this->alert('success', 'User is added!');
    }

    public function update()
    {
        $this->validate([
            'detail.name' => 'required',
            'detail.email' => 'required|unique:users,email,' . $this->detail['id']
        ]);

        $user = User::find($this->detail['id']);
        $user->name = $this->detail['name'];
        $user->email = $this->detail['email'];
        $user->save();

        $this->emit('refreshDatatable');
        $this->alert('success', 'User is updated!');
    }

    public function bind($id)
    {
        $this->detail = User::find($id)->toArray();
    }
}
