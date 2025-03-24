<?php

namespace App\Livewire\Backend;

use App\Models\About;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class AboutLivewire extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $photo;
    public $isUpdate=false;
    public $idabout,$oldlogo;
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
    public function saveabout(){
        $this->validate();
        if($this->isUpdate){
            $about=About::find($this->idabout);
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
                    $this->photo->store('assets/img/about', 'public');
                    $this->photo = $this->photo->hashName();
                $about->image=$this->photo;
            }
            $about->title=$this->title;
            $about->description=$this->description;
            $about->save();
            $this->reset();
             Flux::modal('create-aboutmd')->close();
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
                $this->photo->store('assets/img/about', 'public');
                $this->photo = $this->photo->hashName();
            }
            About::create([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->photo,
            ]);
            $this->isUpdate=false;
            $this->reset();
             Flux::modal('create-aboutmd')->close();
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
       
    }
    public function edit($id){
        $this->isUpdate=true;
        $about=About::where('id',$id)->first();
        $this->title= $about->title;
        $this->description= $about->description;
        $this->oldlogo= $about->image;
        $this->idabout=$id;
        Flux::modal('create-aboutmd')->show();
    }

    public function delete($id){
        $this->idabout = $id;
        Flux::modal('delete-about')->show();
    }
    public function destroy(){
        $aboutdel = About::findOrFail($this->idabout);
        $this->oldlogo = $aboutdel->image;
        $aboutdel->delete();
        $this->cleanupOldLogo();
        LivewireAlert::title('Information Supprimée')
            ->text('information supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        Flux::modal('delete-about')->close();
    }
    public function cleanupOldLogo()
    {
        if ($this->oldlogo != null) {
            $path = public_path('assets/img/about/' . $this->oldlogo);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        $abouts=About::all();
        return view('livewire.backend.about-livewire',compact('abouts'));
    }
}
