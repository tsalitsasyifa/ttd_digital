<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Approval;

class DocumentTrackingController extends Controller
{
    public function index(){
        $documents = Document::all();
        return view('tracking.index',["documents"=> $documents]);
    }

    public function detail($document_id){
        $document = Document::with('user')->findOrFail($document_id);
        $approvals = Approval::where('document_id', $document_id)->get();
        return view('tracking.detail',["document"=> $document, "approvals"=>$approvals]);
    }
}
