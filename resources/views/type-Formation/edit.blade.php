@extends("admin/admin")
 @section('contentAdmin')        
 <div class="large-12 medium-12 columns contentAdmin" >

 <div  class="Formclass large-5 medium-12 columns">
 <h4> editer la formation {{$typeFormationEdit->name}} </h4>

 @if (Session::has('success'))
                  <span class="help-block success">
                      <strong>{{ Session::get('success')}}</strong>
                  </span>
      @endif
				{!! Form::model(array($typeFormationEdit,'method'=>'put' ,'url' => route('type-formation.update',$typeFormationEdit))) !!}
		 <div class="form-group">
		 
		 {!! Form::label('name', 'name')  !!}
		{!! Form::text('name', ['class'=>'form-control'])  !!}
		</div>

		<div class="form-group">
		 
		 {!! Form::label('description', 'description')  !!}
		{!! Form::textarea('description',['class'=>'form-control'])  !!}
		</div>
		 <button class="btn btn-primary">Envoiyer</button>
		{!! Form::close() !!}

</div>
</div>
@endsection