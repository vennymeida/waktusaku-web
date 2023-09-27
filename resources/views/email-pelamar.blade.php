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
                            <h1 style="color: #333;">Perusahaan {{ $getPerusahaan->nama }}</h1>
                            <p style="font-size: 16px; color: #555;">Terimakasih Lamaran Anda {{ $getUserId->name }}
                            </p>

                            <!-- Formulir dengan metode GET -->
                            @if ($lamar->status == 'Diterima')
                                <a
                                    style="background-color: #00ff08; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 20px; display: inline-block; cursor: pointer;">DITERIMA</a>
                            @elseif ($lamar->status == 'Ditolak')
                                <a
                                    style="background-color: #ff0000; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 20px; display: inline-block; cursor: pointer;">DITOLAK</a>
                            @endif


                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
