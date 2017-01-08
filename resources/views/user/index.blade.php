@extends("admin/admin")
@section('contentUser')

<div class="titre"><h4> Bienvenu dans votre espace {{ Auth::user()->name }}</h4></div>
<div class="large-12 medium-12 columns" >
    @include('user/menuUser')

    <div class="large-8 medium-12 columns contentUser" >
        @if (Session::has('success'))
        <span class="help-block success">
            <strong>{{ Session::get('success')}}</strong>
        </span>
        @endif
        <div>  </div>
    </div>

    @include('user/userLeft')

</div>


@endsection