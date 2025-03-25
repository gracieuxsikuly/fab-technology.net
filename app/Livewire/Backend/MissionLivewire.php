<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Mission;
use Flux\Flux;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class MissionLivewire extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $photo;
    public $isUpdate=false;
    public $idmission,$oldlogo;
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
    public function savemission(){
        $this->validate();
        if($this->isUpdate){
            $miss=Mission::find($this->idmission);
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
                    $this->photo->store('assets/img/mission', 'public');
                    $this->photo = $this->photo->hashName();
                $miss->image=$this->photo;
            }
            $miss->title=$this->title;
            $miss->description=$this->description;
            $miss->save();
            $this->reset();
             Flux::modal('create-mission')->close();
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
                $this->photo->store('assets/img/mission', 'public');
                $this->photo = $this->photo->hashName();
            }
            Mission::create([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->photo,
            ]);
            $this->isUpdate=false;
            $this->reset();
             Flux::modal('create-mission')->close();
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
       
    }
    public function edit($id){
        $this->isUpdate=true;
        $mis=Mission::where('id',$id)->first();
        $this->title= $mis->title;
        $this->description= $mis->description;
        $this->oldlogo= $mis->image;
        $this->idmission=$id;
        Flux::modal('create-mission')->show();
    }

    public function delete($id){
        $this->idmission = $id;
        Flux::modal('delete-mission')->show();
    }
    public function destroy(){
        $misdel = Mission::findOrFail($this->idmission);
        $this->oldlogo = $misdel->image;
        $misdel->delete();
        $this->cleanupOldLogo();
        LivewireAlert::title('Information Supprimée')
            ->text('information supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        Flux::modal('delete-mission')->close();
    }
    public function cleanupOldLogo()
    {
        if ($this->oldlogo != null) {
            $path = public_path('assets/img/mission/' . $this->oldlogo);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        $missions=Mission::all();
        return view('livewire.backend.mission-livewire',compact('missions'));
    }
 
}
