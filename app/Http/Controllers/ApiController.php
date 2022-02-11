<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Project;
use App\Models\Gallery;


class ApiController extends Controller
{ 
public function getHome(){
     $usersinfo=User::Select('protiflos.id AS PID',"users.*","protiflos.*")->where('users.id', '=',"1")
    ->join('protiflos','users.id', '=','protiflos.userid')
    ->get();
  
   foreach($usersinfo as $userinfo){
  $myprojects=  Project::where('projects.protfilo_id', '=', $userinfo->PID)
   ->get(); 
 

foreach($myprojects as $project){
    $gallery    = Gallery::where('gallery.project_id', '=',$project->id)
     ->get();
 
     $project['gallery'] =$gallery;
 
 } 

$userinfo['projects'] =$myprojects;
}
  	

 

   
return $userinfo;
}

}
