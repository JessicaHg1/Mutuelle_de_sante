<div>
    @if ($currentPage == PAGEAJOUTER)
        @include("livewire.prescriptions.ajouter")
    @endif

    @if($currentPage == PAGELISTE)
        @include("livewire.prescriptions.liste")
    @endif
</div>
