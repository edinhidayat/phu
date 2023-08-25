// Pilihan Golongan Jabatan (Pejabat)

const gol = document.getElementById("gol");
gol.addEventListener("change", function (e) {
    let pangkat = document.getElementById("pangkat");
    const namagol = e.target.value;
    let namaPangkat = "";
    switch (namagol) {
        case "I/a":
            namaPangkat = "Juru Muda";
            break;
        case "I/b":
            namaPangkat = "Juru Muda Tk.I";
            break;
        case "I/c":
            namaPangkat = "Juru";
            break;
        case "I/d":
            namaPangkat = "Juru Tk.I";
            break;
        case "II/a":
            namaPangkat = "Pengatur Muda";
            break;
        case "II/b":
            namaPangkat = "Pengatur Muda Tk.I";
            break;
        case "II/c":
            namaPangkat = "Pengatur";
            break;
        case "II/d":
            namaPangkat = "Pengatur Tk.I";
            break;
        case "III/a":
            namaPangkat = "Penata Muda";
            break;
        case "III/b":
            namaPangkat = "Penata Muda Tk.I";
            break;
        case "III/c":
            namaPangkat = "Penata";
            break;
        case "III/d":
            namaPangkat = "Penata Tk.I";
            break;
        case "IV/a":
            namaPangkat = "Pembina";
            break;
        case "IV/b":
            namaPangkat = "Pembina Tk.I";
            break;
        case "IV/c":
            namaPangkat = "Pembina Muda";
            break;
        case "IV/d":
            namaPangkat = "Pembina Madya";
            break;
        case "IV/e":
            namaPangkat = "Pembina Utama";
            break;
        default:
            namaPangkat = "Juru Muda";
    }

    pangkat.value = namaPangkat;
});
