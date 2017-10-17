<?php 
namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Projects;
use App\Worker;
use View;

class ProjectsController extends Controller{


    public function getAllProjects(){

        try{
        $projects = Projects::with(['worker', 'category', 'images.projects'])
        ->get();



        /*
        dd($projects[0]->category['name']);*/

        
        $array = array();

        $size = count($projects);



        if($size > 0)
        {

        foreach($projects as $project)
        {
           
           
                 $array['category'] = $project->category->name;
                 $array['category_id'] = $project->category->id;
                 $array['name'] = $project->name;
                 $array['id'] = $project->id;
                 $array['description'] = $project->description;
                 $array['worker_name'] = $project->load('worker.user');
                
                
                 
            
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
}

