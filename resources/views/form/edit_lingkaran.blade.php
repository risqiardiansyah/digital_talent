<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hitung Lingkaran</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
{{-- {{print_r($data[2])}} --}}
<div class="container mt-4">
	<div class="row">
		<div class="col-6 center">
			<div class="card">
		  <div class="card-header">
		    Input Data Lingkaran
		  </div>
		  {{-- form input data --}}
		  @foreach($data as $d)
		  <div class="card-body">
		    <form method="POST" action="/lingkaran/proses_edit" enctype="form/multipart">
		    	@csrf
			  <div class="form-group">
			  	<input type="hidden" name="id" value="{{$d->id_lingkaran}}">
			    <label for="jari">Panjang Jari jari Lingkaran</label>
			    <input type="number" class="form-control" id="jari" name="jari" placeholder="jari" value="{{$d->jari_jari}}">
			  </div>
			  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
		  </div>
		  @endforeach
		  {{-- end form input --}}
		</div>
		</div>
		
	</div>
</div>

</body>

<script src="../../src/asset/js/jquery.slim.min.js"></script>
<script src="../../src/asset/js/popper.min.js"></script>
<script src="../../src/asset/js/bootstrap.min.js"></script>
</html>