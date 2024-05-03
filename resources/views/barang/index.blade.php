@extends('templates.navbar')
@section('container')
    <div class="container mt-5">
        <br>
        <!-- Add item button -->
        <div class="row justify-content-center offset-md-2 mb-3">
            <div class="col-md-6 text-center">
                <form action="/barangs" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search..."
                            value="{{ $search }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <a href="/barangs/create" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i></a>
            </div>
        </div>
        <!-- Table -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->id }}</td>
                                <td>{{ $barang->nama }}</td>
                                <td>{{ $barang->kode }}</td>
                                <td>{{ $barang->satuan->nama }}</td>
                                <td>{{ $barang->harga }}</td>
                                <td>
                                    <a href="{{ '/barangs/' . $barang->id }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="confirmDelete({{ $barang->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="...">
            <ul class="pagination offset-md-2">
                @if ($barangs->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $barangs->previousPageUrl() }}" class="page-link text-secondary">Previous</a>
                    </li>
                @endif
                @foreach ($barangs->links()->elements as $element)
                    @foreach ($element as $page => $url)
                        @if ($page == $barangs->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item" aria-current="page">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endforeach

                @if ($barangs->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $barangs->nextPageUrl() }}" class="page-link text-secondary">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
        <script>
            const myModal = document.getElementById('myModal')
            const myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', () => {
                myInput.focus()
            })

            function confirmDelete(id) {
                if (confirm("Yakin ingin menghapus data ini?")) {
                    console.log(id)
                    $.ajax({
                        url: '/barangs/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF untuk perlindungan
                        },
                        success: function(result) {
                            // Redirect ke halaman yang sesuai atau lakukan tindakan lain setelah penghapusan berhasil
                            window.location.reload(); // Contoh: Menyegarkan halaman setelah penghapusan berhasil
                        },
                        error: function(xhr) {
                            // Tangani kesalahan jika terjadi
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    return false;
                }
            }

            function alertHandle() {
                $("alert-panel").addClass("d-none");
            }
        </script>
    @endsection
