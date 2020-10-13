<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lingkaran;
use Carbon\Carbon;
use Response;

class LingkaranController extends Controller
{
	// Tambah Lingakaran
    public function tambah(Request $request)
    {
    	$r = $request->jari;

    	$hasil = 3.14 * $r * $r;
    	$data = array(
    		'jari_jari' => $r,
    		'hasil'=>$hasil,
    		'created_at'=>Carbon::now()->toDateTimeString()
    	);

    	$simpan = Lingkaran::insert($data);
    	if ($simpan) {
    		echo "<script>alert('Hasilnya = ".$hasil."'); window.location.href = '/';</script>";
    	}else{
    		echo "<script>alert('Gagal Menyimpan');</script>";
    	}
    	
    	return view('home');
    }

    // EXPORT CSV LINGAKRAN
    public function export_csv()
    {
    	$table = Lingkaran::all();
	    $filename = "lingkaran_all.csv";
	    $handle = fopen($filename, 'w+');
	    fputcsv($handle, array('id_lingkaran', 'jari-jari', 'hasil', 'created at'));

	    foreach($table as $row) {
	        fputcsv($handle, array($row['id_lingkaran'], $row['jari_jari'], $row['hasil'], $row['created_at']));
	    }

	    fclose($handle);

	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );

	    return Response::download($filename, 'lingkaran_all.csv', $headers);
    }

    // EDIT LINGKARAN
    public function edit($id)
    {
        $get = Lingkaran::where('id_lingkaran', '=', $id)->get();
        $data = [
            'data' => $get
        ];
        return view('form/edit_lingkaran', $data);
    }

    // PROSES EDIT
    public function proses_edit(Request $request)
    {
        // print_r($request);
        // exit();
        $r = $request->jari;

        $hasil = 3.14 * $r * $r;
        $data = array(
            'jari_jari' => $r,
            'hasil'=>$hasil,
            'created_at'=>Carbon::now()->toDateTimeString()
        );

        $simpan = Lingkaran::insert($data);
        Lingkaran::where('id_lingkaran', '=',$request->id)->delete();
        if ($simpan) {
            echo "<script>alert('Hasilnya = ".$hasil."'); window.location.href = '/';</script>";
        }else{
            echo "<script>alert('Gagal Menyimpan');</script>";
        }
    }

    // Hapus
    public function hapus($id)
    {
        $hapus = Lingkaran::where('id_lingkaran', '=', $id)->delete();

        if ($hapus) {
            echo "<script>alert('Data Dihapus'); window.location.href = '/';</script>";
        }else{
            echo "<script>alert('Gagal Menghapus');</script>";
        }
    }
}
