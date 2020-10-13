<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Persegi;
use Carbon\Carbon;
use Response;

class PersegiController extends Controller
{

	// TAMBAH PERSEGI
    public function tambah(Request $request)
    {
    	$sisi = $request->sisi;

    	$hasil = $sisi * $sisi;
    	$data = array(
    		'sisi'=>$sisi,
    		'hasil'=>$hasil,
    		'created_at'=>Carbon::now()->toDateTimeString()
    	);

    	$simpan = Persegi::insert($data);
    	if ($simpan) {
    		echo "<script>alert('Hasilnya = ".$hasil."'); window.location.href = '/';</script>";
    	}else{
    		echo "<script>alert('Gagal Menyimpan');</script>";
    	}
    	
    	return view('home');
    }

    // EXPORT CSV PERSEGI
    public function export_csv()
    {
    	$table = Persegi::all();
	    $filename = "persegi_all.csv";
	    $handle = fopen($filename, 'w+');
	    fputcsv($handle, array('id_persegi', 'sisi', 'hasil', 'created at'));

	    foreach($table as $row) {
	        fputcsv($handle, array($row['id_persegi'], $row['sisi'], $row['hasil'], $row['created_at']));
	    }

	    fclose($handle);

	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );

	    return Response::download($filename, 'persegi_all.csv', $headers);
    }

    // VIEW EDIT
    public function edit($id)
    {
        $get = Persegi::where('id_persegi', '=', $id)->get();
        $data = [
            'data' => $get
        ];
        return view('form/edit_persegi', $data);
    }

    // PROSES EDIT
    public function proses_edit(Request $request)
    {
        $sisi = $request->sisi;

        $hasil = $sisi * $sisi;
        $data = array(
            'sisi'=>$sisi,
            'hasil'=>$hasil,
            'created_at'=>Carbon::now()->toDateTimeString()
        );

        $simpan = Persegi::insert($data);
        Persegi::where('id_persegi', '=',$request->id)->delete();
        if ($simpan) {
            echo "<script>alert('Data Diedit'); window.location.href = '/';</script>";
        }else{
            echo "<script>alert('Gagal Menyimpan');</script>";
        }
    }

    // Hapus
    public function hapus($id)
    {
        $hapus = Persegi::where('id_persegi', '=', $id)->delete();

        if ($hapus) {
            echo "<script>alert('Data Dihapus'); window.location.href = '/';</script>";
        }else{
            echo "<script>alert('Gagal Menghapus');</script>";
        }
    }
}
