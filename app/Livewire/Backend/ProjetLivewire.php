<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Projet;
use Flux\Flux;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class ProjetLivewire extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $photo;
    public $isUpdate=false;
    public $idprojet,$oldlogo;
    // validation
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ];
    // message de validation
    protected $messages = [
        'title.required' => 'Le titre est requis.',
        'description.required' => 'La description est requise.',
    ];
    public function saveprojet(){
        $this->validate();
        if($this->isUpdate){
            $proj=Projet::find($this->idprojet);
            if($this->photo){
                    // Valide rla  photo
                    $this->validate([
                        'photo' => 'required|image|mimes:jpg,png,webp|max:2048', // 2MB Max, formats acceptés : jpg, png, webp
                        ],[
                        'photo.required' => 'La photo est requise.',
                        'photo.image' => 'Le fichier doit être une image.',
                        'photo.mimes' => 'Le fichier doit être de type : jpg, png ou webp.',
                        'photo.max' => 'L\'image ne doit pas dépasser 2 Mo.',
                        ]);
                    $this->photo->store('assets/img/projet', 'public');
                    $this->photo = $this->photo->hashName();
                $proj->image=$this->photo;
            }
            $proj->title=$this->title;
            $proj->description=$this->description;
            $proj->save();
            $this->reset();
             Flux::modal('create-projet')->close();
             $this->isUpdate=false;
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }else{
            if($this->photo){
                $this->validate([
                    'photo' => 'required|image|mimes:jpg,png,webp|max:2048', // 2MB Max, formats acceptés : jpg, png, webp
                    ],[
                    'photo.required' => 'La photo est requise.',
                    'photo.image' => 'Le fichier doit être une image.',
                    'photo.mimes' => 'Le fichier doit être de type : jpg, png ou webp.',
                    'photo.max' => 'L\'image ne doit pas dépasser 2 Mo.',
                    ]);
                $this->photo->store('assets/img/projet', 'public');
                $this->photo = $this->photo->hashName();
            }
            Projet::create([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->photo,
            ]);
            $this->isUpdate=false;
            $this->reset();
             Flux::modal('create-projet')->close();
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
       
    }
    public function edit($id){
        $this->isUpdate=true;
        $proj=Projet::where('id',$id)->first();
        $this->title= $proj->title;
        $this->description= $proj->description;
        $this->oldlogo= $proj->image;
        $this->idprojet=$id;
        Flux::modal('create-projet')->show();
    }

    public function delete($id){
        $this->idprojet = $id;
        Flux::modal('delete-projet')->show();
    }
    public function destroy(){
        $projedl = Projet::findOrFail($this->idprojet);
        $this->oldlogo = $projedl->image;
        $projedl->delete();
        $this->cleanupOldLogo();
        LivewireAlert::title('Information Supprimée')
            ->text('information supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        Flux::modal('delete-projet')->close();
    }
    public function cleanupOldLogo()
    {
        if ($this->oldlogo != null) {
            $path = public_path('assets/img/projet/' . $this->oldlogo);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        $projets=Projet::all();
        return view('livewire.backend.projet-livewire',compact('projets'));
    }
}
