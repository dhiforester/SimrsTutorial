<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- Ikhtisar Infromasi Penting Bisa Ditampilkan Disini -->

                <!-- Card 1 -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pasien</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>145 K</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Kunjungan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-medical"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>200 K</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Pendapatan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>400 M</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card dark-card">
                        <div class="card-body">
                            <h5 class="card-title">Obat</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box2"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1.090 Item</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- GRAFIK -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grafik Pelayanan <span>/Hari ini</span></h5>
                            <!-- Menampilkan Grafiknya Disini -->
                            <div id="reportsChart"></div>
                            <script>
                                //Perintah Menampilkan Grafiknya Pakai Js
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                            name: 'Pasien',
                                            data: [31, 40, 28, 51, 42, 82, 56],
                                        }, {
                                            name: 'Umum',
                                            data: [11, 32, 45, 32, 34, 52, 41]
                                        }, {
                                            name: 'BPJS',
                                            data: [15, 11, 32, 18, 9, 24, 11]
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'datetime',
                                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                        },
                                        tooltip: {
                                        x: {
                                            format: 'dd/MM/yy HH:mm'
                                        },
                                        }
                                    }).render();
                                });
                            </script>
                        <!-- End Line Chart -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>