@extends("admin/admin")
 @section('contentAdmin')        
 <div class="large-12 medium-12 columns contentAdmin" >

 <div  class="Formclass large-5 medium-12 columns">
 <h4> editer le stataut {{$statut->name}} </h4>
 	@if (Session::has('success'))
                  <span class="help-block success">
                      <strong>{{ Session::get('success')}}</strong>
                  </span>
      @endif
	
	{!! Form::open(array('method'=>'put' ,'url' => route('statut.update',$statut))) !!}
		 <div class="form-group">
		 {!! Form::label('Statut name', 'name')  !!}
		{!! Form::text('name',$statut->name, ['class'=>'form-control'])  !!}
		</div>

		
		 <button class="btn btn-primary">Envoiyer</button>
   {!! Form::close() !!}

 
</div>
</div>
@endsection