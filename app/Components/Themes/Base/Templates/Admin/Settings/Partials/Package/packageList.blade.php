@inject('cart', 'App\Blueprint\Services\CartServices')

<div class="packageTable table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th> {{ _t('register.Image') }}  </th>
            <th> {{ _t('register.Name') }} </th>
            <th> {{ _t('register.Price') }} </th>
            <th> {{ _t('register.PV') }} </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr class="product {{ strtolower($package->name) }}">
                <td>@if($package->image != null)
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
                <td> {{  currency($package->price) }} </td>
                <td> {{ $package->pv }} </td>
                <td style="width: 145px;">
                    <a class="btn blue ladda-button editPackage ladda-button"
                       href="javascript:;" data-id="{{ $package->id }}" data-style="contract">
                        <i class="icon-pencil"></i>
                    </a>
                    <a class="btn red ladda-button removePackage ladda-button"
                       data-id="{{ $package->id }}" data-style="contract"
                       href="javascript:;">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a @if($package->status) class="btn red ladda-button changeStatus ladda-button inactivate"
                       title="Inactivate" @else class="btn blue ladda-button changeStatus ladda-button activate"
                       title="Activate" @endif
                       data-id="{{ $package->id }}" data-style="contract"
                       href="javascript:;">
                        @if($package->status)
                            <i class="fa fa-ban"></i>
                        @else
                            <i class="fa fa-check"></i>
                        @endif
                    </a>
                </td>
            </tr>
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
