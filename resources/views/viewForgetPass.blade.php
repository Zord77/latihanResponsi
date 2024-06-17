<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <p>
        Halo <b>{{$details['nama']}}</b>
    </p>

    <p>
        Silakan klik link untuk mengubah password.
    </p>

    <p>
        Berikut adalah data anda:
    </p>

    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> {{$details['nama']}} </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{$details['email']}}</td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>{{$details['username']}}</td>
        </tr>
    </table>

    <center>
        <h3>
            Klik link di bawah untuk melakukan ubah password.
        </h3>

        <b style="color: blue"> {{$details['url']}} </b>
    </center>
</body>

</html>