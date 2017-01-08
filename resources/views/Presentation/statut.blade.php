@extends("base")
@section('content')
 <div class="large-12 medium-12 columns contentPage" >
  <div class="titre"><h4> statut</h4></div>
<div>


<object data="{{ asset('document/statut.pdf')}}" type="application/pdf" height="800" style="margin-left: ;" class="large-12 medium-12 columns>
  <param name="filename" value="{{ asset('document/statut.pdf')}}" /> 
  <a href="{{ asset('document/statut.pdf')}}" title="le fichier">Téléchargez le fichier...</a>
</object>
		
</div>


</div>

@endsection