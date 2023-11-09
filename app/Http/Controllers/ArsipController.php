<?php

namespace App\Http\Controllers;

use App\Exports\ExportArsip;
// use app\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;



class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtarsip = Arsip::paginate(10);
        return view('Admin.dataarsip',compact('dtarsip'));
    }
    
    public function exportarsip(){
        return Excel::download(new ExportArsip, 'Arsip.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.createarsip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        if ($request->hasFile('file')) {
        $doc = $request->file('file');
        // $doc_ekstensi = $doc->extension();
        // $doc_nama = date('ymdhis').".". $doc_ekstensi;
        // Ambil nama asli dari file dokumen yang diunggah
        $doc_nama_asli = $doc->getClientOriginalName();

        // Dapatkan detik saat ini dalam format dua digit
        $detik = date('is');

        // Gabungkan nama asli dengan detik unggah
        $doc_nama = $detik . '_' . $doc_nama_asli;
        $doc->move(public_path('dokumen'), $doc_nama);
    } else {
        $doc_nama = null;
    }
    
            Arsip::create([
                'kode_arsip' => $request->kode_arsip,
                'informasi' => $request->informasi,
                'nomor' => $request->nomor,
                'jumlah_berkas' => $request->jumlah_berkas,
                'no_item' => $request->no_item,
                'isi' => $request->isi,
                'kurun_waktu' => $request->kurun_waktu,
                'file' => $doc_nama,
                'keterangan' => $request->keterangan,
                'lokasi' => $request->lokasi,
                'remember_token' => Str::random(10),
            ]);
    
    
            return redirect('dataarsip')->with('success', 'Data Berhasil Di Buat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arsip = Arsip::findorfail($id);
        return view('Admin.editarsip',compact('arsip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'kode_arsip' => $request->input('kode_arsip'),
            'informasi' => $request->input('informasi'),
            'nomor' => $request->input('nomor'),
            'jumlah_berkas' => $request->input('jumlah_berkas'),
            'no_item' => $request->input('no_item'),
            'isi' => $request->input('isi'),
            'kurun_waktu' => $request->input('kurun_waktu'),
            'keterangan' => $request->input('keterangan'),
            'lokasi' => $request->input('lokasi'),
        ];

        if($request->hasFile('file')){
        $doc_file = $request->file('file');
        // $doc_ekstensi = $doc_file->extension();
        // $doc_nama = date('ymdhis').".". $doc_ekstensi;
        // Ambil nama asli dari file dokumen yang diunggah
        $doc_nama_asli = $doc_file->getClientOriginalName();

        // Dapatkan detik saat ini dalam format dua digit
        $detik = date('is');

        // Gabungkan nama asli dengan detik unggah
        $doc_nama = $detik . '_' . $doc_nama_asli;
        $doc_file->move(public_path('dokumen'), $doc_nama);
        

        $arsip = Arsip::findorfail($id);
        File::delete(public_path('dokumen').'/'.
        $arsip->file);
        
        $data['file'] = $doc_nama;

        }

        $arsip = Arsip::findorfail($id);
        $arsip->update($data);
        return redirect('dataarsip')->with('success', 'Data Berhasil Di Update ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsip = Arsip::findorfail($id);
        File::delete(public_path('dokumen').'/'.$arsip->file);
        $arsip->delete();
        return back()->with('info', 'Data Berhasil Di Hapus');
    }

    // public function search(Request $request){
    //     if($request->has('search')) {
    //         $dtarsip = Arsip::where('kode_arsip','LIKE','%')
    //     }

    // }

}
