@inject('cart', 'App\Blueprint\Services\CartServices')

<div class="packageTable table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th> {{ _t('register.Image') }}  </th>
            <th> {{ _t('register.Name') }} </th>
            <th> {{ _t('register.Price') }} </th>
            <th> Admin Fee</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            @if($package->status)
                <tr class="product {{ strtolower($package->name) }}">
                    <td>
                        @if($package->image != null)
                            <img src="{{ asset($package->image) }}">
                        @else
                            <div class="packageHeader">
                                <div class="icon">
                                    <i class="fa fa-dropbox"></i>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td> {{ $package->name }} </td>
                    <td> {{ currency($package->price) }} </td>
                    <td> {{ currency($adminFee) }} </td>
                    <td>
                        <div class="addToCart">
                            <button type="button" data-id="{{ $package->id }}" class="btn green ladda-button"
                                    data-style="contract">
                                <i class="icon-basket"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
<input type="hidden" name="selectedPackage" value="{{ $cart->getCartedPackage() }}">
<script>
    "use strict";

    $(function () {
        Ladda.bind('.ladda-button');
    });
</script>