<?php

namespace App\Http\Controllers;

use App\Models\Ans;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function home(){
        $users=User::get();
        $ques = ["ques" => Question::paginate(7)];
        return view("home",["users"=>$users],$ques);
    }
   
   public function insert(Request $re){
   if(Auth::check()){
    if($re->isMethod("post")){
        $re->validate([
            'title' => 'required',
            'user_id' => 'required',
        ]);
        $r = new Question();
        $r->title = $re->title;
        $r->user_id = $re->user_id;
        $r->save();
        return redirect()->back();
    }
   
}

 
   }
//    public function create(Request $re){
   
//     if($re->isMethod("post")){
//         $re->validate([
//             'name' => 'required',
            
//         ]);
//         $r = new User();
//         $r->name = $re->name;
//         $r->save();
//         return redirect()->back();
//     }
//    return view("home");
//    }
   public function insertQ(Request $req){
        $users=User::get();
        $ques = ["ques" => Question::get()];
        if(Auth::check()){
        if($req->isMethod("post")){
            $req->validate([
                "answer"=>"required",
                "questions_id"=>"required",
                "user_id"=>"required"

            ]);
            $r = new Ans();
            $r->answer = $req->answer;
            $r->questions_id= $req->questions_id;
            $r->user_id = $req->user_id;
            $r->save();
            return redirect()->route('insertQ');
        }
    } 
    else{
        $link = route("login");
        session()->flash("msg","login first <a href='$link'>click here<a/>");
    }
    
        return view("insertQ",["users"=>$users],$ques);
    
   
    
   }
  
   public function viewans($id){
    $users=User::get();
    $ques = ["ques" => Question::all()];
      $data = Question::find($id)->first();
      $ans = Ans::where("questions_id",$id)->get();
      
      return view("viewans",["data"=>$data,"users"=>$users,"ans"=>$ans],$ques);
  }
   public function vote($id){
       if(Auth::check()){
            $vo = Ans::find($id);
            $vo->vote++;
            $vo->save();
       
            if($vo->vote > 10) {
                $vo->status = 1;
                $vo->save();
            
            } 
        }
        else{
            $link = route("login");
            session()->flash("msg","login first <a href='$link'>click here<a/>");
        }
    return redirect()->back();
}
   public function unlike($id){
       if(Auth::check()){
            $vo = Ans::find($id);
            $vo->vote--;
            $vo->save();
            if($vo->vote <= 10) {
                $vo->status = 0;
                $vo->save();
            
            } 
        }
        else{
            $link = route("login");
            session()->flash("msg","login first <a href='$link'>click here<a/>");
        }
    return redirect()->back();
}
  
 
}
