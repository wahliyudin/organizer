<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        .table {
            --bs-table-color: var(--bs-body-color);
            --bs-table-bg: transparent;
            --bs-table-border-color: rgba(231, 234, 243, 0.7);
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: var(--bs-body-color);
            --bs-table-striped-bg: #f9fafc;
            --bs-table-active-color: var(--bs-body-color);
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: var(--bs-body-color);
            --bs-table-hover-bg: rgba(231, 234, 243, 0.4);
            width: 100%;
            margin-bottom: 1rem;
            color: var(--bs-table-color);
            vertical-align: top;
            border-color: var(--bs-table-border-color)
        }

        .table>:not(caption)>*>* {
            padding: .75rem .75rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: .0625rem;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg)
        }

        .table>tbody {
            vertical-align: inherit
        }

        .table>thead {
            vertical-align: bottom
        }

        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <table class="table" style="border: 1px solid black; border-collapse: collapse;">
        <thead style="border: 1px solid black;">
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black;">Kode Jurnal</th>
                <th style="border: 1px solid black;">Akun</th>
                <th style="border: 1px solid black;">Debet</th>
                <th style="border: 1px solid black;">Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;">{{ $item['kode_jurnal'] }}</td>
                    <td style="border: 1px solid black;">{{ $item['akun'] }}</td>
                    <td style="border: 1px solid black;">{{ $item['debet'] }}</td>
                    <td style="border: 1px solid black;">{{ $item['kredit'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
