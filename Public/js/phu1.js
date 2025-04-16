// Lấy các phần tử HTML
const modal = document.getElementById('myModal');
const closeButton = document.querySelector('.modal-header .close');

// Hàm mở modal
function openModal() {
    modal.style.display = 'block';
}

// Hàm đóng modal
function closeModal() {
    modal.style.display = 'none';
}

// Đóng modal khi nhấn vào nút "X"
closeButton.addEventListener('click', closeModal);

// Đóng modal khi nhấn vào bên ngoài hộp thoại
window.addEventListener('click', function (event) {
    if (event.target === modal) {
        closeModal();
    }
});
