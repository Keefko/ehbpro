<section id="service" class="pt-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3" data-aos="fade-right">
                <h1>{{$section->title}}</h1>
                <h6>{{$section->sub_title}}</h6>
            </div>
            <div class="col-md-9" data-aos="fade-down">
                <p>{!! $section->text !!}</p>
            </div>
        </div>


        <div class="row pt-4 services">
            <?php $count = 1; ?>

            @foreach($service as $item)

                    @if(count($service) % 2 == 0 && count($service) % 4 == 0)
                        <div class="col-md-3 col-sm-6 col-xs-12 single-box" data-aos="flip-up">

                            <h2>0{{ $count }}</h2>

                            <style>
                                #service .services .single-box:nth-child({{$count}} ){
                                    background: url({{asset('img/service/'.$item->img)}}) no-repeat center;
                                    background-size:cover;
                                    height: 350px;
                                    max-width: 430px;
                                }

                                #service .services .single-box:hover{
                                    background: #e3e3e3;
                                }

                            </style>

                            <?php $count++ ?>
                            <h3>{{$item->title}}</h3>
                            <p>{!! $item->text !!}</p>
                        </div>
                    @elseif(count($service) % 5 == 0)
                        @if($count < 3)
                            <div class="col-md-6 col-sm-6 col-xs-12 service-box" data-aos="flip-up">
                                <div class="row">
                                    <div class="col-md-6 service-image">
                                        <img src="{{asset('img/service/'.$item->img)}}">
                                    </div>
                                    <div class="col-md-6 service-two">
                                        <h2>0{{ $count }}</h2>

                                        <?php $count++ ?>

                                        <h3>{{$item->title}}</h3>
                                        <p>{!! $item->text !!}</p>
                                    </div>
                                </div>

                            </div>
                            @if($count == 3)
                                 </div>
                                 <div class="row services">
                            @endif
                        @else
                            <div class="col-md-4 col-sm-6 col-xs-12 single-box" data-aos="flip-up">

                                <h2>0{{ $count }}</h2>

                                <style>
                                    #service .services .single-box:nth-child({{$count}} ){
                                        background: url({{asset('img/service/'.$item->img)}}) no-repeat center;
                                        background-size:cover;
                                        height: 350px;
                                    }

                                    #service .services .single-box:hover{
                                        background: #e3e3e3;
                                    }

                                </style>

                                <?php $count++ ?>
                                <h3>{{$item->title}}</h3>
                                <p>{!! $item->text !!}</p>
                            </div>
                        @endif
                    @elseif(count($service) % 2 == 0)
                        <div class="col-md-6 col-sm-6 col-xs-12 service-box" data-aos="flip-up">
                            <div class="row">
                                <div class="col-md-6 service-image">
                                    <img src="{{asset('img/service/'.$item->img)}}">
                                </div>
                                <div class="col-md-6 service-two">
                                    <h2>0{{ $count }}</h2>

                                    <?php $count++ ?>

                                    <h3>{{$item->title}}</h3>
                                    <p>{!! $item->text !!}</p>
                                </div>
                            </div>

                        </div>
                    @elseif(count($service) % 3 == 0)
                        <div class="col-md-4 col-sm-6 col-xs-12 single-box" data-aos="flip-up">

                            <h2>0{{ $count }}</h2>

                            <style>
                                #service .services .single-box:nth-child({{$count}} ){
                                    background: url({{asset('img/service/'.$item->img)}}) no-repeat center;
                                    background-size:cover;
                                    height: 350px;
                                }

                                #service .services .single-box:hover{
                                    background: #e3e3e3;
                                }

                            </style>

                            <?php $count++ ?>
                            <h3>{{$item->title}}</h3>
                            <p>{!! $item->text !!}</p>
                        </div>
                    @endif
            @endforeach
        </div>
    </div>
</section>
