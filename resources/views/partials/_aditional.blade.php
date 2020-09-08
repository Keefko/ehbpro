<section id="aditional" class="pt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">

                <style>
                    #addImage {
                        background: url({{asset('img/images/'.$imageAdd->img)}}) no-repeat top center;
                        background-size: cover;
                        height: 100%;
                        min-height: 300px;
                    }
                </style>

                <div class="footer-form" data-aos="fade-right" id="addImage">
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
                                    <script>
                                        $(document).load(function () {
                                            var x = screen.width;
                                            if(x > 922 && x < 1150 ){
                                                $("#additional-block").addClass('col-sm-6 col-md-6 col-lg-6');
                                            }else {
                                                $("#additional-block").addClass('col-sm-4 col-md-4 col-lg-4');
                                            }
                                        });
                                    </script>
                                        <div id="additional-block">
                                            <div class="aditional-item" >{{$item->title}}</div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
