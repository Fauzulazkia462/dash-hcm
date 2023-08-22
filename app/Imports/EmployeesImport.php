<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EmployeesImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nik' => $row['nik'],
            'name' => $row['nama'],
            'date_of_birth' => $row['tgl_lahir'],
            'gender' => $row['jenis_kelamin'],
            'religion' => $row['agama'],
            'education' => $row['pendidikan'],
            'martial_status' => $row['status_perkawinan'],
            'work_date' => $row['tanggal_bekerja'],
            'worker_status' => $row['status_kerja'],
            'division_id' => $row['divisi'],
            'department_id' => $row['departemen'],
            'grade_id' => $row['grade'],
            'level_id' => $row['level'],
        ]);
    }
    public function rules(): array{
        return [
            'nik' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'status_perkawinan' => 'required',
            'tanggal_bekerja' => 'required',
            'status_kerja' => 'required',
            'divisi' => 'required',
            'departemen' => 'required',
            'grade' => 'required',
            'level' => 'required',
        ];
    }

    public function sheets(): array
    {
        return [
            'Input' => $this,
        ];
    }
    
}
