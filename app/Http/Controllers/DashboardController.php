<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Job;
use App\Testimonial;
use App\WebInfo;
use App\User;
use App\jobuser;
use App\Company;


class DashboardController extends Controller
{
    public function index(){

    	$posts = Post::latest()->paginate(20);
    	return view('admin.index',compact('posts'));
    }

      public function create(){
    	return view('admin.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'title'=>'required|min:3',
    		'content'=>'required',
    		'image'=>'required|mimes:jpeg,jpg,png'
         ]);
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$path = $file->store('uploads','public');
    		Post::create([
                'title'=>$title=$request->get('title'),
                'slug'=>str_slug($title),
                'content'=>$request->get('content'),
                'image'=>$path,
                'status'=>$request->get('status')

    		]);
    	}
    	return redirect('/dashboard')->with('message','Post created succesfully');
    }

    public function destroy (Request $request){
    	$id = $request->get('id');
    	$post = Post::find($id);
    	$post->delete();
    	return redirect()->back()->with('message','Post deleted succesfully');
    }

    public function edit($id){
          $post = Post::find($id);
          return view('admin.edit',compact('post'));
    }

    public function update($id,Request $request){
    	$this->validate($request,[
    		'title'=>'required|min:3',
    		'content'=>'required'
    	]);
    	if($request->hasFile('image')){
   			$file = $request->file('image');
   			$path = $file->store('uploads','public');
   			Post::where('id',$id)->update([
   				'title'=>$title=$request->get('title'),
   				'content'=>$request->get('content'),
   				'image'=>$path,
   				'status'=>$request->get('status')
   			]);
   		}
   		        $this->updateAllExceptImage($request,$id);
   		        return redirect()->back()->with('message','Post updated succesfully');
   		}

   		public function updateAllExceptImage(Request $request,$id){
   			return Post::where('id',$id)->update([
              'title'=>$title=$request->get('title'),
              'content'=>$request->get('content'),
              'status'=>$request->get('status'),


   			]);
   		}

   		public function trash(){
   			$posts = Post::onlyTrashed()->paginate(20);
   			return view('admin.trash',compact('posts')); 
   		}

   		public function restore($id){
   			Post::onlyTrashed()->where('id',$id)->restore();
   			return redirect()->back()->with('message','Post restored succesfully');
   		}

   		public function toggle($id){
   			$post = Post::find($id);
   			$post->status = !$post->status;
   			$post->save();
   			return redirect()->back()->with('message','Status updated succesfully');
   		}

      public function show($id){
        $post  = Post::find($id);
        return view('admin.read',compact('post'));
      }

      public function getAllJobs(){
        $jobs = Job::latest()->paginate(50);
        return view('admin.job',compact('jobs'));
      }

      public function changeJobStatus($id){
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();
        return redirect()->back()->with('message','Status updated successfully');
      }


	  public function delete_testimonial(Request $request)
	  {
		  $find = Testimonial::find($request->id)->delete();
		  
		  return redirect()->back()->with('message',' Delete successfully');
	  }


	  public function delete_post(Request $request)
	  {
		
		  $find = Post::where('id',$request->id)->forceDelete();
		  
		  
		  return redirect()->back()->with('message',' Delete successfully');
	  }


	  public function site_information()
	  {
		$data = WebInfo::first();
		  return view("admin.web-information" ,compact('data'));
		  # code...
	  }


	  public function add_webinfor(Request $request)
	  {
		
		  $check = WebInfo::first();
		  if($check == null){
			  $add_data = new WebInfo();
		  }
		  else{
			  $add_data = WebInfo::find($check->id)->first();
		  }

		  $add_data->name =  $request->name;
		  $add_data->about =  $request->about;
		  $add_data->facebook =  $request->facebook;
		  $add_data->twitter =  $request->twitter;
		  $add_data->instagram =  $request->instagram;
		  $add_data->vk =  $request->vk;
		  $add_data->save();
		
		  return redirect()->back()->with('message',' Add successfully');
		 
	  }


	  public function indexmain()
	  {
		  $data_of_site = array();

		  $total_job = Job::count();
		  $seeker = User::where("user_type","seeker")->count();
		  $employer = User::where("user_type","employer")->count();
		  $Company = Company::count();
		  $livejob = Job::where('status',1)->count();
		  $disablejob = Job::where('status',0)->count();
		  $totalpost = Post::count();
		  $application = jobuser::count();

		  $data_of_site = [$total_job , $seeker ,$employer , $Company , $livejob , $disablejob ,$totalpost ,$application];
		 
		return view('admin.main-deshboard',compact('data_of_site'));
	  }





	  public function index_report()
	  {
		  # code...
		  return view('admin.job-report');
	  }

	  public function search_job_data(Request $request)
	  {
		  # code...
		  $date = $request->daterange;
		  $date_to = get_date_to_format($date);
		  $date_from = get_date_from_format($date);

		  if($request->type == 'all'){
			$job_detail= Job::whereBetween('created_at', [$date_to,$date_from])->get();
		  }else{
			$job_detail= Job::where('type',$request->type)->whereBetween('created_at', [$date_to,$date_from])->get();
		  }
		 

		  
		  if(count($job_detail) == 0){
			return redirect()->back()->with('message','op! Not Job Data avaible');
		  }else{

			return view('admin.search-job-data',compact('job_detail','date_to','date_from'));
			  
		  }
		 
		  

		  
	  }

}
