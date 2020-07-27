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
                        @include('partials._servicefour')
                    @elseif(count($service) % 2 == 0)
                        @include('partials._servicetwo')
                    @elseif(count($service) % 3 == 0)
                        @include('partials._servicethree')
                    @endif
            @endforeach
        </div>
    </div>
</section>
