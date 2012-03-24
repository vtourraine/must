<?php

    require_once('src/model/Session.php');
    require_once('src/model/User.php');
    require_once('src/view/MainTemplates.php');
    require_once('src/view/EditTemplates.php');
    require_once('src/controller/LoginController.php');
    require_once('src/controller/SelectionController.php');
    
    define('NUMBER_OF_SELECTIONS', 3);
    
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
        if (SelectionController::isSelectionFormSubmitted($_POST))
        {
            SelectionController::updateSelection($_POST, $session);
        }
        
        SelectionController::echoEditForm($session->username());
    }
    
    MainTemplates::echoMainFooter();
        
?>