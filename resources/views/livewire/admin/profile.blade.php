 <div>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    <a href="javascript:;" onclick="event.preventDefault();document.getElementById('profilePictureFile').click();" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                    <img src="{{ $user->picture }}" alt="" class="avatar-photo" id="profilePicturePreview">
                    <input type="file" name="profilePictureFile" id="profilePictureFile" class="d-none" style="opacity: 0">
                </div>
                <h5 class="text-center h5 mb-0"> {{ $user->name }}</h5>
                <p class="text-center text-muted font-14">
                    {{$user->email}}
                </p>
                <div class="profile-social">
                    <h5 class="mb-20 h5 text-blue">Social Links</h5>
                    @if( $user->social_links )
                    <ul class="clearfix">

                        @if( $user->social_links->facebook_url )
                        <li>
                            <a href="{{ $user->social_links->facebook_url }}" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(59, 89, 152);"><i class="fa fa-facebook"></i></a>
                        </li>
                        @endif

                        @if( $user->social_links->twitter_url )
                        <li>
                            <a href="{{ $user->social_links->twitter_url }}" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(29, 161, 242);"><i class="fa fa-twitter"></i></a>
                        </li>
                        @endif

                        @if( $user->social_links->youtube_url )
                        <li>
                            <a href="{{ $user->social_links->youtube_url }}" class="btn" data-bgcolor="#007bb5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 181);"><i class="fa fa-linkedin"></i></a>
                        </li>
                        @endif

                        @if( $user->social_links->github_url )
                        <li>
                            <a href="{{ $user->social_links->github_url }}" class="btn" data-bgcolor="#000000" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(244, 111, 48);"><i class="fa fa-github"></i></a>
                        </li>
                        @endif

                        @if( $user->social_links->linkedin_url )
                        <li>
                            <a href="{{ $user->social_links->linkedin_url }}" class="btn" data-bgcolor="#0077B5" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(195, 35, 97);"><i class="fa fa-linkedin"></i></a>
                        </li>
                        @endif

                        @if( $user->social_links->instagram_url )
                        <li>
                            <a href="{{ $user->social_links->instagram_url }}" class="btn" data-bgcolor="#E1306C" data-color="#ffffff" style="color: rgb(255, 255, 255); background-color: rgb(61, 70, 77);"><i class="fa fa-instagram"></i></a>
                        </li>
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a wire:click="selectTab('personal_details')" class="nav-link {{ $tab  == 'personal_details'  ? 'active' : '' }}" data-toggle="tab" href="#personal_details" role="tab">Detalhes Pessoais</a>
                            </li>
                            <li class="nav-item">
                                <a wire:click="selectTab('update_password')" class="nav-link {{ $tab == 'update_password' ? 'active' : ''}}" data-toggle="tab" href="#update_password" role="tab">Atualizar Senha</a>
                            </li>
                            <li wire:clicK="selectTab('social_links')" class="nav-item"  {{  $tab == 'social_links' ? 'active' : ''}}>
                                <a class="nav-link" data-toggle="tab" href="#social_links" role="tab">Redes Sociais</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Timeline Tab start -->
                            <div class="tab-pane fade {{ $tab == 'personal_details' ?  'show active' : '' }}" id="personal_details" role="tabpanel">
                                <div class="pd-20">
                                        <form wire:submit="updatePersonalDetails()">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Nome Completo</label>
                                                        <input type="text" class="form-control" wire:model="name" placeholder="Entre com seu nome completo">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Username</label>
                                                        <input type="text" class="form-control" wire:model="username" placeholder="Entre com seu Apelido">
                                                        @error('username')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" class="form-control" wire:model="email" placeholder="Entre com seu email" disabled>
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Bio</label>
                                                        <textarea wire:model="bio" placeholder="Escreva algo sobre você" col="4" rows="4" class="form-control"></textarea>
                                                        @error('bio')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <div class="tab-pane fade {{ $tab == 'update_password' ?  'show active' : '' }}" id="update_password" role="tabpanel">
                                <div class="pd-20 profile-task-wrap">
                                    <form wire:submit="updatePassword()">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Senha Atual</label>
                                                        <input type="password" class="form-control" wire:model="current_password" placeholder="Entre com sua senha atual">
                                                            @error('current_password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Nova senha</label>
                                                    <input type="password" class="form-control" wire:model="new_password" placeholder="Entre com sua senha nova">
                                                    @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Confirme sua Senha</label>
                                                    <input type="password" class="form-control" wire:model="new_password_confirmation" placeholder="Confirme sua senha nova">
                                                    @error('new_password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary">Atualizar Senha</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ $tab == 'social_links' ?  'show active' : '' }}" id="social_links" role="tabpanel">
                                <div class="pd-20 profile-task-wrap">
                                    <form wire:submit="updateSocialLinks()">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for=""><b>Facebook</b></label>
                                                    <input type="text" class="form-control" wire:model="facebook_url" placeholder="Facebook Url">
                                                    @error('facebook_url')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for=""><b>Youtube</b></label>
                                                    <input type="text" class="form-control" wire:model="youtube_url" placeholder="Youtube Url">
                                                    @error('youtube_url')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for=""><b>LinkedIn</b></label>
                                                    <input type="text" class="form-control" wire:model="linkedin_url" placeholder="Linkedin Url">
                                                    @error('linkedin_url')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for=""><b>Twitter</b></label>
                                                    <input type="text" class="form-control" wire:model="twitter_url" placeholder="Twitter Url">
                                                    @error('twitter_url')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for=""><b>Instagram</b></label>
                                                    <input type="text" class="form-control" wire:model="instagram_url" placeholder="Instagram Url">
                                                    @error('instagram_url')
                                                    <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for=""><b>GitHub</b></label>
                                                    <input type="text" class="form-control" wire:model="github_url" placeholder="Github Url">
                                                    @error('github_url')
                                                        <span class="text-danger ml-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
