<div>
    <flux:modal name="view-message" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Détails du Message</flux:heading>

            <flux:subheading>
                <p><strong>Nom :</strong> {{ $selectedMessage?->nom }}</p>
                <p><strong>Objet :</strong> {{ $selectedMessage?->object }}</p>
                <p><strong>Email :</strong> {{ $selectedMessage?->email }}</p>
                <p><strong>Message :</strong></p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $selectedMessage?->message }}</p>
            </flux:subheading>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Fermer</flux:button>
            </flux:modal.close>
        </div>
    </div>
</flux:modal>

    <flux:modal name="delete-message" class="min-w-[22rem]">
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
    <div class="overflow-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">ID</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Nom</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Objet</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Message</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Email</th>
                    <th scope="col" class="px-6 py-3 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $message->id }}</td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $message->nom }}</td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $message->object }}</td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ Str::limit($message->message, 50) }}</td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $message->email }}</td>
                    <td class="px-6 py-4">
                        <flux:button wire:click="view({{ $message->id }})" size="sm" variant="primary">Lire</flux:button><br><br>
                        <flux:button wire:click="delete({{ $message->id }})" size="sm" variant="danger">Delete</flux:button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300 text-center" colspan="6">Aucune donnée trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="mt-4">
            {{ $messages->links() }}
        </div>
        
    </div>
</div>
