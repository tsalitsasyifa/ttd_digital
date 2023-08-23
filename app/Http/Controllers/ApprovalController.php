<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
// use TCPDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use App\Models\Document;
use App\Models\Approval;
use App\Models\UserApproval;
use App\Models\User;
use TCPDF\TCPDF;
use setasign\Fpdi\Fpdi;
use setasign\Fpdf\Fpdf;
use App\Models\Signature;


class ApprovalController extends Controller
{
    public function newApproval(Request $request){
        $document = Document::findOrFail($request->document_id);
        $document->status = 1;
        $document->save();

        $user_approval = new UserApproval();
        $user_approval->document_id = $request->document_id;
        $user_approval->user_id = $request->user_id;
        $user_approval->save();

        return redirect()->back();
    }

    public function index()
    {
        $user_approvals = UserApproval::where('user_id', Auth::user()->user_id)->get();
        $documents = [];

        foreach($user_approvals as $ap){
            $document = Document::with('user')->find($ap->document_id);
            if ($document) {
                $documents[] = $document;
            }
        }

        return view('approval.index', compact('documents'));
    }

    public function approve(Request $request,$document_id)
    {
        $document = Document::findOrFail($document_id);
        $file_path = $document->file_path;

        $user = Auth::user();

   
        // Generate QR code 
        //$qrCodeContent = $user->name;
        //$qrCodeContent = "http://127.0.0.1:8000/tracking/detail/". $document_id;
        //$qrCodeContent = "http://127.0.0.1:8000/tracking/detail/". $document_id. $user->name;
        $qrCodeContent = "http://127.0.0.1:8000/linkqr". "/". $document_id;
        

        // inisialisasi
        $qrCode = new QrCode($qrCodeContent);
        $qrCode->setSize(200); 

        $qrCodePath = storage_path('app/temp/' . time() . '.png');
        $qrCode->writeFile($qrCodePath);

        $existingPDFPath = storage_path('app/public/' . $file_path);

        $pdf = new Fpdi();

        $pdf->setSourceFile($existingPDFPath);

        $pageCount = $pdf->setSourceFile($existingPDFPath);

        for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
            
            $pdf->AddPage();

            $importedPage = $pdf->importPage($pageNumber);

            $pdf->useTemplate($importedPage);
        }

        $x = 150;
        $y = 230;
        $width = 30;
        $height = 30;

        $pdf->Image($qrCodePath, $x, $y, $width, $height);

        $modifiedPDFFilePath = 'modified_pdfs/' . time() . '.pdf';
        $pdf->Output(storage_path('app/public/' . $modifiedPDFFilePath), 'F');

        // Remove the temporary QR code image file
        unlink($qrCodePath);

        $document->file_path = $modifiedPDFFilePath;
        $document->status = 2;
        $document->save();

        $users = User::where('role', 'VP')->get();
        $signatureData = $request->input('signature_data');
        $signatureFile = $this->saveSignatureFile($signatureData);
        Approval::create([
            'document_id'   => $document_id,
            'approved_by'   => Auth::user()->user_id,
            'approval_date' => now(),
            'status_ap'        => 2,
            'signature' => $signatureFile
        ]);

        $user_approval = UserApproval::where('document_id', $document_id)->where('user_id', Auth::user()->user_id)->first();
        UserApproval::destroy($user_approval->user_approval_id);

        return redirect()->back()->with('users', $users)->with('document_id', $document->document_id)->with('teruskan', true);
    }


private function saveSignatureFile($data)
{
    $baseFilename = time(); 
    $extension = 'png'; 

    $filename = $baseFilename . '.' . $extension;
    $counter = 1;

    // Memeriksa apakah filename sudah ada dalam direktori
    while (file_exists(public_path('signatures/' . $filename))) {
        $filename = $baseFilename . '_' . $counter . '.' . $extension;
        $counter++;
    }

    $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
    file_put_contents(public_path('signatures/' . $filename), $imageData);

    return $filename;
}

    public function downloadFile($document_id)
    {
        $document = Document::findOrFail($document_id);
        $filePath = 'public/'.$document->file_path;

        // Periksa apakah file ada
        if (!Storage::exists($filePath)) {
            abort(404);
        }

        $mimeType = Storage::mimeType($filePath);

        // Membuat instance dari Response dengan isi file
        $response = new Response(Storage::get($filePath), 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $document->title . '.pdf"',
        ]);

        return $response;
    }

    public function linkqr($document_id)
    {
        $linkdoc = Document::with('user')->findOrFail($document_id);
        $linkapp = Approval::with('user')->where('document_id', $document_id)->get();
        return view('approval.linkqr',["linkdoc"=> $linkdoc, "linkapp"=>$linkapp, "document_id" => $document_id]);
    }

    public function tolak($document_id)
{
    $document = Document::findOrFail($document_id);

    $document->status = 4;
    $document->save();

    Approval::create([
        'document_id'   => $document_id,
        'approved_by'   => Auth::user()->user_id,
        'approval_date' => now(),
        'status_ap'     => 4,
    ]);

    UserApproval::where('document_id', $document_id)->delete();

    return redirect()->route('approval.index');
}

    public function revisi(Request $request, $document_id)
    {
        $document = Document::findOrFail($document_id);
        $user = Auth::user();

        $validatedData = $request->validate([
            'revisi_note' => 'required|string',
        ]);

        Approval::create([
            'document_id'   => $document_id,
            'approved_by'   => Auth::user()->user_id,
            'approval_date' => now(),
            'revisi_note'   => $request->revisi_note,
            'status_ap'     => 3,
        ]);

        $document->status = 3; 
        $document->save();

        UserApproval::where('document_id', $document_id)->delete();

        return redirect()->back()->with('success', 'Catatan Dokumen Revisi Tersimpan');
    }

}