<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationRequirement extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the QuotationRequirement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function project()
    {
        return $this->hasOne(ProjectType::class, 'id', 'project_type');
    }
    public function phase()
    {
        return $this->hasOne(PaseType::class, 'id', 'phase_type');
    }
    public function system()
    {
        return $this->hasOne(SystemType::class, 'id', 'system_type');
    }
    public function panel()
    {
        return $this->hasOne(PanelType::class, 'id', 'panel_origin_type');
    }
    public function inverter()
    {
        return $this->hasOne(InverterType::class, 'id', 'inverter_type');
    }
    public function battery()
    {
        return $this->hasOne(BatteryType::class, 'id', 'battery_type');
    }
    public function systemBrand()
    {
        return $this->hasOne(SystemBrand::class, 'id', 'system_brand');
    }
}
