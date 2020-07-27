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
                {{count($service)}}
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


            @endforeach
        </div>
    </div>
</section>
