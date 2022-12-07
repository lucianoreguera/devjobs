<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use App\Notifications\CandidateNew;
use Livewire\Component;
use Livewire\WithFileUploads;

class VacancyApply extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacancy;

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function apply()
    {
        $data = $this->validate();

        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);

        $this->vacancy->recruiter->notify(new CandidateNew($this->vacancy->id, $this->vacancy->title, auth()->user()->id));

        $this->vacancy->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv']
        ]);

        session()->flash('msg', 'Se envió correctamente tu información, muchos éxitos!!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.vacancy-apply');
    }
}
