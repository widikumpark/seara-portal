<div>
    @if ($errors->any()) {!! implode(
    '',
    $errors->all('<div class="alert alert-danger"
            role="alert">:message</div>'),
) !!} @endif
    <div class="flex-column">
        <!-- left column -->
        <div class="">
            <div wire:loading wire:target="supportingDocument">Uploading...</div>
            <!-- general form elements -->
            <div class="box box-primary">
                <form wire:submit.prevent="submit">

                    @foreach ($products as $key => $product)
                        {{-- Print Product Card --}}
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $product['name'] }}</h4>
                            </div>
                            <div class="card-body ml-3">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label>Origin</label>
                                            <select wire:model='selectedProductOrigins.{{ $key }}'
                                                class="form-control">
                                                @foreach ($product['origins'] as $country)
                                                    <option value="{{ $country['code'] }}">{{ $country['name'] }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('origin') <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ml-3-md ml-0-xs col-xs-3 col-md-3">
                                        <label for="quantity.{{ $key }}">Quantity
                                            ({{ $product['measuring_unit'] }})
                                        </label>
                                        <input wire:model="selectedProductQuantities.{{ $key }}"
                                            value="{{ old('selectedProductQuantities.' . $key, '') }}" type="number"
                                            class="form-control" id="selectedProductQuantities.{{ $key }}"
                                            name="selectedProductQuantities.{{ $key }}"
                                            placeholder="({{ $product['measuring_unit'] }})" required>

                                        @error("selectedProductQuantities.{{ $key }}") <span
                                                class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input"
                                            wire:click="$emit('has-commission-update', {{ $key }})"
                                            id="hasCommission.{{ $key }}"
                                            name="hasCommission.{{ $key }}" @if ($hasCommission[$key]) checked @endif>
                                        <label class="custom-control-label" for="hasCommission.{{ $key }}">Add
                                            markup to the price?</label>
                                    </div>
                                </div>


                                @if ($hasCommission[$key])

                                    <div class="row mt-3">
                                        <div class="form-group col-md-4">
                                            <label for="commission.{{ $key }}"> How much $USD markup per
                                                {{ $product['measuring_unit'] }}?</label>
                                            <input wire:model="commission.{{ $key }}"
                                                value="{{ old('commission', '') }}" type="number"
                                                class="form-control" id="commission.{{ $key }}"
                                                name="commission.{{ $key }}"
                                                placeholder="(Maximum : ${{ $product['price'] }} / {{ $product['measuring_unit'] }})"
                                                required>
                                            @error('commission.{{ $key }}') <span
                                                    class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                @endif
                            </div>
                        </div>

                        {{-- End of Product Card --}}
                    @endforeach
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="mt-2">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h4> Shipping & Quantity </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col ">
                                            <div class="form-group">
                                                <label>Destination Port</label>
                                                <div class="row">
                                                    <div class="ml-3 col-xs-6">
                                                        <select wire:model='selectedCountry'
                                                            class="form-control country-list">
                                                            @foreach ($countries as $index => $country)
                                                                <option value="{{ $country->code }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    @if ($noPortsAvailable)
                                                        <div class="col-xs-3 ml-2 alert alert-info">
                                                            <p>Shipment will be delivered by multimodal transportation.

                                                            </p>
                                                        </div>

                                                    @else
                                                        <div class="col-xs-3 ml-2">
                                                            <select wire:model='selectedPort' class="form-control">
                                                                @foreach ($ports as $port)
                                                                    <option value={{ $port['id'] }}>
                                                                        {{ $port['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input wire:model="name" value="{{ old('name', '') }}"
                                                    placeholder="Name" type="text" name="name" id=""
                                                    class="form-control" required>
                                                @error('name') <span
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
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input wire:model="address" value="{{ old('address', '') }}"
                                                    placeholder="Address" type="text" name="address" id=""
                                                    class="form-control" required>
                                                @error('address') <span
                                                        class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input wire:model="email" value="{{ old('email', '') }}"
                                                    placeholder="Email address" type="email" name="email" id=""
                                                    class="form-control" required>
                                                @error('email') <span
                                                        class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- End of Panel 1 --}}
                            {{-- Payment section --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4> Payment </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 alert alert-info alert-dismissible fade show" role="alert">
                                        <strong>Payment methods missing!</strong> Only exclusive distributors and
                                        dedicated customers are eligible to L/C and other payment methods. </p>
                                        Get quick quotes, advanced payment methods, priorty support, trade and price
                                        previews by joining our exclusive program.
                                        <p><a wire:click="joinExclusiveProgram"
                                                class="btn btn-success mt-2 text-white">Join
                                                Now</a></p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <h5>Payment Terms</h5>
                                    <div class=" mt-2">
                                        @foreach ($paymentTypes as $paymentType)
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="paymentTypeRadio"
                                                        wire:model='selectedPaymentType' value="{{ $paymentType }}"
                                                        required>{{ $paymentType }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <h5 class="mt-3">Payment Type</h5>
                                    <div class=" mt-2">
                                        @foreach ($paymentMethods as $index => $paymentMethod)
                                            <div class="form-check-inline ">
                                                <label class="form-check-label">
                                                    <input wire:model="selectedPaymentMethod" type="radio"
                                                        class="form-check-input" name="paymentMethodRadio"
                                                        wire:model='selectedPaymentMethod'
                                                        value="{{ $paymentMethod }}" required>{{ $paymentMethod }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>


                            </div>
                            {{-- End of Payment section --}}



                            <div class="checkbox">
                                <label>
                                    <input wire:model="termsAndConditions" type="checkbox" id="termsAndConditions"
                                        name="termsAndConditions" required> I agree to all terms and conditions
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div wire:loading.remove class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"> </i>
                                Continue</button>

                        </div>
                        <div wire:loading>
                            Processing Request...
                        </div>
                </form>
            </div>
        </div>
        <!-- /.box -->

    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.country-list').select2();
            $('.country-list').on('change', function(e) {
                @this.set('selectedCountry', e.target.value);
            });
        });

    </script>
@endpush
<style>
    .card-header {
        border-top: 2px solid #3d9970;
    }

</style>
