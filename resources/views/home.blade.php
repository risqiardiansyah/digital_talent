<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-2 mb-4">Hitung Bangun Datar</h1>
                <div class="row">
                    {{-- card segitiga --}}
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="{{URL::to('img/segitiga.png')}}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">Segitiga</h5>
                            <p class="card-text">Hitung Luas Segitiga</p>
                            <a href="/segitiga" class="btn btn-primary">Yuk, Hitung >></a>
                          </div>
                        </div>
                    </div>
                    {{-- end card segitiga --}}

                    {{-- card persegi --}}
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="{{URL::to('img/persegi.png')}}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">persegi</h5>
                            <p class="card-text">Hitung Luas persegi</p>
                            <a href="/persegi" class="btn btn-primary">Yuk, Hitung >></a>
                          </div>
                        </div>
                    </div>
                    {{-- end card persegi --}}

                    {{-- card lingkaran --}}
                    <div class="col-lg-4">
                        <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="{{URL::to('img/lingkaran.jfif')}}" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">lingkaran</h5>
                            <p class="card-text">Hitung Luas lingkaran</p>
                            <a href="/lingkaran" class="btn btn-primary">Yuk, Hitung >></a>
                          </div>
                        </div>
                    </div>
                    {{-- end card lingkaran --}}
                </div>

                {{-- tabel lingkaran --}}
                <h2 class="mt-5">Total Semua : {{$total}} </h2>
                <h3>Hasil Perhitungan Lingkaran <small>(Total Data : {{$jml_lingkaran}}, Persentase : {{ round($jml_lingkaran / ($total / 100), 2) }}% )</small></h3>
                <a href="/csv_lingkaran" class="btn btn-success btn-sm flex-last">Simpan CSV</a>
                <table class="table table-hover">
                  <thead class="bg-secondary text-light">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Bangun Datar</th>
                      <th scope="col">Jari-jari</th>
                      <th scope="col">Hasil</th>
                      <th scope="col">Dibuat Tgl</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lingkaran as $l)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>Lingkaran</td>
                      <td>{{$l->jari_jari}}</td>
                      <td>{{$l->hasil}}</td>
                      <td>{{$l->created_at}}</td>
                      <td>
                        <a href="/lingkaran/edit/{{$l->id_lingkaran}}" class="btn btn-sm btn-success">Edit</a> | 
                        <a href="/lingkaran/hapus/{{$l->id_lingkaran}}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ??')">hapus</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- end tabel lingkaran --}}

                {{-- tabel persegi --}}
                <h3 class="mt-5">Hasil Perhitungan Persegi <small>(Total Data : {{$jml_persegi}}, Persentase : {{ round($jml_persegi / ($total / 100), 2) }}% )</small></h3>
                <a href="/csv_persegi" class="btn btn-success btn-sm flex-last">Simpan CSV</a>
                <table class="table table-hover">
                  <thead class="bg-secondary text-light">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Bangun Datar</th>
                      <th scope="col">Sisi</th>
                      <th scope="col">Hasil</th>
                      <th scope="col">Dibuat Tgl</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($persegi as $p)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>Persegi</td>
                      <td>{{$p->sisi}}</td>
                      <td>{{$p->hasil}}</td>
                      <td>{{$p->created_at}}</td>
                      <td>
                        <a href="/persegi/edit/{{$p->id_persegi}}" class="btn btn-sm btn-success">Edit</a> | 
                        <a href="/persegi/hapus/{{$p->id_persegi}}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ??')">hapus</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- end tabel persegi --}}

                {{-- tabel segitiga --}}
                <h3 class="mt-5">Hasil Perhitungan Segitiga
                    <small>(Total Data : {{$jml_segitiga}}, Persentase : {{ round($jml_segitiga / ($total / 100), 2) }}% )</small>
                </h3>
                <a href="/csv_segitiga" class="btn btn-success btn-sm flex-last">Simpan CSV</a>
                <table class="table table-hover">
                  <thead class="bg-secondary text-light">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Bangun Datar</th>
                      <th scope="col">Alas</th>
                      <th scope="col">Tinggi</th>
                      <th scope="col">Hasil</th>
                      <th scope="col">Dibuat Tgl</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($segitiga as $s)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>Segitiga</td>
                      <td>{{$s->alas}}</td>
                      <td>{{$s->tinggi}}</td>
                      <td>{{$s->hasil}}</td>
                      <td>{{$s->created_at}}</td>
                      <td>
                        <a href="/segitiga/edit/{{$s->id_segitiga}}" class="btn btn-sm btn-success">Edit</a> | 
                        <a href="/segitiga/hapus/{{$s->id_segitiga}}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ??')">hapus</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- end tabel segitiga --}}

            </div>
        </div>
    </div>
</body>
</html>