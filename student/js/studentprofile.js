document.getElementById('profile-btn').addEventListener('click', function () {
    document.getElementById('profile-btn').classList.add('hidden');

    document.getElementById('profile-upload').style.display = 'inline-block';
    document.getElementById('phone-input').style.display = 'inline-block';
    document.getElementById('save-phone-btn').style.display = 'inline-block';
    document.getElementById('save-changes-btn').style.display = 'inline-block';
    document.getElementById('reset-btn').style.display = 'inline-block';
    document.getElementById('remove-profile-pic-btn').style.display = 'inline-block';
});

function uploadProfilePicture() {
    const fileInput = document.getElementById('profile-upload');
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            document.getElementById('profile-pic').src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
}

function savePhoneNumber() {
    const newPhoneNumber = document.getElementById('phone-input').value;
    if (newPhoneNumber) {
        document.getElementById('phone-number').textContent = newPhoneNumber;
        resetChanges();
    }
}

function saveChanges() {
    alert('Changes have been saved!');
    resetChanges();
}

function resetChanges() {
    document.getElementById('profile-upload').style.display = 'none';
    document.getElementById('phone-input').style.display = 'none';
    document.getElementById('save-phone-btn').style.display = 'none';
    document.getElementById('save-changes-btn').style.display = 'none';
    document.getElementById('reset-btn').style.display = 'none';
    document.getElementById('remove-profile-pic-btn').style.display = 'none';

    document.getElementById('profile-btn').classList.remove('hidden');
}

function removeProfilePicture() {
    document.getElementById('profile-pic').src = 'default-profile.jpg';
    resetChanges();
}

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

document.getElementById('profile-btn').addEventListener('click', function () {
    // Hide profile details and the Edit Profile button
    document.querySelector('.profile-info').style.display = 'none';
    document.getElementById('profile-btn').style.display = 'none';

    // Show the edit form
    document.getElementById('edit-form').style.display = 'block';
});


document.getElementById('edit-form').addEventListener('submit', function(event) {
    const phoneNumber = document.getElementById('phone_number').value;
    if (!/^\d+$/.test(phoneNumber)) {
        alert("Please enter a valid phone number (numbers only).");
        event.preventDefault();
    }
});
