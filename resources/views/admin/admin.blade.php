@extends("base")

@section('content')
<div class="large-12 medium-12 columns contentPage"> 
@if (Route::has('login'))
@php   Session::flash('user_id', Auth::user()->id); @endphp

@if (Auth::check())

@if (Auth::user()->role==5)

    <div class="titre"><h4> espace Administrateur</h4></div>
 
  	@include("admin/menuAdmin")
<div class="large-8 medium-12 columns"> 
 @yield('contentAdmin')
 </div>

@else

 @yield('contentUser')


 @endif @endif
@else
 
 @endif

@if (!Auth::check())

 @yield('contentUser')
 
 @endif
 </div>

 
@endsection