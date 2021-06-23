<div>
    <h1 style="font-weight: bold">ORDERS PROCESSING</h1>
    <div class="box">
        <div class="box-header">
            {{-- <h3 class="box-title">Striped Full Width Table</h3>
            --}}
        </div>
        <!-- /.box-header -->

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="row">
            @foreach ($quotes as $key => $quote)

                @include('partials.order-card',['quote'=>$quote])
            @endforeach

        </div>
        <!-- /.box-body -->
    </div>

</div>
