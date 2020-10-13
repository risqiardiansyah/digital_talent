<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Segitiga;
use App\Lingkaran;
use App\Persegi;
use Carbon\Carbon;
use Response;

class SegitigaController extends Controller
{
	// HOME CONTROLLER
	public function index()
	{
		$segitiga = Segitiga::get();
		$lingkaran = Lingkaran::get();
		$persegi = Persegi::get();
		
		$jml_segitiga = $segitiga->count();
		$jml_lingkaran = $lingkaran->count();
		$jml_persegi = $persegi->count();

		$data = [
			'segitiga'=>$segitiga,
			'lingkaran'=>$lingkaran,
			'persegi'=>$persegi,
			'jml_persegi'=>$jml_persegi,
			'jml_lingkaran'=>$jml_lingkaran,
			'jml_segitiga'=>$jml_segitiga,
			'total'=>$jml_persegi+$jml_lingkaran+$jml_segitiga
		];
		return view('home', $data);
	}

	// TAMBAH SEGITIGA
    public function tambah(Request $request)
    {
    	$alas = $request->alas;
    	$tinggi = $request->tinggi;

    	$hasil = 1/2 * $alas * $tinggi;
    	$data = array(
    		'alas'=>$alas,
    		'tinggi'=>$tinggi,
    		'hasil'=>$hasil,
    		'created_at'=>Carbon::now()->toDateTimeString()
    	);

    	$simpan = Segitiga::insert($data);
    	if ($simpan) {
    		return view('segitiga', $data);
    	}else{
    		echo "<script>alert('Gagal Menyimpan');</script>";
    	}
    	
    	return view('home');
    }

    // EXPORT CSV SEGITIGA
    public function export_csv()
    {
    	$table = Segitiga::all();
	    $filename = "segitiga_all.csv";
	    $handle = fopen($filename, 'w+');
	    fputcsv($handle, array('id_segitiga', 'alas', 'tinggi', 'hasil', 'created at'));

	    foreach($table as $row) {
	        fputcsv($handle, array($row['id_segitiga'], $row['alas'], $row['tinggi'], $row['created_at']));
	    }

	    fclose($handle);

	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );

	    return Response::download($filename, 'segitiga_all.csv', $headers);
    }

    // VIEW EDIT
    public function edit($id)
    {
        $get = Segitiga::where('id_segitiga', '=', $id)->get();
        $data = [
            'data' => $get
        ];
        return view('form/edit_segitiga', $data);
    }

    // PROSES EDIT
    public function proses_edit(Request $request)
    {
        $alas = $request->alas;
    	$tinggi = $request->tinggi;

    	$hasil = 1/2 * $alas * $tinggi;
    	$data = array(
    		'alas'=>$alas,
    		'tinggi'=>$tinggi,
    		'hasil'=>$hasil,
    		'created_at'=>Carbon::now()->toDateTimeString()
    	);

    	$simpan = Segitiga::insert($data);
        Segitiga::where('id_segitiga', '=',$request->id)->delete();
        if ($simpan) {
            echo "<script>alert('Hasilnya = ".$hasil."'); window.location.href = '/';</script>";
        }else{
            echo "<script>alert('Gagal Menyimpan');</script>";
        }
    }

    // Hapus
    public function hapus($id)
    {
        $hapus = Segitiga::where('id_segitiga', '=', $id)->delete();

        if ($hapus) {
            echo "<script>alert('Data Dihapus'); window.location.href = '/';</script>";
        }else{
            echo "<script>alert('Gagal Menghapus');</script>";
        }
    }
}
