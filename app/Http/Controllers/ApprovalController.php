<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApprovalRequest;
use App\Http\Requests\UpdateApprovalRequest;
use App\Models\Approval;
use App\Models\UserApproval;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Response;
use Dompdf\Dompdf;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    // public function approve($document_id)
    // {
    //     // Mendapatkan file_path document dari database berdasarkan document_id
    //     $document = Document::findOrFail($document_id);
    //     $file_path = $document->file_path;

    //     // Mendapatkan data pengguna yang login
    //     $user = Auth::user();

    //     // Generate QR code based on the user's name
    //     $qrCodeContent = $user->name;
    //     $qrCode = QrCode::format('png')->size(200)->generate($qrCodeContent);

    //     // Load dokumen PDF yang sudah ada
    //     $existingPDF = file_get_contents(storage_path('app/public/' . $file_path));

    //     // Inisialisasi objek Dompdf
    //     $dompdf = new Dompdf();

    //     // Load HTML ke Dompdf
    //     $dompdf->loadHtml($existingPDF);

    //     // Render HTML menjadi PDF
    //     $dompdf->render();

    //     // Dapatkan objek canvas
    //     $canvas = $dompdf->getCanvas();

    //     // Dapatkan lebar dan tinggi halaman PDF
    //     $pageWidth = $canvas->get_width();
    //     $pageHeight = $canvas->get_height();

    //     // Tentukan posisi dan ukuran gambar QR Code
    //     $qrCodeWidth = 100;
    //     $qrCodeHeight = 100;
    //     $qrCodeX = $pageWidth - $qrCodeWidth - 10; // 10 adalah margin kanan
    //     $qrCodeY = $pageHeight - $qrCodeHeight - 10; // 10 adalah margin bawah

    //     // Tambahkan gambar QR Code ke halaman PDF
    //     $canvas->image($qrCode, $qrCodeX, $qrCodeY, $qrCodeWidth, $qrCodeHeight);

    //     // Render ulang PDF setelah menambahkan gambar QR Code
    //     $dompdf->render();

    //     // Simpan dokumen PDF yang sudah dimodifikasi dengan QR code
    //     $modifiedPDF = $dompdf->output();
    //     $modifiedPDFFilePath = 'public/modified_pdfs/' . time() . '.pdf';
    //     Storage::put($modifiedPDFFilePath, $modifiedPDF);

    //     // Update file_path pada document dengan modifiedPDFFilePath
    //     $document->file_path = $modifiedPDFFilePath;
    //     $document->status = 2;
    //     $document->save();

    //     // Kembalikan ke halaman list persetujuan atau lakukan tindakan lain sesuai kebutuhan Anda
    //     return redirect()->route('approval.list');
    // }

    public function approve($document_id)
    {
        $document = Document::findOrFail($document_id);
        $document->status = 2;
        $document->save();

        $users = User::where('role', 'VP')->get();

        Approval::create([
            'document_id'   => $document_id,
            'approved_by'   => Auth::user()->user_id,
            'approval_date' => now()
        ]);

        $user_approval = UserApproval::where('document_id', $document_id)->where('user_id', Auth::user()->user_id)->first();
        UserApproval::destroy($user_approval->user_approval_id);

        return redirect()->back()->with('users', $users)->with('document_id', $document->document_id)->with('additional_approval', true);
    }

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

    public function downloadFile($document_id)
    {
        // Mendapatkan file_path document dari database berdasarkan document_id
        $document = Document::findOrFail($document_id);
        $filePath = 'public/'.$document->file_path;

        // dd($filePath);

        // Periksa apakah file ada
        if (!Storage::exists($filePath)) {
            abort(404);
        }

        // Mendapatkan tipe MIME file
        $mimeType = Storage::mimeType($filePath);

        // Membuat instance dari Response dengan isi file
        $response = new Response(Storage::get($filePath), 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $document->title . '.pdf"',
        ]);

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApprovalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApprovalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApprovalRequest  $request
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApprovalRequest $request, Approval $approval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approval $approval)
    {
        //
    }
}
