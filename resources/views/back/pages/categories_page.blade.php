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
    </script>
