<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class FilterVacancies extends Component
{
    public $term;
    public $salary;
    public $category;

    public function getDataForm()
    {
        $this->emit('search', $this->term, $this->salary, $this->category);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.filter-vacancies', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
