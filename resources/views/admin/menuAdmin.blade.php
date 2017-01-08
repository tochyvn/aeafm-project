<div class="large-2 medium-12 columns menuAdmin">
@if (Route::has('login'))
@if (Auth::check())
@if (Auth::user()->role==5)

<nav class="navbar navbar-inverse large-2 medium-12" style="position: fixed;" >
  <div class="conainer-fluid ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarAdmin">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbarAdmin">
      <ul class="nav navbar-nav">  

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('   #  ')}}">type formarion <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
          <li><a href="{{ asset('type-formation/create')}}">ajouter</a></li>
        <li><a href="{{ asset('type-formation')}}">Modifier</a></li>
            
          </ul>
           
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('   #  ')}}">formarion <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
          <li><a href="{{ asset('formation/create')}}">ajouter</a></li>
        <li><a href="{{ asset('formation')}}">Modifier</a></li>
            
          </ul>
           
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('   #  ')}}">domaine <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
          <li><a href="{{ asset('domaine/create')}}">ajouter</a></li>
        <li><a href="{{ asset('domaine')}}">Modifier</a></li>
            
          </ul>
           
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('   #  ')}}">niveau  d'étude <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
          <li><a href="{{ asset('niveau-etude/create')}}">ajouter</a></li>
        <li><a href="{{ asset('niveau-etude')}}">Modifier</a></li>
            
          </ul>
           
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="{{ asset('#')}}">statut <span class="caret"></span></a>
          
          <ul class="dropdown-menu">
          <li><a href="{{ asset('statut/create')}}">ajouter</a></li>
        <li><a href="{{ asset('statut')}}">Modifier</a></li>
            
          </ul>
           
        </li>
       
</ul>
</div>
</div>
</nav>

@endif @endif @endif
            
</div>
       