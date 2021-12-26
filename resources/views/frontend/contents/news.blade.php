<div class="row row_news">
    <div class="col-12">
        <h4 class="mb-4 card-title">TIN TỨC</h4>
    </div>
    @foreach ($news as $news)
        <div class="col-md-3 col-lg-3">
            <div class="card bg-light-news mb-3">
                <a href="{{route('tintuc.show', ['newsID' => $news->newsID])}}">
                    <div class="news-hovereffect">
                        <img class="img-responsive" src="{{asset($news->newsIMG)}}" alt="">
                        <div class="overlay">
                            <h2>{{$news->newsTitle}}</h2>
                            <p>{!!Str::limit($news->news, 100)!!}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>

<div class="extends-news">
    <a href="{{route('tintuc.index')}}">
        Xem thêm tin tức...
    </a>
</div>