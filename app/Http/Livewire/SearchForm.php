<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class SearchForm extends Component
{
    public $search;
    public function render()
    {
       
        return view('livewire.search-form',["question"=>Question::where("title","LIKE","%$this->search%")->paginate(6)]);
    }
}
