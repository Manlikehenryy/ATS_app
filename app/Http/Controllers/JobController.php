<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Storage;

class JobController extends Controller
{
    public function create_job(Request $request){
        try {
            $validator = Validator::make([
              "job_description" => $request->jobDescription,
              "title" => $request->title,
              'skills'=>$request->skills,
          ], [
              'job_description' => 'required|string',
              'title' => 'required|string',
              'skills' => 'required|string',
             
          ]);
          
          //if validation fails
          if ($validator->fails()) {
            return response()->json(["status"=>"failed","validation_error"=>$validator->errors(),"message"=>"validation error"], 400);
          }
    //   serialize();
    //   unserialize()
            $job = Job::create(['user_id'=>$request->user()->id,'title'=>$request->title,'years_of_exp'=>$request->yearsOfExp,
            'bachelor_degree'=>$request->bachelorDeg,'certification'=>$request->certification,'skills'=>$request->skills,
            'job_description'=>$request->jobDescription,'pass_mark'=>$request->passMark,'requirements'=>serialize($request->values)]);
    
            //if job was created successfully
            if ($job) {
                $data = ["status"=>"success","message"=>"job created successfully"];
                return response()->json($data, 200);
            }
            else{
                return response()->json(["status"=>"failed","message"=>"something went wrong"], 400);
            }
          } catch (\Exception $e) {
            return response()->json(["status"=>"failed","message"=>$e->getMessage()], 400);
          }
    }

    public function get_all_jobs(Request $request){
        try {
   
            $jobs = DB::select('SELECT * FROM jobs ORDER BY created_at DESC');
    
            //if successful
            if ($jobs) {
                $data = ["status"=>"success","data"=>$jobs];
                return response()->json($data, 200);
            }
            else{
                return response()->json(["status"=>"failed","message"=>"something went wrong"], 400);
            }
          } catch (\Exception $e) {
            return response()->json(["status"=>"failed","message"=>$e->getMessage()], 400);
          }
    }

   public function get_job($id){
        
        try {
   
            $job = Job::find($id);
    
            //if successful
            if ($job) {
                $user = User::find($job->user_id);
                $job->company = $user->company;
                $job->requirements = unserialize($job->requirements);
                $data = ["status"=>"success","data"=>$job];
                return response()->json($data, 200);
            }
            else{
                return response()->json(["status"=>"failed","message"=>"something went wrong"], 400);
            }
          } catch (\Exception $e) {
            return response()->json(["status"=>"failed","message"=>$e->getMessage()], 400);
          }
    }
}
