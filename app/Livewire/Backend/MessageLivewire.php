<?php

namespace App\Livewire\Backend;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Flux\Flux;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class MessageLivewire extends Component
{ 
    use WithFileUploads;
    use WithPagination;
    public $idMessage;
    public function delete($id)
    {
        $this->idMessage = $id;
        Flux::modal('delete-message')->show();
    }

    public function destroy()
    {
        Contact::findOrFail($this->idMessage)->delete();
        LivewireAlert::title('Contact Message')
        ->text('Message supprimé avec succès')
        ->success()
        ->toast()
        ->position('bottom-end')
        ->show();
    

        Flux::modal('delete-message')->close();
    }
    public $selectedMessage;
    public function view($id)
    {
        $this->selectedMessage = Contact::findOrFail($id);
        Flux::modal('view-message')->show();
    }
    public function render()
    {
        $messages = Contact::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.backend.message-livewire', compact('messages'));
    }
}
