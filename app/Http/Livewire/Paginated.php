<?php
namespace App\Http\Livewire;

use Livewire\Component;

class Paginated extends Component

{
    public $page=1, $lastpage, $nextpage, $prevpage, $firstpage, $total;
    
    protected $listeners=[
        'goToPage',
        'nextPage',
        'prevPage',
        'firstPage',
        'lastPage',

    ];

    protected $queryString = [
        'page' => ['except' => 1],
    ];

    public function links($response){
        $response=json_decode(json_encode($response->json()['content']));
        $this->page=$response->current_page;
        $this->lastpage=$response->last_page;
        $this->nextpage=preg_replace('/[^0-9]/', '', $response->next_page_url);
        $this->prevpage=preg_replace('/[^0-9]/', '', $response->prev_page_url);
        $this->firstpage=1;
        $this->total=$response->total;
        $this->emit('changePage', $this->page, $this->lastpage, $this->total);

    }

    public function goToPage($page){
        $this->page=$page;
        $this->getData();
    }
    public function nextPage(){
        $this->page=$this->nextpage;
        $this->getData();
    }
    public function prevPage(){
        $this->page=$this->prevpage;
        $this->getData();
    }
    public function firstPage(){
        $this->page=$this->firstpage;
        $this->getData();
    }
    public function lastPage(){
        $this->page=$this->lastpage;
        $this->getData();
    }

    public function updatedPagination(){
        dd($this->pagination);
    }

}