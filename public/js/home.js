// BUTTON CUỘN LIST PHIM
document.addEventListener("DOMContentLoaded", function () {
    const scroll = document.querySelector(".movie-grid");

    // Hàm cuộn sang trái
    function scrollLeft() {
        scroll.scrollBy({ left: -300, behavior: "smooth" });
    }

    // Hàm cuộn sang phải
    function scrollRight() {
        scroll.scrollBy({ left: 300, behavior: "smooth" });
    }

    // Gán sự kiện cho các nút
    document.querySelector(".left").onclick = scrollLeft;
    document.querySelector(".right").onclick = scrollRight;
    
});

function scrollLeft() {
    const container = document.querySelectorAll(".movie-grid")[1]; // Danh sách phim thứ 2
    container.scrollBy({
        left: -300, // Điều chỉnh khoảng cách cuộn
        behavior: "smooth",
    });
}

function scrollRight() {
    const container = document.querySelectorAll(".movie-grid")[1]; // Danh sách phim thứ 2
    container.scrollBy({
        left: 300, // Điều chỉnh khoảng cách cuộn
        behavior: "smooth",
    });
}

function scrollLeft2() {
    const container = document.querySelectorAll(".movie-grid")[1]; // Danh sách phim thứ 2
    container.scrollBy({
        left: -300, // Điều chỉnh khoảng cách cuộn
        behavior: "smooth",
    });
}

function scrollRight2() {
    const container = document.querySelectorAll(".movie-grid")[1]; // Danh sách phim thứ 2
    container.scrollBy({
        left: 300, // Điều chỉnh khoảng cách cuộn
        behavior: "smooth",
    });
}

// HIỂN THỊ CHI NHÁNH KHI NHẤN VÀO LOGO

function showBranches(cinemaId) {
    fetch(`/cinema/${cinemaId}/branch`)
        .then((response) => response.json())
        .then((branches) => {
            const branchContainer = document.getElementById("branch-container");
            branchContainer.style.display = "block";
            branchContainer.innerHTML = ""; // Xóa nội dung cũ

            branches.forEach((branch) => {
                const branchDiv = document.createElement("div");
                branchDiv.className = "branch-item";
                branchDiv.innerHTML = `
                  <h4>${branch.branchName}</h4>
                  <p>${branch.address}</p>
              `;
                branchContainer.appendChild(branchDiv);
            });
        })
        .catch((error) => console.error("Error:", error));
}

$(document).on("click", ".branch-item", function () {
    const branchId = $(this).data("id");

    // Gửi AJAX để lấy lịch chiếu theo chi nhánh
    $.ajax({
        url: `/branch/${branchId}/schedules`,
        type: "GET",
        success: function (schedules) {
            let scheduleHtml = "";
            schedules.forEach((schedule) => {
                scheduleHtml += `
                    <div class="schedule-item">
                        <strong>${schedule.movie_id}</strong> - ${schedule.showtime}
                    </div>`;
            });

            // Hiển thị lịch chiếu trong #schedule-container
            $("#schedule-container").html(scheduleHtml);
        },
        error: function () {
            alert("Không thể tải lịch chiếu.");
        },
    });
});



