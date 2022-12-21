@extends('template.layout')

@section('title', 'Tambah Mahasiswa')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                        
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tahun</label>
                            <input type="number" minlength="4" maxlength="4" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" placeholder="Masukkan Tahun">
                        
                            @error('tahun')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Program Studi</label>
                            <select class="form-control @error('prodi_id') is-invalid @enderror" name="prodi_id">
                                <option value="">Pilih Program Studi</option>
                                @foreach ($data_prodi as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                                @endforeach
                            </select>
                        
                            @error('prodi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Kelas</label>
                            <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id">
                                <option value="">Pilih Kelas</option>
                                @foreach ($data_kelas as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                @endforeach
                            </select>
                        
                            @error('kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jenjang</label>
                            <select class="form-control @error('jenjang_id') is-invalid @enderror" name="jenjang_id">
                                <option value="">Pilih Jenjang</option>
                                @foreach ($data_jenjang as $jenjang)
                                <option value="{{ $jenjang->id }}">{{ $jenjang->nama }}</option>
                                @endforeach
                            </select>
                        
                            @error('jenjang')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Semester</label>
                            <select class="form-control @error('semester') is-invalid @enderror" name="semester">
                                <option value="">Pilih Semester</option>
                                @for ($semester = 1; $semester <= 8; $semester++)
                                <option value="{{ $semester }}">{{ $semester }}</option>    
                                @endfor
                            </select>
                        
                            @error('semester')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <a href="{{ route('mahasiswa.index') }}" type="button" class="btn btn-md btn-warning">KEMBALI</a>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection