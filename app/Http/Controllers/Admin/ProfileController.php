<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }


public function create(Request $request)
    { 
        
      $this->validate($request, Profile::$rules);
      $profile= new Profile;
      $form = $request->all();
      
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $profile->image_path = basename($path);
      } else {
          $profile->image_path = null;
      }
    
      unset($form['_token']);
       unset($form['image']);
     
      
      $profile->fill($form);
      $profile->save();
      
        return redirect('admin/profile/create');
    }
    
     public function index(Request $request)
   {
      $cond_name = $request->cond_title;
       if ($cond_name !='' ){
           $posts= Profile::where('title',$cond_name)->get();
       } else {
           $posts=Profile::all();
       }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
   }

 public function edit(Request $request)
    {
         $profile = Profile::find($request->id);
          
        return view('admin.profile.edit',['profile_form'=>
    $profile]);
    }

public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
      
      $profile = Profile::find($request->id);
       
      $profile_form = $request->all();
      
      
      unset($profile_form['_token']);
       unset($profile_form['remove']);
      
      $profile->fill($profile_form)->save();
      
      $Profile_history = new ProfileHistories;
        var_dump($profile->id);
        $Profile_history->profile_id = $profile->id;
        $Profile_history->edited_at = Carbon::now();
        $Profile_history->save();
        
        return redirect('admin/profile');
    }
    
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        
        $profile->delete();
        return redirect('admin/profile/');
    }
}
