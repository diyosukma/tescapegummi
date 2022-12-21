<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\Jenjang;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data_mahasiswa = Mahasiswa::orderBy('nim')->paginate(10);

        return view('mahasiswa.index', compact('data_mahasiswa'));
    }

    public function create()
    {
        $data_kelas   = Kelas::all();
        $data_prodi   = Prodi::all();
        $data_jenjang = Jenjang::all();

        return view('mahasiswa.create', compact(['data_kelas', 'data_prodi', 'data_jenjang']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'       => 'required',
            'tahun'      => 'required|size:4',
            'prodi_id'   => 'required',
            'kelas_id'   => 'required',
            'jenjang_id' => 'required',
            'semester'   => 'required|size:1',
        ]);

        $nama           = $request->nama;
        $tahun          = $request->tahun;
        $prodi_id       = $request->prodi_id;
        $kelas_id       = $request->kelas_id;
        $jenjang_id     = $request->jenjang_id;
        $semester       = $request->semester;

        $prodi          = DB::table('prodi')->where('id', $prodi_id)->value('kode');
        $kelas          = DB::table('kelas')->where('id', $kelas_id)->value('kode');
        $jenjang        = DB::table('jenjang')->where('id', $jenjang_id)->value('kode');

        $lastNim    = DB::table('mahasiswa')
            ->where('prodi_id', $prodi_id)
            ->where('kelas_id', $kelas_id)
            ->where('jenjang_id', $jenjang_id)
            ->max('nim');

        if (isset($lastNim)) {
            $last = sprintf("%03s", abs(substr($lastNim, -3) + 1));
        } else {
            $last = sprintf("%03s", 1);
        }
        // 2019
        $nim = substr($tahun, 2, 2) . $jenjang . $prodi . $kelas . $semester . $last;

        Mahasiswa::create([
            'nim'        => $nim,
            'nama'       => $nama,
            'tahun'      => $tahun,
            'prodi_id'   => $prodi_id,
            'kelas_id'   => $kelas_id,
            'jenjang_id' => $jenjang_id,
            'semester'   => $semester,
        ]);

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $data_kelas   = Kelas::all();
        $data_prodi   = Prodi::all();
        $data_jenjang = Jenjang::all();

        return view('mahasiswa.edit', compact(['mahasiswa', 'data_kelas', 'data_prodi', 'data_jenjang']));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->validate($request, [
            'nama'       => 'required',
            'tahun'      => 'required|size:4',
            'prodi_id'   => 'required',
            'kelas_id'   => 'required',
            'jenjang_id' => 'required',
            'semester'   => 'required|size:1',
        ]);

        $nama           = $request->nama;
        $tahun          = $request->tahun;
        $prodi_id       = $request->prodi_id;
        $kelas_id       = $request->kelas_id;
        $jenjang_id     = $request->jenjang_id;
        $semester       = $request->semester;

        $prodi          = DB::table('prodi')->where('id', $prodi_id)->value('kode');
        $kelas          = DB::table('kelas')->where('id', $kelas_id)->value('kode');
        $jenjang        = DB::table('jenjang')->where('id', $jenjang_id)->value('kode');

        $lastNim    = DB::table('mahasiswa')
            ->where('prodi_id', $prodi_id)
            ->where('kelas_id', $kelas_id)
            ->where('jenjang_id', $jenjang_id)
            ->max('nim');

        if (isset($lastNim)) {
            $last = sprintf("%03s", abs(substr($lastNim, -3) + 1));
        } else {
            $last = sprintf("%03s", 1);
        }

        $nim = substr($tahun, 2, 2) . $jenjang . $prodi . $kelas . $semester . $last;

        $mahasiswa->update([
            'nim'        => $nim,
            'nama'       => $nama,
            'tahun'      => $tahun,
            'prodi_id'   => $prodi_id,
            'kelas_id'   => $kelas_id,
            'jenjang_id' => $jenjang_id,
            'semester'   => $semester,
        ]);

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function excel()
    {
        return Excel::download(new MahasiswaExport(), 'data-mahasiswa.xlsx');
    }

    public function pdf()
    {
        $mahasiswa = Mahasiswa::all();

        $data = [
            'title' => 'DATA MAHASISWA',
            'data_mahasiswa' => $mahasiswa
        ];

        $pdf = PDF::loadView('mahasiswa.print', $data);

        return $pdf->download('data-mahasiwa.pdf');
    }
}
