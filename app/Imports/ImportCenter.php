<?php

namespace App\Imports;

use App\Models\Branch;
use App\Models\Center;
use App\Services\CenterService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportCenter implements ToModel, WithStartRow
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
        $center = new Center();
        $center->center_name = $row[0];
        $center->center_address = $row[2];
        $center->branch_id = $this->getBranchId($row[1]);
        $center->center_mobile = $row[6];
        $center->center_date = 1;
        $center->center_no = (new CenterService())->getCenterNo();
        $center->group_limit = 10;
        // $center->center_city = $row[4];
        if (isset($center->center_name)) {
            $center->save();
            \App\Helpers\LogActivity::addToLog('CENTER ' . $center->center_name . ' IMPORTED');
        }


        return;
    }

    public function getBranchId($name): int
    {
        return  Branch::where('branch_name', $name)->first()->id;
    }
}
