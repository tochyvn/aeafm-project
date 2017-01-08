@extends("base")
@section('content')
 <div class="large-12 medium-12 columns contentPage" >
  <div class="titre"><h4> conatact </h4></div>
 <div  class="contactForm large-6 medium-12 columns">

  <h4> nous contact</h4>
  <div>
  <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('route'=>'send', 'class' => 'form')) !!}

<div class="form-group" style="width: 100%;">
    {!! Form::label('Nom') !!}
    {!! Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Votre nom')) !!}
</div>

<div class="form-group">
    {!! Form::label('Email') !!}
    {!! Form::email('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Votre email')) !!}
</div>
<div class="form-group" style="width: 100%;">
    {!! Form::label('sujet') !!}
    {!! Form::text('subjet', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Votre sujet')) !!}
</div>

<div class="form-group">
    {!! Form::label('Message') !!}
    {!! Form::textarea('message', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Votre message')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Envoyer!', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>
</div>
<div  class="coordonnee large-5 medium-12 columns">
  <h4> coordonnées </h4>
  <div class="large-12 medium-12 columns" > <strong>Téléphone :</strong> <label> +33 76 83 36 87 07 </label> </div>
  <div class="large-12 medium-12 columns"> <strong> Email :</strong><label> president.aeafm@gmail.com</label></div>
  <div class="large-12 medium-12 columns"
  > <strong> Adresse :</strong><label> 66, Chemin de la Valbarelle - 13010 Marseille</label></div>

</div>
</div>

@endsection