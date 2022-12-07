<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Postularme a esta vacante
    </h3>

    @if (session()->has('msg'))
    <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
        {{ session('msg') }}
    </p>
    @else
    <form class="w-96 mt-5" wire:submit.prevent="apply">
        <div class="mb-4">
            <x-input-label 
                for="cv" 
                :value="__('Curriculum u Hoja de Vida')" 
            />
            <x-text-input wire:model="cv" id="cv" type="file" accept=".pdf" name="cv" class="block mt-1 w-full"/>
        </div>

        @error('cv')
            <livewire:show-alert :message="$message" />
        @enderror

        <x-primary-button class="my-5">
            {{ __('Postularme') }}
        </x-primary-button>
    </form>
    @endif
</div>
