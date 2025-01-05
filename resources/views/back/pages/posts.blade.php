@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Posts</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        List
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <a href="{{ route('admin.add_post') }}" class="btn btn-primary">
                <i class="icon-copy bi bi-plus-circle"></i> Adicionar Post
            </a>
        </div>
    </div>
</div>

@livewire('admin.posts')

@endsection

@push('scripts')
    <script>
        window.addEventListener('deletePost', function(event) {
            var id = event.detail[0].id; // Acessa o id diretamente
            Swal.fire({
                title: 'Você Tem Certeza?',
                text: 'Você deseja deletar este post?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deletePostAction', [id]);
                }
            });
        });
    </script>
@endpush
