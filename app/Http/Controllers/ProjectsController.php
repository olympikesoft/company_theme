<?php 
namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Projects;
use App\User;
use App\Images;
use View;

class ProjectsController extends Controller{


    public function getAllProjects(){

        try{
        $projects = Projects::with(['worker', 'category'])
        ->get();


        
        $array = array();

        $size = count($projects);



        if($size > 0)
        {

            $controller = new ProjectsController();

            $i = 0;
            
        foreach($projects as $project)
        {
                 $array[$i]['category'] = $project->category->name;
                 $array[$i]['category_id'] = $project->category->id;
                 $array[$i]['name'] = $project->name;
                 $array[$i]['id'] = $project->id;
                 $array[$i]['description'] = $project->description;

                 
                 foreach($project->images as $images)
                 {
                     $array[$i]['images'] = $images->description;
                 }

                 if($controller->GetUsername($project->worker->User_id)==true)
                 {
                     $array[$i]['username'] = $controller->GetUsername($project->worker->User_id);
                 }

                 if($controller->getAllImages($project->id) == true){
                     $array[$i]['images'] = $controller->getAllImages($project->id);
                 }
                 $i++;
                             
        }
        

       /* return response()->json(array('images' => $array), 200);*/
       return response()->json($array,  200);
    }
    else{
        return response()->json(array('message' => 'Error, nothing to show'), 200);
    }

}catch (\Exception $e) {
    return $e->getMessage();
}



     
    }

    public function GetUsername($value){

        $user = User::where('id', '=', $value)->get();

        $username = $user['0']->username;
        
        return $username;

    }

    public function getAllImages($value){
        
        $images = Images::where('Projects_id', '=', $value)->get();
        $array_images = [];

        foreach($images as $image)
        {
            $array_images[] = $image->description;
        }

        return $array_images;
    }
}

