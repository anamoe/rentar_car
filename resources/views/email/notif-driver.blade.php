<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAMHAMA RENT - CAR</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 6px;
            margin-top: 12px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }
    </style>
</head>

<body style="background-color:#f7f7f7;">


    <h3 style="text-align:center;"><a href="#">RAHMANA RENTAL-CAR</a></h3>
    <p style="color:#00000;padding:3px; font-size: 14px;">
    {{$body}}<br>

    <table>
        <thead>
            <tr>
                <th>Kode Pembayaran</th>
                <th>Nama Paket</th>
                <th>Destinasi</th>
                <th>Mobil</th>
                <th>Status Bayar</th>
                <th>Alamaat Penjemputan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$kp}}</td>
                <td>{{$np}}</td>
                <td>{{$d}}</td>
                <td>{{$mobil}}</td>
                <td>Terbayar</td>
                <td>{{$ap}}</td>

            </tr>
        </tbody>
    </table>

    

    <p style="color:#00000; text-align:center;"> Klik link dibawah untuk lanjut ke sistem website<br>
        <a style="background-color: #e6a91c;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 8px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px; text-align:center;" href="{{$link?? ''}}">Masuk ke Sistem</a>
    </p>
    </p>

</body>

</html>


<!DOCTYPE html>
<html>




</html>