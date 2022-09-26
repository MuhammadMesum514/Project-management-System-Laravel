<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class UserChatController extends Controller
{
    public function getAllChat(Request $request){
        if($request->ajax()){
            $task_id = $request->get('task_id');
            $chatMessages=DB::select('select * from task_messages where TaskID = ?', [$task_id]);
            return json_encode($chatMessages);
        }
    }
}
