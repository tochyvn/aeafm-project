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

{!! Form::open( array('method'=>'put', 'url' => route('formation.update',$formation), 'class' => 'form')) !!}

<div class="form-group" style="width: 100%;">
    {!! Form::label('name') !!}
    {!! Form::text('name', $formation->name, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Name formation')) !!}
               @if ($errors->has('name'))
                  <span class="help-block errors">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
</div>
<div class="form-group" style="width: 100%;">
    {!! Form::label('stat date') !!}
    {!! Form::date('dateStat', $formation->dateStat, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'stat date ')) !!}
               @if ($errors->has('dtateStat'))
                  <span class="help-block errors">
                      <strong>{{ $errors->first('dateStat') }}</strong>
                  </span>
              @endif
</div>

<div class="form-group" style="width: 100%;">
    {!! Form::label('end  date') !!}
    {!! Form::date('dateEnd', $formation->dateEnd, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'end date ')) !!}
               @if ($errors->has('dtateEnd'))
                  <span class="help-block errors">
                      <strong>{{ $errors->first('dateEnd') }}</strong>
                  </span>
              @endif
</div>
<div class="form-group" style="width: 100%;">
    {!! Form::label('place') !!}
    {!! Form::text('place', $formation->place, 
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
                      <strong>{{ $errors->first('place') }}</strong>
                  </span>
              @endif
</div>
<div class="form-group">
    {!! Form::label('description') !!}
    {!! Form::textarea('description', $formation->description, 
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