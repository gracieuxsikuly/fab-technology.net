<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Equipe;
use Livewire\WithPagination;
use Flux\Flux;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class EquipeLivewire extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $designation;
    public $fonction;
    public $phone;
    public $email;
    public $image;
    public $isUpdate = false;
    public $idEquipe, $oldImage;
     // Validation des champs
     protected $rules = [
        'designation' => 'required|string|max:255',
        'fonction' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
    ];

    // Messages d'erreur personnalisés
    protected $messages = [
        'designation.required' => 'La désignation est requise.',
        'fonction.required' => 'La fonction est requise.',
        'phone.required' => 'Le numéro de téléphone est requis.',
        'email.required' => 'L\'email est requis.',
        'email.email' => 'Veuillez entrer un email valide.',
    ];
    public function saveEquipe()
    {
        $this->validate();

        if ($this->isUpdate) {
            $equipe = Equipe::find($this->idEquipe);
            if ($this->image) {
                // Validation de l'image
                $this->validate([
                    'image' => 'required|image|mimes:jpg,png,webp|max:2048',
                ], [
                    'image.required' => 'L\'image est requise.',
                    'image.image' => 'Le fichier doit être une image.',
                    'image.mimes' => 'Le fichier doit être de type : jpg, png ou webp.',
                    'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
                ]);

                $this->image->store('assets/img/equipe', 'public');
                $this->image = $this->image->hashName();
                $equipe->image = $this->image;
            }

            $equipe->designation = $this->designation;
            $equipe->fonction = $this->fonction;
            $equipe->phone = $this->phone;
            $equipe->email = $this->email;
            $equipe->save();

            $this->reset();
            Flux::modal('create-equipe-md')->close();
            $this->isUpdate = false;
            LivewireAlert::text('Information modifiée avec succès')
                ->success()
                ->toast()
                ->position('bottom-end')
                ->show();
        } else {
            if ($this->image) {
                $this->validate([
                    'image' => 'required|image|mimes:jpg,png,webp|max:2048',
                ], [
                    'image.required' => 'L\'image est requise.',
                    'image.image' => 'Le fichier doit être une image.',
                    'image.mimes' => 'Le fichier doit être de type : jpg, png ou webp.',
                    'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
                ]);

                $this->image->store('assets/img/equipe', 'public');
                $this->image = $this->image->hashName();
            }

            Equipe::create([
                'designation' => $this->designation,
                'fonction' => $this->fonction,
                'phone' => $this->phone,
                'email' => $this->email,
                'image' => $this->image,
            ]);

            $this->isUpdate = false;
            $this->reset();
            Flux::modal('create-equipe-md')->close();
            LivewireAlert::text('Information ajoutée avec succès')
                ->success()
                ->toast()
                ->position('bottom-end')
                ->show();
        }
    }

    public function edit($id)
    {
        $this->isUpdate = true;
        $equipe = Equipe::findOrFail($id);
        $this->designation = $equipe->designation;
        $this->fonction = $equipe->fonction;
        $this->phone = $equipe->phone;
        $this->email = $equipe->email;
        $this->oldImage = $equipe->image;
        $this->idEquipe = $id;
        Flux::modal('create-equipe-md')->show();
    }

    public function delete($id)
    {
        $this->idEquipe = $id;
        Flux::modal('delete-equipe')->show();
    }

    public function destroy()
    {
        $equipeDel = Equipe::findOrFail($this->idEquipe);
        $this->oldImage = $equipeDel->image;
        $equipeDel->delete();
        $this->cleanupOldImage();

        LivewireAlert::title('Information Supprimée')
            ->text('Information supprimée avec succès')
            ->success()
            ->toast()
            ->position('bottom-end')
            ->show();
        Flux::modal('delete-equipe')->close();
    }

    public function cleanupOldImage()
    {
        if ($this->oldImage != null) {
            $path = public_path('assets/img/equipe/' . $this->oldImage);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }
    public function render()
    {
        $persons = Equipe::orderBy('id', 'desc')->paginate(10);
        return view('livewire.backend.equipe-livewire', compact('persons'));
    }
}
