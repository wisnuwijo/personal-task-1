<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\StudentEntry;
use App\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $req)
    {
        $uuid = (string) Str::uuid();

        $req['id'] = $uuid;
        $req['created_at'] = now();
        $storeStudentEntry = StudentEntry::insert($req->except(['file_picture','_token','file_certificate_attachment','file_cv']));
        
        $filePicture = $req->file('file_picture');
        $filePictureName = 'fp-' . now() . '.' . $filePicture->extension();
        $filePicturePath = storage_path('app/public/file_picture');
        $filePicture->move($filePicturePath, $filePictureName);
        $filePictureData = [
            'student_entries_id' => $uuid,
            'file_path' => '/public/storage/file_picture' . '/' . $filePictureName,
            'type' => 'picture',
            'created_at' => now()
        ];
        $storeFilePicture = UploadedFile::insert($filePictureData);

        $storeCertificateAttachment = false;
        $certificateAttachmentIsExist = false;
        if (isset($req->file_certificate_attachment)) {
            $fileCertificateAttachment = $req->file('file_certificate_attachment');
            $fileCertificateAttachmentName = 'fca-' . now() . '.' . $fileCertificateAttachment->extension();
            $fileCertificateAttachmentPath = storage_path('app/public/file_certificate_attachment');
            $fileCertificateAttachment->move($fileCertificateAttachmentPath , $fileCertificateAttachmentName);
            $fileCertificateAttachmentData = [
                'student_entries_id' => $uuid,
                'file_path' => '/public/storage/file_certificate_attachment' . '/' . $fileCertificateAttachmentName,
                'type' => 'certificate',
                'created_at' => now()
            ];
            $storeCertificateAttachment = UploadedFile::insert($fileCertificateAttachmentData);
            $certificateAttachmentIsExist = true;
        }

        $storeFileCv = false;
        $fileCvIsExist = false;
        if (isset($req->file_cv)) {
            $fileCv = $req->file('file_cv');
            $fileCvName = 'fcv-' . now() . '.' . $fileCv->extension();
            $fileCvPath = storage_path('app/public/file_cv');
            $fileCv->move($fileCvPath , $fileCvName);
            $fileCvData = [
                'student_entries_id' => $uuid,
                'file_path' => '/public/storage/file_cv' . '/' . $fileCvName,
                'type' => 'cv',
                'created_at' => now()
            ];
            $storeFileCv = UploadedFile::insert($fileCvData);
            $fileCvIsExist = true;
        }

        return redirect("/show");
    }

    public function show()
    {
        $getStudentEntries = StudentEntry::all();
        return view('show', [
            'studentEntry' => $getStudentEntries
        ]);
    }
}
