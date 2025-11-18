<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index-card', compact('mahasiswas'));
    }

    /**
     * Display card view of mahasiswa.
     */
    public function indexCard(Request $request)
    {
        $search = $request->get('search');
        $filter = $request->get('filter');
        
        $query = Mahasiswa::query();
        
        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('prodi', 'like', "%{$search}%");
        }
        
        if ($filter && $filter !== 'all') {
            $query->where('jenis_kel', $filter);
        }
        
        $mahasiswas = $query->get();
        return view('mahasiswa.index-card', compact('mahasiswas', 'search', 'filter'));
    }

    /**
     * Display table view of mahasiswa.
     */
    public function indexTable(Request $request)
    {
        $search = $request->get('search');
        $filter = $request->get('filter');
        
        $query = Mahasiswa::query();
        
        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhere('prodi', 'like', "%{$search}%");
        }
        
        if ($filter && $filter !== 'all') {
            $query->where('jenis_kel', $filter);
        }
        
        $mahasiswas = $query->get();
        return view('mahasiswa.index-table', compact('mahasiswas', 'search', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas|string|max:20',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kel' => 'required|in:Laki-laki,Perempuan',
            'prodi' => 'required|string|max:100',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id . '|string|max:20',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kel' => 'required|in:Laki-laki,Perempuan',
            'prodi' => 'required|string|max:100',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
