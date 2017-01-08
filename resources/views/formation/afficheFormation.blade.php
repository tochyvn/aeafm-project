FFF
 <div class="large-12 medium-12 columns">
 
 @if (Session::has('success'))
      <span class="help-block success large-5 medium-12 columns">
          <strong>{{ Session::get('success')}}</strong>
      </span>
  @endif
  </div>
<div><h3>{{Session::get('titre')}}</h3></div>
@foreach($formation as $typef)
<div  class="large-6 medium-12 columns" style="margin-bottom: 2%;" >
<div class="large-12 medium-12 columns data">
<h4>{{ $typef->name }} </h4>
<div class="dataFormation">
<div class="large-12 medium-12 columns" > <strong>Date de debut :</strong><label>{{ $typef->dateStat }}</label></div>

<div class="large-12 medium-12 columns" ><strong>Date de fin :</strong><label>{{ $typef->dateEnd }}</label></div>

<div class="large-12 medium-12 columns" ><strong>Lieu :</strong> <label>{{ $typef->place }}</label></div>

<div class="large-12 medium-12 columns" ><strong>description:</strong> <label>{{ $typef->description }}</label> </div>

</div>

{!! Form::open(array('url' => route('inscription.store') )) !!}
{!! Form::hidden('formation_id',$typef->id ,['class'=>'form-control'])  !!} 

    @if (Auth::check())
    {!! Form::hidden('email',Auth::user()->email, ['class'=>'form-control'])  !!} 
  {!! Form::hidden('type_id',$typef->type_id, ['class'=>'form-control'])  !!}

    @php 
    $inscrire=0;
    $i=$inscription->where('formation_id','=',$typef->id, 'email','=',Auth::user()->email);
    @endphp
     @foreach ($i as $key)
      @if ($loop->first)
          @php
          $inscrire=1; 
          @endphp 
      @endif
     @endforeach
     <!-- if user suscription-->
     @if($inscrire==1)
     <label> vous êtes déjà inscrire</label>
     @else
      <button class="btn btn-primary">s'incrire</button>
     @endif
     @else
    <button class="btn btn-primary">s'incrire</button>
     @endif
   
   
 {!!Form::close() !!}
</div>
</div>
@endforeach
<div  class="lastEvent large-6 medium-12 columns">
</div>
