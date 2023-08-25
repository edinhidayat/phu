// AGENDA PENDAFTARAN
// Ketika Nomor Agenda Lost Focus

function teksagenda() {
    let agenda = document.getElementById("agenda");
    let nomor = document.getElementById("nomoragenda");
    let thn = document.getElementById("tahun");
    if (nomor.value == "") {
        alert("Nomor agenda jangan kosong");
        exit;
    } else {
        agenda.value = nomor.value + thn.value;
    }
}

function hb() {
    let x = document.getElementById("namajamaah");
    x.value = x.value.toUpperCase();
}
