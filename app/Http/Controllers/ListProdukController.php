<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::where('harga', '>', 10000)->orderBy('harga', 'asc')->get();
        return view('list_produk', compact('data'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $produk = new Produk;
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function delete($id) 
    {
        $produk = Produk::find($id);
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }
    }

    public function edit($id)
    {
        $data = Produk::where('harga', '>', 10000)->orderBy('harga', 'asc')->get();
        $produkEdit = Produk::find($id);
        
        if (!$produkEdit) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
        
        return view('list_produk', compact('data', 'produkEdit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
        ]);

        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate!');
    }
}