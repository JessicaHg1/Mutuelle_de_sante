<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.prestataires.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.prestataires.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.prestataires.liste")
    @endif
</div>
