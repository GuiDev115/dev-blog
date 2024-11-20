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
                    --- Config geral ---
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
