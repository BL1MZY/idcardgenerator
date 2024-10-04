<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Notifications\Notification;
use Livewire\Attributes\Url;
use Livewire\Component;

class Record extends Component
{
    #[Url]
    public $slug;

    public $user;

    public function mount()
    {
        $this->user = User::findOrFail($this->slug);
    }
    public function render()
    {
        return view('livewire.record')->with([
            'user' => $this->user,
        ]);
    }

    public function approve()
    {
        $this->user->status = "Approved";
        $this->user->save();
        Notification::make('Approved')
            ->title('Approval was Successful')
            ->success()
            ->send();
        $this->redirectRoute('dashboard');
    }

    public function reject()
    {
        $this->user->status = "Rejected";
        $this->user->save();
        Notification::make('Rejected')
        ->title('Application was rejected')
        ->warning()
        ->send();
        $this->redirectRoute('dashboard');
    }
}
