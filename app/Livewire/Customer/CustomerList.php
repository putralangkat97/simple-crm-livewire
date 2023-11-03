<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $checkbox = [];
    public $search = "";

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->search = "";
    }

    public function delete()
    {
        Customer::whereIn('id', $this->checkbox)->delete();
        $this->checkbox = [];
    }

    public function render()
    {
        $customers = Customer::query();
        if ($this->search != "") {
            $customers = $customers->search($this->search);
        }
        return view('livewire.customer.customer-list', [
            'customers' => $customers->paginate($this->perPage)
        ]);
    }
}
