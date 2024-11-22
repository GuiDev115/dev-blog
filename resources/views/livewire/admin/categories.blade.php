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
                        <tbody>
                            @forelse ($pcategories as $item)

                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td> - </td>
                            <td>
                                <div class="table-actions">
                                    <a href="" class="text-primary mx-2">
                                        <i class="dw dw-edit2"></i>
                                    </a>
                                    <a href="" class="text-danger mx-2">
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
            </div>
        </div>

        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Categorias</h4>
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-primary btn-sm"> Add Categoria</a>
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
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>P. Cat 1</td>
                            <td>Any</td>
                            <td>4</td>
                            <td>
                                <div class="table-actions">
                                    <a href="" class="text-primary mx-2">
                                        <i class="dw dw-edit2"></i>
                                    </a>
                                    <a href="" class="text-danger mx-2">
                                        <i class="dw dw-delete-3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    -- MODALS --

    <div wire:ignore.self class="modal fade" id="pcategory_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdriop="static" data-keybaord="false">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" wire:submit="{{ $isUpdateParentCategoryMode ? '$updateParentCategory()' : 'createParentCategory()'}}">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        {{ $isUpdateParentCategoryMode ? 'Update P. Category' : 'Add P. Category' }}
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
</div>
