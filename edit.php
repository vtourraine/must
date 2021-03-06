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
    //$session->logOut();
    
    MainTemplates::echoMainHeader();
    
    if ($session->isLoggedIn())
    {
        if (SelectionController::isSelectionFormSubmitted($_POST))
        {
            SelectionController::updateSelection($_POST, $session);
        }
        
        SelectionController::echoEditForm($session->username());
        SelectionController::echoCurrentSelection($session->username());
    }
    
    MainTemplates::echoMainFooter();
        
?>