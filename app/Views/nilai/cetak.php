<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rapot <?= $siswa->nama_siswa; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> SMK Al Mufti Purwadadi</h3>
    </div>
    <table border="1" style="border-collapse: collapse;" width="100%" id="table">
        <tr>
            <th rowspan="8" width="10%"></th>
            <!-- <th rowspan="8" width="10%"><img src="<?= base_url() ?>/img/<?= $siswa->foto_siswa ?>" alt=""></th> -->
        </tr>
        <tr>
            <td width="20%">Nama</td>
            <td width="1%">:</td>
            <td><?= $siswa->nama_siswa; ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><?= $siswa->ttl; ?></td>
        </tr>
        <tr>
            <td>Nama Ayah</td>
            <td>:</td>
            <td><?= $siswa->ayah; ?></td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>:</td>
            <td><?= $siswa->ibu; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $siswa->nama_kelas; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $siswa->alamat_ortu; ?></td>
        </tr>
        <tr>
            <td>No telp Orang Tua</td>
            <td>:</td>
            <td><?= $siswa->no_tel_rumah; ?></td>
        </tr>

    </table>
    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Mata Pelajaran</th>
                <th>Absensi</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($nilai as $n) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $n['nama_mapel'] ?></td>
                    <td><?= $n['absensi'] ?></td>
                    <td><?= $n['tugas'] ?></td>
                    <td><?= $n['uts'] ?></td>
                    <td><?= $n['uas'] ?></td>
                    <?php if ($n['nilai_akhir'] >= 90) { ?>
                        <td>A</td>
                    <?php } else if ($n['nilai_akhir'] < 90 && $n['nilai_akhir'] > 70) { ?>
                        <td>B</td>
                    <?php } else if ($n['nilai_akhir'] < 70 && $n['nilai_akhir'] > 50) { ?>
                        <td>C</td>
                    <?php } else if ($n['nilai_akhir'] > 50 && $n['nilai_akhir'] < 30) { ?>
                        <td>D</td>
                    <?php } else { ?>
                        <td>E</td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table width="100%">
        <tr>
            <td width="50%"></td>
            <td width="50%">
                <h4 align="center">Wali Kelas</h4>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h4 align="center"> <u>Doni Darmawan</u> </h4>
                <h5 align="center"> NIP: 812981763827681736</h5>

            </td>
        </tr>
    </table>
</body>

</html>