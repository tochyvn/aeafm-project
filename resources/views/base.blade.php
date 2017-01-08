<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>base</title>

<!-- Fonts 
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"  media="screen">
<script src="https://maxdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
<!--
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"  media="screen" >

<link href="{{ asset('css/menu.css') }}"   rel="stylesheet" type="text/css"  media="screen">-->

<link href="{{ asset('css/slide.css') }}"   rel="stylesheet" type="text/css"  media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/foundation-6/css/foundation.css') }}"  media="screen"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}"  media="screen"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}"  media="screen"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap/fonts/glyphicons-halflings-regular.eot') }}"  media="screen"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap/fonts/glyphicons-halflings-regular.svg') }}"  media="screen"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap/fonts/glyphicons-halflings-regular.ttf') }}"  media="screen"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap/fonts/glyphicons-halflings-regular.woff') }}" media="screen"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap/fonts/glyphicons-halflings-regular.woff2') }}"  media="screen"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Styles -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/logoaeafm.png')}}"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link href="{{ asset('css/menugauche.css') }}"   rel="stylesheet" type="text/css" media="screen">

<link rel="stylesheet" type="text/css" href="{{asset('css/datetime/datetimepicker.css') }}"/>

<script src="{{ asset('css/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('css/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('css/bootstrap/js/npm.js')}}"></script>
<script src="{{ asset('css/style.js')}}"></script>     


<link href="{{ asset('css/style.css') }}"   rel="stylesheet" type="text/css" media="screen">




<style type="text/css">
.checkbox-inline, .radio-inline {
line-height: 100%;

}
.custom-date-style {
background-color: red !important;
}

.input{ 
}
.input-wide{
width: 500px;
}

</style>
</head>
<body>    
<script src="{{asset('css/datetime/jquery.js')}}"></script>
<script src="{{asset('css/datetime/build/datetimepicker.js')}}"></script> 

<div class="entete" style="">

<div class="headr" style="">


<!--    <div   class="pub" >

<MARQUEE >   <div id="pub">          pour plus de 20h de prestation vous avez  une 1h  gratuite sur touts nos services  </div>                  </MARQUEE>
</div>-->
<div class="contact col-md-12">
<div class="col-md-3 logo">
<div class="logoImage">
<img style="text-align: center; " class="col-md-9" src="{{ asset('image/logoaeafm3.png')}}" alt="Logo AEAFM">
</div>
</div>
<div class="" style="background-color:black;margin-bottom: 1%;">
<div  class="adresse">
<span  class="glyphicon">&#xe182;</span> 
<p> <a class="" href="callto:07 51 56 31 32"> +33(0) 7 51 56 31 32 - 09 52 99 57 </a> <a class=""> Adresse 66, Chemin de la Valbarelle - 13010 Marseille</a>  </p>
</div>
<div class="partarge navbar-header">
<a href="" title="facebook" class=""> <img src="{{ asset('image/facebookp.jpg')}}" alt="icone facebook" /></a> 
<a href="" title="twitter" class=""> <img src="{{ asset('image/twitterp.png')}}" alt=" icone twitter" /></a> 
<a href="" title="linkedin" class=""> <img src="{{ asset('image/linkedinp.png')}}" alt="icone linkedin" /></a> 
</div>  


<div class="menu" style="width: 80%;">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>                        
</button>
<!--<a class="navbar-brand" href="#">WebSiteName</a>-->
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li class="active"><a href="{{ asset('acceuil')}}">Acceuil</a></li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('   #  ')}}">Présentation<span class="caret"></span></a>
<ul class="dropdown-menu">
   <li><a href="{{ asset('Presentation/statut')}}">Statut</a></li>
   <li><a href="{{ asset('Presentation/bureau')}}">Bureau</a></li>
   <!--<li><a href="{{ asset('Membre/aderant')}}">Adérant</a></li>
   <li><a href="{{ asset('Membre/partenaire')}}">Partenaire</a></li>-->
</ul>
</li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('   #  ')}}" >Activité<span class="caret"></span></a>
<ul class="dropdown-menu">
   <li><a href="{{ asset('Activite/culture')}}">Culture</a></li>
   <li><a href="{{ asset('type-formation')}}">Education</a></li>
   <li><a href="{{ asset('Activite/sport')}}">Sport</a></li>

</ul>
</li>
@if (Auth::check())
<li class="dropdown" >
<a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('   #  ')}}" >message <span class="caret"></span></a>
<ul class="dropdown-menu" style="max-height: 300px; overflow-x: hidden;">
@foreach ($messagesRecive as $value)
   <li><a href="{{ asset(route('messagerie.show',$value->id))  }}">{{ $value->name}}</a></li>     
  @endforeach             
</ul>
</li>
@endif
<li><a href="{{ asset('contact') }}">Contact</a></li>

</ul>
<ul class="nav navbar-nav navbar-right">
@if (Route::has('login'))
@if (Auth::check())
<li class="dropdown">
<a  class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('login')}}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a>
<ul class="dropdown-menu">
   <li><a href="{{ asset('Admin/user')}}"><span class="glyphicon"></span> Mon espace</a></li>
   <li><a href="{{ asset('deconnexion')}}"><span class="glyphicon"></span> deconnexion</a></li>
</ul>
</li>

@else
<li class="dropdown">
<a  class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('login')}}"><span class="glyphicon glyphicon-user"></span> </a>
<ul class="dropdown-menu">

   <li><a  href="{{ asset('Admin/user')}}"><span class="glyphicon lyphicon-log-in"></span> connexion </a></li>
   <li><a href="{{ asset('register')}}"><span class="glyphicon"></span> inscription</a></li>
</ul>
</li>
@endif
@endif
</ul>
</div>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>
<div class=" large-12 medium-12 columns content" style="">

@yield('content')

</div> 

<div class="large-12 medium-12 columns footer">

<div class="large-3 medium-12 columns">
<li class="active"><a href="#">Acceuil</a></li>
</div>
<div class="large-3 medium-12 columns">
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Membre<span class="caret"></span></a>

<li><a href="#">Bureau</a></li>
<li><a href="#">Adérant</a></li>
<li><a href="#">Partenaire</a></li>

</li>
</div>
<div class="large-3 medium-12 columns">
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Activité<span class="caret"></span></a>

<li><a href="#">Culture</a></li>
<li><a href="#">Education</a></li>
<li><a href="#">Sport</a></li>


</li>

</div>
<div class="large-3 medium-12 columns">
<li><a href="#">Contact</a></li>
</div>

</div>

<script>/*
window.onerror = function(errorMsg) {
$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value: '2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function (e) {
$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function (e) {
$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart: 1,
lang: 'en',
disabledDates: ['1986/01/08', '1986/01/09', '1986/01/10'],
startDate: '1986/01/05'
});
$('#datetimepicker').datetimepicker({value: '2015/04/15 05:03', step: 10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
formatTime: 'H:i',
formatDate: 'd.m.Y',
//defaultDate:'8.12.1986', // it's my birthday
defaultDate: '+03.01.1970', // it's my birthday
defaultTime: '10:00',
timepickerScrollbar: false
});

$('#datetimepicker10').datetimepicker({
step: 5,
inline: true
});
$('#datetimepicker_mask').datetimepicker({
mask: '9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
datepicker: false,
format: 'H:i',
step: 5
});
$('#datetimepicker2').datetimepicker({
yearOffset: 222,
lang: 'ch',
timepicker: false,
format: 'd/m/Y',
formatDate: 'Y/m/d',
minDate: '-1970/01/02', // yesterday is minimum date
maxDate: '+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
inline: true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function () {
$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function () {
$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function () {
$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
datepicker: false,
allowTimes: ['12:00', '13:00', '15:00', '17:00', '17:05', '17:20', '19:00', '20:00'],
step: 5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function () {
if ($('#datetimepicker6').data('xdsoft_datetimepicker')) {
$('#datetimepicker6').datetimepicker('destroy');
this.value = 'create';
} else {
$('#datetimepicker6').datetimepicker();
this.value = 'destroy';
}
});
var logic = function (currentDateTime) {
if (currentDateTime && currentDateTime.getDay() == 6) {
this.setOptions({
minTime: '11:00'
});
} else
this.setOptions({
minTime: '8:00'
});
};
$('#datetimepicker7').datetimepicker({
onChangeDateTime: logic,
onShow: logic
});
$('#datetimepicker8').datetimepicker({
onGenerate: function (ct) {
$(this).find('.xdsoft_date')
.toggleClass('xdsoft_disabled');
},
minDate: '-1970/01/2',
maxDate: '+1970/01/2',
timepicker: false
});
$('#datetimepicker9').datetimepicker({
onGenerate: function (ct) {
$(this).find('.xdsoft_date.xdsoft_weekend')
.addClass('xdsoft_disabled');
},
weekends: ['01.01.2014', '02.01.2014', '03.01.2014', '04.01.2014', '05.01.2014', '06.01.2014'],
timepicker: false
});
var dateToDisable = new Date();
dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
beforeShowDay: function (date) {
if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
return [false, ""]
}

return [true, ""];
}
});
$('#datetimepicker12').datetimepicker({
beforeShowDay: function (date) {
if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
return [true, "custom-date-style"];
}

return [true, ""];
}
});
$('#datetimepicker_dark').datetimepicker({theme: 'dark'})


</script>






</body>



</html>
