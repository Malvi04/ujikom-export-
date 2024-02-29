<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
      </script>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Tanggal</th>
                <th>Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSiswa as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>
                        @if ($siswa->jenkel == 'P')
                            {{ 'Perempuan' }}
                        @else
                            {{ 'Laki-laki' }}
                        @endif
                    </td>
                    <td>{{ $siswa->nama_jurusan }}</td>
                    <td>{{ $siswa->created_at }}</td>
                    <td>
                        @if ($siswa->status_kehadiran == 1)
                            <span>HADIR</span>
                        @elseif($siswa->status_kehadiran == 2)
                            <span>Izin</span>
                        @else
                            <span>Alfa</span>
                        @endif
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>
</body>

</html>