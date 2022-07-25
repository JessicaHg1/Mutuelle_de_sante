<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.soins.ajouter")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.soins.liste")
    @endif
</div>
