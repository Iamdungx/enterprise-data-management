function downloadExcel() {
    // Lấy dữ liệu từ bảng HTML
    var table = document.getElementById("information-table");
    var sheet = XLSX.utils.table_to_sheet(table);
  
    // Tạo đối tượng Workbook và thêm sheet vào đó
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, sheet, "Sheet1");
  
    // Chuyển đổi thành định dạng Excel
    var excelBuffer = XLSX.write(workbook, { bookType: "xlsx", bookSST: true, type: "array" });
  
    // Tạo Blob từ dữ liệu Excel
    var blob = new Blob([excelBuffer], { type: "application/octet-stream" });
  
    // Tạo URL để tải về
    var url = URL.createObjectURL(blob);
  
    // Tạo phần tử a để tải về
    var a = document.createElement("a");
    a.href = url;
    a.download = "employee-manager.xlsx";
  
    // Thêm phần tử a vào body và kích hoạt sự kiện click để tải về
    document.body.appendChild(a);
    a.click();
  
    // Xóa phần tử a sau khi tải về
    document.body.removeChild(a);
  }