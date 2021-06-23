<div>



    <h1 class="font-weight-bold mx-2">QUOTES</h1>

    <!-- /.box-header -->
    @if (count($quotes) === 0)
        <div class="alert alert-warning mt-4" role="alert">
            <h3 class="alert-heading">No Quotes. </h3>
            <p class="my-3">You have no quotes yet. If you still have issues, please
                contact
                support</p>
            <hr>
            <div class="d-flex mt-2">
                <p class="p-2 mr-2 float-right"><a wire:click="contactSupport()" class="btn btn-primary text-white"><i
                            class="fas fa-headset"></i> Contact Support </a></p>

            </div>
        </div>
    @else



        <div class="row">
            @foreach ($quotes as $key => $quote)
                @include('partials.widgets.quote-card', ['quote'=>$quote,
                'quoteDetails'=>$quote->getQuoteDetails()])


            @endforeach

        </div>
        <!-- /.box-body -->
    @endif


</div>
