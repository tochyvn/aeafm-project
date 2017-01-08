@extends("admin/admin")
 @section('contentAdmin')        
 <div class="large-12 medium-12 columns contentAdmin" >

 <div  class="Formclass large-5 medium-12 columns">
 <h4> editer le niveau d'étude {{$niveauEtude->name}} </h4>
 	@if (Session::has('success'))
                  <span class="help-block success">
                      <strong>{{ Session::get('success')}}</strong>
                  </span>
      @endif
	
	{!! Form::open(array('method'=>'put' ,'url' => route('niveau-etude.update',$niveauEtude))) !!}
		 <div class="form-group">
		 {!! Form::label('name', 'name')  !!}
		{!! Form::text('name',$niveauEtude->name, ['class'=>'form-control'])  !!}
		</div>

		
		 <button class="btn btn-primary">Envoiyer</button>
   {!! Form::close() !!}

 
</div>
</div>
@endsection