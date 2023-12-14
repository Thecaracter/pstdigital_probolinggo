@extends('layout.app')

@section('title', 'Konsultasi Virtual')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Konsultasi</h4>

                            <div class="align-right text-right">
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
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">No Telepon/WA</th>
                                            <th class="text-center">link</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($konsultasi as $no => $konsul)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $konsul->nama }}</td>
                                                <td class="text-center">{{ $konsul->email }}</td>
                                                <td class="text-center">{{ $konsul->no_telp }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary kirim-link-button"
                                                        data-phone="{{ $konsul->no_telp }}" data-toggle="modal"
                                                        data-target="#linkModal">
                                                        Kirim link
                                                    </button>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <form id="deleteForm-{{ $konsul->id }}" method="post"
                                                            action="{{ route('konsultasi.destroy', $konsul->id) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $konsul->id }}')">Delete</button>
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
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="linkModalLabel">Isi Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="linkForm">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" id="link" name="link"
                                    placeholder="Masukkan link">
                            </div>
                            <button type="button" class="btn btn-primary" id="submitLink">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Letakkan di bagian bawah sebelum tag </body> -->
        <script>
            $(document).ready(function() {
                var phoneNumber = '';

                $('.kirim-link-button').on('click', function() {
                    phoneNumber = String($(this).data('phone'));
                });

                $('#submitLink').on('click', function() {
                    var linkInput = $('#link').val();

                    if (!phoneNumber.startsWith('+')) {
                        phoneNumber = '+62' + phoneNumber;
                    }

                    var whatsappLink = 'https://wa.me/' + phoneNumber + '?text=' +
                        'Berikut merupakan link untuk konsultasi ' + linkInput +
                        ' silahkan bergabung sekarang juga';
                    console.log(whatsappLink);
                    window.open(whatsappLink, '_blank'); // Open link in a new tab
                    $('#linkModal').modal('hide');
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
