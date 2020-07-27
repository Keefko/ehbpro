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
