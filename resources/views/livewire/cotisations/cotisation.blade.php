<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.cotisations.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.cotisations.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.cotisations.liste")
    @endif
</div>
