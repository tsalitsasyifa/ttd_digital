<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\UserApproval;
use App\Models\User;
use Illuminate\Http\Request;


class DocumentController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'VP')->get();
        return view('document.index',["users"=> $user]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        $document = new Document();
        $document->title = $request->title;
        $document->description = $request->description;
        $document->file_path = $filePath;
        $document->status = 1; 
        $document->uploaded_by = $request->uploaded_by;
        $document->save();

        $user_approval = new UserApproval();
        $user_approval->document_id = $document->document_id;
        $user_approval->user_id = $request->user_id;
        $user_approval->save();

        return redirect()->route('tracking.index');
    }

}
