@extends("admin/admin")
 @section('contentAdmin')
<div class="large-12 medium-12 columns" >
<h1> formation </h1>
@foreach($typeFormation as $typef)
<div  class="lastEvent large-4 medium-12 columns">
<h4>{{ $typef->nom }} </h4>
<div>
<h3> {{ $typef->description }}</h3>
<p><a class="btn btn-primary" href="{{route('type-formation.edit',$typef)}} " >	editer	
	</a></p>
</div>
</div>

@endforeach
</div>

@endsection