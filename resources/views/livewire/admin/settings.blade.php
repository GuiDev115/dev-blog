<div>
    <div class="tab">
        <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item">
                <a wire:click="selectTab('general_settings')" class="nav-link {{$tab == 'general_settings' ? 'active' : '' }}" data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">Configurações Gerais</a>
            </li>
            <li class="nav-item">
                <a wire:click="selectTab('logo_favicon')" class="nav-link {{$tab == 'logo_favicon' ? 'active' : ''}}" data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo & Favicon</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade {{ $tab == 'general_settings' ? 'active show' : '' }}" id="general_settings" role="tabpanel">
                <div class="pd-20">
                    <form wire:submit="updateSiteInfo()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Nome do Site</b></label>
                                    <input type="text" class="form-control" wire:model="site_title" placeholder="Entre com seu Nome do Site">
                                    @error('site_title')
                                        <span class="text-danger ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Email do Site</b></label>
                                    <input type="text" class="form-control" wire:model="site_email" placeholder="Entre com seu Email do Site">
                                    @error('site_email')
                                        <span class="text-danger ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Telefone do Site</b><small> (Optional) </small></label>
                                    <input type="text" class="form-control" wire:model="site_phone" placeholder="Entre com seu Telefone do Site">
                                    @error('phone_title')
                                        <span class="text-danger ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Meta do Site</b><small> (Optional) </small></label>
                                    <input type="text" class="form-control" wire:model="site_title" placeholder="Entre com seu Meta Keywords do Site">
                                    @error('site_meta_keywords')
                                        <span class="text-danger ml-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""><b>Site Meta Descricao</b><small> (Optional)</small></label>
                            <textarea class="form-control" cols="4" rows="4" placeholder="Digita a descricao do site"></textarea>
                            @error('site_meta_description')
                                <span class="text-danger ml-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade {{ $tab == 'logo_favicon' ? 'active show' : '' }}" id="logo_favicon" role="tabpanel">
                <div class="pd-20">
                    --- Logo & Favicon ---
                </div>
            </div>
        </div>
    </div>
</div>
