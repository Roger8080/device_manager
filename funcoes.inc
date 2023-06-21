 
 <?php {

 function icones($x){
        if ($x == 0){
            return "<i class=\"bi bi-x-circle\" style=\"color:red\"></i>";
                } else{
                return"<i class=\"bi bi-check2-circle\" style=\"color:green\"></i>";
         }
    }
}




function checkboxes($x){
    if ($linha == cabo){
        $name = $linha;
    }

     if ($x == 0){
         return "<input type=\"checkbox\" unchecked id=\"$name\" ><label>$name</label>";
            } else{
         return"<input type=\"checkbox\" checked id=\"$name\" ><label>$name</label>";
     }
 }
  


 


?>
   


   


