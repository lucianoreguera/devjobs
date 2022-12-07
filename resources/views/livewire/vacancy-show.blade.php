<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacancy->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Empresa: 
                <span class="normal-case font-normal">{{ $vacancy->company }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Último día para postularse: 
                <span class="normal-case font-normal">{{ $vacancy->last_day->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Categoría: 
                <span class="normal-case font-normal">{{ $vacancy->category->category }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Salario: 
                <span class="normal-case font-normal">{{ $vacancy->salary->salary }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 md:gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/'.$vacancy->image) }}" alt="{{'Imagen vacante '.$vacancy->title}}" />
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{ $vacancy->description }}</p>
        </div>
    </div>

    @guest
    <div class="mt-5 border border-dash text-center p-5 bg-gray-50">
        <p>
            ¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes</a>
        </p>
    </div>
    @endguest

    @cannot('create', App\Models\Vacancy::class)
    <livewire:vacancy-apply :vacancy="$vacancy" />
    @endcannot
</div>
