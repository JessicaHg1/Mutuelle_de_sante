<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.beneficiaires.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.beneficiaires.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.beneficiaires.liste")
    @endif
</div>
