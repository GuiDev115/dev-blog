<div>
    <div class="row">

        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Categoria Pai</h4>
                    </div>
                    <div class="pull-right">
                        <a href="javascript:;" class="btn btn-primary btn-sm" wire:click="addParentCategory()"> Add P. Category</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped table-sm">
                        <thead class="bg-secondary text-white">
                        <th>#</th>
                        <th>Name</th>
                        <th>N. de categorias</th>
                        <th>Actions</th>
                        </thead>
                        <tbody id="sortable_parent_categories">
                            @forelse ($pcategories as $item)

                        <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering}}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td> {{ $item->children-> count() }} </td>
                            <td>
                                <div class="table-actions">
                                    <a href="javascript:;" wire:click="editParentCategory({{$item->id}})"  class="text-primary mx-2">
                                        <i class="dw dw-edit2"></i>
                                    </a>
                                    <a href="javascript:;" wire:click="deleteParentCategory({{$item->id}})" class="text-danger mx-2">
                                        <i class="dw dw-delete-3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger">Nenhum item encontrado!</span>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <div class="d-block mt-1 texte-center">
                    {{ $pcategories->links('livewire::simple-bootstrap') }}
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Categorias</h4>
                    </div>
                    <div class="pull-right">
                        <a href="javascript:;" wire:click="addCategory()" class="btn btn-primary btn-sm"> Add Categoria</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped table-sm">
                        <thead class="bg-secondary text-white">
                        <th>#</th>
                        <th>Name</th>
                        <th>Categoria Pai</th>
                        <th>N. de Posts</th>
                        <th>Ações</th>
                        </thead>
                        <tbody id="sortable_categories">

                        @forelse($categories as $item)
                        <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering }}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item-> name}}</td>
                            <td>{{ !is_null($item->parent_category) ? $item-> parent_category->name : ' - '}}</td>
                            <td> }} </td>
                            <td>
                                <div class="table-actions">
                                    <a href="javascript:;" wire:click="editCategory({{ $item->id }})" class="text-primary mx-2">
                                        <i class="dw dw-edit2"></i>
                                    </a>
                                    <a href="javascript:;" wire:click="deleteCategory({{ $item->id }})" class="text-danger mx-2">
                                        <i class="dw dw-delete-3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <span class="text-danger">Nenhum item encontrado!</span>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <div class="d-block mt-1 text-center">
                    {{ $categories->links('livewire::simple-bootstrap') }}
            </div>
        </div>
    </div>

    -- MODALS --

    <div wire:ignore.self class="modal fade" id="pcategory_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdriop="static" data-keybaord="false">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" wire:submit="{{ $isUpdateParentCategoryMode ? 'updateParentCategory()' : 'createParentCategory()'}}">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        {{ $isUpdateParentCategoryMode ? 'Atualizar P. Category' : 'Adicionar P. Category' }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    @if($isUpdateParentCategoryMode)
                        <input type="hidden" wire:model="pcategory_id">
                    @endif
                    <div class="form-group">
                        <label for=""><b>Nome Categoria Pai</b></label>
                        <input type="text" class="form-control" wire:model="pcategory_name" placeholder="Entre com o nome da categoria pai aqui...">
                        @error('pcategory_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Fechar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ $isUpdateParentCategoryMode ? 'Atualizar' : 'Adicionar' }}
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdriop="static" data-keybaord="false">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" wire:submit="{{ $isUpdateCategoryMode ? 'updateCategory()' : 'createCategory()'}}">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        {{ $isUpdateCategoryMode ? 'Atualiza Category' : 'Adicionar Category' }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    @if($isUpdateCategoryMode)
                        <input type="hidden" wire:model="category_id">
                    @endif
                    <div class="form-group">
                        <label for=""><b>Categoria Pai</b>:</label>
                        <select wire:model="parent" class="custom-select">
                        <option value="0">Não Categorizado</option>
                        @foreach($pcategories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        </select>
                            @error('parent')
                            <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for=""><b>Nome Categoria</b></label>
                        <input type="text" class="form-control" wire:model="category_name" placeholder="Entre com o nome da categoria aqui...">
                        @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Fechar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ $isUpdateCategoryMode ? 'Atualizar' : 'Adicionar' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
