<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>WaktuSaku</title>
</head>

<body>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td style="background-color: #f0f0f0; padding: 20px; text-align: center;">
                            <h1 style="color: #333;">Perusahaan Anda {{ $getPerusahaan->nama }}</h1>
                            <p style="font-size: 16px; color: #555;">Dilamar Oleh {{ $getUserId->name }}</p>

                            <!-- Formulir dengan metode GET -->
                            <p style="font-size: 16px; color: #555;">Link Detail Lamaran</p>
                            <a href="http://127.0.0.1:8000/lamarperusahaan/{{ $lamarId }}" target="_blank"
                                style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 20px; display: inline-block; cursor: pointer;">Kunjungi
                                Situs Kami</a>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
