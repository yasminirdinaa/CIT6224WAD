document.getElementById('edit-btn').addEventListener('click', function () {
    document.querySelector('.profile-info').classList.add('hidden');
    document.querySelector('.profile-edit-form').classList.remove('hidden');
    this.classList.add('hidden');
});

document.getElementById('save-btn').addEventListener('click', function () {
    const email = document.getElementById('email-input').value;
    const phone = document.getElementById('phone-input').value;
    const address = document.getElementById('address-input').value;

    document.getElementById('email').textContent = email;
    document.getElementById('phone').textContent = phone;
    document.getElementById('address').textContent = address;

    document.querySelector('.profile-info').classList.remove('hidden');
    document.querySelector('.profile-edit-form').classList.add('hidden');
    document.getElementById('edit-btn').classList.remove('hidden');
});

document.getElementById("menuIcon").addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    menu.classList.toggle("active");
    event.stopPropagation();
});

document.addEventListener("click", function (event) {
    const menu = document.getElementById("navbarLinks");
    const menuIcon = document.getElementById("menuIcon");

    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.classList.remove("active");
    }
});
