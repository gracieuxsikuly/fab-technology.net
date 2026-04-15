<?php

namespace App\Livewire\Backend;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class MessageLivewire extends Component
{ 
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $idMessage;
    public function delete($id)
    {
        $this->idMessage = $id;
        $this->dispatch('openModal', modalId: 'deleteMessageModal');
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
    

        $this->dispatch('closeModal', modalId: 'deleteMessageModal');
    }
    public $selectedMessage;
    public function view($id)
    {
        $this->selectedMessage = Contact::findOrFail($id);
        $this->dispatch('openModal', modalId: 'viewMessageModal');
    }
    public function render()
    {
        $messages = Contact::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.backend.message-livewire', compact('messages'));
    }
}
