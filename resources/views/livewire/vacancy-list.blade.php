<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacancies as $vacancy)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-xl font-bold">
                    {{ $vacancy->title }}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{ $vacancy->company }}
                </p>
                <p class="text-sm text-gray-500">
                    Último día: {{ $vacancy->last_day->format('d/m/Y') }}
                </p>
            </div>
    
            <div class="flex flex-col items-stretch md:flex-row gap-3 mt-5 md:mt-0">
                <a href="{{ route('candidates.index', $vacancy) }}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >{{ $vacancy->candidates->count() }} Candidatos</a>
                <a href="{{ route('vacancies.edit', $vacancy) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >Editar</a>
                <button 
                    wire:click="$emit('show-alert', {{ $vacancy->id }})"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >Eliminar</button>
            </div>
        </div>
        @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>
    
    <div class="mt-10">
        {{ $vacancies->links() }}
    </div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('show-alert', vacanteId => {
        Swal.fire({
            title: 'Eliminar vacante?',
            text: "Una vacante eliminada no se puede recuperar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('vacancyDestroy', vacanteId)

                Swal.fire(
                    'Vacante eliminada!',
                    'Eliminada correctamente.',
                    'success'
                )
            }
        })
    })
</script>
@endpush
