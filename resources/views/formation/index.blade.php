@extends("admin/admin")

@if (Auth::check())
@if (Auth::user()->role==5)

@section('contentAdmin') 

<div class="large-12 medium-12 columns contentAdmin" >

    <div class="large-8 medium-12 columns">
        <table style="width:100%" >
            <tr class="tableTitre">
                <th>type</th>
                <th>description</th>
                <th colspan="2">Mise à jour</th>

            </tr>

            @foreach($formation as $typef)

            @if($loop->iteration%2)
            <tr class="trPaire">
                <td> {{ $typef->name }}</td>
                <td> {{ $typef->description }}</td>
                <td><a onclick="confirmdelete()" class="btn btn-primary" href="{{route('formation.edit',$typef)}} " > editer  
                    </a></td>
                <td>{!! Form::open(array('method'=>'DELETE' ,'url' => route('formation.destroy',$typef) ,'class'=>'form-delete'))  !!}

                    {!! Form::submit('supprimer', ['class' => 'btn btn-primary']) !!} 
                    {!!Form::close() !!}</td>
            </tr>
            @else
            <tr class="trImpaire">
                <td> {{ $typef->name }}</td>
                <td> {{ $typef->description }}</td>
                <td><a class="btn btn-primary" href="{{route('formation.edit',$typef)}} " > editer  
                    </a></td>
                <td>{!! Form::open(array('method'=>'DELETE' ,'url' => route('formation.destroy',$typef) ,'class'=>'form-delete')) !!}

                    {!! Form::submit('supprimer', ['class' => 'btn btn-primary']) !!} 
                    {!!Form::close() !!}</td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        $(document).on('submit', '.form-delete', function () {
            return confirm('confirm  suppression');
        });

    </script>
    @endsection
    @else
    @section('contentUser') 
    <div class="titre"><h4> formation </h4></div>
    @foreach($formation as $typef)
    @include('formation/afficheFormation')
    @endforeach
    <div  class="lastEvent large-4 medium-12 columns">
    </div>

</div>

@endsection

@endif 
@else

@section('contentUser') 
<div class="titre"><h4> formation </h4></div>
@foreach($formation as $typef)
@include('formation/afficheFormation')

@endforeach
<div  class="lastEvent large-4 medium-12 columns">
</div>

</div>

@endsection

@endif