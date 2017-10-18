<?php 
namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Posts;
use App\User;
use View;
use App\POJO\Users;

class PostController extends Controller{

    public function getAllPost(){

        $array = [];
            $posts = Post::with(['worker', 'category'])->get();

            $length = count($posts);

            $user = new Users();
            for($i = 0; $i <= $length; $i++)
            {
                $array[$i]['id'] = $posts[$i]->id;
                $array[$i]['title'] = $posts[$i]->title;
                $array[$i]['text'] = $posts[$i]->text;
                $array[$i]['image'] = $posts[$i]->image;
                $array[$i]['user'] = $posts[$i]->$user->Get
                $array[$i]['category'] = $
            }


    }





}