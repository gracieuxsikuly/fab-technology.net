<div>
    <flux:modal.trigger name="create-servicemd">
    <flux:button variant="primary">Enregistrer les services</flux:button>
</flux:modal.trigger><br>
{{-- pour la creation --}}
<flux:modal name="create-servicemd" class="md:w-[800px]"> 
    <div class="space-y-6">
        <div>
            @if($isUpdate)
            <flux:heading size="lg">MODIFIER UN SERVICE</flux:heading>
            @else
            <flux:heading size="lg">AJOUTER UN SERVICE </flux:heading>
            @endif
            <flux:subheading>Ajouter des details pour le service de l'entreprise</flux:subheading>
        </div>

        <flux:input wire:model.live='title' label="Titre" placeholder="Le titre" />
        <flux:textarea wire:model.live='description' label="Description" placeholder="La description" rows="20" />
        <flux:input wire:model.live="photo" id="photo" label="{{ __('Choose photo') }}" type="file"/>
        {{-- @error('image') <span class="error">{{ $message }}</span> @enderror --}}
        <div class="flex">
            <flux:spacer />
            @if($isUpdate)
            <flux:button type="submit" variant="primary" wire:click='saveservice'>Modifier</flux:button>
            @else
            <flux:button type="submit" variant="primary" wire:click='saveservice'>Enregistrer</flux:button>
            @endif
        </div>
    </div>
</flux:modal>


<flux:modal name="delete-servicemd" class="min-w-[22rem]">
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
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" >
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 font-semibold">ID</th>
                <th scope="col" class="px-6 py-3 font-semibold">Title</th>
                <th scope="col" class="px-6 py-3 font-semibold">Description</th>
                <th scope="col" class="px-6 py-3 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $services as $service )
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $service->id }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $service->title }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $service->description }}</td>
                <td class="px-6 py-4">
                    <flux:button wire:click="edit({{ $service->id }})" size="sm" variant="primary">Edit</flux:button>
                    <br><br>
                    <flux:button wire:click="delete({{ $service->id }})" size="sm" variant="danger">Delete</flux:button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300 text-center" colspan="4">No data found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $services->links() }}
   </div>
</body>
</div>
