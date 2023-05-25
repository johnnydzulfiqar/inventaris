<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Inventaris Barang</h4>
		
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
			<th>No</th>
          {{-- <th>Foto Barang</th> --}}
          <th>Nama Barang</th>
          <th>Stok</th>
          <th>Harga Barang</th>
          <th>Lokasi Barang</th>
          <th>Status</th>
		  <th>Laporan</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $item)
		
			<tr>
				<td>{{ $loop->iteration }}</td>
				{{-- <td><img src="{{ $item->foto_barang}}" alt="foto" width="100px"></td> --}}
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->harga_barang }}</td>
                        <td>{{ $item->ruangan->nama_ruangan }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->laporan }}</td>

			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>