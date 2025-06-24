<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSTAT LAMPUNG - Peta Interaktif</title>

    {{-- Google Fonts (Poppins) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- CSS Framework & Pustaka Utama --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search@3.0.9/dist/leaflet-search.src.css">

    {{-- CSS Tema Utama (dari Layout) --}}
    <style>
        :root {
            --lampung-gold: #FFD700;
            --lampung-dark: #3a2d27;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar Customization */
        .navbar {
            background-color: var(--lampung-dark) !important;
            z-index: 1050; /* Pastikan di atas semua elemen lain */
        }

        .navbar-brand {
            font-weight: 700;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .nav-link.active,
        .nav-link:hover {
            color: var(--lampung-gold) !important;
        }

        .navbar-brand i {
            color: var(--lampung-gold);
        }

        /* Footer */
        .footer {
            background-color: var(--lampung-dark);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>

    {{-- CSS Spesifik Halaman Peta (dari file kedua) --}}
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden; /* Mencegah scroll di body */
        }

        .app-wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Override padding-top dari layout karena header tidak fixed di halaman ini */
        .main-content {
            padding-top: 56px; /* Ruang untuk navbar */
            display: flex;
            flex-grow: 1;
            overflow: hidden;
        }

        #sidebar {
            width: 350px;
            min-width: 350px;
            background-color: var(--light-bg);
            border-right: 1px solid #dee2e6;
            padding: 1.5rem;
            overflow-y: auto;
            z-index: 1001;
        }

        #map-container {
            flex-grow: 1;
            position: relative;
        }

        #map {
            height: 100%;
            width: 100%;
        }

        .sidebar-section {
            margin-bottom: 2rem;
        }

        .sidebar-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 2px solid var(--lampung-dark);
            padding-bottom: 0.5rem;
        }

        .legend-card {
            padding: 1rem;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .legend-card h6 {
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .legend-card div {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .legend-card img {
            margin-right: 10px;
        }

        .legend-card hr {
            margin: 0.75rem 0;
        }

        #loading-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2000;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="app-wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
                <div class="container-fluid px-4">
                    <a class="navbar-brand" href="#">
                        <i class="bi bi-bus-front-fill"></i>
                        BUSTAT LAMPUNG
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="peta">Peta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tabel">Tabel Informasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="main-content">
            <aside id="sidebar">
                <div class="sidebar-section">
                    <h5 class="sidebar-title">Peta Dasar</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="basemap" id="basemapOSM" value="osm" checked>
                        <label class="form-check-label" for="basemapOSM">Peta Jalan (OSM)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="basemap" id="basemapSatellite" value="satellite">
                        <label class="form-check-label" for="basemapSatellite">Citra Satelit</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="basemap" id="basemapDark" value="dark">
                        <label class="form-check-label" for="basemapDark">Mode Gelap</label>
                    </div>
                </div>

                <div class="sidebar-section">
                    <h5 class="sidebar-title">Lapisan Overlay</h5>
                    <div class="form-check form-switch">
                        <input class="form-check-input overlay-checkbox" type="checkbox" id="layerTitikTerminal" data-layer="titikTerminal" checked>
                        <label class="form-check-label" for="layerTitikTerminal">Titik Terminal</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input overlay-checkbox" type="checkbox" id="layerJalanLokal" data-layer="jalanLokal" checked>
                        <label class="form-check-label" for="layerJalanLokal">Jalan Lokal</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input overlay-checkbox" type="checkbox" id="layerBatasKabupaten" data-layer="batasKabupaten" checked>
                        <label class="form-check-label" for="layerBatasKabupaten">Batas Kabupaten/Kota</label>
                    </div>
                </div>

                <div class="sidebar-section">
                    <h5 class="sidebar-title">Legenda</h5>
                    <div id="legend" class="legend-card">
                        <h6>Legenda Peta</h6>
                        <div>
                            <img src="http://localhost:8080/geoserver/lampung_terminal/wms?REQUEST=GetLegendGraphic&VERSION=1.1.0&FORMAT=image/png&LAYER=lampung_terminal:terminal_pt_180020240902120538" alt="Legenda Terminal">
                            <span>Terminal Bus</span>
                        </div>
                        <hr>
                        <div>
                            <img src="http://localhost:8080/geoserver/jalan_balam_pgweb_acr12/wms?REQUEST=GetLegendGraphic&VERSION=1.1.0&FORMAT=image/png&LAYER=jalan_balam_pgweb_acr12:jalan_ln_180020240910082731" alt="Legenda Jalan Lokal">
                            <span>Jalan Lokal</span>
                        </div>
                        <hr>
                        <div>
                            <img src="http://localhost:8080/geoserver/pgwebacr11/wms?REQUEST=GetLegendGraphic&VERSION=1.1.0&FORMAT=image/png&LAYER=pgwebacr11:administrasikabkota_ar_180020240903075753" alt="Legenda Kabupaten">
                        </div>
                    </div>
                </div>

                <div class="sidebar-section">
                    <h5 class="sidebar-title">Fitur & Analisis</h5>
                    <p>Klik pada ikon terminal di peta untuk detail, atau gunakan fitur di bawah ini.</p>
                    <button id="geolocate-btn" class="btn btn-secondary w-100"><i class="bi bi-geo-alt-fill"></i> Tampilkan Lokasi Saya</button>
                </div>
            </aside>

            <div id="map-container">
                <div id="map"></div>
                <div id="loading-spinner" class="d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </main>

        </div>

    {{-- Pustaka JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-search@3.0.9/dist/leaflet-search.src.js"></script>

    {{-- JS Kustom untuk Peta --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi peta
        const map = L.map('map', {
            zoomControl: false
        }).setView([-5.1370, 105.2620], 9);

        L.control.zoom({
            position: 'topright'
        }).addTo(map);

        const spinner = document.getElementById('loading-spinner');
        const showSpinner = () => spinner.classList.remove('d-none');
        const hideSpinner = () => spinner.classList.add('d-none');

        // PANE SETUP
        map.createPane('polygonPane');
        map.getPane('polygonPane').style.zIndex = 410;
        map.createPane('linePane');
        map.getPane('linePane').style.zIndex = 420;
        map.createPane('pointPane');
        map.getPane('pointPane').style.zIndex = 430;

        // BASEMAPS
        const basemaps = {
            osm: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap contributors' }),
            satellite: L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', { attribution: '© Esri' }),
            dark: L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', { attribution: '© CARTO' })
        };
        basemaps.osm.addTo(map);

        // WMS LAYERS
        const wmsOptions = { format: 'image/png', transparent: true };
        const layers = {
            batasKabupaten: L.tileLayer.wms('http://localhost:8080/geoserver/pgwebacr11/wms', { ...wmsOptions, layers: 'pgwebacr11:administrasikabkota_ar_180020240903075753', pane: 'polygonPane' }),
            jalanLokal: L.tileLayer.wms('http://localhost:8080/geoserver/jalan_balam_pgweb_acr12/wms', { ...wmsOptions, layers: 'jalan_balam_pgweb_acr12:jalan_ln_180020240910082731', pane: 'linePane' }),
            titikTerminal: L.tileLayer.wms("http://localhost:8080/geoserver/lampung_terminal/wms", { ...wmsOptions, layers: "lampung_terminal:terminal_pt_180020240902120538", pane: 'pointPane' })
        };

        Object.values(layers).forEach(layer => {
            layer.on('loading', showSpinner);
            layer.on('load', hideSpinner);
        });

        // LAYER CONTROL
        document.querySelectorAll('input[name="basemap"]').forEach(radio => {
            radio.addEventListener('change', (e) => {
                Object.values(basemaps).forEach(bm => map.removeLayer(bm));
                map.addLayer(basemaps[e.target.value]);
            });
        });
        document.querySelectorAll('.overlay-checkbox').forEach(checkbox => {
            const layerName = checkbox.dataset.layer;
            const layer = layers[layerName];
            if (checkbox.checked) map.addLayer(layer);
            checkbox.addEventListener('change', (e) => {
                if (e.target.checked) map.addLayer(layer);
                else map.removeLayer(layer);
            });
        });

        // GEOLOCATION
        document.getElementById('geolocate-btn').addEventListener('click', () => {
            map.locate({ setView: true, maxZoom: 16 });
        });
        map.on('locationfound', (e) => {
            L.marker(e.latlng).addTo(map).bindPopup("Anda berada di sekitar sini!").openPopup();
        });
        map.on('locationerror', (e) => alert(e.message));

        // SEARCH CONTROL
        new L.Control.Search({
            layer: L.geoJson(null),
            url: 'http://localhost:8080/geoserver/lampung_terminal/wfs?service=WFS&version=1.1.0&request=GetFeature&typeName=lampung_terminal:terminal_pt_180020240902120538&outputFormat=application/json',
            propertyName: 'namobj',
            marker: false,
            moveToLocation: function(latlng, title, map) {
                map.setView(latlng, 15);
                L.marker(latlng).addTo(map).bindPopup(title).openPopup();
            },
            position: 'topright'
        }).addTo(map);

        // GetFeatureInfo via WFS onClick
        map.on('click', function(e) {
            if (!map.hasLayer(layers.titikTerminal)) {
                return;
            }
            showSpinner();

            const buffer = 0.001;
            const bbox = [
                e.latlng.lng - buffer, e.latlng.lat - buffer,
                e.latlng.lng + buffer, e.latlng.lat + buffer
            ].join(',');

            const wfsUrl = 'http://localhost:8080/geoserver/lampung_terminal/wfs';
            const params = {
                service: 'WFS',
                version: '1.0.0',
                request: 'GetFeature',
                typeName: 'lampung_terminal:terminal_pt_180020240902120538',
                outputFormat: 'application/json',
                bbox: bbox + ',EPSG:4326'
            };

            const finalUrl = wfsUrl + L.Util.getParamString(params);

            fetch(finalUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Network response was not ok, status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    hideSpinner();
                    if (data.features && data.features.length > 0) {
                        const feature = data.features[0];
                        const props = feature.properties;
                        const popupContent = `
                            <div style="max-width: 250px;">
                                <h6 class="text-primary fw-bold">${props.namobj || 'Nama Tidak Tersedia'}</h6>
                                <hr class="my-1">
                                <p class="mb-1"><strong>Tipe:</strong> ${props.tipe || 'N/A'}</p>
                                <p class="mb-1"><strong>Alamat:</strong> ${props.alamat || 'N/A'}</p>
                                <p class="mb-0"><strong>Kab/Kota:</strong> ${props.wabkot || 'N/A'}</p>
                            </div>`;
                        L.popup({ minWidth: 200 })
                            .setLatLng(e.latlng)
                            .setContent(popupContent)
                            .openOn(map);
                    }
                })
                .catch(error => {
                    hideSpinner();
                    console.error('Error fetching WFS data:', error);
                    alert("Gagal mengambil data fitur. Periksa konsol (F12) untuk detail.");
                });
        });
    });
    </script>
</body>
</html>
