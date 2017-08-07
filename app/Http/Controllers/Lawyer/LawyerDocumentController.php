<?php

namespace yuridik\Http\Controllers\Lawyer;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use yuridik\Document;
use Auth;
use yuridik\Lawyer;
use yuridik\Request as Reques;
class LawyerDocumentController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:lawyer');
    }
    public function index(){
    	$documents = Document::where('status',0)->paginate(3);
    	return view('document.list')->withDocuments($documents);
    }
    public function myRequests(){
        $id=array();
        foreach(Auth::user()->requests->unique('document_id') as $request)
        {
            array_push($id, $request->document->id);
        }    
        $documents = Document::where('id',$id)->orderBy('id','desc')->paginate(3);
        return view('document.list')->withDocuments($documents);
    }
    public function show(Request $request, $id){
    	$document = Document::findOrFail($id);
    	$show = true;
    	foreach ($document->requests as $key) {
    		if($key->lawyer_id == Auth::guard('lawyer')->user()->id && $key->status == 1)
    			$show = false;
    	}
    	return view('document.show')->withDocument($document)->withShow($show);
    }
    public function sendRequest(Request $request, $id){
    	 $this->validate($request, ['description' => 'required|min:6',]);

    	$document = Document::findOrFail($id);
    	$lawyer = Auth::guard('lawyer')->user();
    	$reques = new Reques;
    	$reques->description = $request->description;
        $reques->lawyer_id = $lawyer->id;
        $reques->status = 1;
        if($request->payment_type == "about")
            $reques->price = $document->cost;
            
        else{
            $reques->price = $request->price;
        }
        $reques->until_at = $request->date;
    
        $document->requests()->save($reques);
        return redirect()->back();
    }
   
}
