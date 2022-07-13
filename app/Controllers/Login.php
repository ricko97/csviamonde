<?php

namespace App\Controllers;
use App\Models\BlogModel;

class Login extends BaseController
{
    
    protected $session;


    function __construct()
    {

        $this->session = session();


    }
	
    public function login()
    {
        if ($this->session->has('user')){
            return redirect()->to('/accueil');
        }
		return view('login');
    }
    
    public function logout()
    {
        if ($this->session->has('user')){
            $this->session->remove('user');
            return redirect()->to('/');
        }
		return view('login');
    }
    
    public function connexion()
    {
	    $username =  $this->request->getVar('username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password =  $this->request->getVar('password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $m_blog = new BlogModel();
        $user = $m_blog->get_user($username, $password);
        
        if($user == NULL){
            $this->session->setFlashdata('error_login', '<p class="alert alert-danger">Identifiants incorrects!</p>');
            return redirect()->to('/');
        }else{
            $this->session->set('user', $user);
            return redirect()->to('/accueil');
        }
         
    }
    
}
