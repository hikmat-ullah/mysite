<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\User;
use App\jobuser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(auth::user()->user_type=='employer'){
            
            return redirect()->to('/company/create');
        }
         $adminRole = Auth::user()->roles()->pluck('name');
            if($adminRole->contains('admin')){
               
                return redirect('/main');
            }

      
            if(Auth::user()->user_type=='seeker'){
                
                return redirect('user/profile');
               
            }  
    }


    public function mysave_job()
    {
        $jobs  = Auth::user()->favorites;
        return view('home',compact('jobs'));
        
    }



    public function view_jobs()
    {
        // dd(Auth::user()->id);

        $application = array();
       $find = jobuser::where('user_id',Auth::user()->id)->get();
       $all = Job::with('company')->get();      
       foreach($find as $obb){
        foreach($all as $jbb){
            if($obb->job_id == $jbb->id)
           array_push($application , $jbb);
        }
       }
    //    dd($application);
       return view('jobs.user-application',compact('application'));
    }
}
  