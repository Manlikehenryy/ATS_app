<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use PDF;
use Exception;


class ApplicantController extends Controller
{
   public function get_all_applicants(Request $request){
     try {
        if ($request->jobId=='All'&&$request->statusId=='All') {
            $jobs = Job::where('user_id',$request->user()->id)->get();
        
            $job_id_array = array();
            for ($i=0; $i < count($jobs); $i++) { 
                array_push($job_id_array,$jobs[$i]->id);
            } 
           
            $applicants = Applicant::whereIn('job_id', $job_id_array)->orderBy('id','DESC')->get();
            
            if ($applicants) {
                foreach($applicants as $applicant){
                $job = Job::find($applicant->job_id);
                $applicant->job_title = $job->title;
                }
                return response()->json(['status'=>'success','data'=>['applicants'=>$applicants,'jobs'=>$jobs]], 200);
            }
            else{
                return response()->json(['status'=>'failed','message'=>'No applicant was found'], 404);  
            }
        }
        elseif ($request->jobId=='All'&&$request->statusId!='All') {
            $jobs = Job::where('user_id',$request->user()->id)->get();
        
            $job_id_array = array();
            for ($i=0; $i < count($jobs); $i++) { 
                array_push($job_id_array,$jobs[$i]->id);
            } 
           
            $applicants = Applicant::whereIn('job_id', $job_id_array)->where('status',$request->statusId)->orderBy('id','DESC')->get();
            
            if ($applicants) {
                foreach($applicants as $applicant){
                $job = Job::find($applicant->job_id);
                $applicant->job_title = $job->title;
                }
                return response()->json(['status'=>'success','data'=>['applicants'=>$applicants,'jobs'=>$jobs]], 200);
            }
            else{
                return response()->json(['status'=>'failed','message'=>'No applicant was found'], 404);  
            }
        }
        elseif ($request->jobId!='All'&&$request->statusId=='All') {
            $jobs = Job::where('user_id',$request->user()->id)->get();
            $applicants = Applicant::where('job_id', $request->jobId)->orderBy('id','DESC')->get();
            
            if ($applicants) {
                foreach($applicants as $applicant){
                $job = Job::find($applicant->job_id);
                $applicant->job_title = $job->title;
                }
                return response()->json(['status'=>'success','data'=>['applicants'=>$applicants,'jobs'=>$jobs]], 200);
            }
            else{
                return response()->json(['status'=>'failed','message'=>'No applicant was found'], 404);  
            }
        }
        elseif ($request->jobId!='All'&&$request->statusId!='All') {
            $jobs = Job::where('user_id',$request->user()->id)->get();
            $applicants = Applicant::where('job_id', $request->jobId)->where('status',$request->statusId)->orderBy('id','DESC')->get();
            
            if ($applicants) {
                foreach($applicants as $applicant){
                $job = Job::find($applicant->job_id);
                $applicant->job_title = $job->title;
                }
                return response()->json(['status'=>'success','data'=>['applicants'=>$applicants,'jobs'=>$jobs]], 200);
            }
            else{
                return response()->json(['status'=>'failed','message'=>'No applicant was found'], 404);  
            }
        }
      
     } catch (Exception $e) {
         return response()->json(['status'=>'failed','message'=>$e->getMessage()], 400) ;
     }
    }

    public function get_applicant(Request $request){
        try {
          
          
           $applicant = Applicant::find($request->applicantId);
           
           if ($applicant) {
               
               $job = Job::find($applicant->job_id);
               $applicant->job_title = $job->title;
            //    $applicant->file_name = explode("-",explode("/",$applicant->file_path)[2])[1];
            $applicant->file_name = substr(explode("/",$applicant->file_path)[2],37);
               $applicant->file_path = "http://127.0.0.1:8000/".$applicant->file_path;

               return response()->json(['status'=>'success','data'=>$applicant], 200);
           }
           else{
               return response()->json(['status'=>'failed','message'=>'No applicant was found'], 404);  
           }
        } catch (Exception $e) {
            return response()->json(['status'=>'failed','message'=>$e->getMessage()], 400) ;
        }
       }

       public function update_status(Request $request){
        try {
          
          
           $applicant = Applicant::find($request->applicantId);
           
           if ($applicant&&$request->statusId) {
               
              
               $applicant->status = $request->statusId;
               $applicant->save();

               return response()->json(['status'=>'success','message'=>'updated successfully'], 200);
           }
           else{
               return response()->json(['status'=>'failed','message'=>'something went wrong'], 400);  
           }
        } catch (Exception $e) {
            return response()->json(['status'=>'failed','message'=>$e->getMessage()], 400) ;
        }
       }

    public function access(Request $request){
        try {
        //     return 'hitting';
        // $data = ['first_name'=>$request->firstName,'last_name'=>$request->lastName,'email'=>$request->email,
        // 'mobile_number'=>$request->mobileNumber,'years_of_exp'=>$request->yearsOfExp,'skills'=>$request->skills,
        // 'job_id'=>$request->jobId];
           
        $bytes = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $file_content = $this->pdf_parser($file);
            $job = Job::find($request->jobId);
            

         
          
            $name = str_replace(" ","",$file->getClientOriginalName());
           
            $name = $bytes.'-'.$name;
            $file->move('asset/docs',$name);

           

           $count = 0;
           $count = $job->years_of_exp ? $count + 1 : $count;
           $skills = explode(",",$job->skills);
           $certifications = explode(",",$job->certification);
           $bachelor_degs = explode(",",$job->bachelor_deg);

           foreach($skills as $skill){
            $count++;
           }

           foreach($certifications as $certification){
            $count++;
           }

           foreach($bachelor_degs as $bachelor_deg){
            $count++;
           }

           $requirements = unserialize($job->requirements);
           $keyword = [];
           for ($i=1; $i <= $requirements["noOfkeyword"]; $i++) { 
            $keyword = explode(" ",$requirements["keyword-field-$i"]);
            $count = count($keyword)?$count+count($keyword):$count;
           }
            
           $answer_count = 0;

           if ($job->years_of_exp==$request->yearsOfExp) {
            $answer_count++;
           }

           foreach($skills as $skill){
            if (stripos($request->skills,$skill)) {
                $answer_count++;
            }
           }

           foreach($certifications as $certification){
            if (stripos($request->certification,$certification)) {
                $answer_count++;
            }
           }

           foreach($bachelor_degs as $bachelor_deg){
            if (stripos($request->bachelordeg,$bachelor_deg)) {
                $answer_count++;
            }
           }

           $keyword = [];
           for ($i=1; $i <= $requirements["noOfkeyword"]; $i++) { 
            $keyword = explode(" ",$requirements["keyword-field-$i"]);

            foreach($keyword as $value){
                if (stripos($file_content,$value)) {
                    $answer_count++;
                }
            }
           }

           $score = $answer_count/$count*100;
           $status = 'Failed';
           if ($score >= $job->pass_mark) {
            $status = 'Qualified';
           }

           Applicant::create(['job_id'=>$request->jobId,'first_name'=>$request->firstName,'last_name'=>$request->lastName,'email'=>$request->email,
           'mobile_no'=>$request->mobileNumber,'years_of_exp'=>$request->yearsOfExp,'skills'=>$request->skills,'file_path'=>'asset/docs/'.$name,'status'=>$status
           ,'certification'=>$request->certification,'bachelor_deg'=>$request->bachelordeg, 'score'=>$score]);

           

            return response()->json(['status'=>'success','message'=>'submitted successfully', 'data'=>['total'=>$count,'correct'=>$answer_count]], 201);
        }

    

       
        // $pdf = Pdf::loadView('template',['data'=>$data])->save(public_path('assets/doc/template_'.$bytes.'.pdf'));
        
        
            
        
  

    } catch (Exception $e) {
        return response()->json(['status'=>'failed','message'=>$e->getMessage()], 400) ;
    }
 
    }



   public function pdf_parser($file){
   

  
    
  
     $parser = new Parser();
    //  $pdf = $parser->parseFile("asset/docs/mbamalu_henry_cv.pdf");
     $pdf = $parser->parseFile($file);
     $textContent = $pdf->getText();
   
     return  $textContent;
     
   
   }


}
