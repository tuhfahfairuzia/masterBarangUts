@extends('templates.navbar')
@section('container')
    <form action="/barangs" method="POST">
        @csrf
        <div class="container card mt-5 p-4" style="max-width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Barang</h1>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                        placeholder="Masukan nama" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kode <em>(tidak boleh sama)</em></label>
                    <input type="text" name="kode" class="form-control" id="exampleFormControlInput1"
                        placeholder="Masukan kode" value="{{ old('kode') }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                    <select class="form-select" name="satuan_barang" aria-label="Satuan" required>
                        <option selected>Pilih satuan</option>
                        @foreach ($satuans as $satuan)
                            <option value="{{ $satuan->id }}"
                                {{ $satuan->id == old('satuan_barang') ? 'selected' : '' }}>{{ $satuan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span> <!-- Simbol currency -->
                        <input type="text" name="harga" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan harga" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Masukan deskripsi" required>{{ old('deskripsi') }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/barangs" class="btn btn-secondary me-3">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
