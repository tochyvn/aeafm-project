@extends("admin/admin")
@section('contentUser')

<div class="titre"><h4> Bienvenu dans votre espace {{ Auth::user()->name }}</h4></div>
<div class="large-12 medium-12 columns" >
    @include('user/menuUser')
    <div class="large-8 medium-12 columns contentUser" style="">
        @if (Session::has('success'))
        <span class="help-block success">
            <strong>{{ Session::get('success')}}</strong>
        </span>
        @endif
        @php 
        $inscrire=0;
        $i=$aide->where('domaine_id','=',$domaineShow->id, 'user_id','=',Auth::user()->id);
        @endphp

        <table style="width:100%" >
            <tr class="tableTitre">
                <th>domaine</th>
                <th>description</th>
                <th colspan="2">Mise à jour</th>
            </tr>
            <tr class="trPaire">
                @foreach ($aide as $key)
                @php  Session::flash('verifx',$key->id); @endphp
                <td> {{ $domaineShow->name }}</td>
                <td>  

                    {{$key->description}}
                </td>

                <td><a onclick="confirmdelete()" class="btn btn-primary" href="{{asset(route('aide-scolaire.edit',$domaineShow))}}" > editer  
                    </a></td>
                <td>{!! Form::open(array('method'=>'DELETE' ,'url' =>route('aide-scolaire.destroy',$key->id),'class'=>'form-delete'))  !!}

                    {!! Form::submit('supprimer', ['class' => 'btn btn-primary']) !!} 
                    {!!Form::close() !!}</td>
            </tr>
            @endforeach
        </table>

    </div>

    @include('user/userLeft')

</div>
<script type="text/javascript">
    $(document).on('submit', '.form-delete', function () {
        return confirm('confirm  suppression');
    });

</script>

@endsection