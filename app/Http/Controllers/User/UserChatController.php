<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
class UserChatController extends Controller
{
    //* method for loading chat information
    public function getAllChat(Request $request){
        if($request->ajax()){
            $task_id = $request->get('task_id');
            $chatExistFlag = $request->get('chatExistFlag');
            if($chatExistFlag){
                $chatMessages=DB::select('SELECT MessageBody, senderName, TaskID, created_at FROM task_messages where TaskID = ? ORDER BY message_id desc limit 1', [$task_id]);
            }else{
                $chatMessages=DB::select('SELECT MessageBody, senderName, TaskID, created_at FROM task_messages where TaskID = ? ORDER BY message_id', [$task_id]);
                
            }
            return json_encode($chatMessages);
        }
    }

    //* method for sending a message 
    public function userSendMessage(Request $request){
        if($request->ajax()){
            $task_id = $request->get('task_id');
            $chatMessageBody = $request->get('chatMessageBody');
            // dd($task_id);
            try {
                DB::table('task_messages')->insert([
                    'MessageBody' => $chatMessageBody,
                    'senderName' => Auth::user()->name,
                    'TaskID' =>  $task_id,
                    'created_at' => Carbon::now()->format('Y-m-d'),
                    'updated_at' => Carbon::now()->format('Y-m-d'),
                ]);


                return response()->json('Success', 200);
            } 
            catch (\Throwable $th) {
                
                return response()->json('failure', 500);
            }
         
        }
    }


}
