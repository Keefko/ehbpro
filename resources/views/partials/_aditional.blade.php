


<section id="aditional" class="pt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer-form" data-aos="fade-right" style="background: url({{asset('img/images/'.$imageAdd->img)}}) no-repeat top center; background-size: cover; height: 100%; min-height: 300px">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-form grey">
                    <div class="row">
                        <div class="col-lg-10" data-aos="fade-left">
                            <h1>{{$section->title}}</h1>
                            <h6>{{$section->sub_title}}</h6>
                            <p class="mt-4">{!! $section->text !!}</p>
                            <div class="row pt-3 pb-4">
                                @foreach($list as $item)
                                <div class="col-lg-4 col-md-4 col-sm-4 ">
                                    <div class="aditional-item" >{{$item->title}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
