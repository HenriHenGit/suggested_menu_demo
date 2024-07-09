<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            [
                'name' => 'Gạo lứt',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Gạo nếp',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Gạo nếp cái',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Gạo tẻ giã',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Gạo tẻ máy',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Hạt kê',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Ngô (bắp tươi)',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Ngô vàng hạt khô',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bún',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bún khô',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bột gạo nếp',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bột gạo tẻ',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bột mì',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bột ngô vàng',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Cốm',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Mỳ sợi',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bột yến mạch nguyên cám',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Mỳ ý (pasta)',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Nui',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Yến mạch (nguyên hạt)',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Củ cái (củ mỡ)',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Củ dong (huỳnh tinh)',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Củ sắn (khoai mì)',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Củ sắn dây',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Củ từ',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Củ ấu',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai lang',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai lang nghệ',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai môn',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai nước',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai riềng',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai sọ',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai tây',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Miến dong',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Bột dong lọc',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Bột khoai lang',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Bột khoai riềng (bột đao)',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Bột khoai tây (lọc)',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Bột sắn (bột năng)',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Bột sắn dây',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai lang khô',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Khoai tây khô',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Sắn khô',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Trân châu sắn',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Hạt dẻ khô',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt dẻ to',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt dẻ tươi',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt mít',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt đen',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt điều',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Lạc hạt (đậu phộng)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu cô ve (hạt)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu Hà lan (hạt)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu trứng cuốc',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu xanh (Đỗ xanh)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu đũa (hạt)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đỗ trắng hạt (Đậu tây hạt)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đỗ tương (đậu nành)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đỗ đen hạt (đậu đen)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bột lạc',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bột đậu tương rang chín',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bột đậu tương đã loại béo',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bột đậ̣u xanh',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt bí đỏ rang',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạ̣t dưa hấu rang',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt điều khô, chiên dầu',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Quả cọ tươi',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Quả̉ đại tươi',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Sữa bột đậu nành',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Sữa đậu nành (100g đậu/lít)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Vừng hạt (đen, trắng)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu phụ',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậ̣u phụ chúc (váng đậu khô - tàu hữ ky)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu phụ nướng',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Cùi (cơm) dừa già',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Cùi (cơm) dừa non',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạnh nhân',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt chia',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt dẻ',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt hồ đào',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt mắc ca',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt phỉ',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Hạt óc chó',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Nước cốt dừa',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu đỏ hạt (Đỗ đỏ hạt)',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bí ngô (bí đỏ)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bí́ đao (bí xanh)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bầu',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cà bát',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cà̀ chua',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cà pháo',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cà rốt',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cà rốt khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cà tím',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải bắp',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải bắp khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải bắp đỏ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải cúc',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải soong',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải thìa (cải trắng)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Chuối xanh',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải xanh',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cần ta (rau cần nước)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cần tây',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ cải trắng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ cải trắng khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ cải đỏ (củ cải dường)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ niễng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ đậu',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Dưa chuột',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Dưa gang',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Dọc củ cải (non)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Dọc mùng (bạc hà)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Đậu cô ve',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Đậu đũa (đậu dải áo)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Giá đậu tương',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Giá́ đỗ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hoa chuối',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hoa lý (thiên lý)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hành củ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hành lá',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hành tây',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hạt sen khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hạt sen tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hẹ lá',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Khế',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Quả gấc',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Quả đậu rồng non',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Đu đủ xanh',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Đậu Hà Lan',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Lá lốt',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Lá me',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Lá mơ lông',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Lá sắn tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Măng chua',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Măng khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Măng tre',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Măng tây',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Mướp',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Mướp Nhật Bản',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Mướp đắng (khổ qua)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ngó sen',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ngô bao tử',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ngải cứu',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nụ mướp',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Quả dọc',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Quả me chua',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau bí',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau câu khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau câu tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau diếp',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau dền cơm (giền cơm)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau dền trắng (giền trắng)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau dền đỏ (giền đỏ)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau giấp cá (diếp cá)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau húng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau đay',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ớt chuông (ớt xanh to)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ớt chuông (ớt đỏ to)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ớt vàng to',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau khoai lang',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau kinh giới',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau muống',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau muống khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau má',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau má rừng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau mùi (ngò rí)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau mùi tàu (ngò gai)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau mồng tơi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau ngót',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau ngót khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau ngổ (ngò ôm)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau rút (rau nhút)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau răm',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau xà lách',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ tỏi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Quả su su',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Quả sấu xanh',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau sam',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau sắng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau thơm',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau tàu bay',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Su hào',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Su hào khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Súp lơ trắng (bông cải trắng)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Súp lơ xanh (bông cải xanh)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Thìa là (Thì là)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Trám đen chín',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Tía tô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Tỏi tây (Cả lá)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Lá xương sông',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Trán trắng tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ dền',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Củ sen',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Mít non',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Mộc nhĩ (nấm mèo)',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ngọn su su',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nấm hương khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nấm hương tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nấm mỡ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nấm rơm',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nấm thường tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Quả đỗ ván (Đầu ván) tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau cải ngọt',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau cải thảo',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rong biển tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Đậu bắp',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bí ngòi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải bó xôi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải bẹ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải dún',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải mơ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Cải ngồng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Húng quế',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hương thảo',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ngọn đậu Hà Lan',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nấm bào ngư tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nấm kim châm tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bưởi',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Cam',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Chanh',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Chuối tiêu',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Chuối tây',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Chôm chôm',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dâu gia',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dâu tây',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dưa bở',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dưa hấu',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dưa hồng',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dưa lê',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dứa tây (trái thơm)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quả dứa',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Đào',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Gioi (trái mận hồng đào)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Hồng bì',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Hồng xiêm (sa pô chê)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Hồng đỏ',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Lê',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Lựu',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mãng cầu xiêm',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mít dai',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mít mật (mít ướt)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mít sấy khô',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mơ',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mận (trái mận bắc)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mắc cọoc',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Đu đủ chín',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Muỗm (quéo)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mơ sấy khô',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Na (mãng cầu)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Nho chua',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Nho ngọt',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Nhãn',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Nhẫn sấy khô',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Nhót',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quả cóc',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quả bơ vỏ tím',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quả bơ vỏ xanh',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quả ỏi',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quất chín (trái tắc)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Thanh long',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Trứng gà (trái lê ki ma)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Anh đào tươi (Cherry)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Chanh leo',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dưa lưới (vàng)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Mãng cụt',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quýt',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quả kiwi',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Sấu chín',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Sầu riêng',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Táo ta',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Táo tây (trái bom)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Vú sữa',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Vải',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Vải sấy khô',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Xoài chín',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Chuối khô',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Phúc bồn tử (mâm xôi)',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Quả việt quất',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Bơ',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Bơ thực vật',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu cá Ranee',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu cám gạo',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu cọ',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu dừa',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu hạt bông gòn',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu lạc (dầu phộng)',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu ngô (dầu bắp)',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu vừng (dầu mè)',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu ô-liu (dầu alive)',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu ăn',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu đậu tương',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Mỡ lợn muối',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu hướng dương',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Dầu hạt lanh',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Thịt bê mỡ',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bê nạc',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò loại 1',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò loại 2',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò lưng, nạc',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò, lưng, nạc và mỡ',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bồ câu ra rang',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt chó sấn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt chó vai',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt cừu, nạc',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt dê, nạc',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt gà rừng',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt gà ta',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt gà tây',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt hươu',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Bầu dục bò (cật bò)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Bầu dục lợn (cật heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn mỡ',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn nạc',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn nửa nạc, nửa mỡ',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt ngỗng',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt ngựa',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt thỏ nuôi',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt thỏ rừng',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt trâu',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt trâu bắp',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt trâu cổ',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt trâu thăn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt trâu đùi',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt vịt',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Bì lợn (da heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Chân giò lợn (giò heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Dạ dày bò (bao tử bò)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Dạ dày lợn (bao tử heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Gan bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Gan gà',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Gan lợn (heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Gan vịt',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Gân chân bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Lưỡi bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Lưỡi lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt thủ bò (đầu bò)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt thủ lợn (đầu heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Đuôi bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Đuôi lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Lòng non lợn (ruột heo non)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Lòng già lợn (khấu linh)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Mề gà',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Phổi bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Phổi lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Sườn lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tai lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tim bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tim gà',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tiết bò (huyết bò)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tiết lợn luộc (huyết heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tủy xương bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Óc bò',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Óc lợn (heo)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Dồi lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tủy xương lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Bột cóc',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Châu chấu',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Cánh gà công nghiệp',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Lòng gà (cả bộ)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Lườn (ức) gà công nghiệp',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Nhộng',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn nửa nạc, nửa mỡ',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn nạc mông',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn nạc thân',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn nạc vai',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt ngan (vịt xiêm)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Đùi gà công nghiệp',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Đùi ếch',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Chân giò lợn bỏ xương',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Gà mía',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'gà tam hoàng',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Sườn lợn bỏ xương',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò bắp',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò mềm',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò nạc',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt bò nạm',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt gà công nghiệp',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn xay',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn ba chỉ',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Xương lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Đùi lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt gà ta bỏ xương',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt gà đòi Yên Thế',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn mông sấn bỏ bì',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn nạc dăm',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn sấn mông',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn sấn vai',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt lợn thăn lưng (sườn thăn)',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt ngan bỏ xương',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt ngỗng bỏ xương',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Thịt vịt bỏ xương',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Tim lợn',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Cá bống',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá chày',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá chép',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá diếc',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá dưa',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá dầu',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá hồi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá lác',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá mè',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá mòi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá đao',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá đé',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá đối',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá đồng tiền',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá chạch',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá mối',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá mỡ',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá ngừ',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá nạc',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá nục',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá phèn',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá quả',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá rô phi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá rô đồng',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá thu',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá thu đao',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá thờn bơn',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá trê',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá trắm cỏ',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cua bể (cua biển)',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cua đồng',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá trích',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá trôi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ghẹ',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Hải sâm',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Hến',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Lươn',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Mực',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Rạm',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ốc bươu',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ốc nhồi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ốc vặn',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ốc đá',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá chim (vàng anh)',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Rươi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Sò',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Trai',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tép gạo',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm biển',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm đồng',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá basa',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá bã trầu',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá cam',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá chim trắng',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá cờ',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá kìm',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá điêu hồng',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cáy',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Don biển',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ngao',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Trùng trục',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm bạc',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm nõn',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ba khía',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Bạch tuộc',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cua hoàng đế',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá lăng',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá măng biển',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá thu vạch',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá tra',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá vược',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá đù (cá lù đù)',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Còng biển',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ruốc biển',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cụng biển',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Dắt biển',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Giò cá trôi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Mực ống tươi',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Phi-lê cá bớp bỏ xương',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Sò huyết',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Thịt bề bề',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Thịt ghẹ dĩa',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Thịt ghẹ xanh',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tép xanh',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm bộp',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm càng',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Điệp răng lược',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ốc hương',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Ốc mống tay',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Cá tuyết',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Hàu',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm càng xanh (nuôi)',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm càng xanh (sông)',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm hùm',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm hùm gai',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm lớt',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm nõn',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm nương',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm sú',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Tôm thẻ',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Bột trứng',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Lòng trắng trứng gà',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Lòng trắng trứng vịt',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Lòng đỏ trứng gà',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Lòng đỏ trứng vịt',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Trứng cá',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Trứng cút',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Trứng gà công nghiệp',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Trứng gà ta',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Trứng vịt',
                'category_ingre_id' => 'EGG009',
            ],
            [
                'name' => 'Phô mai',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa bò tươi',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa bột toàn phần',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa bột tách béo',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa dê',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa mẹ',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sô cô la',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Đường cát',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Đường trắng',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Mật ong',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Đường phèn',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Đường nâu',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Đường thốt nốt',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Bột nghệ',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Cary bột',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Gừng khô (bột)',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Gừng tươi',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hạt tiêu',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Muối trắng',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Mắm tép chua',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Mắm tôm loãng',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Mắm tôm đặc',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nghệ tươi',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước chấm Maggi',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước mắm cá',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước mắm loại 1',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Riềng củ tươi',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Ớt bột',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Chao (đậu phụ nhự)',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Củ sả',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Giấm',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hạt nêm Aji ngon',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Mì chính',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước mấm cá cơm',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước mấm cá đặc',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước mắm loại 2',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Sốt mayonnaise',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Tương khô',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Tương nếp',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Tương ớt',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Xì dầu (nước tương)',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bột canh',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bột chiên giòn hải sản Aji-quick',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bột chiên gà giòn Aji-quick',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Dầu giấm',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Gia vị phở Aji-quick',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hạt nêm',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Mù tạt',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Ngũ vị hương',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước màu (caramen)',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước tương lên men',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Tương Bần',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Tương cà',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bia',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Cốc-tai',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Nước cam',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Nước dừa',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Nước khoáng',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Nước quýt',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Nước ép cà chua',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu cam, chanh',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu cô-nhắc (cognac)',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu nếp',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu trắng',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu vang trắng',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu vang trắng ngọt',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu vang đỏ',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Rượu Whisky',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Coca cola',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Men khô',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Sữa chua',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua vớt béo',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa hoàn nguyên hương dâu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa hoàn nguyên hương socola',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa hoàn nguyên hương vani',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng có đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng không đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tách béo',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa đặc có đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống hương cam',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống hương dâu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống hương táo',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua ăn có đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua ăn không đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua ăn ít đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi hương dâu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi hương sôcôla',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi TH có đường (sô-cô-la, hương dâu)',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi TH hương va-ni công thức TOPKID',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tách béo có đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tách béo không đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa đậu nành có đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa đậu nành không đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa đậu nành ít đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Phô mai TH tươi tự nhiên Mozzarella',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa bột IQLac Pro',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa bột IQLac Pro Grow+',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua có đường Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua khoai môn Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua không đường Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua nếp cẩm Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua sệt TH các vị (ca-ra-men, đào)',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua TH có đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua TH không đường',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua TH men sống các vị (trái cây, việt quất)',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua TH thanh trùng TOPKID (dâu, chuối, lúa mạch)',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống TH hương vị (cam, dâu, việt quất)',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống TH men sống các vị (va-ni, việt quất)',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi TH nguyên chất',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa bột Gigo nuti gold',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa bột Kinder gold',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua nha đam Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua pho mai Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua thạch dừa Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua trái cây Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống tiệt trùng vị ổi Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống vị cam Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa chua uống vị dâu Mộc Châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi có đường Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi hương chuối Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi không đường Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng có đường Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi ít béo Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi đại mạch Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng không đường Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng socola Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng vị cam Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng vị dâu Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng vị dừa Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Sữa tươi tiệt trùng ít đường Mộc châu',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Bột nở',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Vani bột',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Mè trắng',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Nước mía nguyên chất',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Lá dứa',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bột rau câu',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Dừa sấy khô',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Đá viên',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Bột ngọt',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Dầu hào',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hạt ngò khô',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hoa hồi',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Quế cây',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Muối hột',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hắc xì dầu',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Củ cải muối',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Chả lụa chay',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Whipping cream',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Khoai lang ruột vàng',
                'category_ingre_id' => 'STC002',
            ],
            [
                'name' => 'Chocolate 75%',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Matcha',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Tinh chất vani',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bột sương sáo',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Tương hột',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nấm đùi gà',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Sả băm',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Nước mắm chay',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hạt nêm chay',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Đậu hủ trắng',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Đậu hủ chiên',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Chả chén chay chiên',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bắp chuối bào',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rau đắng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ngó súng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Rong chân vịt khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bánh cracker',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Cream cheese',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Đường xay',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Nước cốt chanh dây',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Gelatin',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Nước cốt chanh',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bột cacao',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Baking soda',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Vanilla',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Màu đỏ thực phẩm',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Penne',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Sốt cà chua húng quế',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Phô mai bột',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Nước soda',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Lá húng lủi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Syrup vải',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Syrup đường',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Thịt heo xay',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Xơ mít',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Dầu màu điều',
                'category_ingre_id' => 'FAT006',
            ],
            [
                'name' => 'Hành tím',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Trái ớt',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Ớt hiểm',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Chuối cau',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Dừa nạo',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Nước dừa dảo',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Bánh hỏi',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bột tỏi',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Giò sống',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Miến tàu',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Đác tươi',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Trà xanh lài',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Nước thơm ép',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Nước đường',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Chanh vàng',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Yakult',
                'category_ingre_id' => 'MILK013',
            ],
            [
                'name' => 'Hoa đậu biếc',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Lá rosemary',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hoa atiso đỏ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Hoa ăn được',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Đầu hành trắng',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Men (làm bánh)',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bột báng',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Hành boa rô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Tiêu sọ',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Tỏi tép',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Nước cốt tắc',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Bánh phở',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Bột màu điều',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Hành phi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Đậu phộng rang',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bột xá xíu',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Đu đủ xanh',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bột gạo xắt (bánh canh)',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Nấm tuyết',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Táo tàu',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Hạt sen tươi',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Thốt nốt tươi',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Đác rim',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Rau tiến vua khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bánh phồng tôm rán',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Ổi hồng',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Trà lài',
                'category_ingre_id' => 'BEV012',
            ],
            [
                'name' => 'Muối tôm',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Sườn non chay',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Bún tàu',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Dầu hào chay',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Gạo tấm',
                'category_ingre_id' => 'GRA001',
            ],
            [
                'name' => 'Đồ chua',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Trái sake',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Bạch quả',
                'category_ingre_id' => 'FRT005',
            ],
            [
                'name' => 'Tàu hủ ky tươi',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Lá rong biển khô',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Mật mía',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Mạch nha',
                'category_ingre_id' => 'SWT010',
            ],
            [
                'name' => 'Lòng heo non',
                'category_ingre_id' => 'MTP007',
            ],
            [
                'name' => 'Sa tế',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Vôi tôi',
                'category_ingre_id' => 'COND011',
            ],
            [
                'name' => 'Tôm khô',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Bông hẹ',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Măng tươi',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Bông bí',
                'category_ingre_id' => 'VEG004',
            ],
            [
                'name' => 'Chả cá thu',
                'category_ingre_id' => 'SFH008',
            ],
            [
                'name' => 'Bột hạnh nhân',
                'category_ingre_id' => 'PLF003',
            ],
            [
                'name' => 'Cà phê bột',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Glucose',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột bánh dẻo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Muối rang',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột xí muội',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bún gạo lức khô',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mè rang',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bắp bò',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mẻ',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mắm nêm',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bánh tráng',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Rau muống',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lá gai',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Dừa sợi',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lá chuối',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bao tử heo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Tiêu xanh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mướp hương',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mì vắt',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Phô mai Con Bò Cười',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Cá mai',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Thịt ếch',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Xoài xanh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bông so đũa trắng',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bánh mì (ổ dài)',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Thịt thăn bò',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột nếp',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mắn cá linh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mắm cá sặc',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Cá lóc',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Heo quay',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Ngải bún',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Sả cây',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Ba chỉ heo nguyên tấm',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mắc khén',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột yến mạch đen',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Đinh hương',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Dây lạt gói bánh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bắp nếp',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Xương heo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Tóp mỡ',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Tép khô',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Đường đen',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Gan heo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nếp ngỗng',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nước tro tàu',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lạp xưởng',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Hành baro',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mè đen',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Thịt trái vải',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Đậu bo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Cà chua bi',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Sườn non',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Cà rốt hạt lựu',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nho đen',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Xúc xích',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Phô mai Cheddar lát',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bánh mì sandwich',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Đậu cove',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột chiên xù',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bắp ngọt',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Rau sống',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nước cốt me',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột cao quy linh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Long nhãn khô',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Trái kỷ tử',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Kẹo mạch nha',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Óc heo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Gói gia vị thuốc bắc',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Gừng già',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nác dăm heo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nước dùng xương',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột cốt dừa',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Chả lụa',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Chả chiên',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bánh tôm',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Baking powder',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Chocolate chip',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mì Ottogi (sợi lớn)',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Sốt tương đen',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nước ấm',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Muối tiêu',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Kim chi',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Miến Hàn Quốc',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nước lá dứa',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nước củ dền',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lá chanh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Dầu tỏi',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Tiêu đen xay',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột chiên giòn',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Rễ tranh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Kem tươi (Heavy cream)',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mì ống',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mỡ (làm bánh)',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Xuyên tiêu',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Chả quế',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Tảo bẹ',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Kèo nèo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Vỏ hoành thánh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nem',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Pepsi Blue',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Sốt worcestershire',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Cream of tartar',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Phổ tai',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Dồi trường',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Jambon',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bắp mỹ',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Sợi bánh canh',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bánh quẩy',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Hạt thì là',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Củ thì là',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Mũi heo',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Ớt sừng',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Cá phi lê',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Xương ống bò',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nạm bò',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột cà ri',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Dưa cải chua',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Nghêu',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Quả sung',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Củ nghệ',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Cá thác lác',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Củ riềng',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Phở tươi',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lá nguyệt quế khô',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lá cách',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lá nhàu',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'vỏ quýt khô',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Vỏ quế khô',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Bột hạt ngò (bột mùi)',
                'category_ingre_id' => 'OTHER',
            ],
            [
                'name' => 'Lá basil khô',
                'category_ingre_id' => 'OTHER',
            ],
        ]);
    }
}
