	@extends("admin/admin")
	@section('contentUser')

	<div class="titre"><h4>@if (Auth::check()) Binvenu dans votre espace {{ Auth::user()->name }} @endif</h4></div>
	 <div class="large-12 medium-12 columns" >
	@include('user/menuUser')
	<div class="large-8 medium-12 columns profilUser contentUser" >
	 
	 <div class="large-12 medium-12 columns profilUser" > <strong>Sex: </strong><label>{{ Auth::user()->sex}}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>Nom : </strong><label>{{ Auth::user()->name }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>Prénom : </strong><label>{{ Auth::user()->first_name }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>téléphone:</strong><label>{{ Auth::user()->phone_number }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>staut:</strong><label>{{ $statut }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>Niveu d'étude:</strong><label>{{ $level }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>domaine :</strong><label>{{ $domaines }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>aide en :</strong><label> domaine</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>email:</strong><label>{{ Auth::user()->email }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>mot de passe:</strong><label><a class="" href="{{ asset(url('/password/reset')) }}">change de mot de passe </a></label></div>

	<div class="large-12 medium-12 columns profilUser" > <strong>Pays d'origin:</strong><label>{{ $paysOrigin }}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>Pays de residence:</strong><label>{{ $paysResidence}}</label></div>
	<div class="large-12 medium-12 columns profilUser" > <strong>ville :</strong><label>{{ Auth::user()->town }}</label></div>
	<!--
	<div class="large-12 medium-12 columns profilUser" > <strong></strong><label><a class="btn btn-link" href="{{ asset(route('user.edit',Auth::user())) }}">modifier mon profil </a></label></div>-->

	</div>

	@include('user/userLeft')


	</div>


	@endsection