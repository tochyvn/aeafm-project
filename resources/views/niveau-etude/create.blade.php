@extends("admin/admin")
 @section('contentAdmin')
 
 <div  class="contactForm large-6 medium-12 columns" >
  <h4> Ajouter un niveau  d'étude </h4>
   <div>
  @if (Session::has('success'))
                  <span class="help-block success">
                      <strong>{{ Session::get('success')}}</strong>
                  </span>
      @endif

{!! Form::open(array('url' => route('niveau-etude.store'), 'class' => 'form')) !!}

<div class="form-group" style="width: 100%;">
    {!! Form::label('name' ,'niveau d\'étude') !!}
    {!! Form::text('name', null, array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Niveau d\'étude')) !!}

               @if ($errors->has('name'))
                  <span class="help-block errors">
                      <strong>{{ $errors->first('name') }}</strong>
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