<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class VacancyList extends Component
{
    protected $listeners = ['vacancyDestroy'];
    
    public function vacancyDestroy(Vacancy $vacancy)
    {
        $vacancy->delete();
    }

    public function render()
    {
        $vacancies = Vacancy::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.vacancy-list', [
            'vacancies' => $vacancies
        ]);
    }
}
