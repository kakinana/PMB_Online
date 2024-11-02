<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Izin Keluar Kantor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section p {
            margin: 5px 0;
        }
        .section span {
            display: inline-block;
            width: 200px;
        }
        .underline {
            text-decoration: underline;
        }
        .signature {
            text-align: right;
            margin-top: 50px;
        }
        .signature span {
            display: inline-block;
            margin-top: 70px;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>SURAT PENDAFTARAN</h2>
    </div>

    <div class="section">
        <p>Yang bertanda tangan di bawah ini :</p>
    <div class="section">
        <p><strong>Nama:</strong> {{ $daftar->nama }}</p>
        <p><strong>Alamat KTP:</strong> {{ $daftar->alamat_ktp }}</p>
        <p><strong>Alamat Domisili:</strong> {{ $daftar->alamat_domisili }}</p>
        <p><strong>Provinsi:</strong> {{ $daftar->provinsi->prov_name }}</p>
        <p><strong>Kabupaten:</strong> {{ $daftar->kabupaten->city_name }}</p>
        <p><strong>Kecamatan:</strong> {{ $daftar->kecamatan->dis_name}}</p>
        <p><strong>Nomor Telepon:</strong> {{ $daftar->no_telp }}</p>
        <p><strong>Nomor HP:</strong> {{ $daftar->no_hp }}</p>
        <p><strong>Email:</strong> {{ $daftar->email }}</p>
        <p><strong>Kewarganegaraan:</strong> {{ $daftar->kewarganegaraan }}</p>
        <p><strong>Negara Asal:</strong> {{ $daftar->negara_asal }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $daftar->tanggal_lahir}}</p>
        <p><strong>Tempat Lahir:</strong> {{ $daftar->tempat_lahir }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $daftar->jenis_kelamin }}</p> 
        <p><strong>Status Nikah:</strong> {{ $daftar->status_nikah }}</p>
        <p><strong>Agama:</strong> {{ $daftar->agama }}</p>
    </div>

    <div class="signature">
        <p>Bandung, {{ date('d-m-Y') }}</p>
        <p>Pihak Pendaftar</p>
        <span>{{ $daftar->nama }}</span>
    </div>
</body>
</html>
