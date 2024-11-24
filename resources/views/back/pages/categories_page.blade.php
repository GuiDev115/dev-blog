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
                Livewire.dispatch('updateCategoryOrdering', [positions]);
            }
        });
    </script>
@endpush
