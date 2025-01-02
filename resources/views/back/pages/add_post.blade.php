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
                            <label for=""><b>Conteúdo</b>:</label>
                            <textarea name="contents" id="editor" cols="30" rows="10" class="ckeditor form-control" placeholder="Entre com o conteudo do post..."></textarea>
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
                            <select name="category" id="" class="custom-select form-control" >
                                <option value="">Selecione uma categoria</option>
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
                        <div class="form-group">
                            <label for=""><b>Tags</b>:</label>
                            <input type="text" class="form-control" name="tags" data-role="tagsinput">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for=""><b>Visibilidade</b>:</label>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" name="visibility" id="customRadio1" class="custom-control-input" value="1" checked>
                                <label for="customRadio1" class="custom-control-label"> Publico </label>
                            </div>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" name="visibility" id="customRadio2" class="custom-control-input" value="0">
                                <label for="customRadio2" class="custom-control-label"> Privado </label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary"> Criar Post</button>
        </div>
    </form>

@endsection

@push('stylesheets')
    <link rel="stylesheet" href="/back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
@endpush

@push('scripts')
    <script src="/back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>

    <script>
        document.querySelector('input[type="file"][name="featured_image"]').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.querySelector('img#featured_image_preview');
            const allowedExtensions = ['image/jpeg', 'image/png', 'image/jpg'];

            if (file) {
                if (allowedExtensions.includes(file.type)) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert('Tipo de arquivo invalido. Apenas JPG, JPEG, and PNG são permitidos.');
                }
            } else {
                alert('Nenhum Arquivo selecionado');
            }
        });

        $('#addPostForm').on('submit', function(e){
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var form = this;
            var formData = new FormData(form);

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.status == 1) {
                        $(form)[0].reset();
                        $('img#featured_image_preview').attr('src', '');
                        $('input[name="tags"]').tagsinput('removeAll');
                        Swal.fire({
                            title: 'Success!',
                            text: data.msg,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    }else{
                        Swal.fire({
                            title: 'Error!',
                            text: data.msg,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                },
                error:function(data){
                    $.each(data.responseJSON.errors, function(prefix, val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }
            });
        });
    </script>
@endpush
