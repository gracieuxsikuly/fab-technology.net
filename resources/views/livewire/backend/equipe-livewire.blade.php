<div>
    <flux:modal.trigger name="create-equipe-md">
    <flux:button variant="primary">Enregistrer les informations</flux:button>
</flux:modal.trigger><br>
{{-- pour la creation --}}
<flux:modal name="create-equipe-md" class="md:w-[800px]"> 
    <div class="space-y-6">
        <div>
            @if($isUpdate)
            <flux:heading size="lg">MODIFIER UNE INFORMATION</flux:heading>
            @else
            <flux:heading size="lg">AJOUTER UNE NOUVELLE INFORMATION </flux:heading>
            @endif
            <flux:subheading>Ajouter des details pour l'apropos de l'entreprise</flux:subheading>
        </div>

        <flux:input wire:model.live='designation' label="Désignation" placeholder="La désignation" />
        <flux:input wire:model.live='fonction' label="Fonction" placeholder="La fonction" />
        <flux:input wire:model.live='phone' label="Téléphone" placeholder="Le téléphone" type="tel" />
        <flux:input wire:model.live='email' label="Email" placeholder="L'email" type="email" />
        <flux:input wire:model.live="image" id="image" label="{{ __('Choose photo') }}" type="file"/>        
        <div class="flex">
            <flux:spacer />
            @if($isUpdate)
            <flux:button type="submit" variant="primary" wire:click='saveEquipe'>Modifier</flux:button>
            @else
            <flux:button type="submit" variant="primary" wire:click='saveEquipe'>Enregistrer</flux:button>
            @endif
        </div>
    </div>
</flux:modal>


<flux:modal name="delete-equipe" class="min-w-[22rem]">
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
                <th scope="col" class="px-6 py-3 font-semibold">Désignation</th>
                <th scope="col" class="px-6 py-3 font-semibold">Fonction</th>
                <th scope="col" class="px-6 py-3 font-semibold">Téléphone</th>
                <th scope="col" class="px-6 py-3 font-semibold">Email</th>
                <th scope="col" class="px-6 py-3 font-semibold">Image</th>
                <th scope="col" class="px-6 py-3 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($persons as $person)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $person->id }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $person->designation }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $person->fonction }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $person->phone }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $person->email }}</td>
                <td class="px-6 py-4">
                    @if ($person->image)
                        <img src="{{ asset('assets/img/equipe/'.$person->image) }}" alt="Image" class="w-16 h-16 rounded-full">
                    @else
                        <span class="text-gray-500">Aucune image</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <flux:button wire:click="edit({{ $person->id }})" size="sm" variant="primary">Edit</flux:button>
                    <br><br>
                    <flux:button wire:click="delete({{ $person->id }})" size="sm" variant="danger">Delete</flux:button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300 text-center" colspan="7">Aucune donnée trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $persons->links() }}
   </div>
   </div>
</body>
</div>
