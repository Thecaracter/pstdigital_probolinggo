@extends('layout.app')

@section('title', 'Catalog')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Catalog</h4>

                            <div class="align-right text-right">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                    Tambah Catalog
                                </button>
                            </div>
                            <br>
                            <div class="search-element">
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>

                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Buku</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Tahun Terbit</th>
                                            <th class="text-center">Link Buku</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($catalogs as $no => $catalog)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $catalog->nama_buku }}</td>
                                                <td class="text-center">{{ $catalog->deskripsi }}</td>
                                                <td class="text-center">{{ $catalog->tahun_terbit }}</td>
                                                <td class="text-center">{{ $catalog->link }}</td>
                                                <td class="align-middle text-center">
                                                    <!-- Add your action buttons (Edit, Delete) here -->
                                                    <button data-toggle="modal" data-target="#photoModal{{ $catalog->id }}"
                                                        type="button" class="btn btn-primary">Detail</button>
                                                    <!-- Add other action buttons as needed -->
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editUserModal{{ $catalog->id }}" type="button"
                                                            class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $catalog->id }}" method="post"
                                                            action="{{ route('catalog.destroy', $catalog->id) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $catalog->id }}')">Delete</button>
                                                        </form>
                                                        <script>
                                                            function confirmDelete(userId) {
                                                                Swal.fire({
                                                                    title: 'Yakin Mo Ngapus Bro?',
                                                                    text: "Nggak bakal bisa balik lo",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, delete it!'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        // Submit form untuk menghapus data
                                                                        document.getElementById('deleteForm-' + userId).submit();
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </span>
                                                </td>
                                            </tr>

                                            <!-- Modal for displaying the photo -->
                                            <div class="modal fade" id="photoModal{{ $catalog->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="photoModalLabel{{ $catalog->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="photoModalLabel{{ $catalog->id }}">
                                                                Book Photo</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Display the larger version of the photo -->
                                                            <img src="{{ asset($catalog->foto) }}" alt="Book Photo"
                                                                style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for adding new data -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Catalog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your form for creating new data here -->
                        <form action="{{ route('catalog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Add form fields for Catalog data (nama_buku, deskripsi, tahun_terbit, foto) -->
                            <div class="form-group">
                                <label for="nama_buku">Nama Buku</label>
                                <input type="text" class="form-control" id="nama_buku" name="nama_buku" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="link">Link Buku</label>
                                <textarea class="form-control" id="link" name="link" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" id="foto" name="foto" required>
                            </div>
                            <!-- Add other form fields as needed -->

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary">Tambah Catalog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($catalogs as $catalog)
            <!-- Modal for updating data -->
            <div class="modal fade" id="editUserModal{{ $catalog->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editUserModalLabel{{ $catalog->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel{{ $catalog->id }}">Edit Catalog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your form for updating data here -->
                            <form action="{{ route('catalog.update', $catalog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Add form fields for Catalog data (nama_buku, deskripsi, tahun_terbit, foto) -->
                                <div class="form-group">
                                    <label for="nama_buku">Nama Buku</label>
                                    <input type="text" class="form-control" id="nama_buku" name="nama_buku"
                                        value="{{ $catalog->nama_buku }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $catalog->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                        value="{{ $catalog->tahun_terbit }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link Buku</label>
                                    <textarea class="form-control" id="link" name="link" rows="3" required>{{ $catalog->link }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto">
                                </div>
                                <!-- Add other form fields as needed -->

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary">Update Catalog</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script>
            $(document).ready(function() {
                $('#searchInput').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('table tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
        @if (session('notification'))
            <script>
                $(document).ready(function() {
                    const {
                        title,
                        text,
                        type
                    } = @json(session('notification'));
                    Swal.fire(title, text, type);
                });
            </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#createModal').on('hidden.bs.modal', function() {
                    $(this).find('form')[0].reset();
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#searchInput').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('table tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
    @endsection
