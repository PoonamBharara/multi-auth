<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Auth;

class HomeController extends Controller
{

    public function homeLike(){
        return view('signup');
    }
    public function index(){
        return view('signup');
    }

    public function store(Request $request){
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'user_role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
      
        $post = new Post;
        $post->name = $request['name'];
        $post->email = $request['email'];
        $post->type = $request['user_role'];
        $post->password =  Hash::make($request['password']);
        $post->password_confirmation =  Hash::make($request['password_confirmation']);
        $post->created_at = $request['created_at'];
        $post->updated_at = $request['updated_at'];
        $post->save();
        return view('login');
      
    }

    public function login(Request $request, Post $post){
       
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        


        if(Auth::post()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

           
        
            if (Auth::post()->type == 1) {
            //     return redirect()->route('admin.home');
            // }else if (auth()->post()->type == 'manager') {
            //     return redirect()->route('manager.home');
            // }else{
            //     return redirect()->route('welcome');
            return 'admin';
            // }
        }elseif(Auth::posts()->type == 2){
            return 'admin';
            // return redirect()->route('login')
            //     ->with('error','Email-Address And Password Are Wrong.');
         
        }else{
            return 'user';
        }
        }
          
    
    
}

}
