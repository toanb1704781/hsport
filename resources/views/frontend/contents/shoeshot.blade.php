<div class="row ">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">GIÀY NỔI BẬT</h3>
                <div class="owl-carousel owl-theme rtl-carousel">
                    @foreach ($shoescolor as $shoescolor)
                        @if ($shoescolor->salePrice != null || $shoescolor->checkNew($shoescolor->created_at))
                            <a href="{{route('shoesdetail', ['shoescolorID' => $shoescolor->shoescolorID])}}">
                                <div class="item">
                                    @if ($shoescolor->checkNew($shoescolor->created_at))
                                        <span class="product_new">NEW</span>
                                    @endif
                                    @if($shoescolor->salePrice)
                                        <span class="product_sale">SALE</span>
                                    @endif
                                    <img class="rtlImg" src="{{asset($shoescolor->shoesAvatar)}}" alt="image" />
                                    <p class="shoes-name">
                                        {{$shoescolor->shoes->shoesName}} / {{$shoescolor->color->colorName}}
                                        <div class="shoesfooter">
                                            <strong>
                                                {{number_format($shoescolor->salePrice ?? $shoescolor->shoesPrice,0, "", ".")}}₫
                                            </strong>
                                            <del>
                                                @if ($shoescolor->salePrice)
                                                    {{number_format($shoescolor->shoesPrice,0, "", ".")}}₫
                                                @endif
                                            </del>
                                        </div>
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>