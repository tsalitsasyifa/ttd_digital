<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Approval;

class DocumentTrackingController extends Controller
{
    public function index(){
        $documents = Document::query()
                    ->leftJoin('users', 'documents.uploaded_by', '=', 'users.user_id')
                    ->select('documents.*', 'users.name as uploaded_by_name')
                    ->when(request('search'), function ($query, $search) {
                        return $query->where('documents.title', 'like', '%'.$search.'%')
                            ->orWhere('documents.description', 'like', '%'.$search.'%')
                            ->orWhere('documents.status', 'like', '%'.$search.'%')
                            ->orWhere('users.name', 'like', '%'.$search.'%');
                    })
                    ->get();
        
        return view('tracking.index', ["documents" => $documents]);
    }
    

    public function detail($document_id){
        $document = Document::with('user')->findOrFail($document_id);
        $approvals = Approval::where('document_id', $document_id)->get();
        return view('tracking.detail',["document"=> $document, "approvals"=>$approvals]);
    }

    public function tunda(Request $request) {
        $search = $request->input('search');
    
        $documents = Document::query()
            ->leftJoin('users', 'documents.uploaded_by', '=', 'users.user_id')
            ->select('documents.*', 'users.name as uploaded_by_name')
            ->whereIn('documents.status', [3, 4]) // Filter by status 3 (revisi) and 4 (tidak disetujui)
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('documents.title', 'like', '%' . $search . '%')
                        ->orWhere('documents.description', 'like', '%' . $search . '%')
                        ->orWhere('users.name', 'like', '%' . $search . '%');
                });
            })
            ->get();
    
        return view('tracking.tolak', ["documents" => $documents]);
    }
    
    public function destroy($document_id)
    {
        Document::destroy($document_id);
        return redirect('tracking');
    }

}
