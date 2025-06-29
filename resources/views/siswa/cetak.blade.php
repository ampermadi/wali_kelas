<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2 align="center">Data Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $s)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td align="center">{{ $s->nis }}</td>
                    <td>{{ $s->nama }}</td>
                    <td align="center">{{ $s->kelas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
