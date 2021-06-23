<?php

namespace App\Http\Livewire;


use App\Products;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    use WithPagination;

    public $query;
    public $products;



    public function mount()
    {
        $this->resetFields();
        $this->products =  Products::all();
    }


    public function resetFields()
    {
        $this->query = '';
    }
    public function updatedQuery()
    {
        if (!empty($this->query)) {
            $this->products = Products::where('name', 'like', '%' . $this->query . '%')
                ->get()
                ->toArray();
        } else {
            $this->resetFields();
        }
    }

    public function viewProduct($id)
    {
        
        $this->redirect(route('view-product', $id));
    }

    public function render()
    {


        return view('livewire.search-products',[
           
        ]);
    }
}