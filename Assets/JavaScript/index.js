$(document).ready(function() {
    // Xử lý sự kiện click trên thẻ div
    $(".nav_bar-function-content").click(function() {
        // Sử dụng toggle() để ẩn/hiện danh sách ul
        $(".nav_bar-function ul").toggle();
  });
});