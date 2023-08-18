<!DOCTYPE html>
<html>

<head>
    <title>Print Struk Penimbangan</title>
    <style>
        @page {
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            width: 700px;
            /* Sesuaikan lebar container sesuai dengan orientasi landscape */
            margin: 20px auto;
            /* Tambahkan margin atas dan bawah */
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .header h3 {
            text-align: left;
            margin: 0;
        }

        .header p {
            text-align: right;
            margin: 0;
        }

        .body {
            margin-top: 20px;
        }

        .body table {
            width: 100%;
            border-collapse: collapse;
        }

        .body table,
        .body th,
        .body td {
            border: 1px solid #000;
            padding: 5px;
        }

        .footer {
            margin-top: 20px;
            text-align: left;
            /* Memindahkan teks ke sebelah kiri */
        }

        .signatures {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            width: 150px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div>
                <h3>PELABUHAN MUDAH SENANG - KU</h3>
                <h3>KOTA KU</h3>
            </div>
            <p><?php echo $scale->update_date; ?> <?php echo $scale->update_time; ?></p>
        </div>

        <div class="body">
            <h4 style="text-align: center;">
                <u>STRUK PENIMBANGAN</u>
            </h4>
            <table style="border-collapse: collapse; border: none;">
                <tr style="border: none;">
                    <td style="border: none; width: 100px;">No Tiket</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;"><?php echo $scale->id; ?></td>
                    <td style="border: none; width: 50px;">Supir</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;"><?php echo $scale->driver_name; ?></td>
                </tr>
                <tr>
                    <td style="border: none; width: 100px;">No Truk</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;"><?php echo $scale->truck_number; ?></td>
                    <td style="border: none; width: 50px;">Relasi</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;"><?php echo $scale->destination; ?></td>
                </tr>
                <tr>
                    <td style="border: none;">Nama barang</td>
                    <td style="border: none;">:</td>
                    <td style="border: none;" colspan="3"><?php echo $scale->item_name; ?></td>
                </tr>
            </table>
            <br>
            <table style="border-collapse: collapse; border: none;">
                <tr style="border: none;">
                    <th style="border: none;"></th>
                    <th>TANGGAL</th>
                    <th>JAM</th>
                    <th>BERAT TIMBANGAN</th>
                    <th>HARGA/KG</th>
                    <th>TOTAL HARGA</th>
                </tr>
                <tr>
                    <td>BRUTO</td>
                    <td><?php echo $scale->create_date; ?></td>
                    <td><?php echo $scale->create_time; ?></td>
                    <td style="text-align: center;"><?php echo $scale->bruto; ?></td>
                    <td rowspan="3"></td>
                    <td rowspan="3"></td>
                </tr>
                <tr>
                    <td>TARA</td>
                    <td><?php echo $scale->update_date; ?></td>
                    <td><?php echo $scale->update_time; ?></td>
                    <td style="text-align: center;"><?php echo $scale->tara; ?></td>
                </tr>
                <tr>
                    <td>NETTO</td>
                    <td><?php echo $scale->update_date; ?></td>
                    <td><?php echo $scale->update_time; ?></td>
                    <td style="text-align: center;"><?php echo $scale->netto; ?></td>
                </tr>
            </table>
            <div class="signatures">
                <div class="signature-box">
                    <p>SUPIR</p>
                </div>
                <div class="signature-box">
                    <p>DIKETAHUI MANAGER</p>
                </div>
                <div class="signature-box">
                    <p>OPERATOR</p>
                </div>
            </div>
            <div class="signatures">
                <div class="signature-box">
                    <p>(______________)</p>
                </div>
                <div class="signature-box">
                    <p>(______________)</p>
                </div>
                <div class="signature-box">
                    <p>(______________)</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Keterangan: <?php echo $scale->information; ?></p>
        </div>
    </div>
    <script>
        function printScale() {
            // var printWindow = window.open('', '_blank', 'toolbar=0,location=0,menubar=0');
            var printWindow = window.open('', 'toolbar=0,location=0,menubar=0');
            printWindow.document.open();
            printWindow.document.write('<?php echo str_replace(array("\n", "\r", "'"), array(" ", "", "\\'"), addslashes(file_get_contents("print.php"))); ?>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>

</html>