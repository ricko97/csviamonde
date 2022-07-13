<?php

namespace App\Controllers;
use App\Models\BlogModel;

class Blog extends BaseController
{
    
    protected $session;


    function __construct()
    {

        $this->session = session();
    }
	
    public function index()
    {
        $m_blog = new BlogModel();
        $data['posts'] = $m_blog->get_posts();
		return view('index', $data);
    }
    
    
    public function ajouter()
    {
        return view('ajouter');
    }
    
    public function ajouterPost(){
       $titre =  $this->request->getVar('titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $contenu =  $this->request->getVar('contenu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
       $data = [
            'titre' => $titre,
            'contenu'    => $contenu,
            'creation' => time()
        ];
        $m_blog = new BlogModel();
        $m_blog->insert($data);
        return redirect()->to('/accueil'); 
        
    }
    
    public function modifier($id)
    {
        $m_blog = new BlogModel();
        $data['post'] = $m_blog->find($id);
        if ($data['post'] == null){
            return redirect()->to('/accueil'); 
        }
        return view('modifier', $data);
    }
    
    public function modifierPost($id){
       $titre =  $this->request->getVar('titre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $contenu =  $this->request->getVar('contenu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
       $data = [
            'titre' => $titre,
            'contenu' => $contenu
        ];
        $m_blog = new BlogModel();
        $m_blog->update($id, $data);
        return redirect()->to('/accueil'); 
        
    }
    
    public function supprimer($id){
       
        $m_blog = new BlogModel();
        $m_blog->where('id', $id)->delete();
        return redirect()->to('/accueil'); 
        
    }
}
