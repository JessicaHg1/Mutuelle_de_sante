<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.pays.ajouter")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.pays.liste")
    @endif
</div>
