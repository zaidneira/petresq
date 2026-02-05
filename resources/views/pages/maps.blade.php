@extends('layouts.main')

@section('content')
    <div class="maps-page">

        <h1 class="maps-title">Lokasi Dokter Hewan</h1>

        <div class="maps-container">

            <!-- MAP AREA -->
            <div class="map-area">
                <div id="map"></div>
            </div>

            <!-- INFO PANEL -->
            <div class="map-info" id="mapInfo">

                <div class="doctor-card">
                    <h3 id="docName">Pilih Lokasi Klinik</h3>

                    <div class="doc-row">
                        <span>📍</span>
                        <p id="docAddress">Alamat akan tampil di sini</p>
                    </div>

                    <div class="doc-row">
                        <span>📞</span>
                        <p id="docPhone">Nomor telepon</p>
                    </div>

                    <div class="doc-row">
                        <span>⏰</span>
                        <p id="docHours">Jam operasional</p>
                    </div>
                </div>


            </div>

        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
@endpush

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // INIT MAP BANDUNG
        const map = L.map('map').setView([-6.9175, 107.6191], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        // 20 DUMMY DOKTER HEWAN BANDUNG
        const vets = [{
                name: "Klinik Hewan Gedebage",
                address: "Jl. Gedebage No.3, Bandung",
                phone: "082211445566",
                hours: "08.00 – 20.00",
                lat: -6.9461,
                lng: 107.7036
            },
            {
                name: "Pet Care Antapani",
                address: "Jl. Terusan Jakarta No.15, Antapani",
                phone: "081234567801",
                hours: "09.00 – 21.00",
                lat: -6.9145,
                lng: 107.6661
            },
            {
                name: "Klinik Hewan Dago",
                address: "Jl. Ir. H. Juanda No.45, Dago",
                phone: "081234567802",
                hours: "10.00 – 22.00",
                lat: -6.8756,
                lng: 107.6196
            },
            {
                name: "Dokter Hewan Sukajadi",
                address: "Jl. Sukajadi No.102",
                phone: "081234567803",
                hours: "08.00 – 18.00",
                lat: -6.8925,
                lng: 107.5952
            },
            {
                name: "Klinik Hewan Setiabudi",
                address: "Jl. Dr. Setiabudi No.88",
                phone: "081234567804",
                hours: "09.00 – 20.00",
                lat: -6.8654,
                lng: 107.5931
            },
            {
                name: "Pet Health Cihampelas",
                address: "Jl. Cihampelas No.120",
                phone: "081234567805",
                hours: "10.00 – 21.00",
                lat: -6.8902,
                lng: 107.6048
            },
            {
                name: "Klinik Hewan Pasteur",
                address: "Jl. Pasteur No.56",
                phone: "081234567806",
                hours: "08.00 – 19.00",
                lat: -6.8891,
                lng: 107.5807
            },
            {
                name: "Dokter Hewan Cimahi Utara",
                address: "Jl. Cihanjuang No.33",
                phone: "081234567807",
                hours: "09.00 – 17.00",
                lat: -6.8724,
                lng: 107.5503
            },
            {
                name: "Pet Care Buah Batu",
                address: "Jl. Buah Batu No.155",
                phone: "081234567808",
                hours: "08.00 – 20.00",
                lat: -6.9397,
                lng: 107.6289
            },
            {
                name: "Klinik Hewan Kopo",
                address: "Jl. Kopo No.210",
                phone: "081234567809",
                hours: "09.00 – 18.00",
                lat: -6.9448,
                lng: 107.5881
            },
            {
                name: "Dokter Hewan Margahayu",
                address: "Jl. Mars Dirgahayu No.12",
                phone: "081234567810",
                hours: "08.00 – 17.00",
                lat: -6.9573,
                lng: 107.5736
            },
            {
                name: "Pet Care Ujungberung",
                address: "Jl. A.H. Nasution No.80",
                phone: "081234567811",
                hours: "09.00 – 20.00",
                lat: -6.9086,
                lng: 107.6973
            },
            {
                name: "Klinik Hewan Arcamanik",
                address: "Jl. Arcamanik Endah No.5",
                phone: "081234567812",
                hours: "08.00 – 18.00",
                lat: -6.9035,
                lng: 107.6728
            },
            {
                name: "Dokter Hewan Cicaheum",
                address: "Jl. Ahmad Yani No.240",
                phone: "081234567813",
                hours: "09.00 – 19.00",
                lat: -6.9138,
                lng: 107.6515
            },
            {
                name: "Pet Care Pasir Koja",
                address: "Jl. Pasir Koja No.98",
                phone: "081234567814",
                hours: "10.00 – 22.00",
                lat: -6.9292,
                lng: 107.5867
            },
            {
                name: "Klinik Hewan Cibiru",
                address: "Jl. Cibiru Hilir No.44",
                phone: "081234567815",
                hours: "08.00 – 17.00",
                lat: -6.9338,
                lng: 107.7225
            },
            {
                name: "Dokter Hewan Lengkong",
                address: "Jl. Lengkong Besar No.67",
                phone: "081234567816",
                hours: "09.00 – 20.00",
                lat: -6.9239,
                lng: 107.6184
            },
            {
                name: "Pet Health Rancasari",
                address: "Jl. Rancasari No.22",
                phone: "081234567817",
                hours: "08.00 – 18.00",
                lat: -6.9535,
                lng: 107.6559
            },
            {
                name: "Klinik Hewan Sarijadi",
                address: "Jl. Sarijadi Raya No.10",
                phone: "081234567818",
                hours: "09.00 – 21.00",
                lat: -6.8718,
                lng: 107.5756
            },
            {
                name: "Dokter Hewan Cicendo",
                address: "Jl. Pajajaran No.140",
                phone: "081234567819",
                hours: "10.00 – 22.00",
                lat: -6.9012,
                lng: 107.5897
            }
        ];


        const infoPanel = document.getElementById('mapInfo');

        vets.forEach(vet => {
            const marker = L.marker([vet.lat, vet.lng]).addTo(map);

            marker.on('click', () => {
                document.getElementById('docName').textContent = vet.name;
                document.getElementById('docAddress').textContent = vet.address;
                document.getElementById('docPhone').textContent = vet.phone;
                document.getElementById('docHours').textContent = vet.hours;

                infoPanel.classList.add('active');
            });
        });
    </script>
@endpush
