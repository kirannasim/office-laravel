@if(count($charges))
    Additional Charges

    @foreach($charges as $charge)
        <span style="color: red"> * </span> {{ getModule($charge['moduleId'])->getRegistry()['name'] }}   @if($charge['type'] == 'flat') {{ currencySymbol() }} @endif {{ $charge['amount'] }} @if($charge['type'] == 'percent') {{ currencySymbol() }} @endif
    @endforeach
@endif