@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

    @livewire('admin.slides')

@endsection
@push('scripts')
    <script>
        var modal = $('#slide_modal');
        window.addEventListener('showSlideModalForm', function(e) {
            modal.modal('show');
        });
        window.addEventListener('hideSlideModalForm', event => {
            modal.modal('hide');
        });

        $('table tbody#sortable_slides').sortable({
            cursor: 'move',
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-ordering') != (index + 1)) {
                        $(this).attr('data-ordering', (index + 1)).addClass('updated');
                    }
                });
                var positions =[];
                $('.updated').each(function() {
                    positions.push([$(this).attr('data-index'), $(this).attr('data-ordering')]);
                });
                Livewire.dispatch('updateSlideOrdering', [positions]);
            }
        });

        window.addEventListener("deleteSlide", function(e) {
            var id = e.detail.id;
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Esta ação não poderá ser desfeita.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Excluir',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteSlideAction', { id: id });
                }
            });
        });

    </script>
@endpush
