<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Documents;
use App\Models\Status;
use App\Models\User;
use App\Exports\DocumentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Bidang;

class DocumentsController extends Controller
{
    //--------------ADMIN ROLE ADMIN ROLE ADMIN ROLE--------------

    public function manage()
    {
        $documents = Documents::latest()->paginate(5);
        return view('admin.manage', compact('documents'));
    }

    public function diterima()
    {
        $documents = Documents::where('status_id',2)->latest()->paginate(5);

        return view('admin.diterima', compact('documents'));
    }

    public function proses()
    {
        $documents = Documents::where('status_id',1)->latest()->paginate(5);

        return view('admin.proses', compact('documents'));
    }

    public function edit($id)
    {
        $bidang = Bidang::all();
        $documents = Documents::with('bidang')->findOrFail($id);
        $statuses = Status::all();
        return view('admin.edit',compact('documents','statuses','bidang'));
    }

    public function update(Request $request, $id)
    {
        // $statuses = Status::all();
        // $file = $request->file('dokumen');
        // $nama_file = $file->getClientOriginalName();
        // $tujuan_upload = 'moyai';
        // $file->move($tujuan_upload,$nama_file);

        // Documents::findOrFail($id)->update([
        //     'nama' => $request->nama,
        //     'kode' => $request->kode,
        //     'dokumen' => $nama_file,
        //     'namadoc' => $request->namadoc,
        //     'status_id' => $request->status_id,
        //     'keterangan' => $request->keterangan,
        // ]);

        $update = Documents::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->kode = $request['kode'];
        $update->namadoc = $request['namadoc'];
        $update->bidang_id = $request['bidang_id'];
        $update->status_id = $request['status_id'];
        $update->keterangan = $request['keterangan'];

        if($request->file('dokumen') == "")
        {
            $update->dokumen = $update->dokumen;
        }
        else
        {
            $file       = $request->file('dokumen');
            $fileName   = $file->getClientOriginalName();
            $tujuan_upload = 'moyai';
            $file->move($tujuan_upload,$nama_file);
            $update->dokumen = $fileName;
        }

        $update->update();

        return redirect('dashboard')->with('success',"Data berhasil diupdate");
    }

    public function delete($id)
    {
        Documents::findOrFail($id)->delete();
        return redirect('dashboard')->with('delete',"Data berhasil dihapus");
    }

    public function show(Request $request, $id)
    {

        $documents = Documents::findOrFail($id);
        return view('admin.show',compact('documents'));
    }

    public function cariadmin(Request $request)
    {
        $cari = $request->cari;
        $documents = Documents::where('namadoc','like',"%".$cari."%")->latest()->paginate(5);
        return view('admin.manage',compact('documents'));

    }

    public function showusers()
    {
        $user = User::latest()->paginate(5);
        return view('admin.showusers', compact('user'));
    }

     public function carishowusers(Request $request)
    {
        $cari = $request->cari;
        $user = User::where('name','like',"%".$cari."%")->latest()->paginate(5);
        return view('admin.showusers',compact('user'));

    }

    //--------------PEGAWAI ROLE PEGAWAI ROLE PEGAWAI ROLE PEGAWAI ROLE PEGAWAI ROLE--------------


    public function export()
    {
        ob_end_clean(); // this
        ob_start(); // and this
        return Excel::download(new DocumentsExport,'documentsdata.xlsx');
    }

    public function cari(Request $request)
    {

        $cari = $request->cari;
        $documents = Documents::where('namadoc','like',"%".$cari."%")->where('status_id',2)->latest()->paginate(5);
        return view('pegawai.table',compact('documents'));
    }

    public function carimydoc(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

            // mengambil data dari table pegawai sesuai pencarian data
        $documents = Auth::user()->documents()->where('namadoc','like',"%".$cari."%")->latest()->paginate(5);

            // mengirim data pegawai ke view index
        return view('pegawai.mydoc',compact('documents'));

    }

    public function create()
    {
        $bidang = Bidang::all();
        return view('pegawai.create', compact('bidang'));
    }

    public function pegawaiedit($id)
    {
        $bidang = Bidang::all();
        $documents =  Auth::user()->documents()->with('bidang')->findOrFail($id);
        return view('pegawai.pegawaiedit',compact('documents','bidang'));
    }

    public function tableshow(Request $request, $id)
    {

        $documents = Documents::where('status_id',2)->findOrFail($id);
        return view('pegawai.pegawaishow',compact('documents'));
    }

    public function pegawaishow(Request $request, $id)
    {

        $documents = Auth::user()->documents()->findOrFail($id);
        return view('pegawai.pegawaishow',compact('documents'));
    }

    public function pegawaiupdate(Request $request, $id)
    {
        // $file = $request->file('dokumen');
        // $nama_file = $file->getClientOriginalName();
        // $tujuan_upload = 'moyai';
        // $file->move($tujuan_upload,$nama_file);
        // Documents::findOrFail($id)->update([
        //     'nama' => $request->nama,
        //     'kode' => $request->kode,
        //     'dokumen' => $nama_file,
        //     'namadoc' => $request->namadoc,
        //     'keterangan' => $request->keterangan,
        // ]);

        // return redirect('dashboard')->with('success',"Data berhasil diupdate");
        $update = Documents::where('id', $id)->first();
        $update->nama = $request['nama'];
        $update->kode = $request['kode'];
        $update->namadoc = $request['namadoc'];
        $update->bidang_id = $request['bidang_id'];
        $update->keterangan = $request['keterangan'];

        if($request->file('dokumen') == "")
        {
            $update->dokumen = $update->dokumen;
        }
        else
        {
            $file       = $request->file('dokumen');
            $fileName   = $file->getClientOriginalName();
            $tujuan_upload = 'moyai';
            $file->move($tujuan_upload,$nama_file);
            $update->dokumen = $fileName;
        }

        $update->update();

        return redirect('dashboard')->with('success',"Data berhasil diupdate");
    }

    public function table()
    {
        $documents = Documents::where('status_id',2)->latest()->paginate(5);

        return view('pegawai.table', compact('documents'));
    }

    public function tablemydoc()
    {
        $documents = Auth::user()->documents()->latest()->paginate(5);
        return view('pegawai.mydoc', compact('documents'));
    }

    public function store(Request $request)
    {
       $request->validate([
            'kode' => 'required|numeric',
            'dokumen' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png',
            'namadoc' => 'required',
        ]);

       $file = $request->file('dokumen');
       $nama_file = $file->getClientOriginalName();
       $tujuan_upload = 'moyai';
       $file->move($tujuan_upload,$nama_file);

        Auth::user()->documents()->create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'dokumen' => $nama_file,
            'namadoc' => $request->namadoc,
            'bidang_id' => $request->bidang_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success',"Data berhasil ditambahkan");
    }
}
