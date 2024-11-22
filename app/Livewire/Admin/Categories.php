<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ParentCategory;
use App\Models\Category;


class Categories extends Component
{
    public $isUpdateParentCategoryMode = false;
    public $pcategory_id, $pcategory_name;

    public function addParentCategory(){
        $this->pcategory_id = null;
        $this->pcategory_name = null;
        $this->isUpdateParentCategoryMode = false;
        $this->showParentCategoryModalForm();
    }

    public function createParentCategory(){
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name'
        ],[
            'pcategory_name.required' => 'O nome da categoria pai é obrigatório',
            'pcategory_name.unique' => 'Essa categoria pai já existe'
        ]);

        $pcategory = new ParentCategory();
        $pcategory->name = $this->pcategory_name;
        $saved = $pcategory->save();

        if($saved){
            $this->hideParentCategoryModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Categoria pai criada com sucesso']);
        }else{
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Erro ao criar a categoria pai']);
        }
    }

    public function showParentCategoryModalForm(){
        $this->resetErrorBag();
        $this->dispatch('showParentCategoryModalForm');
    }

    public function hideParentCategoryModalForm(){
        $this->dispatch('hideParentCategoryModalForm');
        $this->isUpdateParentCategoryMode = false;
        $this->pcategory_id = $this->pcategory_name = null;
    }


    public function render()
    {
        return view('livewire.admin.categories', [
            'pcategories' => ParentCategory::orderBy('ordering','asc')->get()
        ]);
    }
}
