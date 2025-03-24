<div>
    <flux:modal.trigger name="create-realmd">
    <flux:button variant="primary">Enregistrer les informations</flux:button>
</flux:modal.trigger><br>
{{-- pour la creation --}}
<flux:modal name="create-realmd" class="md:w-96"> 
    <div class="space-y-6">
        <div>
            @if($isUpdate)
            <flux:heading size="lg">MODIFIER UNE INFORMATION</flux:heading>
            @else
            <flux:heading size="lg">AJOUTER UNE NOUVELLE INFORMATION </flux:heading>
            @endif
            <flux:subheading>Ajouter des details pour les realisations</flux:subheading>
        </div>
        <flux:select wire:model="designation" placeholder="Selectionner dans la liste...">
            @foreach($designationOptions as $key => $value)
            <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
            @endforeach
        </flux:select>
        {{-- <flux:input wire:model.live='designation' label="Designation" placeholder="Designation" /> --}}
        <flux:input wire:model.live="nombre" type="number" id="nombre" label="{{ __('Nombre') }}" />
        {{-- @error('image') <span class="error">{{ $message }}</span> @enderror --}}
        <div class="flex">
            <flux:spacer />
            @if($isUpdate)
            <flux:button type="submit" variant="primary" wire:click='savereal'>Modifier</flux:button>
            @else
            <flux:button type="submit" variant="primary" wire:click='savereal'>Enregistrer</flux:button>
            @endif
        </div>
    </div>
</flux:modal>


<flux:modal name="delete-real" class="min-w-[22rem]">
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
                <th scope="col" class="px-6 py-3 font-semibold">Designation</th>
                <th scope="col" class="px-6 py-3 font-semibold">Nombre</th>
                <th scope="col" class="px-6 py-3 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ( $reals as $real )
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $real->id }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $real->designation }}</td>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $real->nombre }}</td>
                <td class="px-6 py-4">
                    <flux:button wire:click="edit({{ $real->id }})" size="sm" variant="primary">Edit</flux:button>
                    <flux:button wire:click="delete({{ $real->id }})" size="sm" variant="danger">Delete</flux:button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="px-6 py-4 text-gray-600 dark:text-gray-300 text-center" colspan="4">No data found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
   </div>
</body>
</div>
