<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.prestations.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.prestations.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.prestations.liste")
    @endif
</div>
