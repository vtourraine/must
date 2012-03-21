<?php

    require_once('src/model/Session.php');
    require_once('src/model/User.php');
    require_once('src/view/MainTemplates.php');
    require_once('src/view/EditTemplates.php');
    require_once('src/controller/LoginController.php');
    require_once('src/controller/SelectionController.php');
    
    $session = new Session();
    $session->start();
    
    MainTemplates::echoMainHeader();
    
    if (!$session->isLoggedIn())
    {
        if (LoginController::isLoginFormSubmitted($_POST))
        {
            if (LoginController::logIn($_POST, $session))
            {
            }
            else
            {
                MainTemplates::echoLoginForm();
            }
        }
        else
        {
            MainTemplates::echoLoginForm();
        }
    }
    if ($session->isLoggedIn())
    {
        SelectionController::echoEditForm($session->username());
    }
    
    MainTemplates::echoMainFooter();
        
?>