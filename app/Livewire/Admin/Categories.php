<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ParentCategory;
use App\Models\Category;


class Categories extends Component
{
    public $isUpdateParentCategoryMode = false;
    public $pcategory_id, $pcategory_name;

    protected $listeners = [
        'updateCategoryOrdering'
    ];

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



    public function updateParentCategory(){
        $pcategory = ParentCategory::findOrFail($this->pcategory_id);
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name,'.$pcategory->id
        ],[
            'pcategory_name.required' => 'O nome da categoria pai é obrigatório',
            'pcategory_name.unique' => 'Essa categoria pai já existe'
        ]);

        $pcategory->name = $this->pcategory_name;
        $pcategory->slug = null;
        $updated = $pcategory->save();

        if($updated) {
            $this->hideParentCategoryModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Categoria pai atualizada com sucesso']);
        }else{
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Erro ao atualizar a categoria pai']);
        }
}

    public function updateCategoryOrdering($positions){
        foreach($positions as $position){
            $index = $position[0];
            $new_position = $position[1];
            ParentCategory::where('id', $index)->update([
                'ordering' => $new_position
            ]);
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Ordem das categorias pai atualizada com sucesso']);
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

    public function editParentCategory($id){
        $pcategory = ParentCategory::findOrFail($id);
        $this->pcategory_id = $pcategory->id;
        $this->pcategory_name = $pcategory->name;
        $this->isUpdateParentCategoryMode = true;
        $this->showParentCategoryModalForm();
    }

    public function render()
    {
        return view('livewire.admin.categories', [
            'pcategories' => ParentCategory::orderBy('ordering','asc')->get()
        ]);
    }
}
