<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NutriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nutris')->insert([
            [
                'id' => 'MACR001',
                'name' => 'Năng lượng (Energy)',
                'unit' => 'kcal',
                'desc' => 'Năng lượng (Energy) kcal được sử dụng để đo lượng năng lượng mà thực phẩm cung cấp cho cơ thể chúng ta. Cơ thể sử dụng năng lượng này để thực hiện các hoạt động hàng ngày như hít thở, duy trì nhiệt độ cơ thể, tiêu hóa thức ăn, và thực hiện các hoạt động thể chất. Việc theo dõi lượng kcal tiêu thụ giúp quản lý cân nặng và duy trì sức khỏe tổng quát.',
            ],
            [
                'id' => 'MACR002',
                'name' => 'Chất đạm (Protit)',
                'unit' => 'g',
                'desc' => 'Chất đạm (protein) là thành phần dinh dưỡng thiết yếu giúp xây dựng và sửa chữa cơ thể, tạo enzym và hormone, và hỗ trợ hệ miễn dịch.',
            ],
            [
                'id' => 'MACR003',
                'name' => 'Chất béo (Lipit)',
                'unit' => 'g',
                'desc' => 'Chất béo (lipit) là một nhóm các hợp chất hữu cơ không tan trong nước, bao gồm triglyceride, phospholipid, và sterol. Chúng là nguồn cung cấp năng lượng dồi dào cho cơ thể, hỗ trợ hấp thụ các vitamin tan trong dầu (A, D, E, K), bảo vệ các cơ quan nội tạng, và duy trì nhiệt độ cơ thể.',
            ],
            [
                'id' => 'MACR004',
                'name' => 'Chất bột đường (Gluxit)',
                'unit' => 'g',
                'desc' => 'Chất bột đường (glucid) là nhóm các hợp chất hữu cơ gồm đường, tinh bột và chất xơ. Chúng là nguồn cung cấp năng lượng chính cho cơ thể, giúp duy trì chức năng của não và cơ bắp.',
            ],
            [
                'id' => 'MACR005',
                'name' => 'Chất xơ (Fiber)',
                'unit' => 'g',
                'desc' => 'Chất xơ (fiber) là thành phần của thực phẩm thực vật không tiêu hóa được, bao gồm hai loại: chất xơ hòa tan và chất xơ không hòa tan. Chất xơ hỗ trợ tiêu hóa, giúp duy trì hệ tiêu hóa khỏe mạnh, kiểm soát đường huyết và cholesterol, và ngăn ngừa táo bón.',
            ],
            [
                'id' => 'MINE006',
                'name' => 'Can-xi (Ca)',
                'unit' => 'mg',
                'desc' => 'Canxi là một khoáng chất quan trọng trong cơ thể, cần thiết cho sự phát triển và duy trì cấu trúc xương và răng. Ngoài ra, canxi còn tham gia vào các quá trình sinh học khác như cơ bắp hoạt động, truyền dẫn thần kinh, và huyết tương.',
            ],
            [
                'id' => 'MINE007',
                'name' => 'Sắt (Fe)',
                'unit' => 'mg',
                'desc' => 'Về dinh dưỡng, sắt (Fe) là một khoáng chất quan trọng giúp duy trì sự khỏe mạnh của cơ thể. Nó được coi là thiết yếu vì nó tham gia vào quá trình sản xuất hồng cầu, điều này cực kì quan trọng cho việc vận chuyển oxy đến từng tế bào trong cơ thể',
            ],
            [
                'id' => 'MINE008',
                'name' => 'Ma-giê (Mg)',
                'unit' => 'mg',
                'desc' => 'Magiê (Magnesium) là một khoáng chất thiết yếu cho sức khỏe của cơ thể. Nó giúp duy trì chức năng cơ bắp và thần kinh, điều hòa nhịp tim, hỗ trợ quá trình trao đổi chất và sản xuất năng lượng. Magiê cũng đóng vai trò quan trọng trong sự hấp thụ và sử dụng can-xi (calcium) và kali (potassium), và có ảnh hưởng đến sức khỏe tim mạch và hệ thần kinh.',
            ],
            [
                'id' => 'MINE009',
                'name' => 'Măng-gan (Mn)',
                'unit' => 'mg',
                'desc' => 'Mangan là một khoáng chất vi lượng cần thiết cho sức khỏe con người. Nó tham gia vào nhiều quá trình sinh học trong cơ thể, bao gồm phản ứng oxy hóa khử, tổng hợp các enzyme, và duy trì chức năng của hệ thần kinh và xương. Mặc dù cần thiết, mangan chỉ cần có trong lượng rất nhỏ và nếu tiêu thụ quá nhiều có thể gây hại cho sức khỏe.',
            ],
            [
                'id' => 'MINE010',
                'name' => 'Phốt-pho(P)',
                'unit' => 'mg',
                'desc' => 'Là thành phần chính của các phân tử ATP (adenosine triphosphate), một nguồn năng lượng cơ bản cho các quá trình sinh học trong cơ thể. Ngoài ra, phốt-pho còn là một thành phần chủ yếu của các phân tử DNA và RNA, là một phần cấu trúc của màng tế bào, và tham gia vào việc điều hòa các hoạt động của enzym.',
            ],
            [
                'id' => 'MINE011',
                'name' => 'Ka-li (K)',
                'unit' => 'mg',
                'desc' => 'Kali là một khoáng chất thiết yếu trong dinh dưỡng, chủ yếu tồn tại dưới dạng ion trong cơ thể. Nó có vai trò quan trọng trong duy trì cân bằng nước và điện giữa các tế bào, hỗ trợ hoạt động cơ bắp, truyền dẫn thần kinh, và duy trì huyết áp ổn định. Kali cũng tham gia vào quá trình chuyển hóa và hấp thu các chất dinh dưỡng.',
            ],
            [
                'id' => 'MINE012',
                'name' => 'Na-tri (Na)',
                'unit' => 'mg',
                'desc' => 'Natri là một khoáng chất cần thiết cho cơ thể, tồn tại chủ yếu dưới dạng ion natri (Na⁺). Natri có vai trò quan trọng trong duy trì cân bằng nước và điện giữa các tế bào, điều hòa huyết áp, và truyền dẫn các xung điện trong hệ thần kinh. Ngoài ra, natri cũng cần thiết để duy trì sự hoạt động của cơ bắp và hệ thống tim mạch. Tuy nhiên, tiêu thụ quá nhiều natri có thể gây hại cho sức khỏe, đặc biệt là đối với huyết áp và tim mạch.',
            ],
            [
                'id' => 'MINE013',
                'name' => 'Kẽm (Zn)',
                'unit' => 'mg',
                'desc' => 'Là một nguyên tố vi lượng cần thiết cho nhiều quá trình sinh học trong cơ thể con người. Kẽm đóng vai trò quan trọng trong hơn 300 enzym khác nhau, hỗ trợ quá trình trao đổi chất, tổng hợp protein, phát triển và duy trì cấu trúc của tế bào, và hỗ trợ hệ thống miễn dịch. Ngoài ra, kẽm cũng có vai trò quan trọng trong quá trình chuyển hóa năng lượng và hấp thụ vitamin A.',
            ],
            [
                'id' => 'MINE014',
                'name' => 'Đồng (Cu)',
                'unit' => 'µg',
                'desc' => 'Đồng (Cu) là một nguyên tố hóa học và cũng là một khoáng chất vi lượng cần thiết cho cơ thể con người. Nó có vai trò quan trọng trong nhiều quá trình sinh học, bao gồm sự hoạt động của các enzym, hệ thống miễn dịch, và sự phát triển của tế bào thần kinh và mô liên kết. Đồng cũng giúp duy trì sức khỏe của da và tóc, tham gia vào quá trình hình thành xương và sản xuất collagen. Ngoài ra, đồng còn có vai trò trong quá trình chuyển hóa năng lượng và sự hấp thụ sắt.',
            ],
            [
                'id' => 'MINE015',
                'name' => 'Sê-len (Se)',
                'unit' => 'µg',
                'desc' => 'Là một khoáng chất vi lượng quan trọng trong dinh dưỡng. Sê-len có vai trò quan trọng trong hệ thống chống oxy hóa của cơ thể, giúp bảo vệ tế bào khỏi sự tổn thương do các gốc tự do. Nó cũng là thành phần chính của một số enzym quan trọng, như glutathione peroxidase, một enzym có vai trò quan trọng trong quá trình chống oxy hóa. Sê-len còn có vai trò trong sự duy trì của hệ thống miễn dịch, chức năng tuyến giáp, và hỗ trợ sự phát triển sinh dục.',
            ],
            [
                'id' => 'VITA016',
                'name' => 'Vitamin C',
                'unit' => 'mg',
                'desc' => 'Là một vitamin thiết yếu không thể tự tổng hợp trong cơ thể người, do đó cần được cung cấp từ các nguồn thực phẩm như trái cây (cam, dâu tây, kiwi) và rau xanh (cải xoăn, cà chua). Vitamin này đóng vai trò quan trọng trong hỗ trợ hệ miễn dịch, tái tạo collagen để duy trì da và xương chắc khỏe, bảo vệ tế bào khỏi tổn thương do gốc tự do, cũng như hấp thụ sắt và tái tạo vitamin E.',
            ],
            [
                'id' => 'VITA017',
                'name' => 'Vitamin B1',
                'unit' => 'mg',
                'desc' => 'Là một trong những vitamin nhóm B quan trọng cho sức khỏe con người. Nó có vai trò chính trong quá trình chuyển hóa năng lượng từ carbohydrate. Thiamine cũng cần thiết cho chức năng thần kinh và cơ bắp, giúp duy trì sự hoạt động bình thường của hệ thần kinh. Ngoài ra, nó tham gia vào quá trình tổng hợp neurotransmitter và các hợp chất quan trọng khác trong cơ thể.',
            ],
            [
                'id' => 'VITA018',
                'name' => 'Vitamin B2',
                'unit' => 'mg',
                'desc' => 'Vitamin B2, hay còn gọi là riboflavin, là một trong các vitamin nhóm B quan trọng trong dinh dưỡng. Nó có vai trò quan trọng trong quá trình chuyển hóa năng lượng từ carbohydrate, protein và chất béo. Vitamin B2 cũng tham gia vào quá trình tái tạo glutathione, một chất chống oxy hóa mạnh mẽ trong cơ thể.',
            ],
            [
                'id' => 'VITA019',
                'name' => 'Vitamin PP',
                'unit' => 'mg',
                'desc' => 'Vitamin PP là cách gọi khác của vitamin B3, còn được biết đến là niacin (niacinamide hoặc nicotinic acid). Đây là một trong những vitamin nhóm B quan trọng, có vai trò quan trọng trong quá trình chuyển hóa năng lượng từ carbohydrate, protein và chất béo.',
            ],
            [
                'id' => 'VITA020',
                'name' => 'Vitamin B5',
                'unit' => 'mg',
                'desc' => 'Vitamin B5, hay còn gọi là axit pantothenic, là một trong những vitamin nhóm B quan trọng cho sức khỏe của cơ thể. Nó là thành phần cần thiết của một enzym quan trọng gọi là coenzyme A (CoA), đóng vai trò quan trọng trong quá trình chuyển hóa năng lượng từ carbohydrate, protein và chất béo.',
            ],
            [
                'id' => 'VITA021',
                'name' => 'Vitamin B6',
                'unit' => 'mg',
                'desc' => 'Vitamin B6, còn gọi là pyridoxine, là một vitamin nhóm B quan trọng giúp chuyển hóa amino axit, tái tạo hemoglobin, hỗ trợ chức năng hệ thần kinh và miễn dịch, cũng như tham gia vào quá trình chuyển hóa năng lượng từ carbohydrate và lipid.',
            ],
            [
                'id' => 'VITA022',
                'name' => 'Vitamin B9 (Folat)',
                'unit' => 'µg',
                'desc' => 'Vitamin B9, còn được gọi là folat hoặc axit folic, là một trong những vitamin nhóm B quan trọng cho sức khỏe của cơ thể. Folat có vai trò chủ yếu trong quá trình sản xuất và sửa chữa DNA, tổng hợp protein, và hình thành các tế bào mới. Nó đặc biệt quan trọng đối với sự phát triển tế bào và cơ quan trong giai đoạn mang thai và nuôi con bằng cách giúp ngăn ngừa các khuyết tật ống thần kinh thai nhi.',
            ],
            [
                'id' => 'VITA023',
                'name' => 'Vitamin H (Biotin)',
                'unit' => 'µg',
                'desc' => 'Vitamin H, hay còn được biết đến là biotin, là một vitamin trong nhóm vitamin B. Nó có vai trò quan trọng trong quá trình chuyển hóa năng lượng từ các chất dinh dưỡng như carbohydrate, protein và chất béo. Biotin cũng tham gia vào quá trình tổng hợp các axit béo và amino axit, có vai trò quan trọng trong sự phát triển và duy trì của tóc, da và móng.',
            ],
            [
                'id' => 'VITA024',
                'name' => 'Vitamin B12',
                'unit' => 'µg',
                'desc' => 'Vitamin B12, còn được gọi là cobalamin, là một vitamin quan trọng trong nhóm vitamin B. Nó có vai trò quan trọng trong quá trình tổng hợp DNA, sản xuất hồng cầu, duy trì chức năng thần kinh, và hỗ trợ quá trình chuyển hóa năng lượng.',
            ],
            [
                'id' => 'VITA025',
                'name' => 'Vitamin A',
                'unit' => 'µg',
                'desc' => 'Vitamin A là một loại vitamin tan trong chất béo rất quan trọng cho sự phát triển và duy trì sức khỏe của mắt, da, xương, và hệ miễn dịch của con người. Nó đóng vai trò quan trọng trong nhiều quá trình sinh học',
            ],
            [
                'id' => 'VITA026',
                'name' => 'Vitamin D',
                'unit' => 'µg',
                'desc' => 'Vitamin D là một loại vitamin tan trong chất béo quan trọng cho sức khỏe của cơ thể. Vitamin này có vai trò chủ yếu trong việc duy trì sự cân bằng của canxi và photpho trong huyết thanh, giúp duy trì sự phát triển và chắc khỏe của xương và răng.',
            ],
            [
                'id' => 'VITA027',
                'name' => 'Vitamin E',
                'unit' => 'mg',
                'desc' => 'Vitamin E là một loại vitamin tan trong chất béo và là một chất chống oxy hóa mạnh mẽ quan trọng cho sự bảo vệ của tế bào trong cơ thể.',
            ],
            [
                'id' => 'VITA028',
                'name' => 'Vitamin K',
                'unit' => 'µg',
                'desc' => 'Vitamin K là một loại vitamin tan trong chất béo có vai trò quan trọng trong quá trình đông máu và duy trì sự khỏe mạnh của xương.',
            ],
            [
                'id' => 'CARO029',
                'name' => 'Beta - Caroten',
                'unit' => 'µg',
                'desc' => 'Beta-caroten là một loại carotenoid, là hợp chất có màu vàng đỏ được tìm thấy rộng rãi trong thực vật.',
            ],
            [
                'id' => 'CARO030',
                'name' => 'Anpha - Caroten',
                'unit' => 'µg',
                'desc' => 'Alpha-caroten là một loại carotenoid, cũng giống như beta-caroten, là một dạng pigment màu vàng đỏ tự nhiên có trong nhiều loại rau quả và thực phẩm khác. Alpha-caroten cũng có vai trò quan trọng trong dinh dưỡng và sức khỏe',
            ],
            [
                'id' => 'O031',
                'name' => 'Choline',
                'unit' => 'mg',
                'desc' => 'Quan trọng cho cấu trúc màng tế bào và chức năng não.',
            ],
            [
                'id' => 'O032',
                'name' => 'Omega-3 fatty acids',
                'unit' => 'g',
                'desc' => 'Các axit béo thiết yếu mà cơ thể không tự tổng hợp được, quan trọng cho chức năng não và tim mạch.',
            ],
            [
                'id' => 'O033',
                'name' => 'Omega-6 fatty acids',
                'unit' => 'g',
                'desc' => 'Các axit béo thiết yếu mà cơ thể không tự tổng hợp được, quan trọng cho chức năng não và tim mạch.',
            ],
            [
                'id' => 'MINE034',
                'name' => 'Iốt',
                'unit' => 'µg',
                'desc' => 'Cần thiết cho chức năng tuyến giáp và sản xuất hormone tuyến giáp.',
            ],
            [
                'id' => 'MINE035',
                'name' => 'Silic',
                'unit' => 'mg',
                'desc' => 'Đóng vai trò trong cấu trúc của da, tóc, móng và xương.',
            ],
            [
                'id' => 'MINE036',
                'name' => 'Chromium',
                'unit' => 'µg',
                'desc' => 'Giúp điều chỉnh lượng đường trong máu và liên quan đến quá trình chuyển hóa carbohydrate, chất béo và protein.',
            ],
            [
                'id' => 'MINE037',
                'name' => 'Molybdenum',
                'unit' => 'µg',
                'desc' => 'Cần thiết cho một số enzyme quan trọng trong cơ thể.',
            ],
            [
                'id' => 'CARO038',
                'name' => 'Lutein',
                'unit' => 'mg',
                'desc' => 'Các chất chống oxy hóa quan trọng cho sức khỏe của mắt.',
            ],
            [
                'id' => 'CARO039',
                'name' => 'Zeaxanthin',
                'unit' => 'mg',
                'desc' => 'Các chất chống oxy hóa quan trọng cho sức khỏe của mắt.',
            ],
            [
                'id' => 'O040',
                'name' => 'Coenzyme Q10',
                'unit' => 'mg',
                'desc' => 'Quan trọng cho sản xuất năng lượng trong tế bào và có tác dụng chống oxy hóa.',
            ],
            [
                'id' => 'O041',
                'name' => 'Polyphenols',
                'unit' => 'mg',
                'desc' => 'Các hợp chất có trong thực vật có tác dụng chống oxy hóa và có thể giúp bảo vệ cơ thể khỏi một số bệnh mạn tính.',
            ],
            [
                'id' => 'CARO042',
                'name' => 'Lycopene',
                'unit' => 'µg',
                'desc' => 'Lycopene là một carotenoid có tác dụng chống oxy hóa mạnh, giúp bảo vệ tế bào khỏi hư hại do các gốc tự do.',
            ],
            [
                'id' => 'CARO043',
                'name' => 'Cholesterol',
                'unit' => 'mg',
                'desc' => 'Cholesterol là một loại chất béo steroid tự nhiên, không tan trong nước, quan trọng đối với sự phát triển và hoạt động của tế bào trong cơ thể.',
            ],
            [
                'id' => '0',
                'name' => '0',
                'unit' => '0',
                'desc' => '0',
            ],
        ]);
    }
}
