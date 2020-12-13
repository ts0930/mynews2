<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Profilehistory;
use Carbon\Carbon;

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
    
     $profile_form->gender == "female" ? 'checked="checked"' : '';
    
   
    }

public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();
       if ($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }
      
      unset($profile_form['_token']);
      unset($profile_form['image']);
      unset($profile_form['remove']);
      $profile->fill($profile_form)->save();
      
      $profile_history = new Profilehistory;
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        
        return redirect('admin/profile/');
    }
    
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        
        $profile->delete();
        return redirect('admin/profile/');
    }
}
