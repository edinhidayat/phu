// Alert LOGIN dan LOGOUT
const $gagal = document.querySelector(".gagal");
const $keluar = document.querySelector(".keluar");
if ($gagal) {
    Swal.fire({
        position: "top-end",
        icon: "error",
        title: "Login Gagal!",
        showConfirmButton: false,
        timer: 2000,
    });
}
if ($keluar) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Anda berhasil Logout!",
        showConfirmButton: false,
        timer: 2000,
    });
}

// ALert CRUD
const $suksestambah = document.querySelector(".suksestambah");
const $suksesedit = document.querySelector(".suksesedit");
const $sukseshapus = document.querySelector(".sukseshapus");
if ($suksestambah) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Data berhasil diTambahkan!",
        showConfirmButton: false,
        timer: 2000,
    });
}
if ($suksesedit) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Data berhasil diUbah!",
        showConfirmButton: false,
        timer: 2000,
    });
}
if ($sukseshapus) {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Data berhasil diHapus!",
        showConfirmButton: false,
        timer: 2000,
    });
}
