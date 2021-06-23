<div>
    @if (count($orders) === 0)
        <div class="alert alert-warning" role="alert">
            <h3 class="alert-heading">Error - No Orders with pending payment. </h3>
            <p class="my-3">We could not find any orders in your account pending payment. If you haven't placed an
                order,
                please place a new order to be able to add payment. If you still have issues, please contact support</p>
            <hr>
            <div class="d-flex mt-2">
                <p class="p-2"><a wire:click="navigateToBrowseInventory()" class="btn btn-info text-white"><i class="fas fa-plus"></i>
                        Place an order </a></p>
                <p class="p-2 mr-2 float-right"><a wire:click="contactSupport()" class="btn btn-primary text-white"><i
                            class="fas fa-headset"></i> Contact Support </a></p>

            </div>
        </div>
    @else
        </form>
        <div class="card">
            <div class="card-header">
                <h4> Submit Payment Receipt </h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label>Order Number</label>
                        <div class="row">
                            <div class="col-xs-3">
                                <select wire:model='selectedOrderNumber' class="form-control">
                                    @foreach ($orders as $index => $order)
                                        <option value="{{ $order->number }}">
                                            {{ '#' . Str::upper($order->number) }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="extraInformation">Extra Instructions:</label>
                        <textarea wire:model="extraInformation" value="{{ old('extraInformation', '') }}"
                            class="form-control" rows="5" id="extraInformation" name="extraInformation"
                            placeholder="Any other information regarding payment"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="paymentReciept">Supporting Documents</label>
                        <input wire:model="paymentReciept" type="file" id="paymentReciept">
                        @error('paymentReciept') <span class="error">{{ $message }}</span> @enderror

                        <p class="help-block"> (e.g Bank Receipt, Payment Confirmation
                            etc)</p>
                    </div>

            </div>

        </div>





        <div class="box-footer">
            <button wire:loading.remove type="submit" class="btn btn-primary"><i class="fa fa-save"> </i>
                Continue</button>
            <div wire:loading>
                Processing Request...
            </div>
            {{-- <button type="submit" class="btn btn-success pull-right">
                <i class="fa fa-shopping-cart"></i>
                Place
                Order</button>
            <button type="reset" class="btn btn-default pull-right">
                Cancel Order</button> --}}
        </div>
        </form>
    @endif
</div>
