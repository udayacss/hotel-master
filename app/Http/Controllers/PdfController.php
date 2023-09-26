<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Models\QuotationRequirement;
use App\Models\UnitRange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;
use setasign\Fpdi\Fpdi;

class PdfController extends Controller
{
    public function export($id)
    {
        $quotation_details = $this->getQuoteDetails($id);
        $filePath = public_path("PDF/Q_FORMAT.pdf");
        // $quotation_details['quotation_details']?->customer?->first_name
        $file_name = $quotation_details['quotation_details']?->requested_capacity
            . 'KW'
            . ' ' . $quotation_details['quotation_details']?->system->type
            . ' ' . $quotation_details['quotation_details']?->customer?->first_name
            . '.pdf';
        // $outputFilePath = public_path('QUOTATIONS/'.$file_name);
        $outputFilePath = storage_path('QUOTATIONS/' . $file_name);
        $this->fillPDFFile($filePath, $outputFilePath, $quotation_details);

        return response()->file($outputFilePath);
    }

    public function fillPDFFile($file, $outputFilePath, $quotation_details)
    {
        $fpdi = new FPDI;

        $count = $fpdi->setSourceFile($file);
        for ($i = 1; $i <= $count; $i++) {


            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);

            $fpdi->SetFont("helvetica", "B", 12);
            $fpdi->SetTextColor(0, 0, 255);

            $date = Carbon::now()->format('d');
            $month = Carbon::now()->format('m');
            $year = Carbon::now()->format('Y');
            $ref = 'AP/AS/' . $date . $month . $year . '-02';

            if ($i == 1) {
                $fpdi->Text(162, 50, $date);
                $fpdi->Text(175, 50, $month);
                $fpdi->Text(186, 50, $year);

                $fpdi->SetFont("helvetica", "B", 10);
                $fpdi->Text(162, 55, $ref);

                // dd($quotation_details['quotation_details']?->customer?->name);
                $fpdi->Text(117, 218, ucfirst($quotation_details['quotation_details']?->customer?->first_name) . ' ' . ucfirst($quotation_details['quotation_details']?->customer?->last_name));
                $fpdi->Text(117, 222, ucfirst($quotation_details['quotation_details']?->customer?->address));
            }

            $fpdi->SetFont("helvetica", "B", 12);
            $fpdi->SetTextColor(255, 0, 0);


            // dd($quotation_details['quotation_details']->panel->type);
            $panel_1_text_1 = "Full German";
            $panel_1_text_2 = $quotation_details['quotation_details']->panel->type;
            $inverter_text_1 = "SMA";
            $price_1 = $quotation_details['cost']['sma'];
            $panel_2_text_1 = "Semi German";
            $panel_2_text_2 = $quotation_details['quotation_details']->panel->type;
            $inverter_text_2 = "SOLIS";
            $price_2 = $quotation_details['cost']['solis'];
            $unit_count = $quotation_details['max_unit'];

            if ($i == 3) {

                $fpdi->Text(38, 214, $panel_1_text_1);
                $fpdi->Text(80, 214, $panel_1_text_2);
                $fpdi->Text(110, 214, $inverter_text_1);
                $fpdi->Text(150, 214, $price_1);

                $fpdi->Text(38, 219, $panel_2_text_1);
                $fpdi->Text(80, 219, $panel_2_text_2);
                $fpdi->Text(110, 219, $inverter_text_2);
                $fpdi->Text(150, 219, $price_2);

                $fpdi->SetTextColor(0, 0, 255);
                $fpdi->SetFont("helvetica", "B", 15);

                $fpdi->Text(164, 232, $unit_count);
            }

            // $fpdi->Image("", 40, 90);
        }

        return $fpdi->Output($outputFilePath, 'F');
    }

    public function getQuoteDetails($quotation_id)
    {
        $quotation_requirements = QuotationRequirement::with(
            'customer',
            'project',
            'phase',
            'system',
            'panel',
            'inverter',
            'battery',
            'systemBrand',
        )->where('id', $quotation_id)->first();

        if (!isset($quotation_requirements)) {
            return abort(404);
        }

        $price_sma = PriceList::where('grid_type_id', $quotation_requirements->system_type)
            ->where('panel_type_id', $quotation_requirements->panel_origin_type)
            ->where('inverter_type_id', 1)
            ->where('phase_type_id', $quotation_requirements->phase_type)
            ->where('capacity', '>=', $quotation_requirements->requested_capacity)
            ->where('max_units', '>=', $quotation_requirements->units)
            ->first();
        $price_solis = PriceList::where('grid_type_id', $quotation_requirements->system_type)
            ->where('panel_type_id', $quotation_requirements->panel_origin_type)
            ->where('inverter_type_id', 2)
            ->where('phase_type_id', $quotation_requirements->phase_type)
            ->where('capacity', '>=', $quotation_requirements->requested_capacity)
            ->where('max_units', '>=', $quotation_requirements->units)
            ->first();

        $quotation_requirements->status = 1;
        $quotation_requirements->save();
        return ['quotation_details' => $quotation_requirements, 'cost' => ['sma' => $price_sma?->price, 'solis' => $price_solis?->price], 'max_unit' => $price_sma?->max_units];
    }
}
