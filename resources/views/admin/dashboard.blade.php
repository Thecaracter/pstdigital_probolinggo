@extends('layout.app')
@section('title', 'Dashboard')

@section('content')
    <div class="main-content">
        <form id="filterForm">
            <div class="form-group">
                <label for="dateFilter">Pilih Filter Waktu:</label>
                <select class="form-control form-control-sm" name="dateFilter" id="dateFilter">
                    <option value="today">Hari Ini</option>
                    <option value="thisMonth">Bulan Ini</option>
                    <option value="thisYear">Tahun Ini</option>
                </select>
            </div>
        </form>
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-center">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah Konsultasi Selesai</h5>
                                        <h1 class="mb-3 font-35" id="konsultasiCount">{{ $konsultasiCount }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-22">Jumlah Buku</h5>
                                        <h2 class="mb-3 font-35" id="bukuCount">{{ $bukuCount }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="admin/assets/img/banner/2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <!-- Script JavaScript dan jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Memuat data pertama kali dengan filter hari ini
        $(document).ready(function() {
            loadData('today');
        });

        // Fungsi untuk memuat data berdasarkan filter waktu
        function loadData(filter) {
            $.ajax({
                url: '/dashboard/getData',
                type: 'GET',
                data: {
                    filter: filter
                },
                success: function(response) {
                    // Update konten dengan data baru
                    $('#konsultasiCount').text(response.konsultasiCount);
                    $('#bukuCount').text(response.bukuCount);

                    // Log ke konsol untuk melihat perubahan

                },
                error: function(error) {
                    console.log('Error loading data:', error);
                }
            });
        }

        // Menangani perubahan dropdown
        $('#dateFilter').change(function() {
            var selectedFilter = $(this).val();
            loadData(selectedFilter);
        });

        // Menangani submit form untuk filter
        $('#filterForm').submit(function(event) {
            event.preventDefault();
            var selectedFilter = $('#dateFilter').val();
            loadData(selectedFilter);
        });
    </script>
@endsection
