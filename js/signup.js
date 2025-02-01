function handleRoleChange() {
    const roleSelect = document.getElementById('role');
    const studentFields = document.getElementById('student-fields');
    
    if (roleSelect.value === 'student') {
        studentFields.classList.remove('hidden');
    } else {
        studentFields.classList.add('hidden');
    }
}
