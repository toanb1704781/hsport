<div class="shop__sidebar__accordion">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-body">
                <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseOne">LOẠI GIÀY</a>
                </div>
                <div class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="shop__sidebar__categories">
                            <ul class="nice-scroll">
                                @foreach ($shoestype as $shoestype)
                                <li>
                                    
                                    <a href="{{route('shoestype',['typeName' => $shoestype->typeName])}}">
                                        {{$shoestype->typeName}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseOne">THƯƠNG HIỆU</a>
                </div>
                <div class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="shop__sidebar__categories">
                            <ul class="nice-scroll">
                                @foreach ($shoesbrand as $shoesbrand)
                                <li>
                                    <a href="{{route('shoesbrand', ['brandName' =>$shoesbrand->brandName])}}">
                                        {{$shoesbrand->brandName}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseThree">Lọc giá</a>
                </div>
                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="shop__sidebar__price">
                            <ul>
                                <li>
                                    <a href="{{route('shoesprice', ['from' => 0, 'to' => 500000])}}">
                                        {{number_format(0,0, "", ".")}}₫ - {{number_format(500000,0, "", ".")}}₫
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shoesprice', ['from' => 500000, 'to' => 2000000])}}">
                                        {{number_format(500000,0, "", ".")}}₫ - {{number_format(2000000,0, "", ".")}}₫
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shoesprice', ['from' => 2000000, 'to' => 5000000])}}">
                                        {{number_format(2000000,0, "", ".")}}₫ - {{number_format(5000000,0, "", ".")}}₫
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shoesprice', ['from' => 5000000, 'to' => 7000000])}}">
                                        {{number_format(5000000,0, "", ".")}}₫ - {{number_format(7000000,0, "", ".")}}₫
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shoesprice', ['from' => 7000000, 'to' => 10000000])}}">
                                        {{number_format(7000000,0, "", ".")}}₫ - {{number_format(10000000,0, "", ".")}}₫
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shoesprice', ['from' => 10000000, 'to' => 15000000])}}">
                                        {{number_format(10000000,0, "", ".")}}₫ - {{number_format(15000000,0, "", ".")}}₫
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseFive">Màu sắc</a>
                </div>
                <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="shop__sidebar__color">
                            @foreach ($color as $color)
                            <a  href="{{route('shoescolor',['colorName' => $color->colorName])}}">
                                <label for=""style="background: {{$color->colorCode}}">

                                </label>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>