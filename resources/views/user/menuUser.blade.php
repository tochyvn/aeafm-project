<div class="large-2 medium-12 columns userLeftMin"  > 
    <div class="large-2 medium-12 columns" style=" ">
        {!! Form::open(array('method'=>'get', 'url' =>   asset('recherche'))) !!}
        <div width="" class="input-group stylish-input-group form-group" >
            {!! Form::text('search', null, 
            array('required', 
            'class'=>'form-control', 'id'=>'search',
            'placeholder'=>'recherche de l\'aide')) !!}

            <span class="input-group-addon" >
                <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>  
            </span>
        </div>   
        {!! Form::close() !!}

    </div>
</div>

<div class="large-2 medium-12 columns menugauche" style="">
    <nav class="large-2 medium-12 columns" >
        <ul id="menugauche" class="" style="">
            <li>
                <a class="" data-toggle="" href="{{asset('#')}}">formation<span class="caret"></span></a>
               
                @foreach($typeFormation as $type)
                  @php  Session::flash('verifx','kmo'); @endphp 
                <ul class="nav navbar-nav">  
                    <li class="">
                        <a class="" data-toggle="" href="{{asset(route('type-formation.show',$type))}}">{{$type->name}}<span class="caret"></span></a>

                        @foreach($formation as $keyFormation)
                        @if($type->id==$keyFormation->type_id)
                        <ul class="">
                            <li><a href="{{ asset(route('formation.show',$keyFormation))}}">
                                    {{$keyFormation->name}}</a></li>

                        </ul>
                        @endif
                        @endforeach
                    </li>
                </ul>
                @endforeach
            </li>
            @if(Auth::check())
            @php
            $id=Auth::user()->id;
            @endphp

            <li>
                <a class="" data-toggle="" href="{{ asset('profil')}}">profil</a>
            </li>
            @endif

            <ul class="nav navbar-nav min">  
                <li class="">
                    <a class="" data-toggle="" href="{{asset('#')}}">soutien scolaire<span class="caret"></span></a>
                    @php  $first=0; @endphp<ul>
                    @foreach($domaine as $value)  
                                @php  $first=0; @endphp
                         
                     @foreach ($aide as $key)
                            @if ($loop->first)
                                @php  $first=1; @endphp
                              @endif                     
                     
                        @if($first==0)
                        
                        <li>  <a href="{{asset(route('user.create'))}}">aide</a></li>
                        @php $first=1;@endphp
                        @endif
                        <li><a href="{{asset(route('aide-scolaire.show',$value))}} ">
                        {{$value->name}}</a></li>
                      @endforeach
                    @endforeach
                    @if($first==0)
                     <li>  <a href="{{asset(route('user.create'))}}">aide</a></li>
                     
                      @php $first=1;@endphp
                    @endif
                  </ul>
                </li>
            </ul>
        </ul>
    </nav> 

               
</div>



