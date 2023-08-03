<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title">Rekap Barang Masuk</h4>
                        </div>
                    </div>
                    <div class="table-responsive mt-5">
                        <table id="dataTable" class="table stylish-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">No. Tiket</th>
                                    <th class="border-top-0">Tanggal</th>
                                    <th class="border-top-0">No. Truk</th>
                                    <th class="border-top-0">Nama Sopir</th>
                                    <th class="border-top-0">Nama Barang</th>
                                    <th class="border-top-0">Relasi(Tujuan)</th>
                                    <th class="border-top-0">Bruto</th>
                                    <th class="border-top-0">Tara</th>
                                    <th class="border-top-0">Netto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($scales as $scale) : ?>
                                    <tr>
                                        <td><?php echo $scale->id; ?></td>
                                        <td><?php echo $scale->create_date; ?></td>
                                        <td><?php echo $scale->truck_number; ?></td>
                                        <td><?php echo $scale->driver_name; ?></td>
                                        <td><?php echo isset($scale->item_name) ? $scale->item_name : 'No Data'; ?></td>
                                        <td><?php echo isset($scale->destination) ? $scale->destination : 'No Data'; ?></td>
                                        <td><?php echo $scale->bruto; ?></td>
                                        <td><?php echo isset($scale->tara) ? $scale->tara : 'No Data'; ?></td>
                                        <td><?php echo isset($scale->netto) ? $scale->netto : 'No Data'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>