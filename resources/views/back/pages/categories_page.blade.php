@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

    @livewire('admin.categories')

@endsection

@push('scripts')
    <script>
        window.addEventListener('showParentCategoryModalForm', event => {
            $('#pcategory_modal').modal('show');
        });

        window.addEventListener('hideParentCategoryModalForm', event => {
            $('#pcategory_modal').modal('hide');
        });


        window.addEventListener('showCategoryModalForm', event => {
            $('#category_modal').modal('show');
        });

        window.addEventListener('hideCategoryModalForm', event => {
            $('#category_modal').modal('hide');
        });


        $('table tbody#sortable_parent_categories').sortable({
            cursor: "move",
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-ordering') != (index + 1)) {
                        $(this).attr('data-ordering', (index + 1)).addClass('updated');
                    }
                });
                var positions = [];
                $('.updated').each(function() {
                    positions.push([
                        $(this).attr('data-index'),
                        $(this).attr('data-ordering')
                    ]);
                    $(this).removeClass('updated');
                });

                //alert(positions);
                Livewire.dispatch('updateParentCategoryOrdering', [positions]);
            }
        });

        $('table tbody#sortable_categories').sortable({
            cursor: "move",
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-ordering') != (index + 1)) {
                        $(this).attr('data-ordering', (index + 1)).addClass('updated');
                    }
                });
                var positions = [];
                $('.updated').each(function() {
                    positions.push([
                        $(this).attr('data-index'),
                        $(this).attr('data-ordering')
                    ]);
                    $(this).removeClass('updated');
                });

                //alert(positions);
                Livewire.dispatch('updateCategoryOrdering', [positions]);
            }
        });

        window.addEventListener('deleteParentCategory', function(event) {
            var id = event.detail[0].id; // Acessa o id diretamente
            Swal.fire({
                title: 'Você Tem Certeza?',
                text: 'Você deseja deletar esta categoria pai?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteParentCategoryAction', [id]);
                }
            });
        });

        window.addEventListener('deleteCategory', function (event){
           var id = event.detail[0].id;

            Swal.fire({
                title: 'Você Tem Certeza?',
                text: 'Você deseja deletar esta categoria?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteCategoryAction', [id]);
                }
            });
        });
    </script>
@endpush
