<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'product_name'  =>$row[0],
            'cat_id'        =>$row[1],
            'sup_id'        =>$row[2],
            'product_code'  =>$row[3],
            'product_garage'=>$row[4],
            'product_route' =>$row[5],
            'product_image' =>$row[6],
            'buy_date'      =>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['7'])->format('Y-m-d'),
            'expire_date'   =>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['8'])->format('Y-m-d'),
            'buying_price'  =>$row[9],
            'selling_price' =>$row[10]
        ]);
    }
}
