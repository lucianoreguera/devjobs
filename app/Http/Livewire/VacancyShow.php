<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VacancyShow extends Component
{
    public $vacancy;

    public function render()
    {
        return view('livewire.vacancy-show');
    }
}
