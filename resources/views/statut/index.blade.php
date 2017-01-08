@extends("admin/admin")
<div class="large-12 medium-12 columns" >

    @if (Auth::check())
    @if (Auth::user()->role==5)
     @section('contentAdmin') 

     
    <div class="large-8 medium-12 columns">
    @if (Session::has('success'))
        <span class="help-block success">
            <strong>{{ Session::get('success')}}</strong>
        </span>
   @endif
    <table style="width:100%" >
      <tr class="tableTitre">
        <th>Statut</th>
        <th colspan="2">Mise à jour</th>
      </tr>
      
      @foreach($statut as $keystatut)
      
      @if($loop->iteration%2)
      <tr class="trPaire">
      <td> {{ $keystatut->name }}</td>
        <td><a onclick="confirmdelete()" class="btn btn-primary" href="{{route('statut.edit',$keystatut)}} " > editer  
      </a></td>
      <td>{!! Form::open(array('method'=>'DELETE' ,'url' => route('statut.destroy',$keystatut) ,'class'=>'form-delete'))  !!}

      {!! Form::submit('supprimer', ['class' => 'btn btn-primary']) !!} 
      {!!Form::close() !!}</td>
      </tr>
      @else
       <tr class="trImpaire">
      <td> {{ $keystatut->name }}</td>
     
      <td><a class="btn btn-primary" href="{{route('statut.edit',$keystatut)}} " > editer  
      </a></td>
      <td>{!! Form::open(array('method'=>'DELETE' ,'url' => route('statut.destroy',$keystatut) ,'class'=>'form-delete')) !!}

      {!! Form::submit('supprimer', ['class' => 'btn btn-primary']) !!} 
      {!!Form::close() !!}</td>
      </tr>
      @endif
      @endforeach
    </table>
    </div>
    <script type="text/javascript">
    $(document).on('submit','.form-delete',function(){
     return confirm('confirm  suppression');
    });
      
    </script>
    @endsection


@endif 
@endif
</div>
