<div>
    <form class="subscription" wire:submit="subscribe()" method="post">
    <x-form-alerts></x-form-alerts>
    <div class="position-relative">
        <i class="ti-email email-icon"></i>
        <input type="email" wire:model.live="email" class="form-control" placeholder="Your Email Address">
        @error('email')
            <span class="text-danger ml-1">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary btn-block rounded" type="submit">Subscribe now</button>
    </form>
</div>
