document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission
    var nisn = document.getElementById("nisn").value;
    var nama = document.getElementById("nama").value;

    // Fetch user data
    fetch('user.json')
        .then(response => response.json())
        .then(data => {
            var users = data.users;

            var authenticatedUser = users.find(user => user.nisn === nisn && user.nama === nama);
            if (authenticatedUser) {
                localStorage.setItem('nisn', authenticatedUser.nisn);
                localStorage.setItem('nama', authenticatedUser.nama);
                localStorage.setItem('kelas', authenticatedUser.kelas);
                localStorage.setItem('status', authenticatedUser.status);
                window.location.href = "congratulation.html";
            } else {
                alert("NISN atau Nama yang dimauskan salah, silahkan coba kembali.");
            }
        })
        .catch(error => console.error('Error:', error));
});
