 <div class="col-md-3  d-flex align-items-stretch" wire:click="viewQuote({{ $key }})">
     <div class="card profile-card-4">
         <div class="card-img-block">

             <img class="img-fluid" src="{{ $quote->product->image_url_1 }}" alt="{{ $quote->product->name }}">
         </div>
         <div class="card-body pt-5">
             <!-- <img src="soya.jpg" alt="profile-image" class="profile"/> -->
             <h5 class="card-title ">{{ $quote->product->name }}</h5>
             <p class="card-text ">{{ $quote->product->price }} /
                 {{ $quote->product->measuring_unit }}.
             </p>
             <div class="icon-block "><button class="btn "
                     style="background-color: #3d9970; color:white; padding:10px 17px">View
                     Order</button>
             </div>
         </div>
     </div>

 </div>
