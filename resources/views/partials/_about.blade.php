<section id="about" class="pt-5">
    <div class="container">
        <div class="shadow-lg mt-5 pb-5 bg-white rounded">
            <div class="row">
                <div class="col-lg-7 col-md-7 about" data-aos="fade-right">
                        <h1>{{$about->title}}</h1>
                        <h6>{{$about->sub_title}}</h6>
                        <p class="pt-4">{!! $about->text!!}</p>
                        <a href="{{ $about->button_url}}" class="btn btn-custom mt-4">{{ $about->button_text}}</a>
                    </div>
                    <div class="col-lg-5 col-md-5 images pt-5" data-aos="fade-left">
                        <img src="{{ asset('img/about/'.$about->img1) }}" alt="about img 1" class="img1">
                        <img src="{{ asset('img/about/'.$about->img2) }}" alt="about img 2" class="ml-4">
                    </div>
            </div>
        </div>
    </div>
</section>
