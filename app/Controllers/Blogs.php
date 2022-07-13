<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BlogModel;

class Blogs extends ResourceController
{
    use ResponseTrait;
    
    // all users
    public function index(){
        $db = \Config\Database::connect();
        $data['blogs'] =  $db->query('SELECT id, titre FROM posts order by creation DESC')->getResultArray();
        /*$model = new BlogModel();
      $data['blogs'] = $model->orderBy('creation', 'DESC')->findAll();*/
        return $this->respond($data);
    }
    
   // delete
    public function delete($id = null){
        $model = new BlogModel();
        $data = $model->where('id', $id)->delete($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Blog supprimé avec success'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Aucun blog trouvé');
        }
    }
}