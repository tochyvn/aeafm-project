
<div class="large-2 medium-12 columns userLeft"  > 
    <div class="large-2 medium-12 columns" style=" ">
        {!! Form::open(array('method'=>'get', 'url' =>   asset('recherche'))) !!}
        <div width="" class="input-group stylish-input-group form-group" >
            {!! Form::text('search', null, 
            array('required', 
            'class'=>'form-control', 'id'=>'search',
            'placeholder'=>'recherche de l\'aide')) !!}
            {!! Form::hidden('user_id', Auth::user()->id ) !!} 
            <span class="input-group-addon" >
                <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>  
            </span>
        </div>   
        {!! Form::close() !!}

    </div>
</div>

</div>
<style type="text/css">
    .stylish-input-group .input-group-addon{
        background: white !important; 
    }
    .stylish-input-group .form-control{
        border-right:0; 
        box-shadow:0 0 0; 
        border-color:#ccc;
        height: 38px;
    }
    .stylish-input-group button{
        border:0;
        background:transparent;

    }
    .input-group{
        z-index: 0;
    }
</style>
