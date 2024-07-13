$(function () {
    var table = $("#example1").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: [
            "copy",
            "csv",
            "excel",
            "pdf",
            {
                extend: "print",
                exportOptions: {
                    columns: ":not(:last-child)",
                },
            },
        ],
        language: {
            paginate: {
                previous: "Trước",
                next: "Tiếp",
            },
            emptyTable: "Không có dữ liệu",
            info: "Hiển thị _END_ dòng tiếp theo của _TOTAL_ mục",
            infoEmpty: "Hiển thị 0 dòng tiếp theo dòng của 0 mục",
            lengthMenu: "Hiển thị _MENU_ mục",
            search: "Tìm kiếm:",
            zeroRecords: "Không tìm thấy kết quả",
            infoFiltered: "(lọc từ tổng số _MAX_ mục)",
        },
        dom: '<"row"<"col-md-6"l><"col-md-6 text-right"f>>rtip', // Sử dụng dom để sắp xếp lại cấu trúc
    });

    table.buttons().container().appendTo("#example1_buttons_container");
    $("#example1_filter").appendTo("#example1_filter_container");
});
