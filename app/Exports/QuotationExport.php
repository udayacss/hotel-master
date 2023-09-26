<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\QuotationRequirement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QuotationExport implements FromCollection, WithMapping, WithHeadings
{

    public function collection()
    {
        // dd(Customer::all());
        return Customer::all();
    }

    public function map($row): array
    {
        // Map each row's data
        return [
            $row->id,
            $row->first_name,
            $row->last_name,
            $row->email,
            $row->address,
            $row->contact
        ];
    }

    public function headings(): array
    {
        // Define custom column names
        return [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Address',
            'Contact'
        ];
    }
}
