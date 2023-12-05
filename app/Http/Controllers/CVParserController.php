<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use App\Models\Applicant;
use PDF;
use Exception;

class CVParserController extends Controller
{
    public function create_pdf(Request $request){
        try {
        $data = ['first_name'=>$request->firstName,'last_name'=>$request->lastName,'email'=>$request->email,
        'mobile_number'=>$request->mobileNumber,'years_of_exp'=>$request->yearsOfExp,'skills'=>$request->skills];

        $bytes = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

       
        $pdf = Pdf::loadView('template',['data'=>$data])->save(public_path('assets/doc/template_'.$bytes.'.pdf'));
        
        if ($pdf) {
            Applicant::create(['first_name'=>$request->firstName,'last_name'=>$request->lastName,'email'=>$request->email,
            'mobile_no'=>$request->mobileNumber,'years_of_exp'=>$request->yearsOfExp,'skills'=>$request->skills,'file_path'=>'assets/doc/template_'.$bytes.'.pdf','status'=>'Applied']);

            return response()->json(['status'=>'success','message'=>'created successfully'], 201);
        }
  

    } catch (Exception $e) {
        return response()->json(['status'=>'failed','message'=>$e->getMessage()], 400) ;
    }
 
    }



   public function pdf_parser(Request $request){
   

    // return file_get_contents($request->file('pdf_file'));
    // $docObj = new Doc2Txt($request->file('pdf_file')->getClientOriginalName(),$request->file('pdf_file'));

    // $txt = $docObj->convertToText();
    // return $txt;
    
  
     $parser = new Parser();
     $pdf = $parser->parseFile("assets/doc/template_PKW0Y8N37MZ4I5UELXHAD1CVOJFS296QBRTG.pdf");
    //  $pdf = $parser->parseFile("assets/doc/mbamalu_henry_cv.pdf");
    //  $pdf = $parser->parseFile($request->file('pdf_file'));
       $textContent = $pdf->getText();
      $data=  explode(':',$textContent);
     $d = array();
     for ($i=0; $i < count($data); $i++) { 
        $d[$i]= explode('\\n',$data[$i]);
     }
     return $d;
   }

}

class Doc2Txt {
    private $filename;
    private $nam;
    
    public function __construct($filePath) {
        $this->filename = $filePath;

    }
    
    private function read_doc() {
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }
    
    private function read_docx(){
    
        $striped_content = '';
        $content = '';
    
        $zip = zip_open($this->filename);
    
        if (!$zip || is_numeric($zip)) return false;
    
        while ($zip_entry = zip_read($zip)) {
    
            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
    
            if (zip_entry_name($zip_entry) != "word/document.xml") continue;
    
            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
    
            zip_entry_close($zip_entry);
        }// end while
    
        zip_close($zip);
    
        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);
    
        return $striped_content;
    }
    
    public function convertToText() {
    
        if(isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }
    
        $fileArray = pathinfo($this->filename);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx")
        {
            if($file_ext == "doc") {
                return $this->read_doc();
            } else {
                return $this->read_docx();
            }
        } else {
            return "Invalid File Type";
        }
    }
    }