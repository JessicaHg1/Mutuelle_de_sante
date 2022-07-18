<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.adherents.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.adherents.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.adherents.liste")
    @endif
</div>
