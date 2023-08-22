@extends('layouts.main')

@section('content')
<section class="section">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav tab-nav" id="pills-tab">
                        <li class="item">
                            <a class="link active" id="pills-first-tab" data-toggle="pill" href="#pills-first" aria-selected="true">Dakar</a>
                        </li>
                        <li class="item">
                            <a class="link" id="pills-second-tab" data-toggle="pill" href="#pills-second" aria-selected="false">PA/KPI</a>
                        </li>
                        <li class="item">
                            <a class="link" id="pills-third-tab" data-toggle="pill" href="#pills-third" aria-selected="false">PTK</a>
                        </li>
                        <li class="item">
                            <a class="link" id="pills-fourth-tab" data-toggle="pill" href="#pills-fourth" aria-selected="false">Turnover</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-first">
                            <h6 class="display-4 text-center">Data Karyawan</h6>
                            <p class="mb-5 pb-2 text-center">Data ini digunakan pada chart <b>Jumlah Karyawan</b>, <b>Jml Karyawan by Grade</b>, dan <b>Jml Karyawan by Usia Kerja</b>.</p>
                            <div class="row mb-4">
                                <div class="col-md-9">
                                    <div class="form-group pb-1">
                                        <label for="inputer"><b>Import Data Karyawan</b></label>
                                        <form class="form-employee" action="/import" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="file" class="form-control">
                                            <button class="btn btn-primary mt-3">Import</button>
                                        </form>
                                        <form class="form-employee" action="/download-template" method="get">
                                            @csrf
                                            <button class="btn btn-primary mt-3">Download Template</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="has-line">
                                <table id="MyTable">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Bekerja</th>
                                            <th>Status Kerja</th>
                                            <th>Divisi</th>
                                            <th>Departemen</th>
                                            <th>Grade</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $e)
                                        <tr>
                                            <td>{{$e->nik}}</td>
                                            <td>{{$e->name}}</td>
                                            <td>{{$e->gender}}</td>
                                            <td>{{$e->work_date}}</td>
                                            <td>{{$e->worker_status}}</td>
                                            <td>{{$e->division_name}}</td>
                                            <td>{{$e->department_name}}</td>
                                            <td>{{$e->grade_name}}</td>
                                            <td>{{$e->level_id}}</td>
                                            <td>
                                                <form action="" method="">
                                                    @csrf
                                                    <a data-toggle="modal" data-id="{{$e->id}}" href="#MyModal" class="openMyModal"
                                                    data-nik = "{{$e->nik}}"
                                                    data-name = "{{$e->name}}"
                                                    data-dob = "{{$e->date_of_birth}}"
                                                    data-gender = "{{$e->gender}}"
                                                    data-religion = "{{$e->religion}}"
                                                    data-education = "{{$e->education}}"
                                                    data-martial = "{{$e->martial_status}}"
                                                    data-workdate = "{{$e->work_date}}"
                                                    data-workerstatus = "{{$e->worker_status}}"
                                                    data-division = "{{$e->division_id}}"
                                                    data-department ="{{$e->department_id}}"
                                                    data-grade="{{$e->grade_id}}"
                                                    data-level="{{$e->level_id}}">
                                                        <input type="hidden" value="{{$e->id}}" name="idEditEmpl">
                                                        <button class="btn btn-primary mt-3">Edit</button>
                                                    </a>
                                                </form>
                                            </td>
                                            <td>
                                                {{-- <form action="/delete-employee" method="post"> --}}
                                                <form action="" method=""></form>
                                                    @csrf
                                                    {{-- <input type="hidden" value="{{$e->id}}" name="idDestroyEmpl"> --}}
                                                    <a data-toggle="modal" href="#ModalDelete" class="openModalDelete" data-id="{{$e->id}}">
                                                        <button class="btn btn-primary mt-3">Delete</button>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-second">
                            <h6 class="display-4 text-center">Data PA/KPI</h6>
                            <p class="mb-5 pb-2 text-center">Data ini digunakan pada chart <b>Performance Appraisal Berdasar Pencapaian</b>.</p>
                            <form action="/insert-company-grade" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="form-group pb-1">
                                            <label for="year"><b>Tahun</b></label>
                                            <input type="text" name="year" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group pb-1">
                                            <label for="company"><b>Perusahaan</b></label>
                                            <select name="company" class="form-control">
                                                <option value="" hidden selected>--</option>
                                                <option value="Niramas Utama">Niramas Utama</option>
                                                <option value="Niramas Pandaan Sejahtera">Niramas Pandaan Sejahtera</option>
                                                <option value="Supra Natami Utama">Supra Natami Utama</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <div class="form-group pb-1">
                                            <label for="scoreA"><b>Nilai A</b></label>
                                            <input type="text" name="scoreA" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group pb-1">
                                            <label for="scoreB"><b>Nilai B</b></label>
                                            <input type="text" name="scoreB" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group pb-1">
                                            <label for="scoreC"><b>Nilai C</b></label>
                                            <input type="text" name="scoreC" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group pb-1">
                                            <label for="scoreD"><b>Nilai D</b></label>
                                            <input type="text" name="scoreD" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group pb-1">
                                            <label for="scoreE"><b>Nilai D</b></label>
                                            <input type="text" name="scoreE" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        <button class="btn btn-primary mt-3">Submit</button>
                                    </div>
                                </div>
                            </form>

                            <div class="has-line">
                                <table id="MyTable2">
                                    <thead>
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Nilai A</th>
                                            <th>Nilai B</th>
                                            <th>Nilai C</th>
                                            <th>Nilai D</th>
                                            <th>Nilai E</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pakpi as $t)
                                        <tr>
                                            <td>{{$t->year}}</td>
                                            <td>{{$t->company}}</td>
                                            <td>{{$t->score_a}}</td>
                                            <td>{{$t->score_b}}</td>
                                            <td>{{$t->score_c}}</td>
                                            <td>{{$t->score_d}}</td>
                                            <td>{{$t->score_e}}</td>
                                            <td>
                                                <form action="" method="">
                                                    @csrf
                                                        <a data-toggle="modal" data-id="{{$t->id}}" href="#MyModal2" class="openMyModal2"
                                                        data-year="{{$t->year}}"
                                                        data-company="{{$t->company}}"
                                                        data-scorea="{{$t->score_a}}"
                                                        data-scoreb="{{$t->score_b}}"
                                                        data-scorec="{{$t->score_c}}"
                                                        data-scored="{{$t->score_d}}"
                                                        data-scoree="{{$t->score_e}}">

                                                        <button class="btn btn-primary mt-3">Edit</button>
                                                    </a>
                                                </form>
                                            </td>
                                            <td>
                                                {{-- <form action="/delete-pakpi" method="post"> --}}
                                                <form action="" method=""></form>
                                                    @csrf
                                                    {{-- <input type="hidden" value="{{$t->id}}" name="idDestroy"> --}}
                                                    <a data-toggle="modal" href="#ModalDelete2" class="openModalDelete2" data-id="{{$t->id}}" >
                                                        <button class="btn btn-primary mt-3">Delete</button>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-third">
                            <h6 class="display-4 text-center">Data PTK & Req Employee</h6>
                            <p class="mb-5 pb-2 text-center">Data ini digunakan pada chart <b>PTK Open (Lv. Staff)</b>, <b>PTK Open (Lv. Crew)</b>, dan <b>PTK Open</b>.</p>
                            <div class="">
                                <h5>PTK Open</h5>
                                <table id="MyTable3">
                                    <thead>
                                        <tr>
                                            <th>Grade Title</th>
                                            <th>Jumlah PTK Open</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ptkopen as $p)
                                        <tr>
                                            <td>{{$p->grade_title}}</td>
                                            <td>{{$p->amount}}</td>
                                            <td>
                                                <form action="">
                                                    @csrf
                                                    <a data-toggle="modal" data-id="{{$p->id}}" class="openMyModal3" href="#MyModal3"
                                                        data-jumlah="{{$p->amount}}">
                                                        <button class="btn btn-primary mt-3">Edit</button>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="has-line">
                                <form action="/insert-employee-req" method="post">
                                    @csrf
                                    <h5>Employee Request</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group pb-1">
                                                <label for="dept_id"><b>Departemen</b></label>
                                                <select name="dept_id" id="dept_id" class="form-control" title="Departemen">
                                                    <option value="" hidden selected>--</option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group pb-1">
                                                <label for="grade_id"><b>Grade</b></label>
                                                <select name="grade_id" id="grade_id" class="form-control" title="Grade">
                                                    <option value="" hidden selected>--</option>
                                                    @foreach ($grades as $item)
                                                        <option value="{{ $item->id }}">{{ $item->grade_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group pb-1">
                                                <label for="inputer"><b>Jumlah Karyawan</b></label>
                                                <input type="text" name="jumlah_employee" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-3">Submit</button>
                                </form>

                                <div class="has-line">
                                    <table id="MyTable4">
                                        <thead>
                                            <tr>
                                                <th>Departemen</th>
                                                <th>Grade</th>
                                                <th>Jumlah Employee</th>
                                                <th>Action</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employeeReq as $eR)
                                            <tr>
                                                <td>{{$eR->department_name}}</td>
                                                <td>{{$eR->grade_name}}</td>
                                                <td>{{$eR->amount}}</td>
                                                <td>
                                                    <form action="" method="">
                                                        @csrf
                                                        <a data-toggle="modal" data-id="{{$eR->id}}" class="openMyModal4" href="#MyModal4"
                                                        data-department="{{$eR->department_id}}"
                                                        data-grade="{{$eR->grade_id}}"
                                                        data-jumlah="{{$eR->amount}}">
                                                        <button class="btn btn-primary mt-3">Edit</button>
                                                        </a>
                                                    </form>
                                                </td>
                                                <td>
                                                    {{-- <form action="/delete-employee-req" method="post"> --}}
                                                    <form action="" method=""></form>
                                                        @csrf
                                                        {{-- <input type="hidden" value="{{$eR->id}}" name="idDestroyEReq"> --}}
                                                        <a data-toggle="modal" href="#ModalDelete3" class="openModalDelete3" data-id="{{$eR->id}}">
                                                            <button class="btn btn-primary mt-3">Delete</button>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-fourth">
                            <h6 class="display-4 text-center">Data Turnover</h6>
                            <p class="mb-5 pb-2 text-center">Data ini digunakan pada chart <b>Turnover Karyawan (Persentase)</b>.</p>
                            <div class="">
                                <form action="/insert-turnover" method="post">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <div class="form-group pb-1">
                                                <label for="month"><b>Bulan</b></label>
                                                <select name="month" class="form-control">
                                                    <option value="" hidden selected>--</option>
                                                    <option value="Jan">Januari</option>
                                                    <option value="Feb">Februari</option>
                                                    <option value="Mar">Maret</option>
                                                    <option value="Apr">April</option>
                                                    <option value="May">Mei</option>
                                                    <option value="Jun">Juni</option>
                                                    <option value="Jul">Juli</option>
                                                    <option value="Aug">Agustus</option>
                                                    <option value="Sep">September</option>
                                                    <option value="Oct">Oktober</option>
                                                    <option value="Nov">November</option>
                                                    <option value="Des">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group pb-1">
                                                <label for="yearTo"><b>Tahun</b></label>
                                                <input type="text" name="yearTo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group pb-1">
                                                <label for="totalOut"><b>Total Out</b></label>
                                                <input type="text" name="totalOut" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group pb-1">
                                                <label for="avgEmp"><b>Avg Emp</b></label>
                                                <input type="text" name="avgEmp" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group pb-1">
                                                <label for="lto"><b>LTO</b></label>
                                                <input type="text" name="lto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary mt-3">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="has-line">
                                <table id="MyTable5">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Total Out</th>
                                            <th>Avg Emp</th>
                                            <th>LTO</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($turnover as $t)
                                        <tr>
                                            <td>{{$t->month}}</td>
                                            <td>{{$t->year}}</td>
                                            <td>{{$t->total_out}}</td>
                                            <td>{{$t->avg_emp}}</td>
                                            <td>{{$t->lto}}</td>
                                            <td>
                                                <form action="" method="">
                                                    @csrf
                                                    <a data-toggle="modal" data-id="{{$t->id}}" href="#MyModal5" class="openMyModal5"
                                                        data-month="{{$t->month}}"
                                                        data-year="{{$t->year}}"
                                                        data-totalout="{{$t->total_out}}"
                                                        data-avgemp="{{$t->avg_emp}}"
                                                        data-lto="{{$t->lto}}">
                                                        <input type="hidden" value="" name="">
                                                        <button class="btn btn-primary mt-3">Edit</button>
                                                    </a>
                                                </form>
                                            </td>
                                            <td>
                                                {{-- <form action="/delete-turnover" method="post"> --}}
                                                <form action="" method=""></form>
                                                    @csrf
                                                    {{-- <input type="hidden" value="{{$t->id}}" name="idDestroyturnover"> --}}
                                                    <a data-toggle="modal" href="#ModalDelete4" class="openModalDelete4" data-id="{{$t->id}}">
                                                        <button class="btn btn-primary mt-3">Delete</button>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Edit Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-employee" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="idEdit" id="id" value="">
                        <div class="form-group pb-1 col-md-6">
                            <label for="nik"><b>NIK</b></label>
                            <input type="text" name="nik" id="nik" class="form-control" value="">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="name"><b>Nama</b></label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="date_of_birth"><b>Tanggal Lahir</b></label>
                            <input type="date" name="date_of_birth" id="dob" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="gender"><b>Jenis Kelamin</b></label>
                            <input type="text" name="gender" id="gender" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="religion"><b>Agama</b></label>
                            <input type="text" name="religion" id="religion" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="education"><b>Pendidikan</b></label>
                            <input type="text" name="education" id="education" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="martial_status"><b>Status Perkawinan</b></label>
                            <input type="text" name="martial_status" id="martial" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="work_date"><b>Tanggal Bekerja</b></label>
                            <input type="date" name="work_date" id="workdate" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="worker_status"><b>Status Kerja</b></label>
                            <input type="text" name="worker_status" id="workerstatus" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="division_id"><b>Divisi ID</b></label>
                            <input type="text" name="division_id" id="division" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="department_id"><b>Departemen ID</b></label>
                            <input type="text" name="department_id" id="department" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="grade_id"><b>Grade ID</b></label>
                            <input type="text" name="grade_id" id="grade" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="level_id"><b>Level</b></label>
                            <input type="text" name="level_id" id="level" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MyModal2" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Edit PA/KPI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-company-grade" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="idEditComp" id="idComp" value="">
                        <div class="form-group pb-1 col-md-6">
                            <label for="year"><b>Tahun</b></label>
                            <input type="text" name="year" id="year" class="form-control" value="">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="company"><b>Perusahaan</b></label>
                            <select name="company" id="company" class="form-control">
                                <option value="Niramas Utama">Niramas Utama</option>
                                <option value="Niramas Pandaan Sejahtera">Niramas Pandaan Sejahtera</option>
                                <option value="Supra Natami Utama">Supra Natami Utama</option>
                            </select>
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="scoreA"><b>Nilai A</b></label>
                            <input type="text" name="scoreA" id="scoreA" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="scoreB"><b>Nilai B</b></label>
                            <input type="text" name="scoreB" id="scoreB" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="scoreC"><b>Nilai C</b></label>
                            <input type="text" name="scoreC" id="scoreC" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="scoreD"><b>Nilai D</b></label>
                            <input type="text" name="scoreD" id="scoreD" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-6">
                            <label for="scoreE"><b>Nilai E</b></label>
                            <input type="text" name="scoreE" id="scoreE" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MyModal3" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Edit PTK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-ptkopen" method="post">
                    @csrf
                    <div class="col-md-6">
                        <input type="hidden" name="idPtkOpen" id="idPtkOpen" value="">
                        <div class="form-group pb-1">
                            <label for="ptk_amount"><b>Jumlah PTK Open</b></label>
                            <input type="text" name="ptk_amount" id="ptk_amount" class="form-control" value="">
                        </div>
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MyModal4" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Edit Req Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-employee-req" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="idReqEmpl" id="idReqEmpl" value="">
                        <div class="form-group pb-1 col-md-4">
                            <label for="dept_id"><b>Departemen</b></label>
                            {{-- <input type="text" name="dept_id" id="department" class="form-control" value=""> --}}
                            <select name="dept_id" id="department" class="form-control" >
                                
                                @foreach ($departments as $item)
                                <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group pb-1 col-md-4">
                            <label for="grade_id"><b>Grade</b></label>
                            {{-- <input type="text" name="grade_id" id="grade" class="form-control"> --}}
                            <select name="grade_id" id="grade" class="form-control">
                                @foreach($grades as $g)
                                    <option value="{{ $g->id}}">{{ $g->grade_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pb-1 col-md-4">
                            <label for="jumlah_empl"><b>Jumlah Employee</b></label>
                            <input type="text" name="jumlah_empl" id="jumlah" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MyModal5" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Edit Turnover</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-turnover" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="ideditturnover" id="ideditturnover" value="">
                        <div class="form-group pb-1 col-md-4">
                            <label for="monthEdit"><b>Bulan</b></label>
                            <select name="monthEdit" id="monthEdit" class="form-control">
                                <option value="Jan">Januari</option>
                                <option value="Feb">Februari</option>
                                <option value="Mar">Maret</option>
                                <option value="Apr">April</option>
                                <option value="May">Mei</option>
                                <option value="Jun">Juni</option>
                                <option value="Jul">Juli</option>
                                <option value="Aug">Agustus</option>
                                <option value="Sep">September</option>
                                <option value="Oct">Oktober</option>
                                <option value="Nov">November</option>
                                <option value="Des">Desember</option>
                            </select>
                        </div>
                        <div class="form-group pb-1 col-md-4">
                            <label for="yearEditTo"><b>Tahun</b></label>
                            <input type="text" name="yearEditTo" id="yearEditTo" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-4">
                            <label for="totaloutEdit"><b>Total Out</b></label>
                            <input type="text" name="totaloutEdit" id="totaloutEdit" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-4">
                            <label for="avgEmpEdit"><b>Avg Emp</b></label>
                            <input type="text" name="avgEmpEdit" id="avgEmpEdit" class="form-control">
                        </div>
                        <div class="form-group pb-1 col-md-4">
                            <label for="ltoEdit"><b>LTO</b></label>
                            <input type="text" name="ltoEdit" id="ltoEdit" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/delete-employee" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="deleteEmployee" id="deleteEmployee" value="">
                        <label class="title col-md-10">Are You Sure?</label>
                    </div>
                    <button class="btn btn-primary mt-3 col-md-5">Yes</button>
                    <button class="btn btn-primary mt-3 col-md-5" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDelete2" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/delete-pakpi" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="deletePa" id="deletePa" value="">
                        <label class="title col-md-10">Are You Sure?</label>
                    </div>
                    <button class="btn btn-primary mt-3 col-md-5">Yes</button>
                    <button class="btn btn-primary mt-3 col-md-5" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDelete3" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/delete-employee-req" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="employeeReqDel" id="employeeReqDel" value="">
                        <label class="title col-md-10">Are You Sure?</label>
                    </div>
                    <button class="btn btn-primary mt-3 col-md-5">Yes</button>
                    <button class="btn btn-primary mt-3 col-md-5" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDelete4" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/delete-turnover" method="post">
                    @csrf
                    <div class="row mb-4">
                        <input type="hidden" name="turnOverDel" id="turnOverDel" value="">
                        <label class="title col-md-10">Are You Sure?</label>
                    </div>
                    <button class="btn btn-primary mt-3 col-md-5">Yes</button>
                    <button class="btn btn-primary mt-3 col-md-5" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#MyTable').DataTable({
            order: [],
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#MyTable2').DataTable({
            order: [],
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#MyTable3').DataTable({
            order: [],
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#MyTable4').DataTable({
            order: [],
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#MyTable5').DataTable({
            order: [],
            "pageLength": 12
        });
    });
</script>

<script>
    $(document).on("click", ".openMyModal", function() {
        var id = $(this).data('id');
        var nik = $(this).data('nik');
        var name = $(this).data('name');
        var dob = $(this).data('dob');
        var gender = $(this).data('gender');
        var religion = $(this).data('religion');
        var education = $(this).data('education');
        var martial = $(this).data('martial');
        var workdate = $(this).data('workdate');
        var workerstatus = $(this).data('workerstatus');
        var division = $(this).data('division');
        var department = $(this).data('department');
        var grade = $(this).data('grade');
        var level = $(this).data('level');

        $("#MyModal #id").val(id);
        $("#MyModal #nik").val(nik);
        $("#MyModal #name").val(name);
        $("#MyModal #dob").val(dob);
        $("#MyModal #gender").val(gender);
        $("#MyModal #religion").val(religion);
        $("#MyModal #education").val(education);
        $("#MyModal #martial").val(martial);
        $("#MyModal #workdate").val(workdate);
        $("#MyModal #workerstatus").val(workerstatus);
        $("#MyModal #division").val(division);
        $("#MyModal #department").val(department);
        $("#MyModal #grade").val(grade);
        $("#MyModal #level").val(level);
    })
</script>

<script>
    $(document).on("click", ".openMyModal2", function(){
        var id = $(this).data('id');
        var year = $(this).data('year');
        var company = $(this).data('company');
        var scoreA = $(this).data('scorea');
        var scoreB = $(this).data('scoreb');
        var scoreC = $(this).data('scorec');
        var scoreD = $(this).data('scored');
        var scoreE = $(this).data('scoree');


        $("#MyModal2 #idComp").val(id);
        $("#MyModal2 #year").val(year);
        $("#MyModal2 #company").val(company);
        $("#MyModal2 #scoreA").val(scoreA);
        $("#MyModal2 #scoreB").val(scoreB);
        $("#MyModal2 #scoreC").val(scoreC);
        $("#MyModal2 #scoreD").val(scoreD);
        $("#MyModal2 #scoreE").val(scoreE);
    })
</script>
<script>
    $(document).on("click", ".openMyModal3", function(){
        var id = $(this).data('id');
        var jumlah = $(this).data('jumlah');

        $("#MyModal3 #idPtkOpen").val(id);
        $("#MyModal3 #ptk_amount").val(jumlah);
    })
</script>
<script>
    $(document).on("click", ".openMyModal4", function(){
        var id = $(this).data('id');
        var department = $(this).data('department');
        var grade = $(this).data('grade');
        var jumlah = $(this).data('jumlah');


        $("#MyModal4 #idReqEmpl").val(id);
        $("#MyModal4 #department").val(department);
        $("#MyModal4 #grade").val(grade);
        $("#MyModal4 #jumlah").val(jumlah);
    })
</script>

<script>
    $(document).on("click", ".openMyModal5", function(){
        var id = $(this).data('id');
        var month = $(this).data('month');
        var year = $(this).data('year');
        var totalOut = $(this).data('totalout');
        var avgEmp = $(this).data('avgemp');
        var lto = $(this).data('lto');


        $("#MyModal5 #ideditturnover").val(id);
        $("#MyModal5 #monthEdit").val(month);
        $("#MyModal5 #yearEditTo").val(year);
        $("#MyModal5 #totaloutEdit").val(totalOut);
        $("#MyModal5 #avgEmpEdit").val(avgEmp);
        $("#MyModal5 #ltoEdit").val(lto);
    })
</script>

<script>
    $(document).on("click", ".openModalDelete", function(){
        var id = $(this).data('id');

        $("#ModalDelete #deleteEmployee").val(id);
    })
</script>
<script>
    $(document).on("click", ".openModalDelete2", function(){
        var id = $(this).data('id');

        $("#ModalDelete2 #deletePa").val(id);
    })
</script>

<script>
    $(document).on("click", ".openModalDelete3", function(){
        var id = $(this).data('id');

        $("#ModalDelete3 #employeeReqDel").val(id);
    })
</script>
<script>
    $(document).on("click", ".openModalDelete4", function(){
        var id = $(this).data('id');

        $("#ModalDelete4 #turnOverDel").val(id);
    })
</script>

@if(session('message'))
<script>
    // toastr.success('{{ session('message')['type']}}');
    toastr.success('Berhasil!');
</script>
@endif

@if(session('hapus'))
<script>
    // toastr.info('{{ session('hapus')['type']}}');
    toastr.error('Berhasil Dihapus!');
</script>
@endif
@endsection
