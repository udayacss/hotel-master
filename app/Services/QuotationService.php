<?php

namespace App\Services;

use App\Models\GemCategory;
use App\Models\QuotationRequirement;

class QuotationService
{
    public function getPaginated($per_page = 20)
    {
        return  QuotationRequirement::with(
            'customer',
            'project'
        )->orderBy('id','DESC')->paginate($per_page);
    }
}
