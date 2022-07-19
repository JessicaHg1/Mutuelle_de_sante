<div wire:ignore.self>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.mutuelles.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.mutuelles.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.mutuelles.liste")
    @endif
</div>
