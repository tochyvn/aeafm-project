@extends("admin/admin")
@section('contentUser')

<div class="titre"><h4> Bienvenu dans votre espace {{ Auth::user()->name }}</h4></div>
<div class="large-12 medium-12 columns" >
    @include('user/menuUser')
    <div class="large-8 medium-12 columns contentUser" style="border: 1px  solid #e4daf4;" >
        @if (Session::has('success'))
        <span class="help-block success">
            <strong>{{ Session::get('success')}}</strong>
        </span>
        @endif
        @php 
        $inscrire=0;
        $i=$aide->where('domaine_id','=',$domaineShow->id, 'user_id','=',Auth::user()->id);
        @endphp
        <h4> editer le domaine {{$domaineShow->name}} </h4>

        @foreach ($i as $key)

        {!! Form::open(array('method'=>'put' ,'url' => route('aide-scolaire.update',$key))) !!}
        <div class="form-group">

            {!! Form::label('description', 'description')  !!}
            {!! Form::textarea('description',$key->description,['class'=>'form-control'])  !!}
            @php  Session::flash('verifx',$key->id); @endphp
        </div>
        <button class="btn btn-primary">update</button>
        {!! Form::close() !!}

        @endforeach


    </div>

    @include('user/userLeft')

</div>
<script type="text/javascript">
    $(document).on('submit', '.form-delete', function () {
        return confirm('confirm  suppression');
    });

</script>

@endsection