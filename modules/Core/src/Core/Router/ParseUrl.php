<?php
namespace Core\Router;

use Core\Application\Application;

/**
 * @return array request ( 'controller' =>
<<<<<<< HEAD
 *                         'id' =>
 *                         'params' => array( 'param1' => 'value1'
 *                                            'param2' => 'value2'  
 *                                                .............          
=======
 *                         'action' =>
 *                         'id' => );         
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
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
<<<<<<< HEAD
            $action = Application::getConfig()['default_id'];
            $params = [];
=======
            $action = Application::getConfig()['default_action'];
            $id = null;
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
           
        } 
        else 
        {
            if(count($parts) >= 2)
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
<<<<<<< HEAD
            'id' => $action, 
            'params' => $params
=======
            'action' => $action, 
            'id' => $id
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
        ];    
    }
}