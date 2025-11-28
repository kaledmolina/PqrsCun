<div>
    <form wire:submit="create">
        {{ $this->form }}

        <div class="mt-6 flex justify-end">
            <x-filament::button type="submit">
                Radicar Solicitud
            </x-filament::button>
        </div>
    </form>

    <x-filament-actions::modals />
</div>
