<div class="row row_brand">
    <div class="col-12">
        <h4 class="mb-4 card-title">THƯƠNG HIỆU</h4>
    </div>
    @foreach ($shoesbrand as $shoesbrand)
        <div class="col-md-6 col-xl-4">
            <div class="card bg-light mb-3">
                <a href="{{route('shoesbrand', ['brandName' => $shoesbrand->brandName])}}">
                    <div class="brand-hovereffect">
                        <img class="img-responsive" src="{{asset($shoesbrand->brandAvatar)}}" alt="">
                        <div class="overlay">
                            <h2>
                                {{$shoesbrand->brandName}}
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
