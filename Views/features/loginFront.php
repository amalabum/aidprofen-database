<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/applets/assets/css/customised-style/style.css">
    <title>aidprofen data manager</title>
</head>
<body>
    <div class="app app2">
        <div class="block_left" style="background-image: url('Views/applets/assets/images/pdis.webp');background-repeat: no-repeat;background-size: cover;" >
            <!-- <img src="Views\images\pdis.webp" alt="" width="100%"> -->
             <div class="enseign_container">
                <div class="domaine">Data Base Manager</div> 
                <div  class="continent"> aidprofen.</div>               
             </div>
        </div>
        <div class="block_right"> 
                          
            <form id="loginForm" class="formulaire">
            <h4 class="h4">Admin Space.</h4> 
                    <label for="username">Nom d'utilisateur ou email</label>
                    <input class="input_login" id="username" type="text"  name="username" placeholder="Ex : eliezer ou eliezek58@gmail.com" required> 
                    <label for="password">Mot de pass</label>
                    <input class="input_login" id="password" type="password"  name="password" placeholder="************" required>  
                    <div id="result">
                    </div>
                    <button type="submit" name="login">
                        Se connecter
                    </button>          
            </form>     
            
        </div>
    </div>
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <!-- Script Ajax pour le formulaire de connexion -->
    <script src="assets/js/script_login.js"></script>
</body>
</html>