

<footer id="contact">
    <div class="container">
        <h1>{{$section->title}}</h1>
        <h6>{{$section->sub_title}}</h6>
        <div class="row">
             <div class="col-md-5 pt-3">
                 <p>{!! $section->text !!}</p>
             </div>
            <div class="col-md-7">
                {!!  \Collective\Html\FormFacade::open(['action' => 'MailController@postContact', 'method' => 'POST'])  !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('name', 'Meno', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('name', '', ['class' => 'form-control', 'required' => 'true']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('email', 'E-mail', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('email', '', ['class' => 'form-control', 'required' => 'true']) }}
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('phone', 'Mobilné čislo', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('phone', '', ['class' => 'form-control', 'required' => 'true']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('service', 'Služba', ['class' => 'form-control-label']) }}
                            <select class="form-control selectpicker" name="service" id="select">
                                    <option value="">...</option>
                                    @foreach($service as $item)
                                        <option value="{{$item->title}}">{{$item->title}}</option>
                                    @endforeach
                                    @foreach($list as $item)
                                        <option value="{{$item->title}}">{{$item->title}}</option>
                                    @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('text', 'Správa', ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'form-control', 'style' => 'max-height:100px', 'required' => 'true']) }}
                </div>

                <button type="submit" class="btn btn-custom mt-2 mb-2">Odoslať</button>
                {!! \Collective\Html\FormFacade::close() !!}
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <hr>
            <p class="pt-2">
                Všetky práva vyhradené pre &copy; <script type="text/javascript">document.write(new Date().getFullYear());</script> EHBpro s.r.o
            </p>
        </div>
        </div>
</footer>
