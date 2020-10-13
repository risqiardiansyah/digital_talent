<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hitung Segitiga</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<div class="container mt-4">
	<div class="row">
		<div class="col-6 center">
			<div class="card">
		  <div class="card-header">
		    Edit Data Segitiga
		  </div>

		  {{-- FORM INPUTAN DATA --}}
		  @foreach($data as $d)
		  {{-- {{dd($d->alas)}} --}}
		  <div class="card-body">
		    <form method="POST" action="/segitiga/proses_edit" enctype="form/multipart">
		    	@csrf
		    	<input type="hidden" name="id" value="{{$d->id_segitiga}}">
			  <div class="form-group">
			    <label for="alas">Alas Segitiga</label>
			    <input type="number" class="form-control" id="alas" name="alas" placeholder="Alas" required value="{{$d->alas}}">
			  </div>
			  <div class="form-group">
			    <label for="tinggi">tinggi Segitiga</label>
			    <input type="number" class="form-control" id="tinggi" name="tinggi" placeholder="tinggi" required value="{{$d->tinggi}}">
			  </div>
			  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			  <a href="/" type="button" class="btn btn-secondary">Kembali</a>
			</form>
		  </div>
		  @endforeach
		</div>
		
	</div>
</div>

</body>

<script src="../../src/asset/js/jquery.slim.min.js"></script>
<script src="../../src/asset/js/popper.min.js"></script>
<script src="../../src/asset/js/bootstrap.min.js"></script>
</html>