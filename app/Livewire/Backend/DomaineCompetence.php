<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Domainecompetence as ModelDomainecompetence;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class DomaineCompetence extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $title;
    public $value;
    public $couleur;
    public $isUpdate = false;
    public $idDomaine;  

    // Règles de validation
    protected $rules = [
        'title' => 'required|string|max:255',
        'value' => 'required|string',
        'couleur' => 'nullable|string|max:50',
    ];

    // Messages de validation
    protected $messages = [
        'title.required' => 'Le titre est requis.',
        'value.required' => 'La valeur est requise.',
    ];
    public function saveDomaine()
    {
        $this->validate();

        if ($this->isUpdate) {
            $domaine = ModelDomainecompetence::find($this->idDomaine);
            $domaine->title = $this->title;
            $domaine->value = $this->value;
            $domaine->couleur = $this->couleur;
            $domaine->save();

            $this->reset();
            $this->dispatch('closeModal', modalId: 'createDomaineModal');
            $this->isUpdate = false;
            LivewireAlert::title('Domaine de compétence')
            ->text('Domaine de compétence modifié avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        } else {
            ModelDomainecompetence::create([
                'title' => $this->title,
                'value' => $this->value,
                'couleur' => $this->couleur ?? '#000000',
            ]);

            $this->reset();
            $this->dispatch('closeModal', modalId: 'createDomaineModal');
            LivewireAlert::title('Domaine de compétence')
            ->text('Domaine de compétence ajouté avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
    }

    public function edit($id)
    {
        $this->isUpdate = true;
        $domaine = ModelDomainecompetence::findOrFail($id);
        $this->title = $domaine->title;
        $this->value = $domaine->value;
        $this->couleur = $domaine->couleur;
        $this->idDomaine = $id;

        $this->dispatch('openModal', modalId: 'createDomaineModal');
    }

    public function delete($id)
    {
        $this->idDomaine = $id;
        $this->dispatch('openModal', modalId: 'deleteDomaineModal');
    }

    public function destroy()
    {
        ModelDomainecompetence::findOrFail($this->idDomaine)->delete();
        LivewireAlert::title('Domaine de compétence')
        ->text('Domaine de compétence supprimé avec succès')
        ->success()
        ->toast()
        ->position('bottom-end')
        ->show();
    

        $this->dispatch('closeModal', modalId: 'deleteDomaineModal');
    }
    public function render()
    {
        $domainecompetences = ModelDomainecompetence::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.backend.domaine-competence',compact('domainecompetences'));
    }
}
