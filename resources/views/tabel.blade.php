@extends('layouts.app')
@section('title', 'Tabel Informasi - BUSTAT LAMPUNG')

@push('styles')
    {{-- Memuat CSS untuk ikon Font Awesome dan library DataTables --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/> {{-- REKOMENDASI: Gunakan style Bootstrap 5 untuk konsistensi --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
    <style>
        /* Variabel Warna Tema (diambil dari tema navbar/peta) */
        :root {
            --primary-color: #3a2d27; /* Warna biru utama dari kelas .bg-primary Bootstrap */
            --primary-darker: #3a2d27; /* Warna biru sedikit lebih gelap untuk hover/active */
            --light-gray-border: #dee2e6; /* Warna border standar Bootstrap */
            --white-color: #ffffff;
            --text-color-dark: #212529; /* Warna teks gelap standar */
        }

        /* Gaya profesional untuk container dan judul */
        .content-container {
            max-width: 1200px;
            margin: 40px auto;
            background: var(--white-color);
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            border: 1px solid var(--light-gray-border); /* Tambahkan border halus */
        }

        .content-container h2, .content-container h3 {
            color: var(--primary-color); /* Menyesuaikan warna judul dengan tema utama */
        }

        .content-container h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .content-container h3 {
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #a9cffa; /* Border dengan warna biru muda, turunan dari primary */
            font-size: 1.5rem;
        }
        .content-container p {
            text-indent: 0;
            text-align: left;
            margin-bottom: 1.5rem;
            color: #6c757d; /* Warna teks deskripsi yang lebih lembut */
        }

        /* Styling DataTables agar sesuai tema Bootstrap .bg-primary */
        table.dataTable thead th {
            background-color: var(--primary-color); /* Latar belakang header tabel utama */
            color: var(--white-color); /* Teks putih di atas latar biru */
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid var(--light-gray-border);
        }

        table.dataTable th, table.dataTable td {
             border-bottom: 1px solid var(--light-gray-border); /* Garis pemisah baris yang konsisten */
        }

        /* Styling Paginasi */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: var(--primary-color) !important; /* Menggunakan warna utama untuk halaman aktif */
            border-color: var(--primary-darker) !important;
            color: white !important;
            box-shadow: none; /* Menghilangkan bayangan default */
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e9ecef !important; /* Warna hover yang netral */
            border-color: #ddd !important;
            color: var(--text-color-dark) !important;
        }

        /* Styling elemen lain DataTables */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
             color: #6c757d; /* Warna teks yang lebih lembut untuk kontrol */
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid var(--light-gray-border);
            border-radius: 0.375rem; /* Samakan dengan input Bootstrap */
            padding: 0.375rem 0.75rem;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            outline: 0;
        }

    </style>
@endpush

@section('content')
<main class="content-container">
    <h2><i class="fa-solid fa-table"></i> Tabel Informasi Transportasi Lampung</h2>

    {{-- BAGIAN 1: TABEL TERMINAL DINAMIS --}}
    <section>
        <h3><i class="fa-solid fa-map-pin"></i> Data Sebaran Terminal Bus</h3>
        <p>Tabel interaktif berisi daftar titik lokasi terminal bus di seluruh Provinsi Lampung. Gunakan fitur pencarian untuk menemukan data dengan cepat.</p>
        <table id="tabel-terminal" class="display table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Terminal</th>
                    <th>Alamat</th>
                    <th>Kabupaten/Kota</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
            </thead>
            <tbody>
                {{-- Konten tabel ini akan diisi secara otomatis oleh JavaScript --}}
            </tbody>
        </table>
    </section>

    {{-- BAGIAN 2: TABEL JUMLAH BUS STATIS --}}
    <section>
        <h3><i class="fa-solid fa-bus"></i> Banyaknya Mobil Bus Menurut Kabupaten/Kota</h3>
        <p>Data jumlah kendaraan bus yang terdaftar di setiap kabupaten/kota di Provinsi Lampung dari tahun 2021 hingga 2023.</p>
        <table id="tabel-bus" class="display table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kabupaten/Kota</th>
                    <th>2021</th>
                    <th>2022</th>
                    <th>2023</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1</td><td>Lampung Barat</td><td>39</td><td>39</td><td>38</td></tr>
                <tr><td>2</td><td>Tanggamus</td><td>21</td><td>24</td><td>26</td></tr>
                <tr><td>3</td><td>Lampung Selatan</td><td>617</td><td>621</td><td>626</td></tr>
                <tr><td>4</td><td>Lampung Timur</td><td>35</td><td>39</td><td>49</td></tr>
                <tr><td>5</td><td>Lampung Tengah</td><td>772</td><td>779</td><td>778</td></tr>
                <tr><td>6</td><td>Lampung Utara</td><td>556</td><td>559</td><td>561</td></tr>
                <tr><td>7</td><td>Way Kanan</td><td>26</td><td>28</td><td>29</td></tr>
                <tr><td>8</td><td>Tulang Bawang</td><td>24</td><td>28</td><td>30</td></tr>
                <tr><td>9</td><td>Pesawaran</td><td>55</td><td>59</td><td>61</td></tr>
                <tr><td>10</td><td>Pringsewu</td><td>15</td><td>16</td><td>17</td></tr>
                <tr><td>11</td><td>Mesuji</td><td>9</td><td>10</td><td>11</td></tr>
                <tr><td>12</td><td>Tulang Bawang Barat</td><td>13</td><td>13</td><td>16</td></tr>
                <tr><td>13</td><td>Pesisir Barat</td><td>-</td><td>-</td><td>-</td></tr>
                <tr><td>14</td><td>Bandar Lampung</td><td>2,627</td><td>2,668</td><td>2,721</td></tr>
                <tr><td>15</td><td>Metro</td><td>85</td><td>89</td><td>101</td></tr>
            </tbody>
            <tfoot>
                <tr><th colspan="2" style="text-align:right">Total Provinsi Lampung:</th><th>4,914</th><th>4,972</th><th>5,064</th></tr>
            </tfoot>
        </table>
    </section>
</main>
@endsection

@push('scripts')
    {{-- Memuat JavaScript untuk jQuery dan library DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables untuk Tabel Terminal (mengambil data dari API)
            $('#tabel-terminal').DataTable({
                processing: true,
                ajax: '{{ route("terminals.json") }}', // Mengambil data dari route API
                columns: [
                    { data: 'id' },
                    { data: 'nama_terminal' },
                    { data: 'alamat' },
                    { data: 'kabupaten' },
                    { data: 'latitude' },
                    { data: 'longitude' }
                ],
                pageLength: 10, // Tampilkan 10 data per halaman
                language: { // Opsi untuk mengubah teks default ke Bahasa Indonesia
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    },
                    processing: "Memuat data..."
                }
            });

            // Inisialisasi DataTables untuk Tabel Jumlah Bus (data sudah ada di HTML)
            $('#tabel-bus').DataTable({
                pageLength: 10,
                ordering: false, // Menonaktifkan pengurutan kolom untuk tabel ini
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data yang tersedia",
                    paginate: {
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endpush
