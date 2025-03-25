<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Vision;
use Flux\Flux;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class VisionLivewire extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $photo;
    public $isUpdate=false;
    public $idvision,$oldlogo;
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
    public function savevion(){
        $this->validate();
        if($this->isUpdate){
            $vision=Vision::find($this->idvision);
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
                    $this->photo->store('assets/img/vision', 'public');
                    $this->photo = $this->photo->hashName();
                $vision->image=$this->photo;
            }
            $vision->title=$this->title;
            $vision->description=$this->description;
            $vision->save();
            $this->reset();
             Flux::modal('create-vision')->close();
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
                $this->photo->store('assets/img/vision', 'public');
                $this->photo = $this->photo->hashName();
            }
            Vision::create([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->photo,
            ]);
            $this->isUpdate=false;
            $this->reset();
             Flux::modal('create-vision')->close();
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
       
    }
    public function edit($id){
        $this->isUpdate=true;
        $vis=Vision::where('id',$id)->first();
        $this->title= $vis->title;
        $this->description= $vis->description;
        $this->oldlogo= $vis->image;
        $this->idvision=$id;
        Flux::modal('create-vision')->show();
    }

    public function delete($id){
        $this->idvision = $id;
        Flux::modal('delete-vision')->show();
    }
    public function destroy(){
        $visdel = Vision::findOrFail($this->idvision);
        $this->oldlogo = $visdel->image;
        $visdel->delete();
        $this->cleanupOldLogo();
        LivewireAlert::title('Information Supprimée')
            ->text('information supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        Flux::modal('delete-vision')->close();
    }
    public function cleanupOldLogo()
    {
        if ($this->oldlogo != null) {
            $path = public_path('assets/img/vision/' . $this->oldlogo);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        $visions=Vision::all();
        return view('livewire.backend.vision-livewire',compact('visions'));
    }
  
}
