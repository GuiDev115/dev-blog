<div>

    <div class="pd-20 card-box mb-30">
        <div class="row mb-20">
            Filters here...
        </div>
        <div class="talbe-responsive">
            <table class="table table-striped table-auto table-sm">
                <thead class="bg-secondary text-white">
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Categoria</th>
                <th scope="col">Visibilidade</th>
                <th scope="col">Ações</th>
                </thead>
                <tbody>
                @forelse($posts as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td>
                        <a href="">
                            <img src="/images/posts/resized/resized_{{ $item->featured_image }}" width="100" alt="">
                        </a>
                    </td>
                    <td> {{ $item->title }} </td>
                    <td> {{ $item->author->name }} </td>
                    <td> {{ $item->post_category->name }} </td>
                    <td>
                        @if ($item->visibility == 1)
                            <span class="badge badge-pill badge-success">
                                <i class="icon-copy ti-world"></i> Public
                            </span>
                        @else
                            <span class="badge badge-pill badge-success">
                                <i class="icon-copy ti-lock"></i> Private
                            </span>
                        @endif
                    </td>
                    <td>
                        <div class="table-actions">
                            <a href="" data-color="#265ed7" style="color: rgb(38, 94, 215)">
                                <i class="icon-copy dw dw-edit2"></i>
                            </a>
                            <a href="" data-color="#e95959" style="color: rgb(233, 89, 89)">
                                <i class="icon-copy dw dw-delete-3"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <span class="text-danger">Sem post encontrado!</span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="block mt-1">
            {{ $posts->links('livewire::simple-bootstrap') }}
        </div>
    </div>

</div>
