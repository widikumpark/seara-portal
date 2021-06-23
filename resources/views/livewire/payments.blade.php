<div>
    <div class="d-flex mt-2">
        <p class="p-2"><a wire:click="submitPayment()" class="btn btn-success text-white"><i class="fas fa-plus"></i>
                Submit Payment </a></p>


        <p class="p-2 mr-2 float-right"><a wire:click="contactSupport()" class="btn btn-primary text-white"><i
                    class="fas fa-headset"></i> Contact Support </a></p>

    </div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success my-3">
                {{ session('message') }}
            </div>
        @endif
    </div>
    @if (count($payments) === 0)
        @include('partials.widgets.no-information', [
        'title' => 'No Payments',
        'text' => 'We do not have records of any payments. Please submit submit a new payment. If you still have issues,
        please contact support'

        ])
    @else
        <div class="box mt-4">
            <div class="box-header">
                <h3 class="box-title">Payments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body mt-3">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Quote Number</th>

                            <th>Payment Status</th>

                        </tr>
                        @foreach ($payments as $key => $payment)

                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ strtoupper($payment->order->number) }} </td>


                                @switch($payment->status)
                                    @case(1)
                                    <td><span class="badge bg-yellow px-2">Processing</span></td>
                                    @break
                                    @case(2)
                                    <td><span class="badge bg-green px-2">Confirmed</span></td>

                                    @break
                                    @default
                                    <td><span class="badge bg-red">Error </span></td>

                                @endswitch
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    @endif
</div>
