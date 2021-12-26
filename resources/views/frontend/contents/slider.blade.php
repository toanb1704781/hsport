<nav class="row slider">
    <div class="col-xl">
        <div class="card slider-card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="owl-carousel owl-theme full-width">
                    @foreach ($slider as $slider)
                        <div class="item">
                            <a href="{{$slider->sliderSlug}}">
                                <img src="{{asset($slider->sliderIMG)}}" alt="image"  />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>