<?php

return [
    'accepted'             => 'Trường :attribute phải được chấp nhận.',
    'active_url'           => 'Trường :attribute không phải là một URL hợp lệ.',
    'after'                => 'Trường :attribute phải là một ngày sau :date.',
    'after_or_equal'       => 'Trường :attribute phải là thời gian sau hoặc đúng bằng :date.',
    'alpha'                => 'Trường :attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash'           => 'Trường :attribute chỉ có thể chứa các chữ cái, số và dấu gạch ngang.',
    'alpha_num'            => 'Trường :attribute chỉ có thể chứa các chữ cái và số.',
    'array'                => 'Trường :attribute phải là một mảng.',
    'before'               => 'Trường :attribute phải là một ngày trước :date.',
    'before_or_equal'      => 'Trường :attribute phải là thời gian trước hoặc đúng bằng :date.',
    'between'              => [
        'numeric' => 'Trường :attribute phải nằm giữa :min và :max.',
        'file'    => 'Trường :attribute phải nằm giữa :min và :max kilobytes.',
        'string'  => 'Trường :attribute phải nằm giữa :min và :max ký tự.',
        'array'   => 'Trường :attribute phải có từ :min đến :max phần tử.',
    ],
    'boolean'              => 'Trường :attribute phải là true hoặc false.',
    'confirmed'            => 'Giá trị xác nhận trong trường :attribute không khớp.',
    'date'                 => 'Trường :attribute không phải là một ngày hợp lệ.',
    'date_equals'          => 'Trường :attribute phải là một ngày bằng :date.',
    'date_format'          => 'Trường :attribute không khớp với định dạng :format.',
    'different'            => 'Trường :attribute và :other phải khác nhau.',
    'digits'               => 'Trường :attribute phải là :digits chữ số.',
    'digits_between'       => 'Trường :attribute phải nằm giữa :min và :max chữ số.',
    'dimensions'           => 'Trường :attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => 'Trường :attribute có giá trị trùng lặp.',
    'email'                => 'Trường :attribute phải là một địa chỉ email hợp lệ.',
    'ends_with'            => 'Trường :attribute phải kết thúc bằng một trong những giá trị sau: :values.',
    'exists'               => 'Giá trị được chọn trong trường :attribute không hợp lệ.',
    'file'                 => 'Trường :attribute phải là một tệp.',
    'filled'               => 'Trường :attribute là bắt buộc.',
    'gt'                   => [
        'numeric' => 'Trường :attribute phải lớn hơn :value.',
        'file'    => 'Trường :attribute phải lớn hơn :value kilobytes.',
        'string'  => 'Trường :attribute phải lớn hơn :value ký tự.',
        'array'   => 'Trường :attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte'                  => [
        'numeric' => 'Trường :attribute phải lớn hơn hoặc bằng :value.',
        'file'    => 'Trường :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string'  => 'Trường :attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array'   => 'Trường :attribute phải có :value phần tử hoặc nhiều hơn.',
    ],
    'image'                => 'Trường :attribute phải là một hình ảnh.',
    'in'                   => 'Giá trị được chọn trong trường :attribute không hợp lệ.',
    'in_array'             => 'Trường :attribute không tồn tại trong :other.',
    'integer'              => 'Trường :attribute phải là một số nguyên.',
    'ip'                   => 'Trường :attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4'                 => 'Trường :attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6'                 => 'Trường :attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json'                 => 'Trường :attribute phải là một chuỗi JSON hợp lệ.',
    'lt'                   => [
        'numeric' => 'Trường :attribute phải nhỏ hơn :value.',
        'file'    => 'Trường :attribute phải nhỏ hơn :value kilobytes.',
        'string'  => 'Trường :attribute phải nhỏ hơn :value ký tự.',
        'array'   => 'Trường :attribute phải có ít hơn :value phần tử.',
    ],
    'lte'                  => [
        'numeric' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value.',
        'file'    => 'Trường :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string'  => 'Trường :attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array'   => 'Trường :attribute không được có nhiều hơn :value phần tử.',
    ],
    'max'                  => [
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
        'file'    => 'Trường :attribute không được lớn hơn :max kilobytes.',
        'string'  => 'Trường :attribute không được lớn hơn :max ký tự.',
        'array'   => 'Trường :attribute không được có nhiều hơn :max phần tử.',
    ],
    'mimes'                => 'Trường :attribute phải là một tệp loại: :values.',
    'mimetypes'            => 'Trường :attribute phải là một tệp loại: :values.',
    'min'                  => [
        'numeric' => 'Trường :attribute phải ít nhất là :min.',
        'file'    => 'Trường :attribute phải ít nhất là :min kilobytes.',
        'string'  => 'Trường :attribute phải ít nhất là :min ký tự.',
        'array'   => 'Trường :attribute phải có ít nhất :min phần tử.',
    ],
    'multiple_of'          => 'Trường :attribute phải là bội số của :value.',
    'not_in'               => 'Giá trị được chọn trong trường :attribute không hợp lệ.',
    'not_regex'            => 'Định dạng trường :attribute không hợp lệ.',
    'numeric'              => 'Trường :attribute phải là một số.',
    'password'             => 'Mật khẩu không đúng.',
    'present'              => 'Trường :attribute phải được hiện diện.',
    'regex'                => 'Định dạng trường :attribute không hợp lệ.',
    'required'             => 'Trường :attribute là bắt buộc.',
    'required_if'          => 'Trường :attribute là bắt buộc khi :other là :value.',
    'required_unless'      => 'Trường :attribute là bắt buộc trừ khi :other là một trong :values.',
    'required_with'        => 'Trường :attribute là bắt buộc khi :values tồn tại.',
    'required_with_all'    => 'Trường :attribute là bắt buộc khi tất cả :values tồn tại.',
    'required_without'     => 'Trường :attribute là bắt buộc khi :values không tồn tại.',
    'required_without_all' => 'Trường :attribute là bắt buộc khi không có giá trị nào trong :values tồn tại.',
    'same'                 => 'Trường :attribute và :other phải khớp.',
    'size'                 => [
        'numeric' => 'Trường :attribute phải là :size.',
        'file'    => 'Trường :attribute phải là :size kilobytes.',
        'string'  => 'Trường :attribute phải là :size ký tự.',
        'array'   => 'Trường :attribute phải chứa :size phần tử.',
    ],
    'starts_with'          => 'Trường :attribute phải bắt đầu bằng một trong những giá trị sau: :values.',
    'string'               => 'Trường :attribute phải là một chuỗi.',
    'timezone'             => 'Trường :attribute phải là một múi giờ hợp lệ.',
    'unique'               => 'Trường :attribute đã được sử dụng.',
    'uploaded'             => 'Trường :attribute tải lên thất bại.',
    'url'                  => 'Trường :attribute không phải là một URL hợp lệ.',
    'uuid'                 => 'Trường :attribute phải là một chuỗi UUID hợp lệ.',

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'thông điệp-tuỳ-chỉnh',
        ],
    ],

    'attributes' => [
        'age' => 'tuổi',
        'email' => 'địa chỉ email',
        'full_name' => 'họ tên',
        'name' => 'tên',
        'phone' => 'số điện thoại',
        'password' => 'mật khẩu',
        'gender' => 'giới tính',
        'level' => 'thước đo',
        'amount' => 'hàm lượng',
        'food' => 'món ăn',
        'ingredient' => 'nguyên liệu',
        'category_ingre_id' => 'loại nguyên liệu',
        'category_ingre' => 'loại nguyên liệu',
        'category_ingredient' => 'loại nguyên liệu',
        'nutri' => 'dinh dưỡng',
        'ingredient_detail' => 'chi tiết dinh dưỡng',
        'unit' => 'đơn vị',
        'desc' => 'mô tả',
        'content' => 'nội dung',
    ],
];
