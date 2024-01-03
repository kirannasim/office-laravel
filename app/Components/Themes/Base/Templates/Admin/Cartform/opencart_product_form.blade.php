<div class="col-md-12 col-sm-12 col-xs-12">
    <ul class="nav nav-tabs">
        @foreach ($cart_languages as $language)
            <li @if ($loop->iteration==1) class="active" @endif><a
                        href="#portlet_tab_{{$loop->iteration}}" data-toggle="tab">{{$language['name']}}</a></li>
        @endforeach
    </ul>
</div>

<div class="col-md-6 col-sm-6 col-xs-12 formPortion first">
    <div class="tabs">
        <div class="tab-content">
            <input type="hidden" name="update_id" @if(isset($package_id)) value="{{ $package_id }}"
                   @else value="" @endif>
            @foreach (array_values($cart_languages) as $key => $language)
                <div id="portlet_tab_{{$loop->iteration}}"
                     @if ($loop->iteration == 1) class="tab-pane active" @else class="tab-pane" @endif>
                    <div class="form-group form-md-line-input">
                        <input type="text" name="product_description[{{$loop->iteration}}][name]" class="form-control"
                               id="input-name{{$loop->iteration}}" placeholder="Enter Package name"
                               value="{{ $packageData->get("productDescription")[$loop->iteration]['name'] }}">
                        <label for="form_control_1">Package name</label>
                        <span class="help-block">Name of package (required)</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <textarea class="packageDescription"
                                  name="product_description[{{$loop->iteration}}][description]"
                                  id="input-description{{$loop->iteration }}"
                                  placeholder="Package descriptions">{{ $packageData->get("productDescription")[$loop->iteration]['description'] }}</textarea>
                    </div>
                    <div class="form-group form-md-line-input">
                        <input type="text" name="product_description[{{$loop->iteration}}][meta_title]"
                               class="form-control" id="input-meta-title{{$loop->iteration}}"
                               placeholder="Enter Meta Tag Title"
                               value="{{ $packageData->get("productDescription")[$loop->iteration]['meta_title'] }}">
                        <label for="form_control_1">Meta Tag Title</label>
                        <span class="help-block">Meta Tag Title</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <textarea name="product_description[{{$loop->iteration}}][meta_description]"
                                  id="input-meta-description{{$loop->iteration }}" placeholder="Meta Tag descriptions"
                                  style="width: 100%;">{{ $packageData->get("productDescription")[$loop->iteration]['meta_description'] }}</textarea>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <textarea name="product_description[{{$loop->iteration}}][meta_keyword]"
                                  id="input-meta-keyword1{{$loop->iteration }}" placeholder="Meta Tag Keyword"
                                  style="width: 100%;">{{ $packageData->get("productDescription")[$loop->iteration]['meta_keyword'] }}</textarea>
                    </div>
                    <div class="form-group form-md-line-input">
                        <input type="text" name="product_description[{{$loop->iteration}}][tag]" class="form-control"
                               id="input-meta-tag{{$loop->iteration}}" placeholder="Enter Product Tag"
                               value="{{ $packageData->get("productDescription")[$loop->iteration]['tag'] }}">
                        <label for="form_control_1">Product Tag</label>
                    </div>


                </div>
            @endforeach
        </div>
    </div>

</div>
<div class="col-md-6 col-sm-6 col-xs-12 formPortion second">
    <div class="form-group form-md-line-input">
        <input type="text" name="model" class="form-control" id="input-model" placeholder="Enter Model"
               value="{{ $packageData->get('model') }}">
        <label for="form_control_1">Model</label>
        <span class="help-block">Model  (required)</span>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" name="price" class="form-control" id="form_control_1" placeholder="Enter Price"
               value="{{ $packageData->get('price') }}">
        <label for="form_control_1">Price</label>
        <span class="help-block">Price of package (required)</span>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" name="pv" class="form-control" id="form_control_1" placeholder="Enter Product Value"
               value="{{ $packageData->get('pv') }}">
        <label for="form_control_1">Product Value</label>
        <span class="help-block">Product value or PV (required)</span>
    </div>
    <div class="form-group form-md-line-input form-md-floating-label">
        <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="fmTrigger" data-input="thumbnail" data-preview="holder"
                                       class="btn btn-outline dark fmTrigger">
                                       <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
            <img id="holder" class="fmImage" src="http://placehold.it/150x150">
            <input id="thumbnail" value="http://placehold.it/150x150" class="form-control"
                   name="image" type="hidden" name="filepath">
        </div>
    </div>

    <input type="hidden" name="sku" value="" id="input-sku">
    <input type="hidden" name="upc" value="" id="input-upc">
    <input type="hidden" name="ean" value="" id="input-ean">
    <input type="hidden" name="jan" value="" id="input-jan">
    <input type="hidden" name="isbn" value="" id="input-isbn">
    <input type="hidden" name="mpn" value="" id="input-mpn">
    <input type="hidden" name="location" value="" id="input-location">
    <input type="hidden" name="bv" value="" id="input-bv">
    <input type="hidden" name="tax_class_id" value="" id="input-tax-class">
    <input type="hidden" name="quantity" value="1" id="input-quantity">
    <input type="hidden" name="minimum" value="1" id="input-minimum">
    <input type="hidden" name="subtract" value="1" id="input-subtract">
    <input type="hidden" name="stock_status_id" value="6" id="input-stock-status">
    <input type="hidden" name="shipping" value="1" id="input-shipping">
    <input type="hidden" name="length" value="" id="input-length">
    <input type="hidden" name="width" value="" id="input-width">
    <input type="hidden" name="height" value="" id="input-height">
    <input type="hidden" name="length_class_id" value="1" id="input-length-class">
    <input type="hidden" name="weight" value="" id="input-weight">
    <input type="hidden" name="weight_class_id" value="1" id="input-weight-class">
    <input type="hidden" name="status" value="1" id="input-status">
    <input type="hidden" name="sort_order" value="1" id="input-sort-order">
    <input type="hidden" name="manufacturer" value="" id="input-manufacturer">
    <input type="hidden" name="category" value="" id="input-category">
    <input type="hidden" name="filter" value="" id="input-filter">
    <input type="hidden" name="product_store[]" value="0" checked="checked">
    <input type="hidden" name="download" value="" id="input-download">
    <input type="hidden" name="related" value="" id="input-related">
    <input type="hidden" name="option" value="" id="input-option">
    <input type="hidden" name="points" value="" id="input-points">
    <input type="hidden" name="product_reward[1][points]" value="">
    <input type="hidden" name="product_layout[0]" value="">
    @foreach ($cart_languages as $language)
        <input type="hidden" name="product_seo_url[0][$language['language_id]]" value="">
    @endforeach

    <div class="row">
        <button type="button" class="btn dark ladda-button packageSubmit"
                data-style="contract">Save
        </button>
    </div>
</div>




