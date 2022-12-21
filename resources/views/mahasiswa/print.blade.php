<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <center>
        <h3>{{ $title }}</h3>
    </center>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>TAHUN MASUK</th>
            <th>PROGRAM STUDI</th>
            <th>KELAS</th>
            <th>JENJANG</th>
        </tr>
        @php
        $no = 1;    
        @endphp
        @forelse ($data_mahasiswa as $mahasiswa)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->tahun }}</td>
            <td>{{ $mahasiswa->prodi->nama }}</td>
            <td>{{ $mahasiswa->kelas->nama }}</td>
            <td>{{ $mahasiswa->jenjang->nama }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>