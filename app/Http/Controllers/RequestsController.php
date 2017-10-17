<?php 
namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\RequestDB;
use App\User;
use App\Message;
use View;

class RequestsController extends Controller{


    public function getAllRequests(){

        try{
        $requests = RequestDB::with(['guest', 'request_states', 'budget', 'category', 'tecnology'])
        ->get();


        
        $array = array();

        $size = count($requests);

       


        if($size > 0)
        {

            $controller = new RequestsController();
            $i = 0;
            
        foreach($requests as $request)
        {

                 $array[$i]  = array(
                    'id'    => $request->id,
                    'category'     => $request->category->name,
                    /*'category_id'  => array(
                        'name'        => 'Red',
                        'content'        => 'Blue'
                    )*/
                    'category_id' => $request->category->id,
                    'content' =>$request->content,
                    'name' => $request->name,
                    'request_states' => $request->request_states->states, 
                    'budget' => $request->budget->amount,
                    'tecnology' => $request->tecnology->name);
                    
                    if($controller->GetUsername($request->guest->User_id)==true){
                     /*   array_push($array[$i], $controller->GetUsername($request->guest->User_id));*/
                     /*or*/
                     $array[$i]['username'] = $controller->GetUsername($request->guest->User_id);
                    }

                    if($controller->getAllMessages($request->id, $request->guest->User_id) == true)
                    {
                      /*  array_push($array[$i], $controller->getAllMessages($request->id, $request->guest->User_id));*/
                      $array[$i]['messages'] = $controller->getAllMessages($request->id, $request->guest->User_id);
                    }else{
                      $array[$i]['messages'] = 'Dont have comments';
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

        $array_details = [];

        $user = User::where('id', '=', $value)->get();

        $array_details = array(
            'username' => $user['0']->username,
            'email' => $user['0']->email
        );
        
        return $array_details;

    }

    public function getAllMessages($request_id, $guest_id){
        
        $messages = Message::where('Request_id', '=', $request_id)
        ->where('Guest_id', '=', $guest_id)
        ->get();

        $array_messages = [];

        $i = 0;
        foreach($messages as $message)
        {
            $array_messages[$i] = array(
             'message'   => $message->content,
             'datetime'  => $message->datetime
            );
            $i++;
        }

        return $array_messages;
    }
}

