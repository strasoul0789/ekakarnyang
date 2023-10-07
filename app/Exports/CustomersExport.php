<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CustomersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function collection()
    {
    	

    	return Customer::all();
    }

    public function headings(): array
    {
        return [
        	'ที่',
            'ชื่อ',
            'นามสกุล',
            'เบอร์โทรศัพท์',
            'อีเมล์',
            'บ้านเลขที่',
            'หมู่ที่',
            'ตำบล',
            'อำเภอ',
            'จังหวัด', 
            'รหัสไปรษณีย์', 
        ];
    }
}
