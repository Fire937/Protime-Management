<!DOCTYPE html>
<html>
    
  <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css" />
 </head>
    <div>  
        <header>
                <div id="logpage">
                </div>
                    <div>
                            <center>   
                                    <img alt="Logo" src="LOGOx.png" width="400" height="150" style="margin-left :0px;"> 
                           </center>                    
                 </div> 
        </header>
    </div>
  <div>       
     <form action="Ecran-login-php.php" method="POST">
            <div>
                <label> Identifiant : <input type="text" name="log" placeholder="login"/></label>
            </div>
                <div>
                    <label> Mot de passe : <input type="password" name="mdp" placeholder="mdp"/></label> 
                </div>
            <div> 
                <input type="submit" name="valider" value="connexion" />
                <a href="ah.php"> Mot de passe oublié?</a>
            </div>
      </form>
  </div> 
      <div>
          <footer></footer>
    </div>
</html>
             
     