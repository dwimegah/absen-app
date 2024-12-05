<!DOCTYPE html>
<html>
<head>
	<title>Laporan Absen Karyawan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
            border: 1px solid #000;
            padding: 3px;
            text-align: left;
        }
    </style>
	<center>
		<h3>Laporan Absen Karyawan</h3><br>
	</center>
 
	<table class="details">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Kehadiran</th>
				<th>Tanggal</th>
				<th>Jabatan</th>
				<th>Project</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($datas as $d)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$d->name}}</td>
				<td>{{$d->kehadiran}}</td>
				<td>{{$d->tgl}}</td>
				<td>{{$d->jabatan}}</td>
				<td>{{$d->projek}}</td>
				<td>{{$d->keterangan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>