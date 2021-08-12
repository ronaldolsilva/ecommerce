<?php 

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
 /*   
	$sql = new Hcode\DB\slq();
	$results = $sql->select ("select * from tb_users");
	
    echo json_encode($results);
*/
    $page = new Page();
    $page->setTpl("index");

});

$app->get('/admin', function() {

    User::verifyLogin();

    $page = new PageAdmin();
    $page->setTpl("index");

});

$app->get('/admin/login', function() {

    $page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);
    
    $page->setTpl("login");

});

$app->post('/admin/login', function() {

    user::login($POST["login"], $POST["password"]);

    header("Location: /admin");

    exit;
});

$app->run();

 ?>