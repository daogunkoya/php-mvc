<?php

namespace App\Controllers;
use App\Validator;
use \Core\View;
use App\Models\Post;

/**
 * Posts controller
 *
 * PHP version 5.4
 */
class Posts extends \Core\Controller
{

    public $params;
    public $data;
    /**
     * Show the index page
     *
     * @return void
     */

     public function __construct($params = null){
            if(isset($params)){
                $this->params = $params;
            }
     }
    public function indexAction()
    {
        $posts = Post::getAll();

        // View::renderTemplate('Posts/index.html', [
        //     'posts' => $posts
        // ]);
        //echo json_encode($posts);
        //echo json_encode($this->params['id']);
        $post['status'] = 200;
        static::response(['status'=>200,'data'=>$posts]);
    }

    public function postAction()
    {
        $posts = Post::gets($this->params['id']);

        $post['status'] = 200;
        static::response(['status'=>200,'data'=>$posts]);
    }

    public function insertAction()
    {

        if($_SERVER['REQUEST_METHOD']==='GET'){
           return  static::response(
                ['data'=>['name'=>'ada','age'=>234],
                'status'=>200]);
        }
    }

    public function update (){
        $id = $this->params['id'];
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($id)){
            $data = json_decode(file_get_contents('php://input'),true);
           
           if(Validator::checkStringLength($data)){
            $post = Post::update($id,$data);
           }else{
               return static::response(['status'=>403]);
           }
        }
        return static::response($post); 
    }

    public function deleteAction(){
        $id = $this->params['id']? $this->params['id']:null;
        if(isset($id) && is_numeric($id)){
            $post = Post::delete($id);

            return  static::response(
                ['data'=>['id'=>$id],
                'status'=>200]);
        }
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }
    
    /**
     * Show the edit page
     *
     * @return void
     */
    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
             htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
