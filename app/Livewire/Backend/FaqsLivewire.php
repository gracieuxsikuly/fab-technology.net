<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Faq;
use Livewire\WithPagination;
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
        $this->dispatch('closeModal', modalId: 'createFaqModal');
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
        $this->dispatch('closeModal', modalId: 'createFaqModal');

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

    $this->dispatch('openModal', modalId: 'createFaqModal');
}

public function delete($id)
{
    $this->idfaq = $id;
    $this->dispatch('openModal', modalId: 'deleteFaqModal');
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

    $this->dispatch('closeModal', modalId: 'deleteFaqModal');
}
    public function render()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.backend.faqs-livewire', compact('faqs'));
    }
}
