<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PaKpi;
use App\Models\EmployeeReq;
use App\Models\PtkOpen;
use App\Models\Turnover;
use App\Models\PtkoStaffCrew;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Response;

class AdminController extends Controller
{
    public function index(){
        $employees = \DB::table('employees')
        ->leftjoin('departments', 'employees.department_id', '=', 'departments.id')
        ->leftjoin('divisions', 'employees.division_id', '=', 'divisions.id')
        ->leftjoin('grades', 'employees.grade_id', '=', 'grades.id')
        ->select('employees.*', 'departments.department_name', 'divisions.division_name', 'grades.grade_name')
        ->get();

        $pakpi = \DB::table('pa_kpi')
        ->select('pa_kpi.*')
        ->get();

        $ptkopen = \DB::table('ptk_open')
        ->select('ptk_open.*')
        ->get();

        $employeeReq = \DB::table('ptko_staffcrew')
        ->join('departments', 'ptko_staffcrew.department_id', '=', 'departments.id')
        ->leftjoin('grades', 'ptko_staffcrew.grade_id', '=', 'grades.id')
        ->select('ptko_staffcrew.*', 'departments.department_name', 'grades.grade_name')
        ->get();

        $turnover = \DB::table('turnovers')
        ->select('turnovers.*')
        ->get();

        $departments = \DB::table('departments')
        ->select('departments.*')
        ->get();

        $grades = \DB::table('grades')
        ->select('grades.*')
        ->get();

        return view('dashboard.admin', compact('employees', 'pakpi', 'ptkopen', 'employeeReq', 'turnover', 'departments', 'grades'));
    }

    public function import(Request $req){
        Excel::import(new EmployeesImport, $req->file('file'));
        // Excel::selectSheets('Input')->load($req->file('file'));
        return redirect('/admin');
    }

    public function editEmployee(Request $req)
    {
        $id = $req->idEdit;
        $model = Employee::find($id);
        $model->nik = $req->nik;
        $model->name = $req->name;
        $model->date_of_birth = $req->date_of_birth;
        $model->gender = $req->gender;
        $model->religion = $req->religion;
        $model->education = $req->education;
        $model->martial_status = $req->martial_status;
        $model->work_date = $req->work_date;
        $model->worker_status = $req->worker_status;
        $model->division_id = $req->division_id;
        $model->department_id = $req->department_id;
        $model->grade_id = $req->grade_id;
        $model->level_id = $req->level_id;
        $model->save();

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function editCompanyScore(Request $req){

        $id = $req->idEditComp;
        $model = PaKpi::find($id);
        $model->year = $req->year;
        $model->company = $req->company;
        $model->score_a = $req->scoreA;
        $model->score_b = $req->scoreB;
        $model->score_c = $req->scoreC;
        $model->score_d = $req->scoreD;
        $model->score_e = $req->scoreE;
        $model->save();

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function editEmployeeReq(Request $req){
        $id = $req->idReqEmpl;
        $model = PtkoStaffCrew::find($id);
        $model->department_id = $req->dept_id;
        $model->grade_id = $req->grade_id;
        $model->amount = $req->jumlah_empl;
        $model->save();

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function editPtkOpen(Request $req){
        $id = $req->idPtkOpen;
        $model = PtkOpen::find($id);
        $model->amount = $req->ptk_amount;
        $model->save();

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function editTurnover(Request $req){
        $id = $req->ideditturnover;
        $model = Turnover::find($id);
        $model->month = $req->monthEdit;
        $model->year = $req->yearEditTo;
        $model->total_out = $req->totaloutEdit;
        $model->avg_emp = $req->avgEmpEdit;
        $model->lto = $req->ltoEdit;
        $model->save();

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function template() {
        $filePath = public_path(). "/uploads/template/employees.xlsx";
        return Response::download($filePath);
    }

    public function insertCompanyScore(Request $req){

        \DB::table('pa_kpi')
        ->insert([
            'year' => $req->year,
            'company' => $req->company,
            'score_a' => $req->scoreA,
            'score_b' => $req->scoreB,
            'score_c' => $req->scoreC,
            'score_d' => $req->scoreD,
            'score_e' => $req->scoreE,
        ]);

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);

    }

    public function insertptkopen(Request $req){
        \DB::table('ptkopen')
        ->insert([
            'grade_title' => $req->grade_title,
            'jumlah_ptk_open' => $req->jumlah_ptk_open,
        ]);
        return back();
    }

    public function insertEmployeeReq(Request $req){
        \DB::table('ptko_staffcrew')
        ->insert([
            'department_id' => $req->dept_id,
            'grade_id' => $req->grade_id,
            'amount' => $req->jumlah_employee,
        ]);
        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function insertTurnover(Request $req){
        \DB::table('turnovers')
        ->insert([
            'month' => $req->month,
            'year' => $req->yearTo,
            'total_out' => $req->totalOut,
            'avg_emp' => $req->avgEmp,
            'lto' => $req->lto,
        ]);

        return back()->with('message', [
            'type' => 'success',
            'msg' => 'Berhasil!',
        ]);
    }

    public function destroyCompany(Request $req){
        $id = $req->deletePa;
        \DB::delete('DELETE FROM pa_kpi WHERE id = ?', [$id]);
        return back()->with('hapus',[
            'type' => 'warning',
            'msg' => 'Berhasil Dihapus!',
        ]);
    }


    public function destroyEmployee(Request $req){
        $id = $req->deleteEmployee;
        \DB::delete('DELETE FROM employees WHERE id = ?', [$id]);
        return back()->with('hapus',[
            'type' => 'warning',
            'msg' => 'Berhasil Dihapus!',
        ]);
    }

    public function destroyEmployeeReq(Request $req){
        $id = $req->employeeReqDel;
        \DB::delete('DELETE FROM ptko_staffcrew WHERE id = ?', [$id]);
        return back()->with('hapus',[
            'type' => 'warning',
            'msg' => 'Berhasil Dihapus!',
        ]);
    }

    public function destroyturnover(Request $req){
        $id = $req->turnOverDel;
        \DB::delete('DELETE FROM turnovers WHERE id = ?', [$id]);
        return back()->with('hapus',[
            'type' => 'warning',
            'msg' => 'Berhasil Dihapus!',
        ]);
    }
}
