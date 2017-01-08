@extends("admin/admin")
@section('contentUser')
<div  class="large-12 medium-12 columns" style="min-height: 500px;">
    <div class="titre"><h4> Bienvenu dans votre espace {{ Auth::user()->name }}</h4></div>
    <div class="large-12 medium-12 column " >
        @include('user/menuUser')

        <div class="large-8 medium-12 columns contentUser" >

            @include('user/update')

        </div>
        <
        @include('user/userLeft')

    </div>

</div>
<style type="text/css">


</style>
@endsection

