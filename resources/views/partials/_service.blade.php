<section id="service" class="pt-5 pb-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <h1>{{$section->title}}</h1>
                <h6>{{$section->sub_title}}</h6>
            </div>
            <div class="col-md-9">
                <p>{!! $section->text !!}</p>
            </div>
        </div>


        <div class="row pt-4 services">
            <?php $count = 1; ?>

            @foreach($service as $item)

                    @if(count($service) % 2 == 0 && count($service) % 4 == 0)
                        <div class="col-md-3 col-sm-6 col-xs-12 single-box">

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
                    @elseif(count($service) % 2 == 0)
                        <div class="col-md-6 col-sm-6 col-xs-12 service-box">
                            <div class="row">
                                <div class="col-md-6 service-image">
                                    <style>
                                        #service .services .service-box:nth-child({{$count}}) service-image {
                                            background: url({{asset('img/service/'.$item->img)}}) no-repeat center;
                                            background-size:cover;
                                            height: 350px;
                                        }

                                        #service .services .service-two p{
                                            font-size: 13px;
                                            display: block;
                                        }
                                    </style>
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
                        <div class="col-md-4 col-sm-6 col-xs-12 single-box">

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
