<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // count all company and employee
    public function show()
    { {
            $companiesCount = Company::count();
            $employeesCount = Employee::count();



            $companies = Company::leftJoin('employees', 'companies.id', '=', 'employees.company_id')
                ->select('companies.*', DB::raw('COUNT(employees.id) as employee_count'))
                ->groupBy('companies.id', 'companies.name', 'companies.email', 'companies.logo', 'companies.created_at', 'companies.updated_at')
                ->get();

            // die($companies);
            return view('dashboard', compact('companiesCount', 'employeesCount', 'companies'));
        }
    }
}
