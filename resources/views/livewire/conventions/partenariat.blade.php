<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.conventions.ajouter")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.conventions.liste")
    @endif
</div>
