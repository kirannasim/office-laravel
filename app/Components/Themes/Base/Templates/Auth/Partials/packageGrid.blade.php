@inject('cart', 'App\Blueprint\Services\CartServices')
<div class="packageCluster">
    @forelse ($packages->where('status', true)->chunk(4) as $chunk)
        <div class="packageRow row">
            @foreach($chunk as $package)
                <div class="col-md-4 col-sm-6">
                    <div class="product {{ strtolower($package->name) }}">
                        @if($package->image != null)
                            <div class="image">
                                <img src="{{ asset($package->image) }}">
                            </div>
                        @else
                            <div class="packageHeader">
                                <div class="icon">
                                    <i class="fa fa-dropbox"></i>
                                </div>
                                <h4>{{ $package->name }}</h4>
                            </div>
                        @endif
                        <div class="details">
                            <div class="eachDetail name" style="min-height: 70px;">
                                <span class="value">{{ $package->name }}</span>
                            </div>
                            <div class="eachDetail price">
                                <label>{{ _t('register.Price') }}</label>
                                <span class="value">{{ currency($package->price) }}</span>
                            </div>
                            {{-- <div class="eachDetail pv">
                                 <label>{{ _t('register.PV') }}</label>
                                 <span class="value">{{ $package->pv }}</span>
                             </div>--}}
                            <div class="eachDetail adminFee">
                                <label>Admin Fee{{-- _t('register.Admin_Fee') --}}</label>
                                <span class="value">{{ currency($adminFee) }}</span>
                            </div>
                            <div class="eachDetail description toggleable hidden">
                                <label>{{ _t('register.Description') }}</label>
                                <span class="value">
                                    {!! html_entity_decode($package->description) !!}
                                </span>
                            </div>
                            <div class="moreDetails closed">
                                <span class="toogleText">{{ _t('register.More') }}</span><i
                                        class="fa fa-angle-double-down"></i>
                            </div>
                            <div class="addToCart">
                                <button type="button" data-id="{{ $package->id }}"
                                        class="btn green ladda-button {{ $cartedPackage == $package->id ? 'selected' : '' }}"
                                        data-style="contract">
                                    <span class="iconGroup">
                                        <i class="icon-basket"></i>
                                        <span class="fa fa-check"></span>
                                    </span>
                                    <span class="text">{{ $cartedPackage == $package->id ? 'Selected' : 'Select' }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <div class="noPackages">
            <i class="fa fa-exclamation"></i>No packages
        </div>
    @endforelse
    <input type="hidden" name="selectedPackage" value="{{ $cart->getCartedPackage() }}">
</div>

<script>
    "use strict";

    $(function () {
        Ladda.bind('.ladda-button');
    });
</script>
