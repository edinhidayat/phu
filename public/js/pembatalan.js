// Pilihan Bulan Angka

const blnangka = document.getElementById("bulanangka");
blnangka.addEventListener("change", function (e) {
    let blnproses = document.getElementById("bulanproses");
    const pilihbulan = e.target.value;
    let namaBulan = "";
    switch (pilihbulan) {
        case "01":
            namaBulan = "Januari";
            break;
        case "02":
            namaBulan = "Februari";
            break;
        case "03":
            namaBulan = "Maret";
            break;
        case "04":
            namaBulan = "April";
            break;
        case "05":
            namaBulan = "Mei";
            break;
        case "06":
            namaBulan = "Juni";
            break;
        case "07":
            namaBulan = "Juli";
            break;
        case "08":
            namaBulan = "Agustus";
            break;
        case "09":
            namaBulan = "September";
            break;
        case "10":
            namaBulan = "Oktober";
            break;
        case "11":
            namaBulan = "Nopember";
            break;
        case "12":
            namaBulan = "Desember";
            break;
        default:
            namaBulan = "Januari";
    }

    blnproses.value = namaBulan;
});

// Input Huruf Besar

function hb1() {
    let x = document.getElementById("namajamaah");
    x.value = x.value.toUpperCase();
}
function hb2() {
    let x = document.getElementById("bin");
    x.value = x.value.toUpperCase();
}
function hb3() {
    let x = document.getElementById("namawaris");
    x.value = x.value.toUpperCase();
}

// HANYA ANGKA

function hanyaAngka(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}

// Alasan Pembatalan

let alasan = document.getElementById("alasanpembatalan");
let waris = document.getElementById("waris");

let a = document.getElementById("namawaris");
let b = document.getElementById("alamatwaris");
let c = document.getElementById("kecwaris");
let d = document.getElementById("kabwaris");
let e = document.getElementById("hubungan");
let f = document.getElementById("bankwaris");
let g = document.getElementById("norekwaris");
let noktp = document.getElementById("noktp");

document.addEventListener("DOMContentLoaded", function () {
    if (alasan.value == "Alasan Keluarga") {
        waris.classList.add("hilang");
        noktp.innerHTML = `Nomor KTP Jama'ah <span class="text-danger">*</span>`;
    } else {
        waris.classList.remove("hilang");
        noktp.innerHTML = `Nomor KTP Ahli Waris <span class="text-danger">*</span>`;
    }
});

alasan.addEventListener("change", function () {
    if (alasan.value == "Alasan Keluarga") {
        waris.classList.add("hilang");
        a.value = "-";
        b.value = "-";
        c.value = "-";
        d.value = "-";
        e.value = "-";
        f.value = "-";
        g.value = 0;
        noktp.innerHTML = `Nomor KTP Jama'ah <span class="text-danger">*</span>`;
    } else {
        waris.classList.remove("hilang");
        noktp.innerHTML = `Nomor KTP Ahli Waris <span class="text-danger">*</span>`;
    }
});
