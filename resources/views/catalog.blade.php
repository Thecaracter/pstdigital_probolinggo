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
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="text-primary">Catalog PST</h1>
            </div>
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
                            <p class="card-text">{{ $catalog->deskripsi }}</p>
                            <p class="card-text">Release Date: {{ $catalog->tahun_terbit }}</p>
                            <a href="https://probolinggokab.bps.go.id/publication.html" class="btn btn-primary">Read
                                more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
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
    </script>
@endsection
