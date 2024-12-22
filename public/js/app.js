const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});

sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});

// NÚT HAMBURGER
document.addEventListener("DOMContentLoaded", () => {
    const hamburger = document.getElementById("hamburger");
    const menu = document.getElementById("menu");

    // Khi nhấn vào nút hamburger
    hamburger.addEventListener("click", () => {
        menu.classList.toggle("active"); // Hiện/ẩn menu
        menu.classList.remove("hidden"); // Đảm bảo hiển thị menu
        hamburger.classList.toggle("open"); // Thay đổi biểu tượng nút hamburger
    });

    // Đóng menu khi nhấn ra ngoài
    document.addEventListener("click", (e) => {
        if (!hamburger.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add("hidden"); // Ẩn menu
            menu.classList.remove("active"); // Đảm bảo menu không còn kích hoạt
            hamburger.classList.remove("open"); // Reset biểu tượng hamburger
        }
    });
});
