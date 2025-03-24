<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Faq;
use Livewire\WithPagination;
use Flux\Flux;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class FaqsLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $question;
public $answer;
public $isUpdate = false;
public $idfaq;
// Règles de validation
protected $rules = [
    'question' => 'required|string|max:255',
    'answer' => 'required|string',
];

// Messages de validation
protected $messages = [
    'question.required' => 'La question est requise.',
    'answer.required' => 'La réponse est requise.',
];

public function saveFaq()
{
    $this->validate();

    if ($this->isUpdate) {
        $faq = Faq::find($this->idfaq);
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->save();

        $this->reset();
        Flux::modal('create-faq')->close();
        $this->isUpdate = false;

        LivewireAlert::text('FAQ modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
    } else {
        Faq::create([
            'question' => $this->question,
            'answer' => $this->answer,
        ]);

        $this->reset();
        Flux::modal('create-faq')->close();

        LivewireAlert::text('FAQ ajoutée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
    }
}

public function edit($id)
{
    $this->isUpdate = true;
    $faq = Faq::findOrFail($id);
    $this->question = $faq->question;
    $this->answer = $faq->answer;
    $this->idfaq = $id;

    Flux::modal('create-faq')->show();
}

public function delete($id)
{
    $this->idfaq = $id;
    Flux::modal('delete-faq')->show();
}

public function destroy()
{
    Faq::findOrFail($this->idfaq)->delete();

    LivewireAlert::title('FAQ Supprimée')
        ->text('FAQ supprimée avec succès')
        ->success()
        ->toast()
        ->position('bottom-end')
        ->show();

    Flux::modal('delete-faq')->close();
}
    public function render()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.backend.faqs-livewire', compact('faqs'));
    }
}
