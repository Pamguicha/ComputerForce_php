 <?php
   
 function displayMessage () {
      if(isset($_POST ["username"])) {
         return "Your username is" . $_POST['username'];
      }
      
 } 
 $message = displayMessage ();

?>