@extends('templates.navbar')
@section('container')
    {{-- @dd($barang->satuan) --}}
    <form action="/barangs/{{ $barang->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container mt-5" style="max-width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Barang</h1>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ $barang->nama }}" class="form-control"
                        id="exampleFormControlInput1" placeholder="Masukan nama" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kode</label>
                    <input type="text" name="kode" value="{{ $barang->kode }}" class="form-control"
                        id="exampleFormControlInput1" placeholder="Masukan kode" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                    <select class="form-select" name="satuan_barang" aria-label="Satuan" required>
                        <option selected>Pilih satuan</option>
                        @foreach ($satuans as $satuan)
                            <option value="{{ $satuan->id }}" {{ $satuan->id == $barang->satuan->id ? 'selected' : '' }}>
                                {{ $satuan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span> <!-- Simbol currency -->
                        <input type="text" name="harga" value="{{ $barang->harga }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="Masukan harga" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Masukan deskripsi" required>{{ $barang->deskripsi }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/barangs" class="btn btn-secondary me-3">Close</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
@endsection
