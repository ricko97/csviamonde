<?php
namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['titre', 'contenu', 'creation'];
    
    protected $validationRules = [
        'titre'     => 'required|max_length[50]',
        'contenu'   => 'required'
    ];
    
    public function get_posts()
	{
	    $db = \Config\Database::connect();
        
        return $db->query('SELECT * FROM posts order by creation DESC')->getResultArray();
	}
	
	public function get_user($username, $password)
	{
	    $db = \Config\Database::connect();
        
        $hash = hash("sha256", $password) ;
        return $db->query('SELECT * FROM users where username="'.$username.'" 
        AND password="'.$hash.'"')->getRowArray();
	}
	
	
	
}