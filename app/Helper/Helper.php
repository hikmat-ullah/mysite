<?php 
use App\WebInfo;
use App\jobuser;
function webinfo(){

    $site_info = WebInfo::first();

    return $site_info;
}


function jobaccetp($user_id ,$job_id)
{
    $enterview = 0;
    $find = jobuser::where("user_id",$user_id)->where('job_id',$job_id)->first();
    if($find->status == 1){
        $enterview = 1;
    }
    return $enterview;

}


function jobstatus($job_id){

    $status = 0;
    
    $findstatus = jobuser::where("user_id",auth()->user()->id)->where('job_id',$job_id)->first();
    if($findstatus->status == 1){
        $status = 1;
    }
    return $status;
}




function get_date_to_format($date)
{
    $date_to = substr($date ,0,10);
    $date_to = strtotime($date_to);
    $date_to = date('Y-m-d',$date_to);
    return $date_to;
}
function get_date_from_format($date)
{
    $date_from = substr($date ,13,23);
    $date_from = strtotime($date_from);
    $date_from = date('Y-m-d',$date_from);
    return $date_from;
}