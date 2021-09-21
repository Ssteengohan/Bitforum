<?php
function navbar() {
        echo "
        <html lang='en'>
        
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='style.css'>
            <script src='script.js'></script>
            <title>Bit Forum</title>
        </head>
        
        <body class='body'>
        
            <div class='boven' id='hidenavbar'>
                <div class='navbar'>
        
                    <div>
                        <a href=website.php>
                        <img class='image' src='logo_small.png'>
                        </a>
                    </div>
        
                    <div class='zoekbalk'>
                    <form action='' method='POST'>
                    <input type='text' class='zoekbalk'  name='search'>
                    <button type='submit' name='net' class='zoek'>Search</button>
                    </form>
                    </div>
        
                    <div class='inloggen'>
                        <div class='knoppen'>
                            <form action='' method='POST'>
                            <a class='login' href='login.php'>Login</a>
                            <a class='registreer' href='Registreer.php'>Registreer</a>
                              </form>            
                        </div>
        
                        <div class='float_right'>
                            <li class='navigationbar_li navigationbar_li_right'><a class='navigationbar_a' href='#'><img
                                        class='png mens' src='outline_account_circle_white_24dp.png'><img
                                        class='png arrow' src='outline_arrow_drop_down_white_24dp.png'></a>
                                <ul style='list-style-type:none' class='dropdown_ul'>
                                    <li class='dropdown_li'><a class='dropdown_a'>Link 1</a>
                                    </li>
                                    <li class='dropdown_li'><a class='dropdown_a'>Link 2</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        
            <div>
            </div>
        
            <div>
            </div>
        
        </body>
        
        </html>";
}
        
function loggednavbar($connect) {
            echo "
            <html lang='en'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='style.css'>
                <script src='script.js'></script>
                <title>Bit Forum</title>
            </head>
            
            <body class='body'>
            
                <div class='boven' id='hidenavbar'>
                    <div class='navbar'>
            
                        <div>
                            <a href=website.php>
                            <img class='image' src='logo_small.png'>
                            </a>
                        </div>
            
                        <div class='zoekbalk'>
                        <form action='' method='POST'>
                        <input type='text' class='zoekbalk'  placeholder='Search...' name='search'>
                        <button type='submit' name='net' class='zoek'>Search</button>
                        </form>
                        </div>
            
                        <div class='inloggen'>
                            <div class='knoppen'>
                            <form method='POST' action='".userlogout($connect)."'>
                                
                            <button type='submit' class='logout' name='logoutsubmit'>Uitloggen</button>
                                  </form>            
                            </div>
            
                            <div class='float_right'>
                            <li class='navigationbar_li navigationbar_li_right'><a class='navigationbar_a' href='#'><img
                                        class='png mens' src='outline_account_circle_white_24dp.png'><img
                                        class='png arrow' src='outline_arrow_drop_down_white_24dp.png'></a>
                                <ul style='list-style-type:none' class='dropdown_ul'>
                                    <li class='dropdown_li'><a class='dropdown_a'>Link 1</a>
                                    </li>
                                    <li class='dropdown_li'><a class='dropdown_a'>Link 2</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                        </div>
                    </div>
                </div>
            
                <div>
                </div>
            
                <div>
                </div>
            
            </body>
            
            </html>";
}     
function logged($connect) {
    echo "
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
        <script src='script.js'></script>
        <title>Bit Forum</title>
    </head>
    
    <body class='body'>
    
        <div class='boven' id='hidenavbar'>
            <div class='navbar'>
    
                <div>
                    <a href=website.php>
                    <img class='image' src='logo_small.png'>
                    </a>
                </div>
    
                <div class='zoekbalk'>
            
                </div>
    
                <div class='inloggen'>
                    <div class='knoppen'>
                        <form action='' method='POST'>
                        <a class='login' href='login.php'>Login</a>
                        <a class='registreer' href='Registreer.php'>Registreer</a>
                          </form>            
                    </div>
    
                    <div class='float_right'>
                        <li class='navigationbar_li navigationbar_li_right'><a class='navigationbar_a' href='#'><img
                                    class='png mens' src='outline_account_circle_white_24dp.png'><img
                                    class='png arrow' src='outline_arrow_drop_down_white_24dp.png'></a>
                            <ul style='list-style-type:none' class='dropdown_ul'>
                                <li class='dropdown_li'><a class='dropdown_a'>Link 1</a>
                                </li>
                                <li class='dropdown_li'><a class='dropdown_a'>Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    
        <div>
        </div>
    
        <div>
        </div>
    
    </body>
    
    </html>";
}   

function postlogged($connect) {
    echo "
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
        <script src='script.js'></script>
        <title>Bit Forum</title>
    </head>
    
    <body class='body'>
    
        <div class='boven' id='hidenavbar'>
            <div class='navbar'>
    
                <div>
                    <a href=website.php>
                    <img class='image' src='logo_small.png'>
                    </a>
                </div>
    
    
                <div class='inloggen'>
                    <div class='knoppen'>
                    <form method='POST' action='".userlogout($connect)."'>
                        
                    <button type='submit' class='logout' name='logoutsubmit'>Uitloggen</button>
                          </form>            
                    </div>
    
                    <div class='float_right'>
                        <li class='navigationbar_li navigationbar_li_right'><a class='navigationbar_a' href='#'><img
                                    class='png mens' src='outline_account_circle_white_24dp.png'><img
                                    class='png arrow' src='outline_arrow_drop_down_white_24dp.png'></a>
                            <ul style='list-style-type:none' class='dropdown_ul'>
                                <li class='dropdown_li'><a class='dropdown_a'>Link 1</a>
                                </li>
                                <li class='dropdown_li'><a class='dropdown_a'>Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    
        <div>
        </div>
    
        <div>
        </div>
    
    </body>
    
    </html>";
}

function sidenavbar() {
    echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sidebar Dashboard Template</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>


    <div class="sidebar">
      <center>
    
      </center>
      <a href="profiel.php"><i class="fas fa-user-circle"></i><span class="logo">'.$_SESSION['username'].'</span></a>
      <a href="#"><i class="fas fa-comment"></i><span class="logo">FAQ</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span class="logo">About</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span class="logo">Settings</span></a>
     
  </label></center>
    </div>
    <!--sidebar end-->

    <div class="content"></div>

  </body>
</html>';
}
function sidenavbar1() {
    echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sidebar Dashboard Template</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>


    <div class="sidebar">
      <center>
    
      </center>
      <a href="login.php"><i class="fas fa-user-circle"></i><span class="logo">Login</span></a>
      <a href="#"><i class="fas fa-comment"></i><span class="logo">FAQ</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span class="logo">About</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span class="logo">Settings</span></a>
     
  </label></center>
    </div>
    <!--sidebar end-->

    <div class="content"></div>

  </body>
</html>';
}
function background($connect) {
echo '<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<link rel="stylesheet" href="https://codepen.io/P1N2O/pen/xxbjYqx.css"><link rel="stylesheet" href="background.css">

</head>
<body>





</body>
</html>';
}
?>
