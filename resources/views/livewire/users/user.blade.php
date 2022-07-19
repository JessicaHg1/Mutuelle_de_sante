<div wire:ignore.self>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.users.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.users.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.users.liste")
    @endif
</div>
