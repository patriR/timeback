<?php
namespace Core\Router;

use Core\Application\Application;

/**
 * @return array request ( 'controller' =>
 *                         'action' =>
 *                         'id' => );         
 */
class ParseUrl
{
    public static function parseURL()
    { 
        $url = trim($_SERVER['REQUEST_URI'], '/');       
        $parts = explode('/', $url);
        
        if ($url == '') 
        {
            $controller = Application::getConfig()['default_controller'];
            $action = Application::getConfig()['default_action'];
            $id = null;
           
        } 
        else 
        {
            if(count($parts) <= 2)
            {
                $controller = $parts[0];
                $controller_file = $_SERVER['DOCUMENT_ROOT']."/../Modules/Application/Src/Application/Controllers/$controller.php";

                if (file_exists($controller_file)) {
                    
                    if (isset($parts[1])) 
                    {
                        $action = Application::getConfig()['default_action'];
                        $id = $parts[1];
                    } 
                    else 
                    {
                        $action = Application::getConfig()['default_action'];
                        $id = null;
                    }

                } 
                else 
                {
                    // No controller found
                    $controller = "Error";
                    $action = "error_404";
                    $id = null;
                }
            }
            else
            {
                //Wrong url
                $controller = "Error";
                $action = "error_400";
                $id = null;
            }        
        }
         
        return [
            'controller' => $controller,
            'action' => $action, 
            'id' => $id
           
        ];    
    }
}