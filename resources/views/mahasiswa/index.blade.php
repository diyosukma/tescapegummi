@extends('template.layout')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-md btn-primary mb-3"><i class="fa fa-plus"></i> TAMBAH MAHASISWA</a>
                    <a href="{{ route('mahasiswa.excel') }}" class="btn btn-md btn-success mb-3" target="_blank"><i class="fa fa-file-excel"></i> EXPORT EXCEL</a>
                    <a href="{{ route('mahasiswa.pdf') }}" class="btn btn-md btn-danger mb-3" target="_blank"><i class="fa fa-file-pdf"></i> EXPORT PDF</a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NIM</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">TAHUN MASUK</th>
                            <th scope="col">PROGRAM STUDI</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">JENJANG</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
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
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                              <div class="alert alert-danger">
                                  Data Mahasiswa Kosong.
                              </div>
                          @endforelse
                        </tbody>
                      </table>  
                      {{ $data_mahasiswa->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection