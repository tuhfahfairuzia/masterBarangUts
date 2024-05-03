<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use GuzzleHttp\Psr7\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        if ($search) {
            $barangs = Barang::with('satuan')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->paginate(8);
        } else {
            $barangs = Barang::with('satuan')->paginate(5);
        }

        $satuans = Satuan::all();
        return view('barang.index', [
            'title' => 'Tuhfah Market',
            'barangs' => $barangs,
            'satuans' => $satuans,
            'search' => $search,
            'route' => 'barang'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuans = Satuan::all();
        return view('barang.create', [
            'title' => 'Tuhfah Market',
            'satuans' => $satuans,
            'route' => 'barang'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'kode' => 'required|string|unique:barangs',
            'satuan_barang' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string'
        ]);

        $barang = Barang::create([
            'nama' => $validatedData['nama'],
            'kode' => $validatedData['kode'],
            'satuan_barang' => $validatedData['satuan_barang'],
            'harga' => $validatedData['harga'],
            'deskripsi' => $validatedData['deskripsi']
        ]);
        if ($barang->wasRecentlyCreated) {
            return redirect('/barangs')->with('success', 'Data berhasil dimasukkan');
        } else {
            return redirect('/barangs/create')->with('error', 'Gagal memasukkan data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        $satuans = Satuan::all();
        return view('barang.update', [
            'title' => 'Tuhfah Market',
            'barang' => $barang,
            'satuans' => $satuans,
            'route' => 'barang'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        // dd($barang->id);
        $validatedData = $request->validate([
            'nama' => 'required|string',
            // 'kode' => 'required|string|unique:barangs',
            'kode' => 'required|string|unique:barangs,kode,' . $barang->id,
            'satuan_barang' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string'
        ]);

        $updateSuccess = $barang->update($validatedData);

        if ($updateSuccess) {
            return redirect('/barangs')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect('/barangs')->with('error', 'Gagal memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
    }
}
