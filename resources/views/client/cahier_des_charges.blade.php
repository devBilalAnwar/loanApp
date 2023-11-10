@extends('layouts/layoutMaster')

@section('title', 'Cahier des charges Locataire')

@section('content')
@livewire('cahier-charges-form')






    <script>
        function updateSurfaceValue(val) {
            document.getElementById('surfaceValue').innerText = val + ' m²';
        }

        function updateBudgetValue(val) {
            document.getElementById('budgetValue').innerText = val + ' €';
        }

        function updateBedroomValue(val) {
        document.getElementById('bedroomValue').innerText = val + (val > 1 ? ' chambres' : ' chambre');
    }
    </script>

</div>
@endsection
