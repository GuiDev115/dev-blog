@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Adicionar Post</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Adicionar Post
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{ route('admin.posts') }}" class="btn btn-primary"> Ver todos os Posts</a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.create_post') }}" method="POST" autocomplete="off" enctype="multipart/form-data" id="addPostForm">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Titulo</b>:</label>
                            <input type="text" class="form-control" name="title" placeholder="Entre com o titulo do post">
                            <span class="text-danger error-text title_error"></span>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Conteudo</b>:</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Entre com o conteudo do post..."></textarea>
                            <span class="text-danger error-text content_error"></span>
                        </div>
                    </div>
                </div>
                <div class="card card-box mb-2">
                    <div class="card-header weight-500">SEO</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Keywords Meta do Post</b> <small>(Separado por comma.)</small></label>
                            <input type="text" class="form-control" name="meta_keywords" placeholder="Entre com as keywords">
                        </div>
                        <div class="form-group">
                            <label for=""><b>Descricao do meta do post</b></label>
                            <textarea name="meta_description" id="" cols="30" rows="10" class="form-control" placeholder="Entre com a descrição..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-box mb-2">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Categoria do Post</b></label>
                            <select name="category" id="" class="custom-select form-control">
                                {!! $categories_html !!}
                            </select>
                            <span class="text-danger error-text category_error"></span>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Imagem em destaque do Post</b>:</label>
                            <input type="file" name="featured_image" class="form-control-file form-control" height="auto">
                            <span class="text-danger error-text featured_image_error"></span>
                        </div>
                        <div class="d-block mb-3" style="max-width: 250px;">
                            <img src="" alt="" class="img-thumbnail" id="featured_image_preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
