@section('contentUser') 
 <div class="titre"><h4> catégorie de formation</h4></div>
@foreach($typeFormation as $typef)

<div  class="lastEvent large-6 medium-12 columns" >
<a href="{{route('formation.show',$typef)}} ">
<h4>{{ $typef->name }} </h4>
<div>
<p class="large-12 medium-12 columns"  > {{ $typef->description }}</p>

</div>

</a>
</div>
@endforeach
<div  class="lastEvent large-6 medium-12 columns">
</div>



@endsection

