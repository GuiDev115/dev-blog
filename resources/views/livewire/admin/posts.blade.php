<div>

    <div class="pd-20 card-box mb-30">
        <div class="row mb-20">
            <div class="col-md-4">
                <label for="search"><b class="text-secondary">Procurar</b>:</label>
                <input wire:model.live="search" id="search" type="text" class="form-control" placeholder="Pesquisar Posts...">
            </div>
            @if(auth()->user()->type == 'superAdmin')


            <div class="col-md-2">
                <label for="author"><b class="text-secondary">Autor</b>:</label>
                <select wire:model.live="author" id="author" class="custom-select form-control">
                    <option value="">Nenhum Selecioado</option>
                    @foreach(App\Models\User::whereHas('posts')->get() as $user)

                        <option value="{{ $user->id }}">{{ $user->name }}</option>

                    @endforeach
                </select>
            </div>

            @endif
            <div class="col-md-2">
                <label for="category"><b class="text-secondary">Categoria</b>:</label>
                <select wire:model.live="category" id="category" class="custom-select form-control">
                    <option value="">Nenhum Selecioado</option>
                    {!! $categories_html !!}
                </select>
            </div>
            <div class="col-md-2">
                <label for="visibility"><b class="text-secondary">Visibilidade</b>:</label>
                <select wire:model.live="visibility" id="visibility" class="custom-select form-control">
                    <option value="">Nenhum Selecioado</option>
                    <option value="public">Publico</option>
                    <option value="private">Privado</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="sort"><b class="text-secondary">Ordenado por</b>:</label>
                <select wire:model.live="sortBy" id="sort" class="custom-select form-control">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </div>
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
