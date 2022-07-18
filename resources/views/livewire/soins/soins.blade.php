<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.soins.ajouter")
    @endif

    @if ($currentPage == PAGEEDIT)   
        @include("livewire.soins.editer")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.soins.liste")
    @endif
</div>
