<div>
    @if ($errors->any()) {!! implode(
    '',
    $errors->all('<div class="alert alert-danger"
            role="alert">:message</div>'),
) !!} @endif
    @if ($completed)
        <div class="card">
            <div class="card-header">
                <h4>Process Completed</h4>
            </div>
            <div class="card-body">
                <h5 class="text-success">Your application has been received.</h5>
            </div>
        </div>

    @else
        @if ($isPackageSelected)
            <div class="flex-column">
                <!-- left column -->
                <div class="">
                    <div wire:loading wire:target="supportingDocument">Uploading...</div>
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <form wire:submit.prevent="submit">


                            {{-- Print Product Card --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4>Apply for {{ $selectedPackage['name'] }} distributor package for
                                        {{ $selectedProduct['name'] }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col ">
                                            <div class="form-group">
                                                <label>What Country do you want to distribute to?</label>
                                                <div class="row">
                                                    <div class="ml-3 col-xs-6">
                                                        <select wire:model='selectedCountry'
                                                            class="form-control country-list">
                                                            @foreach ($countries as $index => $country)
                                                                <option value="{{ $country->name }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input wire:model="companyName" value="{{ old('companyName', '') }}"
                                                    placeholder="Company Name" type="text" name="companyName" id=""
                                                    class="form-control" required>
                                                @error('companyName') <span
                                                        class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input wire:model="phone" value="{{ old('phone', '') }}"
                                                    placeholder="Phone " type="tel" name="phone" id=""
                                                    class="form-control" required>
                                                @error('phone') <span
                                                        class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>

                                    </div>


                                </div>
                            </div>

                            {{-- End of Product Card --}}
                            <!-- /.box-header -->
                            <!-- form start -->

                            <div class="mt-2">
                                <div>

                                    {{-- End of Panel 1 --}}
                                    {{-- Payment section --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h4> Payment Terms</h4>
                                        </div>
                                        <div class="card-body">
                                            {{-- <div class="mb-3 alert alert-info alert-dismissible fade show" role="alert">
                                                <strong>We now accept Bitcoin!</strong> For distributor agreements, we
                                                now
                                                accept Bitcoin payments. Bitcoin payments are confirmed within 24 hours.
                                                </p>


                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div> --}}



                                            <div class=" mt-2">
                                                @foreach ($paymentMethods as $index => $paymentMethod)
                                                    <div class="form-check-inline ">
                                                        <label class="form-check-label">
                                                            <input wire:model="selectedPaymentMethod" type="radio"
                                                                class="form-check-input" name="paymentMethodRadio"
                                                                wire:model='selectedPaymentMethod'
                                                                value="{{ $paymentMethod }}"
                                                                required>{{ $paymentMethod }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>

                                        </div>


                                    </div>
                                    {{-- End of Payment section --}}

                                    <div class="card">
                                        <div class="card-header">
                                            <h4> Summary </h4>
                                        </div>

                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input wire:model="termsAndConditions" type="checkbox"
                                                id="termsAndConditions" name="termsAndConditions" required> I agree to
                                            all terms and conditions
                                        </label>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div wire:loading.remove class="box-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> </i>
                                        Apply</button>

                                </div>
                                <div wire:loading>
                                    Processing Request...
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->

            </div>

        @else
            @if ($isProductSelected)
                <div>
                    <div>
                        <h3 class="headline">Distributor Packages</h3><span class="line margin-bottom-45"></span>
                        <div class="clearfix"></div> <br> <br>
                    </div>
                    <div class="row">
                        @foreach ($packages as $key => $package)

                            <div class="plan {{ $key == 2 ? 'color-2' : 'color-1' }} col-md-2  mb-5">
                                <div class="plan-price">
                                    <h3>{{ $package->name }}</h3> <span class="plan-currency">$</span> <span
                                        class="value">@moneyNoSign($package->cost)</span>
                                    <span class="period">/ required as refundable deposit</span>
                                </div>
                                <div class="plan-features">
                                    <ul>
                                        @foreach (explode(',', $package->properties) as $property)
                                            <li>{{ $property }}</li>

                                        @endforeach
                                    </ul> <a wire:click="selectPackage({{ $package }})"
                                        class="btn btn-success m-4 justify-content-center" href="#">Select Package</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @else
                <div class="mx-5">
                    <div class="form-group px-20">
                        <h1 class="title font-weight-bold mb-3">Select Product to Distribute</h1>
                        <input wire:model="query" type="text" class="form-control" placeholder="Search Products ..."
                            wire:keydown.escape='reset' wire:keydown.tab='reset'>
                    </div>

                    <div wire:loading><img src="{{ asset('/images/loading.gif') }}" alt="" title=""></div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-3  d-flex align-items-stretch"
                                wire:click="becomeDistributorForProduct({{ $product }})">

                                <div class="card">
                                    <img class=" card-img-top" src="{{ $product['image_url_1'] }}"
                                        alt="{{ $product['name'] }}">
                                    <div class="card-body">
                                        <h5 class="card-title text-bold text-success">{{ $product['name'] }}</h5>
                                        <p class="card-text">Distributor prices start from: </p>
                                        <p><span class="text-bold">USD
                                                ${{ $product['price'] * 0.75 }} /
                                                {{ $product['measuring_unit'] }}.</span> </p>
                                        <a href="#" class="mt-2 btn btn-success">Become Distributor</a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
            @endif
        @endif

    @endif
    <style>
        .plan-price h3 {
            text-align: center;
            font-size: 20px;
            padding: 10px 0;
            margin-bottom: 25px;
            color: #606060;
            font-weight: 600;
            text-align: center;
            background-color: rgba(0, 0, 0, .02)
        }

        .plan-price {
            font-size: 36px;
            font-weight: 300;
            color: #606060;
            text-align: center;
            padding: 0 0 22px;
            position: relative
        }

        .plan.color-1 .plan-price,
        .plan.color-1 a.button {
            background-color: #f6f6f6
        }

        .plan.color-2 .plan-price,
        .plan.color-2 a.button {
            background-color: #3acf87
        }

        .plan.color-3 .plan-price,
        .plan.color-3 a.button {
            background-color: #514e9f
        }

        .plan.color-4 .plan-price,
        .plan.color-4 a.button {
            background-color: #e54b81
        }

        .plan.color-5 .plan-price,
        .plan.color-5 a.button {
            background-color: #a558a6
        }

        .plan-price .value {
            font-weight: 600;
            letter-spacing: -1px
        }

        .plan-currency {
            font-size: 22px;
            opacity: .7;
            position: relative;
            margin: 0 -5px 0 0;
            top: -4px;
            font-weight: 300
        }

        .period {
            display: block;
            font-size: 16px;
            margin: 2px 0 0;
            opacity: .7
        }

        .plan-features {
            background: #fff;
            border-top: none;
            padding: 12px 0 0
        }

        .plan-features ul li {
            padding: 8px 0;
            text-align: center;
            list-style-type: none;
        }

        .plan-features a.button {
            position: relative;
            display: block;
            margin: 0 auto;
            margin: 12px 0;
            text-align: center;
            color: #666;
            padding: 10px 0;
            font-size: 14px;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out
        }

        .color-2 .plan-price,
        .color-3 .plan-price,
        .color-4 .plan-price,
        .color-5 .plan-price,
        .color-2 .plan-price h3,
        .color-3 .plan-price h3,
        .color-4 .plan-price h3,
        .color-5 .plan-price h3,
        .color-2 .plan-price .plan-currency,
        .color-3 .plan-price .plan-currency,
        .color-4 .plan-price .plan-currency,
        .color-5 .plan-price .plan-currency,
        .color-2 .plan-features a.button,
        .color-3 .plan-features a.button,
        .color-4 .plan-features a.button,
        .color-5 .plan-features a.button {
            color: #fff
        }

        .color-2 .plan-price h3,
        .color-3 .plan-price h3,
        .color-4 .plan-price h3,
        .color-5 .plan-price h3 {
            background-color: rgba(0, 0, 0, .05)
        }

        .columns {
            margin-right: 15px
        }

        .plan {
            border: 1px solid #f6f6f6
        }

        .button {
            margin-bottom: 100px
        }

    </style>




</div>
