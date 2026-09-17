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
    </script>
@endpush
