<x-filament-panels::page>
    {{ $this->form }}

    <x-filament::button wire:click="submit" class="mt-4">
        Enviar
    </x-filament::button>
</x-filament-panels::page>