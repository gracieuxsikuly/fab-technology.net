<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Service;
use Flux\Flux;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Support\Str;
class ServiceLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $title='';
    public $description='';
    public $photo=null;
    public $isUpdate=false;
    public $idserv='',$oldlogo=null;
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
    public function saveservice(){
        $this->validate();
        if($this->isUpdate){
            $serv = Service::find($this->idserv);
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
                    $this->photo->store('assets/img/service', 'public');
                    $this->photo = $this->photo->hashName();;
                $serv->image=$this->photo;
            }
            $serv->title=$this->title;
            $serv->slug=Str::slug($this->title);
            $serv->description=$this->description;
            $serv->save();
            $this->title='';
            $this->description='';
            $this->photo=null;
             Flux::modal('create-servicemd')->close();
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
                $this->photo->store('assets/img/service', 'public');
                $this->photo = $this->photo->hashName();
            }
            Service::create([
                'title' => $this->title,
                'slug'=> Str::slug($this->title),
                'description' => $this->description,
                'image' => $this->photo,
            ]);
            $this->title='';
            $this->description='';
            $this->photo=null;
            $this->isUpdate=false;
             Flux::modal('create-servicemd')->close();
             LivewireAlert::text('Information modifiée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        }
       
    }
    public function edit($id){
        $this->isUpdate=true;
        $serv=Service::where('id',$id)->first();
        $this->title= $serv->title;
        $this->description= $serv->description;
        $this->oldlogo= $serv->image;
        $this->idserv=$id;
        Flux::modal('create-servicemd')->show();
    }

    public function delete($id){
        $this->idserv = $id;
        Flux::modal('delete-servicemd')->show();
    }
    public function destroy(){
        $servdel = Service::findOrFail($this->idserv);
        $this->oldlogo = $servdel->image;
        $servdel->delete();
        $this->cleanupOldLogo();
        LivewireAlert::title('Information Supprimée')
            ->text('information supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        Flux::modal('delete-servicemd')->close();
    }
    public function cleanupOldLogo()
    {
        if ($this->oldlogo != null) {
            $path = public_path('assets/img/service/' . $this->oldlogo);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        $services=Service::paginate(5);
        return view('livewire.backend.service-livewire',compact('services'));   
    }
}
