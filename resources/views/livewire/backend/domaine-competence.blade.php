<div>
    <flux:modal.trigger name="create-domaineinter">
    <flux:button variant="primary">Enregistrer les informations</flux:button>
</flux:modal.trigger><br>
{{-- pour la creation --}}
<flux:modal name="create-domaineinter" class="md:w-96"> 
    <div class="space-y-6">
        <div>
            @if($isUpdate)
            <flux:heading size="lg">MODIFIER UNE INFORMATION</flux:heading>
            @else
            <flux:heading size="lg">AJOUTER UNE NOUVELLE INFORMATION </flux:heading>
            @endif
            <flux:subheading>Ajouter des details pour les realisations</flux:subheading>
        </div>
        <flux:input wire:model.live="title"  id="title" label="{{ __('Titre') }}" />
        <flux:input wire:model.live="value"  id="value" label="{{ __('la valeur en %') }}" />
        <flux:input wire:model.live="couleur"  id="couleur" label="{{ __('couleur') }}" />
        <div class="flex">
            <flux:spacer />
            @if($isUpdate)
            <flux:button type="submit" variant="primary" wire:click='saveDomaine'>Modifier</flux:button>
            @else
            <flux:button type="submit" variant="primary" wire:click='saveDomaine'>Enregistrer</flux:button>
            @endif
        </div>
    </div>
</flux:modal>


<flux:modal name="delete-domaineinter" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Suprimer cette information?</flux:heading>

            <flux:subheading>
                <p>Vous etes entrain de vouloir suprimer cette information</p>
                <p>Cette action n'as pas de retour</p>
            </flux:subheading>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Annuler</flux:button>
            </flux:modal.close>

            <flux:button type="submit" variant="danger" wire:click='destroy'>Suprimer</flux:button>
        </div>
    </div>
</flux:modal>
    {{-- fin appel --}}
    <br>
   <div class="overflow-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 font-semibold">ID</th>
                <th scope="col" class="px-6 py-3 font-semibold">Titre</th>
                <th scope="col" class="px-6 py-3 font-semibold">Valeur</th>
                <th scope="col" class="px-6 py-3 font-semibold">Couleur</th>
                <th scope="col" class="px-6 py-3 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($domainecompetences as $domaine)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $domaine->id }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $domaine->title }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $domaine->value }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                    <span class="px-3 py-1 rounded-lg text-white" style="background-color: {{ $domaine->couleur }}">
                        {{ $domaine->couleur }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <flux:button wire:click="edit({{ $domaine->id }})" size="sm" variant="primary">Edit</flux:button><br><br>
                    <flux:button wire:click="delete({{ $domaine->id }})" size="sm" variant="danger">Delete</flux:button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300 text-center" colspan="5">Aucune donnée trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $domainecompetences->links() }}
   </div>
</div>
</div>
