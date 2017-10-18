<?php 
namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Projects;
use App\User;
use App\Images;
use View;
use App\POJO\Users;

class ProjectsController extends Controller{

    public function createProjects(Request $request){

        Projects::beginTransaction();
        
        try {

            $project = new Projects;
            $project->name = $request->name;
            $project->datetime = $request->datetime;
            $project->state = $request->state;
            $project->thumbs = $request->thumbs;
            $project->Category_id = $request->Category_id;
            $project->Worker_id = $request->Worker_id;
            $last_id = $project->save();

            if($last_id)
            {
                $image = new Images;
                $image->description = $request->description;
                $image->Projects_id = $last_id;

                if($image->save()){
                RequestDB::commit(); 
                Images::commit();
                }     
            }


        }catch (\Exception $e) {
            RequestDB::rollback();
            return $e->getMessage();
        }


    }
    public function getProjectwithWorker($idWorker){
        $projects = $Projects::where('Worker_id', '=', $idWorker)->get();

        $length = count($projects);

        
                $array_project = [];
                $controller = new ProjectsController();
                $user = new Users();
                
        
                for($i=0; $i <= $length; $i++)
                {
                    $array_project[$i]['id'] = $project->id; /*arraylist.get(i).setid = $value */
                    $array_project[$i]['name']  = $project->name;
                    $array_project[$i]['description'] = $project->description;
                    $array_project[$i]['category_name'] = $project->category->name;
                    $array_project[$i]['images'] = $controller->getAllImages($project->id);
                    $array_project[$i]['worker'] = $user->AllUserContent($project->worker->User_id);
                }
                return response()->json($array,  200);


    }

    public function getProjectwithCategory($idCategory){
        $projects = Projects::where('Category_id','=', $idCategory)->get();

        $length = count($projects);

        $array_project = [];
        $controller = new ProjectsController();
        $user = new Users();

        for($i=0; $i <= $length; $i++)
        {
            $array_project[$i]['id'] = $project->id; /*arraylist.get(i).setid = $value */
            $array_project[$i]['name']  = $project->name;
            $array_project[$i]['description'] = $project->description;
            $array_project[$i]['category_name'] = $project->category->name;
            $array_project[$i]['images'] = $controller->getAllImages($project->id);
            $array_project[$i]['worker'] = $user->AllUserContent($project->worker->User_id);
        }
        return response()->json($array,  200);
        
    }


    public function getAllProjects(){

        try{
        $projects = Projects::with(['worker', 'category'])
        ->get();


        
        $array = array();

        $size = count($projects);



        if($size > 0)
        {

            $controller = new ProjectsController();
            $user = new Users();


            $i = 0;
            
        foreach($projects as $project)
        {
                 $array[$i]['category'] = $project->category->name;
                 $array[$i]['category_id'] = $project->category->id;
                 $array[$i]['name'] = $project->name;
                 $array[$i]['id'] = $project->id;
                 $array[$i]['description'] = $project->description;
                 $array[$i]['user'] = $user->AllUserContent($project->worker->User_id);
                 $array[$i]['images'] = $controller->getAllImages($project->id);


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

    public function GetSingleProject($id){
        $project = Projects::with(['category', 'worker'])
        ->where('id', '=' , $id)->get();

        $controller = new ProjectsController();
        $user = new Users();
        

        $array_values = [];

        $array_values = array(
            'id' => $project['0']->id,
            'name' => $project['0']->name,
            'description' => $project['0']->description,
            'username' =>  $user->AllUserContent($project['0']->worker->User_id),
            'images' => $controller->getAllImages($project['0']->id)
            

        );

        return response()->json($array_values, 200);

        
    }

  

    public function getAllImages($value){
        
        $images = Images::where('Projects_id', '=', $value)->get();


        $array_images = [];

        $i = 0;
        foreach($images as $image)
        {
            $array_images[$i] = array(
             'image'   => $image->description
            );
            $i++;
        }

        return $array_images;
    }
}

