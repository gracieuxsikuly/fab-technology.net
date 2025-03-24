<x-layouts.app title="Missions - Gérez vos missions">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Mission</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Gérez toutes vos missions') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <livewire:backend.mission-livewire/>
    </x-layouts.app>
    