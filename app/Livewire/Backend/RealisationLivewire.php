<?php

namespace App\Livewire\Backend;

use App\Models\Realisationcount;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class RealisationLivewire extends Component
{
    use WithFileUploads;
    public $designation;
    public $nombre;
    public $isUpdate=false;
    public $idreal;
    // validation
    protected $rules = [
        'designation' => 'required|string|max:255',
        'nombre' => 'required',
    ];
    // message de validation
    protected $messages = [
        'designation.required' => 'Le titre est requis.',
        'nombre.required' => 'Le nombre est requis.',
    ];
    public function savereal(){
        $this->validate();
        if($this->isUpdate){
            $real=Realisationcount::find($this->idreal);
            $real->designation=$this->designation;
            $real->nombre=$this->nombre;
            $real->save();
            $this->reset(['designation', 'nombre', 'idreal', 'isUpdate']);
             $this->dispatch('closeModal', modalId: 'createRealisationModal');
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }else{
           
            Realisationcount::create([
                'designation' => $this->designation,
                'nombre' => $this->nombre,
            ]);
            $this->reset(['designation', 'nombre', 'idreal', 'isUpdate']);
             $this->dispatch('closeModal', modalId: 'createRealisationModal');
             LivewireAlert::text('Information ajoutée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
       
    }
    public function edit($id){
        $this->isUpdate=true;
        $real=Realisationcount::where('id',$id)->first();
        $this->designation=$real->designation;
        $this->nombre=$real->nombre;
        $this->idreal=$real->id;
        $this->dispatch('openModal', modalId: 'createRealisationModal');
    }

    public function delete($id){
        $this->idreal = $id;
        $this->dispatch('openModal', modalId: 'deleteRealisationModal');
    }
    public function destroy(){
        $realdel = Realisationcount::findOrFail($this->idreal)->delete();
        LivewireAlert::title('Information Supprimée')
            ->text('information supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        $this->dispatch('closeModal', modalId: 'deleteRealisationModal');
    }
    public function render()
    {
        $reals=Realisationcount::all();
        return view('livewire.backend.realisation-livewire',compact('reals'));
    }
    public array $designationOptions = [];
    public function mount()
    {
        $this->designationOptions = Realisationcount::getDesigantionOptions();
    }
    
}
