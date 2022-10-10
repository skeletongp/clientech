<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    public $page, $lastPage, $firstPage=1, $total;

    protected $queryString = [
        'page' => ['except' => 1],
        'lastPage' => ['except' => 1],
        'firstPage' => ['except' => 1],
        'total' => ['except' => 1],

    ];
    protected $listeners = [
        'changePage'
    ];
    public function render()
    {
        return view('livewire.pagination');
    }
    public function changePage($page, $lastPage,$total)
    {
        $this->page = $page;
        $this->lastPage = $lastPage;
        $this->total = $total;
    }
   
    
}
