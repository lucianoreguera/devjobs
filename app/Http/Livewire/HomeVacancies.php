<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class HomeVacancies extends Component
{
    public $term;
    public $salary;
    public $category;
    
    protected $listeners = [
        'search'
    ];
    
    public function search($term, $salary, $category)
    {
        $this->term = $term;
        $this->salary = $salary;
        $this->category = $category;
    }
    
    public function render()
    {
        // when -> if $term exist => exec
        $vacancies = Vacancy::when($this->term, function($query) {
            $query->where('title', 'LIKE', '%'.$this->term.'%');
        })
        ->when($this->category, function($query) {
            $query->where('category_id', $this->category);
        })
        ->when($this->salary, function($query) {
            $query->where('salary_id', $this->salary);
        })
        ->get();

        return view('livewire.home-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
