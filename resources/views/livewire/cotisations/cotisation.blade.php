<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.cotisations.ajouter")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.cotisations.liste")
    @endif
</div>
