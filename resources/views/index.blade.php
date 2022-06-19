<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Portal Mahasiswa</title>
</head>
<body>
    <div class="container" style="padding-top: 20px;">
        <div class="card" style="padding: 20px">
            <h3>Pendataan Mahasiswa</h3>
            <hr />
            <form method="POST" action="{{ url('/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <strong>Nama</strong>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" />
                    </div>
                </div>
                <div class="row" style="padding-top: 20px">
                    <div class="col-md-12">
                        <strong>Gender</strong>
                    </div>
                    <div class="col-md-12">
                        <input type="radio" name="gender" value="male" /> Laki-laki
                        <input type="radio" name="gender" value="female" /> Perempuan
                    </div>
                </div>
                <div class="row" style="padding-top: 20px">
                    <div class="col-md-12">
                        <strong>Tempat, tanggal lahir</strong>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="place_of_birth" placeholder="Tempat lahir" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="date_of_birth" placeholder="Tanggal lahir" class="form-control" />
                    </div>
                </div>
                <div class="row" style="padding-top: 20px">
                    <div class="col-md-12">
                        <strong>Unggah file</strong>
                    </div>
                    
                    <div class="col-md-2" style="text-align: right">
                        Gambar <span style="color: red;">*</span> :
                    </div>
                    <div class="col-md-10">
                        <input type="file" name="file_picture" accept="image/jpg,image/jpeg,image/png" class="form-control"/ required>
                    </div>

                    <div class="col-md-2" style="text-align: right">
                        Attachment Sertifikat :
                    </div>
                    <div class="col-md-10">
                        <input type="file" name="file_certificate_attachment" accept=".zip,.rar" class="form-control"/>
                    </div>

                    <div class="col-md-2" style="text-align: right">
                        CV :
                    </div>
                    <div class="col-md-10">
                        <input type="file" name="file_cv" accept=".pdf" class="form-control"/>
                    </div>
                </div>

                <input type="submit" class="btn btn-md btn-primary"/>
                <input type="reset" class="btn btn-md btn-default" value="Reset"/>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>