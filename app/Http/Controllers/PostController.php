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
            $posts = Post::with(['worker', 'category'])->orderBy('id', 'desc')->get();

            $length = count($posts);

            $user = new Users();
            for($i = 0; $i <= $length; $i++)
            {
                $array[$i]['id'] = $posts[$i]->id;
                $array[$i]['title'] = $posts[$i]->title;
                $array[$i]['text'] = $posts[$i]->text;
                $array[$i]['image'] = $posts[$i]->image;
                $array[$i]['user'] = $posts[$i]->$user->AllUserContent($post[$i]->worker->User_id);
                $array[$i]['category'] = $post[$i]->category->name;
            }

          return  response()->json($array, 200);


    }

    public function createPost(Request $request){

        Posts::beginTransaction();
        try{
            $post = new Posts;
            $post->title = $request->title;
            $post->text = $request->text;
            $post->image = $request->image;
            $post->Worker_id = $request->Worker_id;
            $post->Category_id = $request->Category_id;

            if($post->save()){
                Posts::commit();
            }

        }catch(\Exception $e){
            Posts::rollback();
            return $e->getMessage();
        }

    }

    public function PostswithCategory($idCategory){

        $posts = Post::where('Category_id','=',$idCategory)->get();

        $array = [];

        $length = count($posts);

        if($length){
        $user = new Users();

        for($i = 0; $i <= $length; $i++ )
        {
            $array[$i]['id'] = $posts[$i]->id;
            $array[$i]['title'] = $posts[$i]->title;
            $array[$i]['text'] = $posts[$i]->text;
            $array[$i]['image'] = $posts[$i]->image;
            $array[$i]['user'] = $user->AllUserContent($posts[$i]->worker->id);
        }
        return response()->json($array);
    }else{
       return  response()->json($array['message'] = 'Dont have posts with this category', 200);
    }
    }

    public function getSinglePost($id){
        $posts = Posts::where('id','=',$id)->first();

        $array = [];

        $user = new Users();

        $length = count($posts);

        if($length > 0){

            $array = array(
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'image' => $post->image,
                'Worker' => $users->AllUserContent($post->worker->id)
            );

            return response()->json($array);
        }else{
            return response()->json('Dont have values');
        }
    }





}