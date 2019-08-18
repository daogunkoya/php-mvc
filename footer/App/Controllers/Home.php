<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Post;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        /*
        View::render('Home/index.php', [
            'name'    => 'Dave',
            'colours' => ['red', 'green', 'blue']
        ]);
        */
        if(isset($_POST['name'])){
              // return $this->postHome();
              Post::insertPost();
              $content = $_POST['editor1'];

                
        }
        $posts = Post::getAll();
        // View::renderTemplate('Home/index2.php', [
        //     'name'    => 'Dave',
        //     'colours' => ['red', 'green', 'blue'],
        //     'posts' => $posts 
        // ]);

        View::render('Home/index2.php', [
            'name'    => 'Dave',
            'colours' => ['red', 'green', 'blue'],
            'posts' => $posts 
        ]);

        //die($posts[4]['content']);
    }

    public function postHome(){
        return  Post::insertPost();
        View::renderTemplate('Posts/index.html', [
            'name'    => $_POST['name'],
            'colours' => ['red', 'green', 'blue']
        ]);
    }
}
