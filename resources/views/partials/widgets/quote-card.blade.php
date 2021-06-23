 <div class="col-md-3" wire:click="viewQuote({{ $key }})">
     <div class="card">
         <div class="card-body">
             <h5><span class="label label-info text-info text-uppercase font-weight-bold">Quote:
                     {{ strtoupper($quote->number) }}</span>
             </h5>

             <h5 class="card-title text-bold">{{ $quote->current_status }}</h5>


             @foreach ($quoteDetails['products'] as $key => $product)
                 <p class="card-text">{{ $quoteDetails['quantities'][$key] }} {{ $product->measuring_unit }} -
                     {{ $product->name }}
                 </p><br />
             @endforeach
             <div class="icon-block "><button class="btn"
                     style="background-color: #3d9970; color:white; padding:10px 17px">View Quote</button>
             </div>
         </div>
     </div>


 </div>
