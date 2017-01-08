@extends("admin/admin")
@section('contentAdmin')

<div  class="contactForm large-6 medium-12 columns" >
    <h4> Ajouter une formation</h4>
    <div>
        @if (Session::has('success'))
        <span class="help-block success">
            <strong>{{ Session::get('success')}}</strong>
        </span>
        @endif

        {!! Form::open(array('url' => route('formation.store'), 'class' => 'form')) !!}

        <div class="form-group" style="width: 100%;">
            {!! Form::label('name') !!}
            {!! Form::text('name', null, 
            array( 
            'class'=>'form-control', 
            'placeholder'=>'Name formation')) !!}
            @if ($errors->has('name'))
            <span class="help-block errors">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('stat date') !!}

            {!! Form::text('dateStat', null, 
            array('required', 
            'class'=>'form-control some_class', 'id'=>'some_class_1', 'placeholder'=>'Stat date'
            )) !!}

            @if ($errors->has('dtateStat'))
            <span class="help-block errors">
                <strong>{{ $errors->first('dateStat') }}</strong>
            </span>
            @endif

        </div>

        <div class="form-group" style="width: 100%;">
            {!! Form::label('end  date') !!}

            {!! Form::text('dateEnd', null, 
            array('required', 
            'class'=>'form-control some_class', 'id'=>'some_class_2', 'placeholder'=>'end date'
            )) !!}
            @if ($errors->has('dtateEnd'))
            <span class="help-block errors">
                <strong>{{ $errors->first('dateEnd') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group" style="width: 100%;">
            {!! Form::label('place') !!}
            {!! Form::text('place', null, 
            array('required', 
            'class'=>'form-control', 
            'placeholder'=>'place')) !!}
            @if ($errors->has('place'))
            <span class="help-block errors">
                <strong>{{ $errors->first('place') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group" style="width: 100%;">

            <label for="selt">type formation</label>
            {!! Form::select('type_id', $typeFormation, null,['class'=>'form-control','id'=>'selt']) !!}
            @if ($errors->has('type_id'))
            <span class="help-block errors">
                <strong>{{ $errors->first('type_id') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('description') !!}
            {!! Form::textarea('description', null, 
            array('required', 
            'class'=>'form-control', 
            'placeholder'=>'Description de la formation')) !!}
            @if ($errors->has('descrption'))
            <span class="help-block errors">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Envoyer', 
            array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>



@endsection