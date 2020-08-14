<?

if ( $_SERVER['REQUEST_URI'] == '/' ) {
$page = 'home';
}else {
 $page = substr($_SERVER['REQUEST_URI'],1);
 if ( !preg_match('/^[A-z0-9]{3,15}$/', $page) ) exit('error url');
}

session_start();

if ( file_exists('all/'.$page.'.php') ) include 'all/'.$page.'.php';

else if ( $_SESSON['ulogin'] == 1 and file_exists('auth/'.$page.'.php') ) include 'auth/'.$page.'.php';

else if ( $_SESSON['ulogin'] != 1 and file_exists('guest/'.$page.'.php') ) include 'guest/'.$page.'.php';

function top( $title ){
    echo '<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title>'.$title.'</title>
    <link rel="stylesheet" href="style.css"
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    
    <body>
    <div class="wrapper">
    <div class="menu">
    <a href="/">Главная</a>
    <a href="login">Вход</a>
    <a href="/register">Регистрация</a>
    </div>

    <div class="content">
    <div class="block">
    ';
}

function bottom(){
    echo '
    </div>
    </body>
    </html>';
}
?>