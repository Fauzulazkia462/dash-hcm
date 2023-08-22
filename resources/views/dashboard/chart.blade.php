@extends('layouts.main')

@section('content')
<section class="section" id="about">
    <div class="container bg-dark">
        <div class="row justify-content-around">
            <div class=" text-light">
                <div class="col-xl-12 text-center">
                    <b>Today is {{ $today }}</b>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-around">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body" style="position: relative; height:13vh">
                        <h4 class="display-4" align="center">For The Year 2022</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-around">
            {{-- 1. BEGIN::Jumlah Karyawan --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="" align="center">Jumlah Karyawan</h5>
                        <canvas id="jumlahKaryawan" class="chartjs"></canvas>
                    </div>
                </div>
            </div>
            {{-- 1. END::Jumlah Karyawan --}}

            {{-- 2. BEGIN::Jumlah Karyawan By Grade --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="" align="center">Jml Karyawan by Grade</h5>
                        <canvas id="jumlahKaryawanGrade" class="chartjs" width="" height=""></canvas>
                    </div>
                </div>
            </div>
            {{-- 2. END::Jumlah Karyawan By Grade --}}

            {{-- 3. BEGIN::Jumlah Karyawan by Usia Kerja --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="" align="center">Jml Karyawan by Usia Kerja</h5>
                        <canvas id="jumlahKaryawanUsia" class="chartjs"></canvas>
                    </div>
                </div>
            </div>
            {{-- 3. END::Jumlah Karyawan by Usia Kerja --}}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-around">
            {{-- 4. BEGIN::Turnover Karyawan --}}
            <div class="col-xl-2">
                <div class="card">
                    <div class="card-body text-center" style="position: relative; height:40vh; width:80vw; display:inline-block; width:100%">
                        <button class="lto btn btn-primary mt-3 active" style="height:40px; width:120px" id="year4">{{date('Y')-3}}</button><br>
                        <button class="lto btn btn-primary mt-3" style="height:40px; width:120px" id="year3">{{date('Y')-2}}</button><br>
                        <button class="lto btn btn-primary mt-3" style="height:40px; width:120px" id="year2">{{date('Y')-1}}</button><br>
                        <button class="lto btn btn-primary mt-3" style="height:40px; width:120px" id="year1">{{date('Y')}}</button><br>
                    </div>
                </div>
            </div>
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body" style="position: relative; height:40vh; width:80vw; display:inline-block; width:100%">
                        <h5 class="" align="center">Turnover Karyawan (%)</h5>
                        <canvas id="turnover" class="chartjs" width="160" height="32"></canvas>
                        <canvas id="turnover2" class="chartjs" width="160" height="32"></canvas>
                        <canvas id="turnover3" class="chartjs" width="160" height="32"></canvas>
                        <canvas id="turnover4" class="chartjs" width="160" height="32"></canvas>
                    </div>
                </div>
            </div>
            {{-- 4. END::Turnover Karyawan --}}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-around">
            {{-- 5. BEGIN::PA --}}
            <div class="col-xl-2">
                <div class="card">
                    <div class="card-body text-center" style="position: relative; height:48vh; width:80vw; display:inline-block; width:100%">
                        <button class="pa btn btn-primary mt-3 active" style="height:60px; width:120px" id="btnNu">Niramas Utama</button><br>
                        <button class="pa btn btn-primary mt-3" style="height:60px; width:120px" id="btnSnu">Supra Natami</button><br>
                        <button class="pa btn btn-primary mt-3" style="height:60px; width:120px" id="btnNps">Niramas Pandaan</button><br>
                    </div>
                </div>
            </div>
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body" style="position: relative; height:48vh; width:68vw">
                        <h5 class="" align="center">Performance Appraisal Berdasar Pencapaian</h5>
                        <h6 class="" align="center">(Jumlah Score A, B, C, D, dan E)</h6>
                        <canvas id="pa" class="chartjs" width="160" height="35"></canvas>
                        <canvas id="pa2" class="chartjs" width="160" height="35"></canvas>
                        <canvas id="pa3" class="chartjs" width="160" height="35"></canvas>
                    </div>
                </div>
            </div>
            {{-- 5. END::PA --}}
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-around">
            {{-- 6. BEGIN::PTK Open Staff --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="" align="center">PTK Open (Lv. Staff)</h5>
                        <canvas id="ptkos" class="chartjs"></canvas>
                    </div>
                </div>
            </div>
            {{-- 6. END::PTK Open Staff --}}

            {{-- 7. BEGIN::PTK Open Crew --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="" align="center">PTK Open (Lv. Crew)</h5>
                        <canvas id="ptkoc" class="chartjs"></canvas>
                    </div>
                </div>
            </div>
            {{-- 7. END::PTK Open Crew --}}

            {{-- 8. BEGIN::PTK Open --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="" align="center">PTK Open</h5>
                        <canvas id="ptko" class="chartjs"></canvas>
                    </div>
                </div>
            </div>
            {{-- 8. END::PTK Open --}}
        </div>
    </div>
</section>
@endsection

@section('script')

    {{-- 1. BEGIN::Jumlah Karyawan --}}
    <script type="text/javascript">
        var ctx = document.getElementById("jumlahKaryawan").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labelJmlKaryawan) !!},
                datasets: [{
                    label: 'Jumlah Karyawan',
                    backgroundColor: [
                        'rgba(237, 125, 49, 1)', // Oranje
                        'rgba(68, 114, 196, 1)', // Biru
                    ],
                    data: {!! json_encode($jumlahKaryawan) !!}
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            }
        })
    </script>
    {{-- 1. END::Jumlah Karyawan --}}

    {{-- 2. BEGIN::Jumlah Karyawan by Grade --}}
    <script type="text/javascript">
        var ctx = document.getElementById("jumlahKaryawanGrade").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelJmlKaryawanGrade) !!},
                datasets: [{
                    // label: 'Jumlah',
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    // backgroundColor: '#ADD8E6',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($jumlahKaryawanbyGrade) !!}
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    },
                    legend: {
                        display: false
                    },
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
    </script>
    {{-- 2. END::Jumlah Karyawan by Grade --}}

    {{-- 3. BEGIN::Jumlah Karyawan by Usia Kerja --}}
    <script type="text/javascript">
        var ctx = document.getElementById("jumlahKaryawanUsia").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelJmlKaryawanUsiaKerja) !!},
                datasets: [{
                    // label: 'Statistik User 3',
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($jumlahKaryawanbyUsiaKerja) !!}
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
    </script>
    {{-- 3. END::Jumlah Karyawan by Usia Kerja --}}

    {{-- 4. BEGIN::Turnover Karyawan --}}
    <script type="text/javascript">
        var ctx = document.getElementById("turnover").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labelTurnover) !!},
                datasets: [{
                    data: {!! json_encode($isiTurnover) !!},
                    // label: 'Statistik User 3',
                    backgroundColor: [
                        //'rgba(68, 114, 196, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                    ],
                    borderColor: 'rgba(68, 114, 196, 1)',
                    fill: false
                    // borderColor: '#93C3D2',

                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
                // title: {
                //     display: true,
                //     text: 'Turnover Karyawan'
                // }
            }
        });

        $("#year1").click(function() {
            $('.lto').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();

            $("#turnover").show();
            $("#turnover2").hide();
            $("#turnover3").hide();
            $("#turnover4").hide();
            var ctx = document.getElementById("turnover").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labelTurnover) !!},
                datasets: [{
                    data: {!! json_encode($isiTurnover) !!},
                    // label: 'Statistik User 3',
                    backgroundColor: [
                        //'rgba(68, 114, 196, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                    ],
                    borderColor: 'rgba(68, 114, 196, 1)',
                    fill: false
                    // borderColor: '#93C3D2',

                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
                // title: {
                //     display: true,
                //     text: 'Turnover Karyawan'
                // }
            }
        });
        });

        $("#year2").click(function() {
            $('.lto').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();

            $("#turnover").hide();
            $("#turnover2").show();
            $("#turnover3").hide();
            $("#turnover4").hide();
            var ctx = document.getElementById("turnover2").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labelTurnover2) !!},
                datasets: [{
                    data: {!! json_encode($isiTurnover2) !!},
                    // label: 'Statistik User 3',
                    backgroundColor: [
                        //'rgba(68, 114, 196, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                    ],
                    borderColor: 'rgba(68, 114, 196, 1)',
                    fill: false
                    // borderColor: '#93C3D2',

                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
                // title: {
                //     display: true,
                //     text: 'Turnover Karyawan'
                // }
            }
        });
        });

        $("#year3").click(function() {
            $('.lto').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();

            $("#turnover").hide();
            $("#turnover2").hide();
            $("#turnover3").show();
            $("#turnover4").hide();
            var ctx = document.getElementById("turnover3").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labelTurnover3) !!},
                datasets: [{
                    data: {!! json_encode($isiTurnover3) !!},
                    // label: 'Statistik User 3',
                    backgroundColor: [
                        //'rgba(68, 114, 196, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                    ],
                    borderColor: 'rgba(68, 114, 196, 1)',
                    fill: false
                    // borderColor: '#93C3D2',

                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
                // title: {
                //     display: true,
                //     text: 'Turnover Karyawan'
                // }
            }
        });
        });

        $("#year4").click(function() {
            $('.lto').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();

            $("#turnover").hide();
            $("#turnover2").hide();
            $("#turnover3").hide();
            $("#turnover4").show();
            var ctx = document.getElementById("turnover4").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labelTurnover4) !!},
                datasets: [{
                    data: {!! json_encode($isiTurnover4) !!},
                    // label: 'Statistik User 3',
                    backgroundColor: [
                        //'rgba(68, 114, 196, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                        'rgba(237, 125, 49, 1)',
                    ],
                    borderColor: 'rgba(68, 114, 196, 1)',
                    fill: false
                    // borderColor: '#93C3D2',

                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
                // title: {
                //     display: true,
                //     text: 'Turnover Karyawan'
                // }
            }
        });
        });
    </script>
    {{-- 4. END::Turnover Karyawan --}}

    {{-- 5. BEGIN::PA --}}

    <script type="text/javascript">

        var ctx = document.getElementById("pa").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelPA) !!},
                datasets: [
                    {
                    // label: 'Statistik User 3',
                    label: 'Score A',
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreA) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score B',
                    backgroundColor: 'rgba(237, 125, 49, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreB) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score C',
                    backgroundColor: '#133337',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreC) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score D',
                    backgroundColor: '#ffc0cb',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreD) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score E',
                    backgroundColor: '#065535',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreE) !!}
                }
            ],
                options: {
                    animation: [{
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }],
                    "maintainAspectRatio": false,
                    "responsive": true
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        });

        $("#btnNu").click(function() {
            $('.pa').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();

            $("#pa").show();
            $("#pa2").hide();
            $("#pa3").hide();
            var ctx = document.getElementById("pa").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelPA) !!},
                datasets: [
                    {
                    // label: 'Statistik User 3',
                    label: 'Score A',
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreA) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score B',
                    backgroundColor: 'rgba(237, 125, 49, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreB) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score C',
                    backgroundColor: '#133337',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreC) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score D',
                    backgroundColor: '#ffc0cb',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreD) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score E',
                    backgroundColor: '#065535',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreE) !!}
                }
            ],
                options: {
                    animation: [{
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }],
                    "maintainAspectRatio": false,
                    "responsive": true
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
        });

        $("#btnSnu").click(function() {
            $('.pa').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();

            $("#pa").hide();
            $("#pa2").show();
            $("#pa3").hide();
            var ctx = document.getElementById("pa2").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelPASnu) !!},
                datasets: [
                    {
                    // label: 'Statistik User 3',
                    label: 'Score A',
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreASnu) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score B',
                    backgroundColor: 'rgba(237, 125, 49, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreBSnu) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score C',
                    backgroundColor: '#133337',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreCSnu) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score D',
                    backgroundColor: '#ffc0cb',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreDSnu) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score E',
                    backgroundColor: '#065535',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreESnu) !!}
                }
            ],
                options: {
                    animation: [{
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }],
                    "maintainAspectRatio": false,
                    "responsive": true
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
        });

        $("#btnNps").click(function() {
            $('.pa').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();

            $("#pa").hide();
            $("#pa2").hide();
            $("#pa3").show();
            var ctx = document.getElementById("pa3").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelPANps) !!},
                datasets: [
                    {
                    // label: 'Statistik User 3',
                    label: 'Score A',
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreANps) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score B',
                    backgroundColor: 'rgba(237, 125, 49, 1)',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreBNps) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score C',
                    backgroundColor: '#133337',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreCNps) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score D',
                    backgroundColor: '#ffc0cb',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreDNps) !!}
                }, {
                    // label: 'Statistik User 3',
                    label: 'Score E',
                    backgroundColor: '#065535',
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPAScoreENps) !!}
                }
            ],
                options: {
                    animation: [{
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }],
                    "maintainAspectRatio": false,
                    "responsive": true
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
        });
    </script>
    {{-- 5. END::PA --}}

    {{-- 6. BEGIN::PTK Open Staff --}}
    <script type="text/javascript">
        var ctx = document.getElementById("ptkos").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelPTKStaff) !!},
                datasets: [
                    {
                        label: 'Staff',
                        backgroundColor: 'rgba(237, 125, 49, 1)', // Oranje
                        data: {!! json_encode($isiPTKStaff) !!}
                    }, {
                        label: 'Supervisor',
                        backgroundColor: 'rgba(68, 114, 196, 1)', // Blauw
                        data: {!! json_encode($isiPTKSupervisor) !!}
                    }, {
                        label: 'Manager',
                        backgroundColor: '#133337',
                        data: {!! json_encode($isiPTKManager) !!}
                    }
                ],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
    </script>
    {{-- 6. ENDs::PTK Open Staff --}}

    {{-- 7. BEGIN::PTK Open Crew --}}
    <script type="text/javascript">
        var ctx = document.getElementById("ptkoc").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelPTKCrew) !!},
                datasets: [{
                    // label: 'Statistik User 3',
                    // backgroundColor: '#ADD8E6',
                    backgroundColor: [
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)',
                    ],
                    // borderColor: '#93C3D2',
                    data: {!! json_encode($isiPTKCrew) !!}
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                }
            }
        })
    </script>
    {{-- 7. ENDs::PTK Open Staff --}}

    {{-- 8. BEGIN::PTK Open --}}
    <script type="text/javascript">
        var ctx = document.getElementById("ptko").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelPTKOpen) !!},
                datasets: [{
                    // label: 'Statistik User 4',
                    backgroundColor: [
                        'rgba(68, 114, 196, 1)',
                        'rgba(68, 114, 196, 1)'
                    ],

                    data: {!! json_encode($jumlahPTKOpen) !!}
                }],
                options: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
            options: {
                legend: {
                    display: false
                },
                scales:{
                    yAxes:[{
                        ticks:{
                            beginAtZero: true
                        }
                    }],
                    xAxes:[{
                        barPercentage: 0.4
                    }]
                }
            }
        })
    </script>
    {{-- 8. END::PTK Open --}}
@endsection
