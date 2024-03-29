@extends('layout.appform')
@section('title', 'Form Konsultasi')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar Konsultasi Virtual</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('konsultasi.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" type="text" class="form-control" name="nama" required>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group">
                                    <label for="instansi">Instansi</label>
                                    <input id="instansi" type="text" class="form-control" name="instansi" required>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" required>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group">
                                    <label for="tujuan">Pilihan Konsultasi</label>
                                    <select id="tujuan" class="form-control" name="tujuan" required>
                                        <option value="Sosial dan Kependudukan">Sosial dan Kependudukan</option>
                                        <option value="Ekonomi dan Perdagangan">Ekonomi dan Perdagangan</option>
                                        <option value="Pertanian dan Pertambangan">Pertanian dan Pertambangan</option>
                                        <!-- Tambahkan opsi tujuan lainnya sesuai kebutuhan -->
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group">
                                    <label>No Whatsapp</label>
                                    <input type="text" class="form-control" pattern="[1-9][0-9]*"
                                        title="Masukkan no Whatsapp tanpa angka 0, Contohnya 8882731612" name="no_telp"
                                        required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Submit laporan
                                    </button>
                                </div>
                            </form>

                            <a href="/" class="btn btn-danger btn-lg btn-block">
                                Kembali Ke Halaman Utama
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tampilkan pesan kesalahan jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
@endsection
