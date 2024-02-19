<?php

if(isset($success_msg)){
   foreach($success_msg as $success_msg){
      echo '<script>swal("'.$success_msg.'", "" ,"Sukses");</script>';
   }
}

if(isset($warning_msg)){
   foreach($warning_msg as $warning_msg){
      echo '<script>swal("'.$warning_msg.'", "" ,"Paralajmërim");</script>';
   }
}

if(isset($info_msg)){
   foreach($info_msg as $success_msg){
      echo '<script>swal("'.$info_msg.'", "" ,"Informacion");</script>';
   }
}

if(isset($error_msg)){
   foreach($error_msg as $error_msg){
      echo '<script>swal("'.$error_msg.'", "" ,"Gabim");</script>';
   }
}

?>
