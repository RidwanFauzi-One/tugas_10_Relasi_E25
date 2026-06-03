<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Menampilkan semua data masyarakat
     */
    public function index()
    {
        $dataMasyarakat = Masyarakat::withCount('keluhans')->get();

        return view('masyarakat.index', compact('dataMasyarakat'));
    }

    /**
     * Menampilkan form tambah data
     */
    public function create()
    {
        $genders = ['Laki-laki', 'Perempuan'];

        return view('masyarakat.create', compact('genders'));
    }

    /**
     * Menyimpan data masyarakat baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required',
            'nomor_kk'      => 'required|digits:16|numeric',
            'nomor_ktp'     => 'required|digits:16|numeric|unique:masyarakats,nomor_ktp',
            'alamat'        => 'required|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nama.required' => 'ISI NAMA LENGKAP',
            'nomor_kk.required' => 'ISI NOMOR KK',
            'nomor_ktp.required' => 'ISI NOMOR KTP',
            'alamat.required' => 'ISI ALAMAT',
            'jenis_kelamin.required' => 'PILIH JENIS KELAMIN',
        ]);

        Masyarakat::create($validated);

        return redirect()
            ->route('Masyarakat.index')
            ->with('success', 'Data berhasil ditambah');
    }

    /**
     * Menampilkan detail masyarakat dan semua keluhannya
     */
    public function show($id)
    {
        $masyarakat = Masyarakat::with('keluhans')
            ->findOrFail($id);

        return view('masyarakat.show', compact('masyarakat'));
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        return view('masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update data masyarakat
     */
    public function update(Request $request, $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        $validated = $request->validate([
            'nama'          => 'required',
            'nomor_kk'      => 'required|digits:16|numeric',
            'nomor_ktp'     => 'required|digits:16|numeric|unique:masyarakats,nomor_ktp,' . $id,
            'alamat'        => 'required|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nama.required' => 'ISI NAMA LENGKAP',
            'nomor_kk.required' => 'ISI NOMOR KK',
            'nomor_ktp.required' => 'ISI NOMOR KTP',
            'alamat.required' => 'ISI ALAMAT',
            'jenis_kelamin.required' => 'PILIH JENIS KELAMIN',
        ]);

        $masyarakat->update($validated);

        return redirect()
            ->route('Masyarakat.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Hapus data masyarakat
     */
    public function destroy($id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        $masyarakat->delete();

        return redirect()
            ->route('Masyarakat.index')
            ->with('success', 'Data berhasil dihapus');
    }
}