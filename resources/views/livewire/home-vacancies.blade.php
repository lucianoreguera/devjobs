<div>
    <livewire:filter-vacancies />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacancies as $vacancy)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a 
                                href="{{ route('vacancies.show', $vacancy->id) }}"
                                class="text-3xl font-extrabold text-gray-600"
                            >{{ $vacancy->title }}</a>
                            <p class="text-base text-gray-600 mb-1">{{ $vacancy->company }}</p>
                            <p class="text-base text-xs font-bold text-gray-600 mb-1">{{ $vacancy->category->category }}</p>
                            <p class="text-base text-gray-600 mb-1">{{ $vacancy->salary->salary }}</p>
                            <p class="font-bold text-xs text-gray-600">
                                Último día para postularse:
                                <span class="font-normal">{{ $vacancy->last_day->format('d/m/Y') }}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a 
                                href="{{ route('vacancies.show', $vacancy->id) }}"
                                class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center"    
                            >Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
