@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

    <div class="row">

        <div class="col-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Categoria Pai</h4>
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-primary btn-sm"> Add P. Category</a>
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
                        <tr>
                            <td>1</td>
                            <td>Categoria 1</td>
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

@endsection
