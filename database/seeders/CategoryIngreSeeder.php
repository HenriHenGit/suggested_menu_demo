<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryIngreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_ingres')->insert([
            [
                'id' => 'GRA001',
                'name' => 'ngũ cốc và chế phẩm',
            ],
            [
                'id' => 'STC002',
                'name' => 'khoai và củ chứa tinh bột',
            ],
            [
                'id' => 'PLF003',
                'name' => 'hạt giàu đạm và béo',
            ],
            [
                'id' => 'VEG004',
                'name' => 'rau và củ quả dùng làm rau',
            ],
            [
                'id' => 'FRT005',
                'name' => 'quả trái cây',
            ],
            [
                'id' => 'FAT006',
                'name' => 'dầu, mỡ, bơ',
            ],
            [
                'id' => 'MTP007',
                'name' => 'thịt và chế phẩm từ thịt',
            ],
            [
                'id' => 'SFH008',
                'name' => 'thủy hải sản và chế phẩm',
            ],
            [
                'id' => 'EGG009',
                'name' => 'trứng và chế phẩm từ trứng',
            ],
            [
                'id' => 'SWT010',
                'name' => 'đồ ngọt',
            ],
            [
                'id' => 'COND011',
                'name' => 'gia vị và nước chấm',
            ],
            [
                'id' => 'BEV012',
                'name' => 'nước giải khát, bia, rượu',
            ],
            [
                'id' => 'MILK013',
                'name' => 'Sữa và chế phẩm từ sữa',
            ],
            [
                'id' => 'OTHER',
                'name' => 'Loại khác',
            ],
        ]);
    }
}
