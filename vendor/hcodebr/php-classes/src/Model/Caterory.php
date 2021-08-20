<?php 

namespace Hcode\Model;

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;

class Category extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

	}
	public function save()
	{
	    $sql = new Sql();

    	$results = $sql->select("call sp_users_save(:idcategory, :descategory)", array(
        ":idcategory"=>this->getidcategory(),
        ":descategory"=>this->getdescategory()        
    ));

    $this->setData($results[0]);

}

}
	
 ?>