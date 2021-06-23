  <div>
      <div class="">

          <div class="card">
              <div class="row">
                  <aside class="col-sm-5 border-right">
                      <article class="gallery-wrap">
                          <div class="img-big-wrap">
                              <div> <a class="main-a" href="{{ $product['image_url_1'] }}"><img
                                          class="main-img  img-fluid" src="{{ $product['image_url_1'] }}"></a></div>
                          </div> <!-- slider-product.// -->
                          <div class="img-small-wrap">
                              <div class="item-gallery"> <img class="" src="{{ $product['image_url_1'] }}"> </div>
                              <div class="item-gallery"> <img class="" src="{{ $product['image_url_2'] }}"> </div>

                          </div> <!-- slider-nav.// -->
                      </article> <!-- gallery-wrap .end// -->
                  </aside>
                  <aside class="col-sm-7">
                      <article class="card-body p-5">
                          <h2 class="display-4 mb-3" style="font-size: 2.5rem;"> <?php echo
                              strtoupper($product->name); ?> </h2>
                          <h3 class="mb-2">USD ${{ $product->price }} / {{ $product->measuring_unit }}</h3>
                          <button wire:click='orderProduct' type="button" class="btn btn-x-lg"
                              style="background-color: #3d9970; color:white; padding:10px 20px">Request Quote</button>

                          <!-- price-detail-wrap .// -->
                          <dl class="item-property mt-3">
                              <dt style="font-size: 1.6rem">Description</dt>
                              <dd>
                                  <p>
                                      @foreach ($description_lines as $description_line)
                                          {{ $description_line }}<br />
                                      @endforeach
                                  </p>

                              </dd>
                          </dl>

                          <dl class="param param-feature">
                              <dt style="font-size: 1.6rem">Specifications</dt>
                              <dd>
                                  <p>
                                      @foreach ($specification_lines as $specification_line)
                                          {{ $specification_line }}<br />
                                      @endforeach
                                  </p>
                              </dd>
                          </dl> <!-- item-property-hor .// -->
                          <dl class="param param-feature">
                              <dt style="font-size: 1.6rem">Origin</dt>
                              {{-- @if (count($origin) > 1) --}}
                              <dd>
                                  @foreach ($origin as $originName)
                                      {{ $originName }},
                                  @endforeach
                              </dd>
                              {{-- @else
                                  <dd> {{ $product->origin }}</dd>
                              @endif --}}

                          </dl> <!-- item-property-hor .// -->

                          <hr>
                          <div class="row">
                              <div class="col-sm-12">
                                  <dl class="param param-inline">
                                      <dt style="font-size: 1.3rem"> MOQ <small>(Minimum order quatity)</small> :
                                          {{ $product->moq }} {{ $product->measuring_unit }}
                                      </dt>



                                  </dl> <!-- item-property .// -->
                              </div> <!-- col.// -->
                          </div> <!-- row.// -->
                          <hr>


                      </article> <!-- card-body.// -->
                  </aside> <!-- col.// -->
              </div> <!-- row.// -->
          </div> <!-- card.// -->


      </div>
  </div>

  <style>
      .gallery-wrap .img-big-wrap img {
          height: 450px;
          width: auto;
          display: inline-block;
          cursor: zoom-in;
      }


      .gallery-wrap .img-small-wrap .item-gallery {
          width: 60px;
          height: 60px;
          border: 1px solid #ddd;
          margin: 7px 2px;
          display: inline-block;
          overflow: hidden;
      }

      .gallery-wrap .img-small-wrap {
          text-align: center;
      }

      .gallery-wrap .img-small-wrap img {
          max-width: 100%;
          max-height: 100%;
          object-fit: cover;
          border-radius: 4px;
          cursor: zoom-in;
      }

      .currency {
          color: green
      }

  </style>


  <script>
      let clickedImg = document.querySelectorAll('.item-gallery');
      let mainImg = document.querySelector('.main-img');
      let mainA = document.querySelector('.main-a');
      clickedImg.forEach(element => {
          element.addEventListener('click', (e) => {
              mainImg.src = e.target.src;
              mainA.href = e.target.src;
          })
      });

  </script>
