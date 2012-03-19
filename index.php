<?php

    require_once('src/model/Session.php');
    require_once('src/model/User.php');
    require_once('src/view/MainTemplates.php');
    
    $session = new Session();
    $session->start();
    
    MainTemplates::echoMainHeader();
        
    if ($session->isLoggedIn())
    {
        echo 'Welcome';
    }
    else
    {
        MainTemplates::echoLoginForm();
    }
    
    MainTemplates::echoMainFooter();
        
?>