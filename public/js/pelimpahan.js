// HURUF BESAR

function hb1() {
    let x = document.getElementById("namajamaah");
    x.value = x.value.toUpperCase();
}
function hb2() {
    let x = document.getElementById("binjamaah");
    x.value = x.value.toUpperCase();
}
function hb3() {
    let x = document.getElementById("namapenerima");
    x.value = x.value.toUpperCase();
}
function hb4() {
    let x = document.getElementById("binpenerima");
    x.value = x.value.toUpperCase();
}
function hb5() {
    let x = document.getElementById("namapemberi");
    x.value = x.value.toUpperCase();
}

// HANYA ANGKA

function hanyaAngka(evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}

// WILAYAH

$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(function () {
        $("#provinsi").on("change", function () {
            let idprov = $("#provinsi").val();

            $.ajax({
                type: "POST",
                url: "getkabupaten",
                data: { id_provinsi: idprov },
                cache: false,

                success: function (msg) {
                    $("#kabupaten").html(msg);
                    $("#kecamatan").html("");
                    $("#kelurahan").html("");
                },

                error: function (data) {
                    console.log("Error : ", data);
                },
            });
        });

        $("#kabupaten").on("change", function () {
            let idkab = $("#kabupaten").val();

            $.ajax({
                type: "POST",
                url: "getkecamatan",
                data: { id_kabupaten: idkab },
                cache: false,

                success: function (msg) {
                    $("#kecamatan").html(msg);
                    $("#kelurahan").html("");
                },

                error: function (data) {
                    console.log("Error : ", data);
                },
            });
        });

        $("#kecamatan").on("change", function () {
            let idkec = $("#kecamatan").val();

            $.ajax({
                type: "POST",
                url: "getkelurahan",
                data: { id_kecamatan: idkec },
                cache: false,

                success: function (msg) {
                    $("#kelurahan").html(msg);
                },

                error: function (data) {
                    console.log("Error : ", data);
                },
            });
        });
    });

    $("#simpanalamat").on("click", function () {
        let dataProv = $("#provinsi option:selected").data("nama");
        let dataKabupaten = $("#kabupaten option:selected").data("nama");
        let dataKab = dataKabupaten.replace("KABUPATEN" || "KOTA", "");
        let dataKec = $("#kecamatan option:selected").data("nama");
        let dataKel = $("#kelurahan option:selected").data("nama");
        $("#desa").val(dataKel);
        $("#kec").val(dataKec);
        $("#kab").val(dataKab);
        $("#prov").val(dataProv);
    });
});
