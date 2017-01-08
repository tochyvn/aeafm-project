<?php
 //trouver les domaines dans les quels j'ai proposé mon aide
             $domaine = DB::select('select * from aides ,users, domaines where  domaines.id=aides.domaine_id and aides.user_id=users.id and users.id = ?' , [$id]);
         
          

?>