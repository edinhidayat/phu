<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AgendaPendaftaran;
use App\Models\AhliWaris;
use App\Models\AlasanPelimpahan;
use App\Models\AlasanPembatalan;
use App\Models\Bank;
use App\Models\Bulan;
use App\Models\GolDarah;
use App\Models\GolPangkat;
use App\Models\JenisKelamin;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Pejabat;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pengguna;
use App\Models\StatusHaji;
use App\Models\StatusNikah;
use App\Models\Tahun;
use App\Models\Verifikator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // PENDAFTAR
        AgendaPendaftaran::create([
            'agenda' => '12023',
            'tahun' => '2023',
            'bulan' => 'Februari',
            'tglregister' => '2023-02-21',
            'nomoragenda' => '1',
            'porsi' => '1000123456',
            'namajamaah' => 'Maman Sulaeman',
            'bin' => 'Junaedi',
            'jeniskelamin_id' => 1,
            'tempatlahir' => 'Pangandaran',
            'tgllahir' => '1984-05-02',
            'desa' => 'Wanajaya',
            'kecamatan_id' => 7,
            'bank_id' => 2,
            'tglsetor' => '2023-02-21',
            'pejabat_id' => 1,
            'verifikator_id' => 4
        ]);
        // USER
        User::create([
            'nama' => 'Administrator',
            'username' => 'KDP1025',
            'password' => bcrypt('KDP1025A'),
            'pengguna_id' => 3,
            'active' => '1',
        ]);
        // PENGGUNA
        Pengguna::create([
            'pengguna' => 'User'
        ]);
        Pengguna::create([
            'pengguna' => 'Operator'
        ]);
        Pengguna::create([
            'pengguna' => 'Admin'
        ]);
        // KECAMATAN 26 Data
        Kecamatan::create([
            'namakecamatan' => "Argapura"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Banjaran"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Bantarujeg"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Cigasong"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Cikijing"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Cingambul"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Dawuan"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Jatitujuh"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Jatiwangi"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Kadipaten"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Kasokandel"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Kertajati"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Lemahsugih"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Leuwimunding"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Ligung"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Maja"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Majalengka"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Malausma"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Palasah"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Panyingkiran"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Rajagaluh"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Sindang"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Sindangwangi"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Sukahaji"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Sumberjaya"
        ]);
        Kecamatan::create([
            'namakecamatan' => "Talaga"
        ]);
        // AHLI WARIS
        AhliWaris::create([
            'hubungan' => "Suami"
        ]);
        AhliWaris::create([
            'hubungan' => "Istri"
        ]);
        AhliWaris::create([
            'hubungan' => "Anak Kandung"
        ]);
        AhliWaris::create([
            'hubungan' => "Saudara Kandung"
        ]);
        AhliWaris::create([
            'hubungan' => "Ayah Kandung"
        ]);
        AhliWaris::create([
            'hubungan' => "Ibu Kandung"
        ]);
        AhliWaris::create([
            'hubungan' => "Cucu"
        ]);
        AhliWaris::create([
            'hubungan' => "Paman"
        ]);
        AhliWaris::create([
            'hubungan' => "Bibi"
        ]);
        // BANK
        Bank::create([
            'kodebank' => "451",
            'namabank' => "BSI"
        ]);
        Bank::create([
            'kodebank' => "147",
            'namabank' => "BMI"
        ]);
        Bank::create([
            'kodebank' => "425",
            'namabank' => "BJB Syariah"
        ]);
        Bank::create([
            'kodebank' => "011",
            'namabank' => "Danamon Syariah"
        ]);
        Bank::create([
            'kodebank' => "013",
            'namabank' => "Permata Syariah"
        ]);
        Bank::create([
            'kodebank' => "022",
            'namabank' => "CIMB Niaga"
        ]);
        Bank::create([
            'kodebank' => "517",
            'namabank' => "Panin Syariah"
        ]);
        Bank::create([
            'kodebank' => "153",
            'namabank' => "Sinarmas"
        ]);
        Bank::create([
            'kodebank' => "506",
            'namabank' => "Mega Syariah"
        ]);
        Bank::create([
            'kodebank' => "200",
            'namabank' => "BTN Syariah"
        ]);
        Bank::create([
            'kodebank' => "028",
            'namabank' => "OCBC NISP"
        ]);
        // JENIS KELAMIN
        JenisKelamin::create([
            'kelamin' => "Laki-laki"
        ]);
        JenisKelamin::create([
            'kelamin' => "Perempuan"
        ]);
        // ALASAN PELIMPAHAN
        AlasanPelimpahan::create([
            'alasan' => "Meninggal Dunia"
        ]);
        AlasanPelimpahan::create([
            'alasan' => "Sakit Permanen"
        ]);
        // ALASAN PEMBATALAN
        AlasanPembatalan::create([
            'alasan' => "Meninggal Dunia"
        ]);
        AlasanPembatalan::create([
            'alasan' => "Alasan Keluarga"
        ]);
        // PEJABAT
        Pejabat::create([
            'gelardepan' => "Dr. Hj.",
            'namapejabat' => "Euis Damayanti",
            'gelarbelakang' => "M.P.Kim",
            'nippejabat' => "196907301994032002",
            'gol' => "IV/b",
            'pangkat' => "Pembina Tk.I",
            'jabatan' => "Kasi PHU"
        ]);
        Pejabat::create([
            'gelardepan' => "Dr. H.",
            'namapejabat' => "Hasan Sarip",
            'gelarbelakang' => "M.Si",
            'nippejabat' => "196606021992031001",
            'gol' => "IV/b",
            'pangkat' => "Pembina Tk.I",
            'jabatan' => "Kasubbag TU"
        ]);
        // PETUGAS
        Verifikator::create([
            'namapetugas' => "H. Ade Firmansyah, M.Pd.I",
            'nippetugas' => "198210312009011004"
        ]);
        Verifikator::create([
            'namapetugas' => "H. Edin Hidayat Hasanudin, S.Kom",
            'nippetugas' => "198404192009101002"
        ]);
        Verifikator::create([
            'namapetugas' => "E. Faturrohman",
            'nippetugas' => "197208271994031003"
        ]);
        Verifikator::create([
            'namapetugas' => "Enin Erni Susanti, S.Pd.I",
            'nippetugas' => "197807202005012002"
        ]);
        // GolPangkat
        GolPangkat::create([
            'gol' => 'I/a',
            'pangkat' => 'Juru Muda'
        ]);
        GolPangkat::create([
            'gol' => 'I/b',
            'pangkat' => 'Juru Muda Tk.I'
        ]);
        GolPangkat::create([
            'gol' => 'I/c',
            'pangkat' => 'Juru'
        ]);
        GolPangkat::create([
            'gol' => 'I/d',
            'pangkat' => 'Juru Tk.I'
        ]);
        GolPangkat::create([
            'gol' => 'II/a',
            'pangkat' => 'Pengatur Muda'
        ]);
        GolPangkat::create([
            'gol' => 'II/b',
            'pangkat' => 'Pengatur Muda Tk.I'
        ]);
        GolPangkat::create([
            'gol' => 'II/c',
            'pangkat' => 'Pengatur'
        ]);
        GolPangkat::create([
            'gol' => 'II/d',
            'pangkat' => 'Pengatur Tk.I'
        ]);
        GolPangkat::create([
            'gol' => 'III/a',
            'pangkat' => 'Penata Muda'
        ]);
        GolPangkat::create([
            'gol' => 'III/b',
            'pangkat' => 'Penata Muda Tk.I'
        ]);
        GolPangkat::create([
            'gol' => 'III/c',
            'pangkat' => 'Penata'
        ]);
        GolPangkat::create([
            'gol' => 'III/d',
            'pangkat' => 'Penata Tk.I'
        ]);
        GolPangkat::create([
            'gol' => 'IV/a',
            'pangkat' => 'Pembina'
        ]);
        GolPangkat::create([
            'gol' => 'IV/b',
            'pangkat' => 'Pembina Tk.I'
        ]);
        GolPangkat::create([
            'gol' => 'IV/c',
            'pangkat' => 'Pembina Muda'
        ]);
        GolPangkat::create([
            'gol' => 'IV/d',
            'pangkat' => 'Pembina Madya'
        ]);
        GolPangkat::create([
            'gol' => 'IV/e',
            'pangkat' => 'Pembina Utama'
        ]);
        // PEKERJAAN
        Pekerjaan::create([
            'namapekerjaan' => '1  PNS'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '2  TNI/POLRI'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '3  Dagang'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '4  Tani/Nelayan'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '5  Swasta'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '6  Ibu Rumah Tangga'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '7  Pelajar/Mahasiswa'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '8  BUMN/BUMD'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '9  Pensiunan'
        ]);
        Pekerjaan::create([
            'namapekerjaan' => '10 Lain-lain'
        ]);
        // PENDIDIKAN
        Pendidikan::create([
            'jenjang' => '1 SD'
        ]);
        Pendidikan::create([
            'jenjang' => '2 SLTP'
        ]);
        Pendidikan::create([
            'jenjang' => '3 SLTA'
        ]);
        Pendidikan::create([
            'jenjang' => '4 D1/D2/D3/SM'
        ]);
        Pendidikan::create([
            'jenjang' => '5 S1'
        ]);
        Pendidikan::create([
            'jenjang' => '6 S2'
        ]);
        Pendidikan::create([
            'jenjang' => '7 S3'
        ]);
        // Golongan Darah
        GolDarah::create([
            'goldarah' => '1 A'
        ]);
        GolDarah::create([
            'goldarah' => '2 B'
        ]);
        GolDarah::create([
            'goldarah' => '3 AB'
        ]);
        GolDarah::create([
            'goldarah' => '4 O'
        ]);
        // STATUS NIKAH
        StatusNikah::create([
            'status' => '1 Belum Menikah'
        ]);
        StatusNikah::create([
            'status' => '2 Menikah'
        ]);
        StatusNikah::create([
            'status' => '3 Duda'
        ]);
        StatusNikah::create([
            'status' => '4 Janda'
        ]);
        // STATUS HAJI
        StatusHaji::create([
            'status' => '1 Sudah'
        ]);
        StatusHaji::create([
            'status' => '2 Belum'
        ]);
        // TAHUN
        Tahun::create([
            'tahun' => '2022',
            'hijriah' => '1444'
        ]);
        Tahun::create([
            'tahun' => '2023',
            'hijriah' => '1444'
        ]);
        Tahun::create([
            'tahun' => '2023',
            'hijriah' => '1445'
        ]);
        // BULAN
        Bulan::create([
            'angkabulan' => '01',
            'namabulan' => 'Januari'
        ]);
        Bulan::create([
            'angkabulan' => '02',
            'namabulan' => 'Februari'
        ]);
        Bulan::create([
            'angkabulan' => '03',
            'namabulan' => 'Maret'
        ]);
        Bulan::create([
            'angkabulan' => '04',
            'namabulan' => 'April'
        ]);
        Bulan::create([
            'angkabulan' => '05',
            'namabulan' => 'Mei'
        ]);
        Bulan::create([
            'angkabulan' => '06',
            'namabulan' => 'Juni'
        ]);
        Bulan::create([
            'angkabulan' => '07',
            'namabulan' => 'Juli'
        ]);
        Bulan::create([
            'angkabulan' => '08',
            'namabulan' => 'Agustus'
        ]);
        Bulan::create([
            'angkabulan' => '09',
            'namabulan' => 'September'
        ]);
        Bulan::create([
            'angkabulan' => '10',
            'namabulan' => 'Oktober'
        ]);
        Bulan::create([
            'angkabulan' => '11',
            'namabulan' => 'Nopember'
        ]);
        Bulan::create([
            'angkabulan' => '12',
            'namabulan' => 'Desember'
        ]);
    }
}
