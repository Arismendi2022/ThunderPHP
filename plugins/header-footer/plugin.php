<?php

add_action('controller', function(){
 dd($_POST);

});

add_action('view', function(){

  echo "<form method='post' style='width:400px;margin:auto;text-align:center;margin-top:50px'> 
  <h2>Login</h2>
  <input placeholder='email' name='email' /><br>
  <input placeholder='password' name='password'/><br>
  <button>Login</button>
  </form>";

});

add_action('before_view', function(){

  echo "<center><div><a href=''>Home </a> . About us . Contact us</div></center>";

});
