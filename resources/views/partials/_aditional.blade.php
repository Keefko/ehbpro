


<section id="aditional" class="pt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer-form" data-aos="fade-right" style="background: url({{asset('img/images/'.$imageAdd->img)}}) no-repeat top center; background-size: cover; height: 30vh; min-height: 300px">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-form grey">
                    <div class="row">
                        <?php $width = '<script></script>'; ?>
                        @if($width < 992)
                                <div class="col-lg-10" data-aos="fade-up">
                        @else
                            <div class="col-lg-10" data-aos="fade-left">
                         @endif
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
