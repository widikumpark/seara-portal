 <div>
     <div class="row">
         <div class="col-lg-6 col-6">
             <!-- small card -->
             <div class="small-box bg-info">
                 <div class="inner">
                     <h3>{{ count($total_quotes) }}</h3>

                     <p>Quotes</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-folder"></i>
                 </div>
                 <a href="{{ url('/quotes') }}" class="small-box-footer">
                     More info <i class="fas fa-arrow-circle-right"></i>
                 </a>
             </div>
         </div>

         <!-- ./col -->
         <div class="col-lg-6 col-6">
             <!-- small card -->
             <div class="small-box bg-warning">
                 <div class="inner">
                     <h3>{{ $documents_count }}</h3>

                     <p>Documents</p>
                 </div>
                 <div class="icon">
                     <i class="fas fa-tasks"></i>
                 </div>
                 <a href="{{ url('/documents') }}" class="small-box-footer">
                     More info <i class="fas fa-arrow-circle-right"></i>
                 </a>
             </div>
         </div>

     </div>
     <div>
         <div class="form-group px-20">
             <h1 class="title font-weight-bold my-3">Search Products</h1>
             <input wire:model="query" type="text" class="form-control" placeholder="Search Products ..."
                 wire:keydown.escape='reset' wire:keydown.tab='reset'>
         </div>

         <div wire:loading><img src="{{ asset('/images/loading.gif') }}" alt="" title=""></div>
         <div class="row">
             @foreach ($products as $product)


                 <div class="col-md-3  d-flex align-items-stretch" wire:click="viewProduct({{ $product['id'] }})">
                     <div class="card profile-card-4">
                         <div class="card-img-block">

                             <img class="img-fluid" src="{{ $product['image_url_1'] }}"
                                 alt="{{ $product['name'] }}">
                         </div>
                         <div class="card-body pt-5">
                             <!-- <img src="soya.jpg" alt="profile-image" class="profile"/> -->
                             <h5 class="card-title ">{{ $product['name'] }}</h5>
                             <p class="card-text ">{{ $product['price'] }} / {{ $product['measuring_unit'] }}.
                             </p>
                             <div class="icon-block "><button class="btn "
                                     style="background-color: #3d9970; color:white; padding:10px 17px">View
                                     Product</button>
                             </div>
                         </div>
                     </div>

                 </div>
             @endforeach
         </div>

     </div>

     <style>
         /*Profile card 4*/
         .profile-card-4 .card-img-block {
             float: left;
             width: 100%;
             height: 150px;
             overflow: hidden;
         }

         .profile-card-4 .card-body {
             position: relative;
         }

         .profile-card-4 .profile {
             border-radius: 50%;
             position: absolute;
             top: -62px;
             left: 50%;
             width: 100px;
             border: 3px solid rgba(255, 255, 255, 1);
             margin-left: -50px;
         }

         .profile-card-4 .card-img-block {
             position: relative;
         }

         .profile-card-4 .card-img-block>.info-box {
             position: absolute;
             background: rgba(217, 11, 225, 0.6);
             width: 100%;
             height: 100%;
             color: #fff;
             padding: 20px;
             text-align: center;
             font-size: 14px;
             -webkit-transition: 1s ease;
             transition: 1s ease;
             opacity: 0;
         }

         .profile-card-4 .card-img-block:hover>.info-box {
             opacity: 1;
             -webkit-transition: all 1s ease;
             transition: all 1s ease;
         }

         .profile-card-4 h5 {
             font-weight: 600;
             color: rgb(63, 63, 63);
         }

         .profile-card-4 .card-text {
             font-weight: 300;
             font-size: 15px;
         }

         .profile-card-4 .icon-block {
             float: left;
             width: 100%;
         }

         .profile-card-4 .icon-block a {
             text-decoration: none;
         }

         .profile-card-4 i {
             display: inline-block;
             font-size: 16px;
             color: #d90be1;
             text-align: center;
             border: 1px solid #d90be1;
             width: 30px;
             height: 30px;
             line-height: 30px;
             border-radius: 50%;
             margin: 0 5px;
         }

         .profile-card-4 i:hover {
             background-color: #d90be1;
             color: #fff;
         }

     </style>




 </div>
 </div>
