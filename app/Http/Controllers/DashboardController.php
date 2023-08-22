<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chart;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {


        return view('dashboard.index');
	}

    public function chart(Request $req) {
        $email = Auth::user()->email;
        // return $email;
        // $today = date("l jS \of F Y");
        $today = date("l, j F Y");

        // 1. BEGIN::Jumlah Karyawan //
        $titleJmlKaryawan = 'Jumlah Karyawan';
        $labelJmlKaryawan = ["Crew","Staff"];
        $empCrew = \DB::SELECT("SELECT count(id) AS jumlah FROM employees WHERE grade_id = 7 ");
        foreach($empCrew as $dt) {
            $jumlahKaryawan[] = $dt->jumlah;
        }
        $empStaff = \DB::SELECT("SELECT count(id) AS jumlah FROM employees WHERE grade_id <> 7 ");
        foreach($empStaff as $dt) {
            $jumlahKaryawan[] = $dt->jumlah;
        }
        // 1. END::Jumlah Karyawan //

        // 2. BEGIN::Jumlah Karyawan By Grade //
        $titleJmlKaryawanGrade = 'Jumlah Karyawan by Grade';
        $labelJmlKaryawanGrade = ["Excecutive","Manager","Ass. Manager","Supervisor","Staff","Crew"];

        for($gradeId = 1; $gradeId < 7; $gradeId++) {
            $emp = collect(\DB::SELECT("SELECT count(id) AS jumlah FROM employees WHERE grade_id = '$gradeId' "))->first();
            $jumlahKaryawanbyGrade[] = $emp->jumlah;
        }
        // 2. END::Jumlah Karyawan By Grade //

        // 3. BEGIN::Jumlah Karyawan by Usia Kerja //
        $titleJmlKaryawanUsiaKerja = 'Jumlah Karyawan by Usia Kerja';
        $labelJmlKaryawanUsiaKerja = ["0-3","4-6","7-9","10-12",">12"];
        $akhir = date_create(); // tanggal hari ini
        $a = $b = $c = $d = $e = 0;
        $data = \DB::SELECT("SELECT * FROM employees ");

        foreach($data as $dt) {
            $awal  = date_create($dt->work_date);
            $diff  = date_diff( $awal, $akhir );

            if($diff->y > 12) {
                $e++;
            } else if ($diff->y >= 10 && $diff->y <= 12) {
                $d++;
            } else if ($diff->y >= 7 && $diff->y <= 9) {
                $c++;
            } else if ($diff->y >= 4 && $diff->y <= 6) {
                $b++;
            } else {
                $a++;
            }
        }

        $jumlahKaryawanbyUsiaKerja[] = $a;
        $jumlahKaryawanbyUsiaKerja[] = $b;
        $jumlahKaryawanbyUsiaKerja[] = $c;
        $jumlahKaryawanbyUsiaKerja[] = $d;
        $jumlahKaryawanbyUsiaKerja[] = $e;
        // 3. END::Jumlah Karyawan by Usia Kerja //

        // 4. BEGIN::Turnover Karyawan //
        $titleTurnover = 'Turnover Karyawan';
        $year = date('Y');
        $year2 = $year-1;
        $year3 = $year-2;
        $year4 = $year-3;
        $dataLabel = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year'");
        foreach($dataLabel as $dt) {
            $labelTurnover[] = $dt->month;
        }

        $dataIsi = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year' ");
        foreach($dataIsi as $dt) {
            $isiTurnover[] = $dt->lto;
        }

        // year2
        $dataLabel2 = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year2'");
        foreach($dataLabel2 as $dt) {
            $labelTurnover2[] = $dt->month;
        }

        $dataIsi2 = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year2' ");
        foreach($dataIsi2 as $dt) {
            $isiTurnover2[] = $dt->lto;
        }

        // year3
        $dataLabel3 = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year3'");
        foreach($dataLabel3 as $dt) {
            $labelTurnover3[] = $dt->month;
        }

        $dataIsi3 = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year3' ");
        foreach($dataIsi3 as $dt) {
            $isiTurnover3[] = $dt->lto;
        }

        // year4
        $dataLabel4 = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year4'");
        foreach($dataLabel4 as $dt) {
            $labelTurnover4[] = $dt->month;
        }

        $dataIsi4 = \DB::SELECT("SELECT * FROM turnovers WHERE year = '$year4' ");
        foreach($dataIsi4 as $dt) {
            $isiTurnover4[] = $dt->lto;
        }

        // 4. END::Turnover Karyawan //

        // 5. BEGIN::PA //
        $titlePA = 'Performance Appraisal';



        $dataLabel = \DB::SELECT("SELECT * FROM pa_kpi WHERE company = 'Niramas Utama' ");
        foreach($dataLabel as $dt) {
            $labelPA[] = $dt->year;
        }

        $dataIsi = \DB::SELECT("SELECT * FROM pa_kpi WHERE company = 'Niramas Utama' ");
        foreach($dataIsi as $dt) {
            $isiPAScoreA[] = $dt->score_a;
            $isiPAScoreB[] = $dt->score_b;
            $isiPAScoreC[] = $dt->score_c;
            $isiPAScoreD[] = $dt->score_d;
            $isiPAScoreE[] = $dt->score_e;
        }

        $dataSNU = \DB::SELECT("SELECT * FROM pa_kpi WHERE company = 'Supra Natami Utama'");
        foreach($dataSNU as $ds){
            $labelPASnu[] = $ds->year;
        }
        $dataisiSNU = \DB::SELECT("SELECT * FROM pa_kpi WHERE company ='Supra Natami Utama'");
        foreach($dataisiSNU as $ds){
            $isiPAScoreASnu[] = $ds->score_a;
            $isiPAScoreBSnu[] = $ds->score_b;
            $isiPAScoreCSnu[] = $ds->score_c;
            $isiPAScoreDSnu[] = $ds->score_d;
            $isiPAScoreESnu[] = $ds->score_e;
        }

        $dataNps = \DB::SELECT("SELECT * FROM pa_kpi WHERE company = 'Niramas Pandaan Sejahtera'");
        foreach($dataNps as $dn){
            $labelPANps[] = $dn->year;
        }
        $dataisiDn = \DB::SELECT("SELECT * FROM pa_kpi WHERE company = 'Niramas Pandaan Sejahtera'");
        foreach($dataisiDn as $dn){
            $isiPAScoreANps[] = $dn->score_a;
            $isiPAScoreBNps[] = $dn->score_b;
            $isiPAScoreCNps[] = $dn->score_c;
            $isiPAScoreDNps[] = $dn->score_d;
            $isiPAScoreENps[] = $dn->score_e;
        }

        // 5. END::PA //

        // 6. BEGIN::PTK Open Staff //
        $titlePTKStaff = 'PTK Open Lv. Staff';
        $dataLabel = \DB::SELECT("SELECT DISTINCT a.nick_dept_name FROM departments a INNER JOIN ptko_staffcrew b ON a.id = b.department_id WHERE b.grade_id <> 7 ");
        foreach($dataLabel as $dt) {
            $labelPTKStaff[] = $dt->nick_dept_name;

            // Untuk Data Staff
            $dataIsiStf = \DB::SELECT("SELECT b.amount FROM departments a INNER JOIN ptko_staffcrew b ON a.id = b.department_id WHERE b.grade_id = 6 AND a.nick_dept_name = '$dt->nick_dept_name' ");
            if($dataIsiStf) {
                foreach($dataIsiStf as $data) {
                    $isiPTKStaff[] = $data->amount;
                }
            } else {
                $isiPTKStaff[] = 0;
            }

            // Untuk Data Supervisor
            $dataIsiSpv = \DB::SELECT("SELECT b.amount FROM departments a INNER JOIN ptko_staffcrew b ON a.id = b.department_id WHERE b.grade_id = 5 AND a.nick_dept_name = '$dt->nick_dept_name' ");
            if($dataIsiSpv) {
                foreach($dataIsiSpv as $data) {
                    $isiPTKSupervisor[] = $data->amount;
                }
            } else {
                $isiPTKSupervisor[] = 0;
            }

            // Untuk Data Manager
            $dataIsiMgr = \DB::SELECT("SELECT b.amount FROM departments a INNER JOIN ptko_staffcrew b ON a.id = b.department_id WHERE b.grade_id = 3 AND a.nick_dept_name = '$dt->nick_dept_name' ");
            if($dataIsiMgr) {
                foreach($dataIsiMgr as $data) {
                    $isiPTKManager[] = $data->amount;
                }
            } else {
                $isiPTKManager[] = 0;
            }
        }
        // 6. END::PTK Open Staff //

        // 7. BEGIN::PTK Open Crew //
        $titlePTKCrew = 'PTK Open Lv. Crew';
        $dataLabel = \DB::SELECT("SELECT a.nick_dept_name FROM departments a INNER JOIN ptko_staffcrew b ON a.id = b.department_id WHERE b.grade_id = 7 ");
        foreach($dataLabel as $dt) {
            $labelPTKCrew[] = $dt->nick_dept_name;
        }

        $dataIsi = \DB::SELECT("SELECT b.amount FROM departments a INNER JOIN ptko_staffcrew b ON a.id = b.department_id WHERE b.grade_id = 7 ");
        foreach($dataIsi as $dt) {
            $isiPTKCrew[] = $dt->amount;
        }
        // 7. END::PTK Open Crew //

        // 8. BEGIN::PTK Open //
        $titlePTKOpen = 'PTK Open';
        $labelPTKOpen = ["Staff Up","Crew"];
        $data = \DB::SELECT("SELECT * FROM ptk_open ");
        foreach($data as $dt) {
            $jumlahPTKOpen[] = $dt->amount;
        }
        // 8. END::PTK Open //

        return view('dashboard.chart',
        compact(
            'today',
            'titleJmlKaryawan','labelJmlKaryawan','jumlahKaryawan',
            'titleJmlKaryawanGrade', 'labelJmlKaryawanGrade','jumlahKaryawanbyGrade',
            'labelJmlKaryawanUsiaKerja','jumlahKaryawanbyUsiaKerja','labelPTKOpen','jumlahPTKOpen',
            'titlePTKStaff','labelPTKStaff','isiPTKStaff', 'isiPTKSupervisor', 'isiPTKManager',
            'titlePTKCrew','labelPTKCrew','isiPTKCrew',
            'titleTurnover','labelTurnover','isiTurnover','labelTurnover2','isiTurnover2','labelTurnover3','isiTurnover3','labelTurnover4','isiTurnover4', 'labelPA', 'isiPAScoreA', 'isiPAScoreB',
            'isiPAScoreC', 'isiPAScoreD', 'isiPAScoreE', 'labelPASnu', 'isiPAScoreASnu', 'isiPAScoreBSnu',
            'isiPAScoreCSnu', 'isiPAScoreDSnu', 'isiPAScoreESnu', 'labelPANps', 'isiPAScoreANps', 'isiPAScoreBNps',
            'isiPAScoreCNps', 'isiPAScoreDNps', 'isiPAScoreENps'
        ));
    }
}
