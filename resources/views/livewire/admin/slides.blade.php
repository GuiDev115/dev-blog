<div>
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Carrossel</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Carrossel
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{ route('admin.slider') }}" class="btn btn-primary">
                    <i class="icon-copy bi bi-plus-circle"></i> Add Slide
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-auto table-sm table-condensed">
            <thead class="bg-secondary text-white">
            <th scope="col">#ID</th>
            <th scope="col">Imagem</th>
            <th scope="col">Heading</th>
            <th scope="col">Link</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            </thead>
            <tbody>
            <tr>
                <td scope="row">#22</td>
                <td>
                    <a href="#">
                        <img src="" width="100" alt="">
                    </a>
                </td>
                <td>Slide Heading</td>
                <td>#Link</td>
                <td>Status</td>
                <td>
                    <div class="table actions">
                        <a href="" data-color="#265ed7" style="color:rgb(38,94,215)">
                            <i class="icon-copy dw dw-edit2"></i>
                        </a>
                        <a href="" data-color="#e95959" style="color:rgb(233,89,89)">
                            <i class="icon-copy dw dw-delete-3"></i>
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
