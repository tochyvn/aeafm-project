@extends("admin/admin")
@section('contentUser')
<div  class="large-12 medium-12 columns" style="min-height: 500px;">
    <div class="titre"><h4> Bienvenu dans votre espace {{ Auth::user()->name }}</h4></div>
    @include('user/menuUser')
    <div class="large-8 medium-12 columns contentUser" >
        @if (Session::has('success'))
        <span class="help-block success">
            <strong>{{ Session::get('success')}}</strong>
        </span>
        @endif

        {!! Form::open(array('url' => route('aide-scolaire.store'))) !!}

        {!! Form::hidden('user_id',Auth::user()->id,['class'=>'form-control','id'=>'selt']) !!}
        <div> <label for="">je peux aider en :</label></div>
        
        @foreach ($domaine as $value)
		        @if (Auth::check())
			        @php $inscrire=0; @endphp 
			        @php $submit=1; @endphp 
			 @foreach ($aide as $key)
			

			        @if ($loop->first)
				        @php $inscrire=1; @endphp 
				         @php $submit=0; @endphp 
		            @endif
	        @endforeach
	        <!-- if user suscription-->
	        @if($inscrire==1)
	      
	        @else
	        <div class="form-group">
	            <label class="checkbox-inline">
	                <input tabindex="1" type="checkbox" value="{{$value->id}}" id="{{$value->id}}" name="domaine[]" >{{ $value->name }} 
	            </label>

	        </div> </br>

	        <div class="form-group">

	            <label for="description">description</label>
	            <textarea class="form-control" rows="5" id="description" name="description_{{$value->id}}"></textarea>

	            @if ($errors->has('description'))
	            <span class="help-block">
	                <strong>{{ $errors->first('description') }}</strong>
	            </span>
	            @endif
	        </div>
	        @endif
	        @else
	        <button class="btn btn-primary">s'incrire</button>
	        @endif
	        @if ( $submit==1 )
            <button class="btn btn-primary">envoyer</button>
	        @endif
        @endforeach
        
        {!! Form::close() !!}





    </div>

    @include('user/userLeft')

</div>


<style type="text/css">


</style>
@endsection

