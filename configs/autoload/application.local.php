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
    'default_controller'=>'Timeline',
    'default_id'=>''
);
