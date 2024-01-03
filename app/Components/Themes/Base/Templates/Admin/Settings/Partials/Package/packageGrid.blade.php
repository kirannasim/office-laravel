<div class="portlet-body" style="height: auto;">
    <div class="ExistingPackages pricing-content-2">
        <div class="form-group pckageSelect pricing-table-container">
            @forelse ($packages->chunk(4) as $chunk)
                <div class="packageRow row mt-element-overlay">
                    @foreach($chunk as $package)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="packageWrapper price-column-container mt-overlay-1 mt-scroll-right"
                                 data-packageId="{{ $package->id }}">
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
                                        <div class="eachDetail name">
                                            <label>{{ _t('register.Name') }}</label>
                                            <span class="value">{{ $package->name }}</span>
                                        </div>
                                        <div class="eachDetail price">
                                            <label>{{ _t('register.Price') }}</label>
                                            <span class="value">{{ currency($package->price) }}</span>
                                        </div>
                                        <div class="eachDetail pv">
                                            <label>{{ _t('register.PV') }}</label>
                                            <span class="value">{{ currency($package->pv) }}</span>
                                        </div>
                                        <div class="eachDetail description toggleable hidden">
                                            <label>{{ _t('register.Description') }}</label>
                                            <span class="value">{{ strip_tags($package['description']) }}
                                                </span>
                                        </div>
                                        <div class="moreDetails closed">
                                            <span class="toogleText">{{ _t('register.More') }}</span><i
                                                    class="fa fa-angle-double-down"></i>
                                        </div>
                                        <div class="packAction">
                                            <a class="btn green ladda-button editPackage ladda-button"
                                               href="javascript:;" data-id="{{ $package->id }}" data-style="contract">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            <a @if($package->status) class="btn blue ladda-button changeStatus ladda-button inactivate"
                                               title="Inactivate"
                                               @else class="btn blue ladda-button changeStatus ladda-button activate"
                                               title="Activate" @endif
                                               data-id="{{ $package->id }}" data-style="contract"
                                               href="javascript:;">
                                                @if($package->status)
                                                    <i class="fa fa-ban"></i>
                                                @else
                                                    <i class="fa fa-check"></i>
                                                @endif
                                            </a>
                                            <a class="btn blue ladda-button removePackage ladda-button"
                                               data-id="{{ $package->id }}" data-style="contract"
                                               href="javascript:;">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="noPackages">
                    <i class="fa fa-exclamation"></i>No packages !
                </div>
            @endforelse
            <input type="hidden" class="form-control" name="packages" value="{{ $packages->first()->id }}">
            <input type="hidden" class="form-control" name="packageName"
                   value="{{ $packages->first()->name }}">
        </div>
    </div>
</div>


<script>
    $('.addNewPackage').click(function () {
        loadForm();
    });
</script>
