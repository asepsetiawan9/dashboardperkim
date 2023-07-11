@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Peta Sebaran'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="container position-relative ">
            <div class="row">
                <div class="col-md-3 d-none">
                    <div class="form-group">
                        <div for="filter1 " class="text-white text-sm pb-2 text-bold">Tampilkan Berdasarkan:</div>
                        <select class="form-select" id="filter1" onchange="filterByKecamatan()">
                                <option selected value="all">Jumlah Penduduk</option>
                            @foreach ($status as $stat)
                                <option value="{{ $stat }}">{{ $stat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 d-none" >
                    <div class="form-group">
                        <div for="filterVar " class="text-white text-sm pb-2 text-bold">Variabel:</div>
                        <select class="form-select" id="filterVar" onchange="filterByKecamatan()">
                            <option selected value="all">Pilih Variabel</option>
                            @foreach ($variabels as $variabel)
                            <option value="{{ $variabel }}">{{ $variabel === null ? 'TIDAK BERSEKOLAH' : $variabel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <div for="filter2" class="text-white text-sm pb-2 text-bold">Status Rumah:</div>
                        <select class="form-select" >
                            <option  value="jumlah_penduduk">Pilih Status</option>
                            <option  value="jumlah_penduduk">Rumah Sehat dan Layak Huni</option>
                            <option selected value="jumlah_penduduk">Rumah Tidak Sehat dan Tidak Layak Huni</option>
                            <!-- @foreach ($kecLabels as $index => $kecLabel)
                                <option value="{{ $kecId[$index] }}">{{ $kecLabel }}</option>
                            @endforeach -->
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <div for="filter2" class="text-white text-sm pb-2 text-bold">Kecamatan:</div>
                        <select class="form-select" id="filter2" onchange="filterByKecamatan()">
                            <option selected value="jumlah_penduduk">Pilih Kecamatan</option>
                            @foreach ($kecLabels as $index => $kecLabel)
                                <option value="{{ $kecId[$index] }}">{{ $kecLabel }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div for="filter3 " class="text-white text-sm pb-2 text-bold">Tahun:</div>
                        <select class="form-select" id="filter3" onchange="filterByKecamatan()" name="year">
                            <option selected value="all">Pilih Tahun</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="pb-3 text-bold text-white">Dashboard Perumahan Berdasarkan Status Layak dan Tidak Layak Huni
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">

            <div class="d-flex flex-row gap-3 w-100 mt-3 position-relative d-none">
                <div class="bg-danger rounded-3 p-3 w-100 text-white text-bold">Desil 1
                    <div class="fs-4 text-bold" id="jml_desil1">{{ number_format($jml_desil1 ?? 0) }}</div>
                </div>
                <div class="bg-desil-2 rounded-3 p-3 w-100 text-white text-bold">Desil 2
                     <div class="fs-4 text-bold" id="jml_desil2">{{ number_format($jml_desil2 ?? 0) }}</div>
                </div>
                <div class="bg-desil-3 rounded-3 p-3 w-100 text-white text-bold">Desil 3
                     <div class="fs-4 text-bold" id="jml_desil3">{{ number_format($jml_desil3 ?? 0) }}</div>
                </div>
                <div class="bg-desil-4 rounded-3 p-3 w-100 text-white text-bold">Desil 4
                     <div class="fs-4 text-bold" id="jml_desil4">{{ number_format($jml_desil4 ?? 0) }}</div>
                </div>
            </div>
            <div class="card mt-3 p-3">
                <h5>Peta Sebaran Rumah Tidak Layak Huni</h5>
                <div id="map"></div>
            </div>
            <!-- <div class="card mt-3 p-3">
                <h5>Peta Sebaran Rumah Layak Huni</h5>
                <div id="map"></div>
            </div> -->
        </div>
        <div class="col-lg-5">
            <div class="card ">
                <div class="chart">
                    <canvas id="horizonChart" class="chart-canvas" height="500"></canvas>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
</div>
@endsection

@push('js')
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const ctx2 = document.getElementById('horizonChart').getContext('2d');
    let chart2;
    let labels2 = <?php echo json_encode($nameDes); ?>;
    let data2 = <?php echo json_encode($kecValue); ?>;

    function createChart2(labels, data) {
        chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '#',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
            }
        });

        return chart2;
    }
    chart2 = createChart2(labels2, data2);

    function filterByKecamatan() {
        const selectElement1 = document.getElementById('filter1');
        const selectedStatus = selectElement1.value;
        const selectElement = document.getElementById('filter2');
        const selectedKecId = selectElement.value;
        const selectedKecLabel = selectElement.options[selectElement.selectedIndex].text;
        const selectedYear = document.getElementById('filter3').value;
        const selectedVar = document.getElementById('filterVar').value;

        const data = {
            status: selectedStatus,
            kecId: selectedKecId,
            kecLabel: selectedKecId === 'jumlah_penduduk' ? 'jumlah_penduduk' : selectedKecLabel,
            year: selectedYear,
            variabel: selectedVar
        };

        // Send data using AJAX
        $.ajax({
            url: '{{ route("map.filterKecamatan") }}',
            method: 'GET',
            data: data,
            success: function (response) {
                const message = response.message;
                labels2 = message.nameDes;
                data2 = message.desValue;

                chart2.data.labels = labels2;
                chart2.data.datasets[0].data = data2;
                chart2.update();

                document.getElementById('jml_desil1').innerText = message.jml_desil1;
                document.getElementById('jml_desil2').innerText = message.jml_desil2;
                document.getElementById('jml_desil3').innerText = message.jml_desil3;
                document.getElementById('jml_desil4').innerText = message.jml_desil4;
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    document.getElementById('filter1').addEventListener('change', filterByKecamatan);
    document.getElementById('filter2').addEventListener('change', filterByKecamatan);
    document.getElementById('filter3').addEventListener('change', filterByKecamatan);
    document.getElementById('filterVar').addEventListener('change', filterByKecamatan);
});

</script>
@endpush

@push('js')
<script>
    // Inisialisasi peta
    var map = L.map('map').setView([-7.2278, 107.9087], 10);
    var colors = ['#ffd1d1', '#ffa3a3', '#fc5151', '#ff0000', '#a60202'];
    var legend;

    // Tambahkan layer peta dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Fungsi untuk memperbarui tampilan geojson dengan filter tahun
    function updateGeojson(year, variable) {
        // console.log(variable);
        fetch(`/api/geojson?year=${year}&variable=${variable}`)

            .then(function (response) {

                return response.json();
            })
            .then(function (data) {
                // Menghapus layer geojson yang ada sebelumnya
                console.log(data);
                if (geojsonLayer) {
                    map.removeLayer(geojsonLayer);
                }

                // Mendapatkan semua nilai dari setiap kecamatan
                var allValues = data.features.map(function (feature) {
                    return feature.properties.nilai;
                });

                // Menghitung rentang nilai secara dinamis
                var min = Math.min.apply(null, allValues);
                var max = Math.max.apply(null, allValues);
                var rangeSize = Math.ceil((max - min + 1) / 5); // Jumlah rentang diatur menjadi 5

                // Definisikan rentangan nilai dan warna yang sesuai
                var ranges = [];
                for (var i = 0; i < 5; i++) {
                    var rangeMin = min + i * rangeSize;
                    var rangeMax = rangeMin + rangeSize - 1;
                    ranges.push({
                        min: rangeMin,
                        max: rangeMax,
                        color: colors[i % colors.length]
                    });
                }

                geojsonLayer = L.geoJSON(data, {
                    style: function (feature) {
                        // Mendapatkan nilai dari setiap kecamatan
                        var nilai = feature.properties.nilai;

                        // Tentukan warna berdasarkan rentangan nilai
                        var color = 'gray'; // Warna default
                        for (var i = 0; i < ranges.length; i++) {
                            if (nilai >= ranges[i].min && nilai <= ranges[i].max) {
                                color = ranges[i].color;
                                break;
                            }
                        }

                        // Kembalikan style dengan warna yang sesuai
                        return {
                            fillColor: color,
                            color: '#000000',
                            fillOpacity: 1,
                            weight: 1
                        };
                    },
                    onEachFeature: function (feature, layer) {
                        // Mendapatkan properti dari setiap kecamatan
                        var properties = feature.properties;

                        // Menampilkan popup saat mouse memasuki area kecamatan
                        layer.on('mouseover', function (e) {
                            var tahun = properties.tahun !== null ? properties.tahun : 'Semua Tahun';
                            var variabel = properties.variabel !== 'all' ? properties.variabel : 'Semua Variabel';
                                variabel = properties.variabel === null ? 'TIDAK BERSEKOLAH' : variabel;

                            layer.bindPopup(
                                "<b>Tahun: </b>" + tahun +
                                // "<br><b>Variabel: </b>" + variabel +
                                "<br><b>Kecamatan: </b>" + properties.kecamatan +
                                "<br><b>Kabupaten: </b>" + properties.nmkab +
                                "<br><b>Provinsi: </b>" + properties.nmprov +
                                "<br><b>Jumlah: </b>" + properties.nilai
                            ).openPopup();
                        });

                        // Menutup popup saat mouse meninggalkan area kecamatan
                        layer.on('mouseout', function (e) {
                            layer.closePopup();
                        });
                    }
                });

                geojsonLayer.addTo(map);

                // Menghapus legenda yang ada sebelumnya
                if (legend) {
                    legend.remove();
                }

                // Membuat legenda secara dinamis
                legend = L.control({ position: 'bottomleft' });

                legend.onAdd = function (map) {
                    var div = L.DomUtil.create('div', 'legend');
                    var labels = [];

                    // Menampilkan label untuk setiap rentangan nilai
                    for (var i = 0; i < ranges.length; i++) {
                        var range = ranges[i];
                        var color = range.color;

                        labels.push(
                            '<i style="background:' + color + '"></i> ' +
                            range.min + ' - ' + range.max
                        );
                    }

                    div.innerHTML = labels.join('<br>');
                    return div;
                };

                legend.addTo(map);
            })
            .catch(function (error) {
                console.error('Error:', error);
            });
    }

    // Mendapatkan elemen select untuk filter variabel
    var filterVarSelect = document.getElementById('filterVar');
    // Mendapatkan elemen select untuk filter tahun
    var filterYearSelect = document.getElementById('filter3');

    // Menambahkan event listener saat nilai filter variabel berubah
    filterVarSelect.addEventListener('change', function () {
        var selectedVariable = this.value;
        var selectedYear = filterYearSelect.value;
        updateGeojson(selectedYear, selectedVariable);
    });

    // Menambahkan event listener saat nilai filter variabel berubah
    filterYearSelect.addEventListener('change', function () {
        var selectedYear = this.value;
        var selectedVariable = filterVarSelect.value;
        updateGeojson(selectedYear, selectedVariable);
    });

    // Memuat geojson awal saat halaman dimuat
    var geojsonLayer;
    updateGeojson('all', 'all');

</script>

@endpush
