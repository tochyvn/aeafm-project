<?php 
namespace App;
use Illuminate\Support\Facades\DB;

class Commun 
{
public static function msgRecive($id){
          $messagesRecive=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.sender_id=users.id and Messageries.lu=0 ')
                  ->where('Messageries.recipient_id',$id);
     
            })->get();
           return $messagesRecive;
  
}
public static function msgSend($id){
                   //dd($messagesRecive);       
                //liste de ceux à qui j'ai envoyé un message 
           $messagesSend=    DB::table('users')
            ->whereExists(function ($query) use( $id)  {
            $query->select(DB::raw(1) )
                  ->from('messageries')
                  ->whereRaw('Messageries.recipient_id=users.id ')
                  ->where('Messageries.sender_id',$id);
     
            })->get();
             $domaine = DB::select('select * from aides ,users, domaines where  domaines.id=aides.domaine_id and aides.user_id=users.id and users.id = ?' , [$id]);
           return $messagesSend;
  
}
public static function domaines(){
                   //dd($messagesRecive);       
                //liste de ceux à qui j'ai envoyé un message 
           
             $domaine = DB::select('select * from  domaines');
           return $domaine;
  
}

public static function domainesAide($id){
 //les domaines dans lequel j'aide
         $domaine = DB::select('select * from aides ,users, domaines where  domaines.id=aides.domaine_id and aides.user_id=users.id and users.id = ?' , [$id]);
}

}

?>