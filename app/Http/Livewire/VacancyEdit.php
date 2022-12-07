<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class VacancyEdit extends Component
{
    use WithFileUploads;
    
    public $vacancyId;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $imageNew;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'imageNew' => 'nullable|image|max:1024'
    ];
    
    public function mount(Vacancy $vacancy)
    {
        $this->vacancyId = $vacancy->id;
        $this->title = $vacancy->title;
        $this->salary = $vacancy->salary_id;
        $this->category = $vacancy->category_id;
        $this->company = $vacancy->company;
        $this->last_day = Carbon::parse($vacancy->last_day)->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image = $vacancy->image;
    }

    public function update()
    {
        $data = $this->validate();

        if ($this->imageNew) {
            $image = $this->imageNew->store('public/vacancies');
            $data['image'] = str_replace('public/vacancies/', '', $image);
        }

        $vacancy = Vacancy::find($this->vacancyId);
        $vacancy->title = $data['title'];
        $vacancy->salary_id = $data['salary'];
        $vacancy->category_id = $data['category'];
        $vacancy->company = $data['company'];
        $vacancy->last_day = $data['last_day'];
        $vacancy->description = $data['description'];
        $vacancy->image = $data['image'] ?? $vacancy->image;

        $vacancy->save();

        session()->flash('msg', 'La vacante se modificó correctamente');

        return redirect()->route('vacancies.index');
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.vacancy-edit', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
