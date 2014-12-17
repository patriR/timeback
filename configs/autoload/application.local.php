<?php
// Local identities configuration settings on $config variable
$config = array(
	'database'=>array(
	  'Users'=>array(
            'user'=>'php',
            'password'=>'1234',
	        'database'=>'usuarios'),
	   'Timeline'=>array(
	        'user'=>'php',
	        'password'=>'1234',
	        'database'=>'timeline'),
	         
    ),
    'repository'=>'db',
    'adapter'=>'\Core\Adapters\Mysql',
    'filename'=> 'usuarios.txt',
<<<<<<< HEAD
    'default_controller'=>'Timeline',
    'default_id'=>''
=======
    'default_controller'=>'Users',
    'default_action'=>'index'
>>>>>>> 633618991def07fd2fbed7ac34fb3fa3d9697765
);
