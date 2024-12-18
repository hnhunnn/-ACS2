// HIỂN THỊ CHI NHÁNH KHI NHẤN VÀO LOGO

function showBranches(cinemaId) {
    fetch(`/cinema/${cinemaId}/branch`)
        .then((response) => response.json())
        .then((branches) => {
            const branchContainer = document.querySelector(".branch-details");
            branchContainer.innerHTML = "<h3>Chi nhánh</h3>"; // Đặt lại tiêu đề

            if (branches.length > 0) {
                branches.forEach((branch) => {
                    const form = document.createElement("form");
                    form.action = "#";
                    form.method = "GET";
                    form.className = "branch-item";

                    form.innerHTML = `
                        <input type="hidden" name="cinema_id" value="${cinemaId}">
                        <input type="hidden" name="branch_id" value="${branch.id}">
                        <button type="button" style="border: none; background: none; cursor: pointer;">
                            <div>
                                <h4>${branch.branchName}</h4>
                                <p>${branch.address}</p>
                            </div>
                        </button>
                    `;

                    form.querySelector("button").addEventListener(
                        "click",
                        () => {
                            showSchedules(branch.id);
                        }
                    );

                    branchContainer.appendChild(form);
                });
            } else {
                branchContainer.innerHTML +=
                    "<p>Không có chi nhánh nào được tìm thấy.</p>";
            }
        })
        .catch((error) => console.error("Error:", error));
}

// HIỂN THỊ LỊCH CHIẾU  KHI NHẤN VÀO CHI NHÁNH
function showSchedules(branchId) {
    fetch(`/branch/${branchId}/schedules`)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Không thể tải lịch chiếu");
            }
            return response.json();
        })
        .then((schedules) => {
            const scheduleContainer =
                document.querySelector(".schedule-details");
            scheduleContainer.innerHTML = "<h3>Lịch Chiếu</h3>"; // Đặt lại tiêu đề

            if (schedules.length > 0) {
                schedules.forEach((schedule) => {
                    const scheduleDiv = document.createElement("div");
                    scheduleDiv.className = "schedule-item";

                    scheduleDiv.innerHTML = `
                        <div class="movie-info">
                            <h4>${schedule.movieName}</h4>
                            <img src="${schedule.image}" alt="${
                        schedule.movieName
                    }" style="width: 100px;">
                        </div>
                        <div class="showtimes">
                            ${schedule.showtimes
                                .map(
                                    (time) => `<div class="time">${time}</div>`
                                )
                                .join("")}
                        </div>
                    `;
                    scheduleContainer.appendChild(scheduleDiv);
                });
            } else {
                scheduleContainer.innerHTML +=
                    "<p>Không có lịch chiếu nào được tìm thấy.</p>";
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            const scheduleContainer =
                document.querySelector(".schedule-details");
            scheduleContainer.innerHTML =
                "<h3>Lịch Chiếu</h3><p>Không thể tải lịch chiếu.</p>";
        });
}
