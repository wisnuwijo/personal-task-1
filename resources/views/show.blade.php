<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Daftar Data Mahasiswa</title>
</head>
<body>
    <div class="container" style="padding-top:30px">
        <div class="card" style="padding: 20px">
            <h3>Data Mahasiswa</h3>
            <hr />
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Tempat tanggal lahir</th>
                    <th>Gambar</th>
                    <th>Sertifikat</th>
                    <th>CV</th>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    @foreach ($studentEntry as $item)
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gender == "male" ? "Laki-laki" : "Perempuan" }}</td>
                            <td>{{ $item->place_of_birth }}, {{ $item->date_of_birth }}</td>
                            <?php
                                $mainUrl = url('/');
                                $newUrl = str_replace("/public","",$mainUrl);
                            ?>
                            @if (null != $item->uploadedFile->where('type','picture') && count($item->uploadedFile->where('type','picture')) > 0)
                                <td><img src="{{ $newUrl . $item->uploadedFile->where('type','picture')->first()->file_path }}" width="50px" /></td>
                            @else
                                <td>-</td>
                            @endif
                            @if (null != $item->uploadedFile->where('type','certificate') && count($item->uploadedFile->where('type','certificate')) > 0)
                                <td><a href="{{ $newUrl . $item->uploadedFile->where('type','certificate')->first()->file_path }}" style="text-decoration: none">Download RAR</a></td>
                            @else
                                <td>-</td>
                            @endif
                            @if (null != $item->uploadedFile->where('type','cv') && count($item->uploadedFile->where('type','cv')) > 0)
                                <td><a href="{{ $newUrl . $item->uploadedFile->where('type','cv')->first()->file_path }}" style="text-decoration: none">Download PDF</a></td>
                            @else
                                <td>-</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>