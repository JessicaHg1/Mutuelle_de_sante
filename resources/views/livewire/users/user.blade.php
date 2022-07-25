<div wire:ignore.self>
    @if ($currentPage == PAGEEDIT)   
        @include("livewire.users.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.users.liste")
    @endif
</div>
