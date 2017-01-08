@extends("admin/admin")
@section('contentUser')

<div class="titre"><h4> Bienvenu dans votre espace {{ Auth::user()->name }}</h4></div>
<div class="large-12 medium-12 columns" >
    @include('user/menuUser')
    <div class="large-8 medium-12 columns contentUser" >
        <div class="large-12 medium-12 columns" >
            <h4>recherche d'aide scolaire</h4>
        </div>
        @php $find="false"; @endphp
        @foreach($domaines as $valueDomaine)
        @foreach($aide as $valueAide)

        @foreach($user as $valueUser)

        @if($valueDomaine->id==$valueAide->domaine_id and $valueAide->user_id==$valueUser->id)
          

        <div class="large-12 medium-12 columns profilUser" style=" border: 1px solid #77d3ff; margin-bottom: 2%;">
            <div class="large-12 medium-12 columns profilUser" > <strong for="name" >Nom :  </strong><label id="name"> {{ $valueUser->name }}</label></div>
            <div class="large-12 medium-12 columns profilUser" > <strong>aide en : </strong><label> {{ $valueDomaine->name }}</label></div>
            <div class="large-12 medium-12 columns profilUser" > <strong>description : </strong><label> {{ $valueAide->description }}</label></div>
            <div class="formSeach">

                {!! Form::open(array('method'=>'get', 'url' =>route( 'messagerie.create'))) !!}
                <div class="form-group">
                
                    {!! Form::hidden('recipient_id',$valueUser->id)  !!}
                
                </div>
                <button class="btn btn-primary">contacter</button>
                {!! Form::close() !!}
                @php
                $find="0";
                $ami=$mesDemandeAmis->where('id',$valueUser->id);
      
                @endphp
                @foreach ($ami as $key)
                @php $find="1" @endphp
                @endforeach
                
                @if($find=="0" and $valueUser->id!=Auth::user()->id)
                {!! Form::open(array('url' => route('amis.store'))) !!}
                <div class="form-group">
                    {!! Form::hidden('user_id',Auth::user()->id)  !!}
                    {!! Form::hidden('freind_id',$valueUser->id)  !!}
                    {!! Form::hidden('confirm','0')  !!}

                </div>
                <button class="btn btn-primary">ajouter</button>
                {!! Form::close() !!}
                @endif
               
                

            </div>
        </div>
        @php $find="true"; @endphp
        @endif

        @endforeach
        @endforeach 
        @endforeach 

        @if ($find=="false")
        <div class="large-12 medium-12 columns" >
            <span class="help-block success">
                <strong>auccun resultat n'a été trouvé pour votre recherche vérifiez l'orthographe  </strong>
            </span>
        </div>
        @endif
    </div>

    @include('user/userLeft')

</div>
<style type="text/css">
    .formSeach> form{
        display:inline-block;float: right;
        margin-left: 1%;
    }

</style>

@endsection