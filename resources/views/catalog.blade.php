@extends('layout.applanding')

@section('title', 'PST Probolinggo')

@section('content')
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-primary">
        <a class="navbar-brand" href="/" style="padding-left: 20px;">
            <img src="foto/logo_pst_putih.png" width="150" height="50" class="d-inline-block align-top" alt="">
        </a>
    </nav>
    <br>
    <div class="container" style="padding-bottom: 100px;">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="text-primary">Katalog Publikasi</h1>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="selectedYear">Pilih Tahun Terbit:</label>
            <select class="form-control form-control-sm" name="selectedYear" id="selectedYear" onchange="filterByYear()">
                @foreach ($uniqueYears as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="input-group">
            <input type="search" class="form-control rounded" id="searchInput" placeholder="Search by name or year"
                aria-label="Search" aria-describedby="search-addon" oninput="searchCatalog()" />
            <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init
                onclick="searchCatalog()">Search</button>
        </div>
        <br>
        <div class="row" id="catalogList">
            @foreach ($catalogs as $catalog)
                <div class="col-md-4 col-sm-6 catalog-card" data-name="{{ $catalog->nama_buku }}"
                    data-year="{{ $catalog->tahun_terbit }}">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ $catalog->foto }}" alt="{{ $catalog->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $catalog->nama_buku }}</h5>
                            <p class="card-text">
                                <span
                                    class="description">{{ strlen($catalog->deskripsi) > 100 ? substr($catalog->deskripsi, 0, 100) . '...' : $catalog->deskripsi }}</span>
                                @if (strlen($catalog->deskripsi) > 100)
                                    <span class="more-text" style="display: none;">{{ $catalog->deskripsi }}</span>
                                    <a href="#" class="read-more">Read More</a>
                                @endif
                            </p>
                            <p class="card-text">Release Date: {{ $catalog->tahun_terbit }}</p>
                            <a href="{{ $catalog->link }}" class="btn btn-primary">Kunjungi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to "Read More" links
            var readMoreLinks = document.querySelectorAll('.read-more');
            readMoreLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var moreText = this.previousElementSibling;
                    moreText.style.display = (moreText.style.display === 'none' || moreText.style
                        .display === '') ? 'inline' : 'none';
                    this.innerText = (this.innerText === 'Read More') ? 'Read Less' : 'Read More';
                });
            });
        });

        function searchCatalog() {
            var input, filter, cards, card, name, year, i;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            cards = document.getElementsByClassName("catalog-card");

            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                name = card.getAttribute("data-name").toUpperCase();
                year = card.getAttribute("data-year").toUpperCase();

                if (name.includes(filter) || year.includes(filter)) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }

        function filterByYear() {
            var selectedYear = document.getElementById("selectedYear").value.toUpperCase();
            var cards = document.getElementsByClassName("catalog-card");

            for (var i = 0; i < cards.length; i++) {
                var card = cards[i];
                var year = card.getAttribute("data-year").toUpperCase();

                if (selectedYear === "ALL" || year === selectedYear) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }
    </script>
@endsection
