<div class="row">
    <div class="col-md-12">
        <div class="btn-group localSwitcher">
            <a class="btn btn-circle btn-default btn-sm" href="javascript:;" data-toggle="dropdown"
               aria-expanded="false">
                {{ currency()->getCurrency()['symbol'] }}
                {{ currency()->getCurrency()['code'] }}
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu" role="menu">
                @foreach(currency()->getCurrencies() as $currency)
                    @if($currency['code'] != (currency()->getCurrency()['code']))
                        <li>
                            <a rel="alternate" href="">
                                {{ $currency['symbol'] }} {{ $currency['code'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>