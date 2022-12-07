<form class="md:w-1/2 space-y-5" wire:submit.prevent='update'>
    <div>
        <x-input-label for="title" :value="__('Título Vacante')" />

        <x-text-input 
            id="title" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="title" 
            :value="old('title')"
            placeholder="Título Vacante"
        />

        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />

        <select 
            wire:model="salary" 
            id="salary" 
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
        >
            <option value="">-- Selecciona un salario --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>

        @error('salary')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="category" :value="__('Categoría')" />

        <select 
            wire:model="category" 
            id="category" 
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
        >
            <option value="">-- Selecciona una categoría --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>

        @error('caegory')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="company" :value="__('Empresa')" />

        <x-text-input 
            id="company" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="company" 
            :value="old('company')"
            placeholder="Empresa - Ej: Uber, Shopify"
        />

        @error('company')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="last_day" :value="__('Último día para postularse')" />

        <x-text-input 
            id="last_day" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="last_day" 
            :value="old('last_day')"
        />

        @error('last_day')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="description" :value="__('Descripción')" />

        <textarea 
            wire:model="description" 
            id="description" 
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72"
        ></textarea>

        @error('description')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="image" :value="__('Imagen')" />

        <x-text-input 
            id="image" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imageNew"
            accept="image/*"
        />

        <div class="my-5 w-80">
            <x-input-label :value="__('Imagen Actual')" />

            <img src="{{ asset('storage/vacancies/'.$image) }}" alt="{{ 'Imagen Vacante'.$title }}">

            <div class="my-5 w-80">
                @if ($imageNew)
                    Imagen Nueva: <img src="{{ $imageNew->temporaryUrl() }}" />
                @endif
            </div>
        </div>

        @error('imageNew')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div class="md:flex md:justify-end my-5">
        <x-primary-button>
            Guardar Cambios
        </x-primary-button>
    </div>
</form>
