<?php 
namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Message;
use App\User;
use View;
use App\POJO\Users;

class MessageController extends Controller{


    public function getAllMessages(){

        $messages = Message::with(['worker', 'request','guest'])->orderBy('id', 'desc')->get();

        $array = [];

        $users = new Users();

        $length = count($messages);
        
                if($length > 0 ){
                    $i = 0;
                   foreach($messages as $message)
                   {
                        $array[$i]['id'] = $messages->id;
                        $array[$i]['content'] = $message->content;
                        $array[$i]['datetime'] = $message->datetime;
                        $array[$i]['Worker_id'] = $message->category->name;
                        $array[$i]['Guest_id'] = $users->AllUserContent($request->guest->User_id);
                        $array[$i]['Request_id'] = $request->request->id;

                        
                        $i++;

                    }

                    response()->json($array, 200);

    }

    }

    public function messagefromWorker($id){

        $messages = Messages::with(['guest','worker','request'])
        ->where('Worker_id','=', $id)
        ->orderBy('id','desc')
        ->get();
        
        $array = [];

        if($messsages){
            $i = 0;
            foreach($messages as $message){
                $array[$i]['content'] = $messages->content;
                $array[$i]['datetime'] = $messages->datetime;
                $array[$i]['Request_id'] = $messages->request->id;

            }
            response()->json($array,200);
        }

    }

    public function messagefromGuest($id){
        
                $messages = Messages::with(['guest','worker','request'])
                ->where('Guest_id','=', $id)
                ->orderBy('id','desc')
                ->get();
                
                $array = [];
        
                if($messsages){
                    $i = 0;
                    foreach($messages as $message){
                        $array[$i]['content'] = $messages->content;
                        $array[$i]['datetime'] = $messages->datetime;
                        $array[$i]['Request_id'] = $messages->request->id;
        
                    }
                    response()->json($array,200);
                }
        
            }
        

        public function createMessage(Request $request){
            
            Messages::beginTransaction();

            try{
                $message = new Message();
                $message->content = $request->content;
                $message->Worker_id = $request->Worker_id;
                $message->Guest_id = $request->Guest_id;
                $message->Request_id = $request->Request_id;

                if($message->save()){
                    Messages::commit();
                }

            }catch(\Exceptions $e){
                Messages::rollback();
            return $e->getMessage();
            }
        }


}