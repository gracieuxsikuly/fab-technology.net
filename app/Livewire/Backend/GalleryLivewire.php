<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Galery;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class GalleryLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title;
    public $categori;
    public $photo,$oldlogo;

    public $isUpdate=false;
    public $idgal;
    // validation
    protected $rules = [
        'title' => 'required|string|max:255',
        'categori' => 'required|string',
    ];
    // message de validation
    protected $messages = [
        'title.required' => 'Le titre est requis.',
        'categori.required' => 'La catégorie est requise.',
    ];
    public function savegal(){
        $this->validate();
        if($this->isUpdate){
            $gal=Galery::find($this->idgal);
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
                    $this->photo->store('assets/img/galery', 'public');
                    $this->photo = $this->photo->hashName();
                $gal->image=$this->photo;
            }
            $gal->title=$this->title;
            $gal->categori=$this->categori;
            $gal->save();
             $this->dispatch('closeModal', modalId: 'createGalleryModal');
             $this->isUpdate=false;
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
            $this->reset(['title', 'categori', 'photo', 'idgal', 'oldlogo', 'isUpdate']);
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
                $this->photo->store('assets/img/galery', 'public');
                $this->photo = $this->photo->hashName();
            }
            Galery::create([
                'title' => $this->title,
                'categori' => $this->categori,
                'image' => $this->photo,
            ]);
            $this->isUpdate=false;
             $this->dispatch('closeModal', modalId: 'createGalleryModal');
             LivewireAlert::text('Information ajoutée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
            $this->reset(['title', 'categori', 'photo', 'idgal', 'oldlogo', 'isUpdate']);
        }
    }
    public function edit($id){
        $this->isUpdate=true;
        $gael=Galery::where('id',$id)->first();
        $this->title=$gael->title;
        $this->categori=$gael->categori;
        $this->idgal=$gael->id;
        $this->dispatch('openModal', modalId: 'createGalleryModal');
    }

    public function delete($id){
        $this->idgal = $id;
        $this->dispatch('openModal', modalId: 'deleteGalleryModal');
    }
    public function destroy(){
        $galdel = Galery::findOrFail($this->idgal);
        $this->oldlogo = $galdel->image;
        $galdel->delete();
        $this->cleanupOldLogo();
        LivewireAlert::title('Information Supprimée')
            ->text('Image supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        $this->dispatch('closeModal', modalId: 'deleteGalleryModal');
    }
    public function cleanupOldLogo()
    {
        if ($this->oldlogo != null) {
            $path = public_path('assets/img/galery/' . $this->oldlogo);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        $gales=Galery::paginate(5);
        return view('livewire.backend.gallery-livewire',compact('gales'));
    }
    public array $designationOptions = [];
    public function mount()
    {
        $this->designationOptions = Galery::getCategoriOptions();
    }
}
