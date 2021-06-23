<div>
    {{-- Stop trying to control. --}}
    @if ($hasSelectedProducts)
        <div class="mb-3 alert alert-info alert-dismissible fade show" role="alert">
            <strong>New Feature!</strong> You can now add more than one product to your quote. </p>
            <span class="text-bold">Tip:</span> for quicker confirmation, avoid requesting multiple products in a single
            quote.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="row">
            <h1 class="title font-weight-bold mx-5">You have selected: </h1>
        </div>
        <div class="row mt-3">
            @foreach ($selectedProducts as $selectedProduct)

                <div class="col-md-3 ml-2">
                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <p class="text-bold">{{ $selectedProduct['name'] }}</p>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{ $selectedProduct['price'] }} / {{ $selectedProduct['measuring_unit'] }}
                                </p>
                            </div>
                            <br />
                            <a wire:click="$emit('removeFromList', {{ json_encode($selectedProduct) }})" href="#"
                                class="btn btn-primary">Remove From Quote</a>
                        </div>
                    </div> --}}
                    <div class="card">
                        <img class="card-img-top" src="{{ $selectedProduct['image_url_1'] }}"
                            alt="{{ $selectedProduct['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title text-bold">{{ $selectedProduct['name'] }}</h5>
                            <p class="card-text">USD
                                ${{ $selectedProduct['price'] }}/{{ $selectedProduct['measuring_unit'] }}</p>
                            <a wire:click="$emit('removeFromList', {{ json_encode($selectedProduct) }})" href="#"
                                class="btn btn-success mt-2">Remove</a>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>

        <div class="row m-5"> <a wire:click="requestQuote" href="#" class="btn btn-success col-md-3">Continue</a>
        </div>

    @endif

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="m-5">
        <div class="form-group px-20">
            <h1 class="title font-weight-bold my-2">Add Products To Qoute</h1>
            <input wire:model="query" type="text" class="form-control" placeholder="Search Products ..."
                wire:keydown.escape='reset' wire:keydown.tab='reset'>
        </div>

        <div wire:loading><img src="{{ asset('/images/loading.gif') }}" alt="" title=""></div>
        <div class="row">
            @foreach ($products as $product)


                <div class="col-md-3  d-flex align-items-stretch"
                    wire:click="$emit('addToList', {{ json_encode($product) }})">
                    <div class="card profile-card-4">
                        <div class="card-img-block">

                            <img class="img-fluid" src="{{ $product['image_url_1'] }}"
                                alt="{{ $product['name'] }}">
                        </div>
                        <div class="card-body pt-5">
                            <!-- <img src="soya.jpg" alt="profile-image" class="profile"/> -->
                            <h5 class="card-title ">{{ $product['name'] }}</h5>
                            <p class="card-text mb-2">USD ${{ $product['price'] }} /
                                {{ $product['measuring_unit'] }}.
                            </p>
                            <div class="icon-block "><button class="btn "
                                    style="background-color: #EF8514; color:white; padding:10px 17px">Add To Quote
                                    Request</button>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
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
