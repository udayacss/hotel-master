<?php

namespace App\Imports;

use App\Models\Branch;
use App\Services\BranchService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportBranch implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $branch = new Branch();
        $branch->branch_name = $row[0];
        $branch->branch_address = $row[1];
        // $branch->branch_province = $row[2];
        // $branch->branch_city = $row[3];
        $branch->branch_postal = $row[4];
        $branch->branch_mobile = $row[5];
        $branch->branch_land = $row[6];
        $branch->branch_email = $row[7];
        $branch->branch_no = (new BranchService())->getBranchCode();

        $branch->save();

        \App\Helpers\LogActivity::addToLog('BRANCH ' . $branch->branch_name . ' IMPORTED');
        return;
    }
}
