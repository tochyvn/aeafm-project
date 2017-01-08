@extends("admin/admin")
@section('contentUser')

<div class="titre"><h4>@if (Auth::check()) Binvenu dans votre espace {{ Auth::user()->name }} @endif</h4></div>
<div class="large-12 medium-12 columns" >
    @include('user/menuUser')
    <div class="large-8 medium-12 columns contentUser">

        @include('../formation/afficheFormation')
    </div>

    @include('user/userLeft')


</div>


@endsection