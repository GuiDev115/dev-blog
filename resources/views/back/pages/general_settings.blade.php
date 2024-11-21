@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Configurações</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Configurações
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-4">
    @livewire('admin.settings')
</div>

@endsection

@push('scripts')
    <script>

        document.querySelector('input[type="file"][name="site_logo"]').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.querySelector('#preview_site_logo');
            const allowedExtensions = ["image/jpeg", "image/png", "image/jpg"];

            if (file && allowedExtensions.includes(file.type)) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                alert('Tipo de arquivo inválido. Apenas JPG, JPEG, e PNG são permitidos.');
            }
        });

        $('#updateLogoForm').submit(function(e){
            e.preventDefault();
            let form = this;
            let inputVal = $(form).find('input[type="file"]').val();
            let errorElement = $(form).find('span.text-danger');
            errorElement.text('');

            if(inputVal.length > 0){
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    beforeSend: function(){},
                    success: function(data){
                        if(data.status == 1){
                            $(form)[0].reset();
                            $().notifa({
                                vers: 2,
                                cssClass: 'success',
                                html: data.message,
                                time: 2500,
                            });
                            $('img.site_logo').each(function(){
                                $(this).attr('src', '/'+data.image_path);
                            }); // Atualiza a imagem da logo
                        } else {
                            $().notifa({
                                vers: 2,
                                cssClass: 'error',
                                html: data.message,
                                time: 2500,
                            });
                        }
                    },
                });
            } else {
                errorElement.text('Selecione uma imagem para fazer upload.');
            }
        });

    </script>
@endpush
