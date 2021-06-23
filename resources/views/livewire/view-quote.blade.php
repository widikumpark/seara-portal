<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div>
        <!-- Content Header (Page header) -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if ($invalidQuote)
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Quote Not Found</h4>
                            <p>We could not find your quote. Please for any more information</p>
                            <hr>
                            <p class="mb-0"><a wire:click="contactSupport()" class="btn btn-info text-white"> Contact
                                    Support </a></p>
                        </div>
                    @else
                        @can('view', $currentQuote)
                            <div class="col-12">


                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-globe"></i> CARGILL GLOBAL
                                                <small class="float-right">Date: {{ $currentQuote->created_at }}</small>
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            From
                                            <address>
                                                <strong>CARGILL GLOBAL</strong><br>
                                                {{ config('company.address_1') }}<br>
                                                {{ config('company.address_2') }}<br>
                                                Phone: {{ config('company.phone') }}<br>

                                            </address>
                                        </div>
                                        <div class="col-sm-4 invoice-col">

                                            <h4>Qoute ID:</b> {{ strtoupper($currentQuote->number) }}</h4><br>
                                            <br>
                                            <p>Status: <span class="text-info text-bold">
                                                    {{ strtoupper($currentQuote->current_status) }}</span></p>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            To
                                            <address>
                                                <strong>{{ $currentQuote->notify_name }}</strong><br>
                                                {{ $currentQuote->address }}<br>
                                                {{ $currentQuote->destinationPort->name }},
                                                {{ $currentQuote->destinationPort->country->name }}<br>
                                                Phone: {{ $currentQuote->phone }}<br>
                                                Email: {{ $currentQuote->email }}
                                            </address>
                                        </div>
                                        <!-- /.col -->



                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Qty</th>
                                                        <th>Product</th>
                                                        <th>Origin</th>

                                                        <th>Unit Price</th>
                                                        <th>Commission</th>
                                                        <th>Sub Total (Price x Qty + (Commission x Qty))</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($quoteDetails['products'] as $key => $product)
                                                        <tr>
                                                            <td>{{ $quoteDetails['quantities'][$key] }}
                                                                {{ $product->measuring_unit }}
                                                            </td>
                                                            <td>{{ ucwords($product->name) }}</td>
                                                            <td>{{ $quoteDetails['origins'][$key] }}</td>

                                                            <td>@money($quoteDetails['prices'][$key])
                                                                /{{ $product->measuring_unit }}
                                                            </td>
                                                            <td>@money($quoteDetails['commissions'][$key])
                                                                /{{ $product->measuring_unit }}
                                                            </td>
                                                            <td>@money(($quoteDetails['prices'][$key] *
                                                                $quoteDetails['quantities'][$key]) +
                                                                ($quoteDetails['commissions'][$key] *
                                                                $quoteDetails['quantities'][$key]))
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-6">
                                            <p class="lead">Extra Instructions:</p>
                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                {{ $currentQuote->extra_instructions }}
                                            </p>

                                            <p class="lead">Payment Type:</p>


                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                {{ $currentQuote->payment_type }}
                                            </p>
                                            {{-- <p class="lead">Documents :</p>



                                        </div><!-- /.col -->
                                        <!-- accepted payments column --> --}}





                                            @if (count($documents) > 0)
                                                <div class="col-6 mt-4">
                                                    <h4>Documents: </h4>
                                                    <div class="table-responsive mt-2">
                                                        <table class="table">

                                                            @foreach ($documents as $key => $document)
                                                                <tr>
                                                                    <th style="width:50%">{{ $document->name }}<br />
                                                                        <small>{{ $document->created_at }}</small>
                                                                    </th>
                                                                    <td><a href="{{ $document->doc_link }}" download="">
                                                                            Download
                                                                        </a></td>
                                                                </tr>

                                                            @endforeach

                                                        </table>
                                                    </div>
                                                </div>

                                            @endif
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->

                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            @endcan


                    @endif

                </div><!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
