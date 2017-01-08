@extends("admin/admin")
@section('contentUser')
<div  class="large-12 medium-12 columns" style="min-height: 500px;">
    <div class="titre"><h4> Bienvenu dans votre espace {{ Auth::user()->name }}</h4></div>
    @include('../user/menuUser')
    <div class="large-8 medium-12 columns contentUser" >
        @if (Session::has('success'))
        <span class="help-block success">
            <strong>{{ Session::get('success')}}</strong>
        </span>
        @endif

       
      
      <form id="formMsg">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="large-3 medium-12 columns box" style="margin:0; padding: 0;border: 1px solid red; position: fixed;"> 
        
            <div class="boxClose large-12 medium-12 columns allBox" style="margin:0; padding: 0; border: 1px solid blue;  margin-top: ;">
               <div class="large-12 medium-12 columns " style="margin:0; padding: 0;">
                    <div class="tete">
                      <span class="glyphicon glyphicon-remove fermer close"></span>  
                      <span class="glyphicon glyphicon-unchecked   ouvrir close"></span>  
                        <span class="glyphicon glyphicon-minus mini close" ></span> 

               </div>
                </div>
                <div class="contentBox" style=" width: padding: 0; margin: 0;"> 
                <div class="large-12 medium-12 columns" style=" width: padding: 0; margin: 0; ">
                    <div id="" class="contentMessageOld" style="padding: 0; margin: 0; overflow-x: hidden;
                         overflow-y:; min-height: 200px;"> 

                  @foreach ($allMessage as $value)
                          @if($value->sender_id==Auth::user()->id)
                        <p class="recive">
                            {{ $value->message}}  </p>
                           @else
                        <p class="emit" > 
                         {{ $value->message}} </p>
                           @endif
                
                    @endforeach
                    </div>
                    {!! Form::hidden('sender_id',Auth::user()->id,array('class'=>'sender_id'))  !!}
                    @foreach ($user_recipient as $value)
                    {!! Form::hidden('recipient_id',$value->id,array('class'=>'recipient_id') ) !!}
                
                    @endforeach

                 

                    <div id="" class=" large-12 medium-12 columns contentMessage"  contenteditable="true"  id="message" style="padding: 0; margin: 0;   overflow-x: hidden;
                         overflow-y:; width: 90%;  float: left; border: 1px solid #66d9ef; " > 
                        
                    </div>

                  
                </div>

                <div class="pied large-12 medium-12 columns">  <button type="submit" value="Valider" class="submit"> <span class="glyphicon glyphicon-send "></span> </button></div>

                <!--{!! Form::hidden('message',null,array('id'=>'messageCont') ) !!}-->

                </div>
            </div>
        </div>
         </form>

    </div>

    @include('../user/userLeft')

</div>
<script type="text/javascript">   

$(document).ready(function(){

$('#formMsg').on('submit',function(e){
  var url='{{route('messagerie.store')}}';
  var msg = document.createElement("INPUT");
    msg.setAttribute("type", "text");
     msg.setAttribute("name", "message");
    var content = $('.contentMessage').html();
   msg.setAttribute("value",content);
   msg.setAttribute("type","hidden");

  var str1="<div> </div> " ;
  var n=str1.localeCompare(content);

  document.getElementById("formMsg").appendChild(msg);
 
  if(n==1){
  
    $('.contentMessage').css("border","1px solid red");
  }
  

    $.ajax({
      type:"POST",
      url:url,
      data: {'_token': $('input[name=_token]').val(),
         'sender_id': $('input[name=sender_id]').val(),
         'recipient_id': $('input[name=recipient_id]').val(),
         'message': $('input[name=message]').val()},
     
      success: function(data){
         console.log(data);
         var task = '<tr id="task' + data.sender_id + '"><td>' + data.recipient_id + '</td><td>' + data.message + '</td><td>' + data.description + '</td>';
         document.getElementById("emit").append(task);

      }

    });
    
  }); 
});


$('.fermer').click(function(){
        $('.boxClose').slideUp();
          
        });
        
$('.mini').click(function(){
        $('.contentBox').fadeOut(0);
           $('.allBox').css("margin-top","450px");
        });
$('.ouvrir').click(function(){
        

          $('.allBox').css("margin-top","150px");
        $('.contentBox').slideDown(1000);
        });
    $(document).on('submit', '.form-delete', function () {
        return confirm('confirm  suppression');
    });

    $('form').keypress(function(e){
    if( e.which == 13 ){
        console.log("Vous avez appuyé sur la touche entrée.");
    }

});
</script>

<style type="text/css">
.box{
   top: 300px;
   left:750px;
   width: 300px;

}
    .message{
        width: 350px;
        border: 1px solid #66d9ef;


    }	
    #message{
        
    

    } 
    .message>div{
        display: block;
        position: fixed;
        width: 300px;
        line-height: 14px;
        
         
         

    }
    .tete{
        background-color: #66d9ef;
       
        margin:0; padding: 0;
        height: 20px;


    }

    .pied{
        border: 1px solid #66d9ef;
        


    }
    .ouvrir{
         cursor: pointer;
        display: inline-block;
        float: right;
        font-size: 21px;

        line-height: 1;
        color: #222;
        font-size: 15px;
    }
    .mini{
        cursor: pointer;
        display: inline-block;
        float: right;
        font-size: 21px;

        line-height: 1;
        color: #222;
        font-size: 15px;
    }

    .fermer{
        cursor: pointer;
        display: inline-block;
        float: right;
        color: #222;
        font-size: 15px;
    }
    .footer{
        display: none;
    }
    .contentMessage{
        height: 50px;
        overflow-x: hidden;
        overflow-y: ; 
        margin-right: 1%;
       
        color: red;
        float: left;
    }
    .contentMessageOld{
        height: 236px;

    }
    .recive{
        background-color: #00ff80;
        border-radius: 0px 30px 0px 30px;
        margin-bottom: 2%;
        margin: 1% 9% 2% 6%;
        font-size: 14px;
        font-family: "Times New Roman", Times, serif; 
        padding: 3%;
        line-height: 10px;
        text-align: justify;
    }
    .emit{
        background-color: #ffd500;
        font-size: 14px;
        font-family: "Times New Roman", Times, serif; 
        padding: 3%;
       
         line-height: 10px;
        text-align: justify;
        margin: 1% 9% 2% 6%;

        border-radius: 0px 30px 0px 30px;
    }
    .submit{
        cursor: pointer;
        display: inline-block;
        float: right;
        font-size: 21px;

        line-height: 1;
        color: #222;
        font-size: 15px;
        color: #66d9ef;

    }
</style>
@endsection

