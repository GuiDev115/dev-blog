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
                <a href="javascript:;" class="btn btn-primary" wire:click="addSlide()">
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
                @forelse ($slides as $slide)
            
                    <tr>
                        <td scope="row">#{{ $slide->id }}</td>
                        <td>
                                <img src="/images/slides/{{ $slide->image }}" width="100" alt="">
                        </td>
                        <td>{{ $slide->heading }}</td>
                        <td>{{ $slide->link }}</td>
                        <td>
                        
                            @if( $slide->status == 1 )
                                <span class="badge badge-pill badge-success">Public</span>
                            @else
                                <span class="badge badge-pill badge-secondary">Unlisted</span>
                            @endif
                        
                        </td>
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

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">Nenhum slide encontrado.</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>

    <!-- SLIDE MODAL -->
    <div wire:ignore.self class="modal fade " id="slide_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
									<div class="modal-dialog modal-lg modal-dialog-centered">
										<form class="modal-content" wire:submit="{{ $isUpdateSlideMode ? 'updateSlide()' : 'createSlide()' }}">
											<div class="modal-header">
												<h4 class="modal-title" id="myLargeModalLabel">
													{{ $isUpdateSlideMode ? 'Editar Slide' : 'Adicionar Slide' }}
												</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
													×
												</button>
											</div>
											<div class="modal-body">
												@if ($isUpdateSlideMode)
                                                    <input type="hidden" wire:model="slide_id">
                                                @endif
                                                <div class="form-group">
                                                    <label for="slide_heading">Heading</label>
                                                    <input type="text" class="form-control" id="slide_heading" wire:model="slide_heading" placeholder="Enter slide heading">
                                                    @error('slide_heading')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="slide_link">Link</label>
                                                    <input type="text" class="form-control" id="slide_link" wire:model="slide_link" placeholder="Enter slide link">
                                                    @error('slide_link')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                @if ($slide_image)
                                                    <div class="d-block" style="max-width: 200px;">
                                                        <img src="{{ $slide_image->temporaryUrl() }}" alt="" class="img-thumbnail" style="max-width: 100%; height: auto;">
                                                        @error('slide_image')
                                                            <span class="text-danger ml-1">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for=""><b>Image</b></label>
                                                    <input type="file" class="form-control" id="slide_image" wire:model="slide_image">
                                                    @error('slide_image')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mb-5">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck" wire:model="slide_status">
                                                        <label for="customCheck" class="custom-control-label">
                                                            Visible on Slider
                                                        </label>
                                                    </div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">
													Close
												</button>
												<button type="submit" class="btn btn-primary">
													{{ $isUpdateSlideMode ? 'Update Slide' : 'Add Slide' }}
												</button>
											</div>
										</div>
									</div>
								</div>
    <!-- /slide Modal -->

</div>
