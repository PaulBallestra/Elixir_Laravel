<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class Actualite extends Component
{

    public $id_actualite;
    public $name;
    public $date;
    public $shortDescription;
    public $image;

    public function mount($actualite)
    {
        $dateFormat = Carbon::parse($actualite->created_at)->format('d/m/Y');

        $this->id_actualite = $actualite->id;
        $this->name = $actualite->name;
        $this->date = $dateFormat;
        $this->shortDescription = $actualite->short_description;
        $this->image = $actualite->image;

    }

    public function render()
    {
        return view('livewire.actualite');
    }
}
