@extends("base")
@section('content')
<div  class="large-12 medium-12 columns contentPage" > 
    <div class="titre"><h4> acceuil </h4></div>
    <div  class="large-8 medium-12 columns" style=""> 

        <div  class="slideAcceuil" style="">
            <div class= "accueilSlide .w3-animate-right large-12 medium-12 columns" id="amin1">
                <div  class="large-6 medium-12 columns">
                    <img  class="imgSlide " src="{{ asset('image/accueil.jpg')}}"  />
                </div>
                <div  class="large-6 medium-12 columns">
                    <h5 class=""> EVenement 1 </h5>
                    <p> so good</p>
                </div> 
            </div>

            <div class= "accueilSlide .w3-animate-right large-12 medium-12 columns" id="amin1">
                <div  class="large-6 medium-12 columns">
                    <img  class="imgSlide " src="{{ asset('image/accueil2.jpg')}}"  />
                </div>
                <div  class="large-6 medium-12 columns">
                    <h5 class=""> EVenement 2 </h5>
                    <p> so good</p>
                </div> 
            </div>

            <!--<div class="slogan">
            <p  class="slogenTexte">Slogan </p>
            </div>-->
            <div>
                <a class="k-btn-floating w3-hover-dark-grey btn-left" onclick="plusDivs(-1)">&#10094;</a>
                <a class="k-btn-floating w3-hover-dark-grey btn-right" style="" onclick="plusDivs(1)">&#10095;</a>
            </div>
        </div>

        <div  class=" lastEvent large-6 medium-12 columns" style ="margin-top:1%; " >
            <div>
                <h4> Cane 2016 </h4>
                <img src=" image/cane.jpg" />
                <p> commentaire</p>
            </div>

        </div>

        <div  class="lastEvent large-6 medium-12 columns" style ="margin-top:1%;"  >

            <div>
                <h4> Gala 2016 </h4>
                <img src=" image/gala.jpg" />
                <p> commentaire</p>
            </div>
        </div>
    </div>
    <div  class="contentLeft large-4 medium-12 columns" style ="margin-top:0%;" >
        <div class="actualite">
            <h2 style="magin:0px;"> actualité</h2> 
            <div class="actualiteContent">

            </div>
        </div>

        <div class="inscription">
            <h2> devenir membre</h2> 

        </div>
        <div class="don">
            <h2> faire un don</h2>
        </div>
    </div>


</div>
<div  class="partenaire large-12 medium-12 columns" style="" >
    <div  class=" large-3 medium-12 columns">
        <h3> solimut</h3>
        <a href="http://www.solimut-mutuelle.fr" target="_blank"> <img src="{{asset('image/partenaire/solimut.jpg') }}"  >  </a> 
    </div>
    <div  class="large-3 medium-12 columns" style="">
        <h3> mpayOk</h3>
        <div style=" ">
            <a href="https://www.mpayok.com/fr/" target="_blank"> <img src="{{asset('image/partenaire/mpayok.png') }}"  style="">  </a> 
        </div>
    </div>
    <div  class="large-3 medium-12 columns" style="">
        <h3> rosas</h3>
        <div style="">
            <a href="https://www.facebook.com/collectif.desrosas/" target="_blank"> <img src="{{asset('image/partenaire/rosas.jpg') }}">  </a> 
        </div>
    </div>
    <div  class="large-3 medium-12 columns">
        <h3> Aumônerie Jer'Aum</h3> 
        <a href="http://jeraum.over-blog.com" target="_blank"> <img src="{{asset('image/partenaire/aumoneriejeraum.jpg') }}">  </a>
    </div>
</div>

<div  class="mailChimAll large-12 medium-12 columns">


</div>





<script>

    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }


    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("accueilSlide");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }

    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("accueilSlide");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        var x = "anim" + myIndex;


        setTimeout(carousel, 5000); // Change image every 2 seconds

    }

</script>
@endsection