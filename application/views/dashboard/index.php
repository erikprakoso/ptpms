<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title">Barang Masuk</h4>
                        </div>
                        <div class="col-md-2 text-md-end">
                            <a href="<?= base_url('dashboard/create'); ?>" class="btn btn-primary">Buat</a>
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
                                    <th class="border-top-0">Bruto</th>
                                    <th class="border-top-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($scales as $scale) : ?>
                                    <tr>
                                        <td><?php echo $scale->id; ?></td>
                                        <td><?php echo $scale->create_date; ?></td>
                                        <td><?php echo $scale->truck_number; ?></td>
                                        <td><?php echo $scale->driver_name; ?></td>
                                        <td><?php echo $scale->bruto; ?></td>
                                        <td>
                                            <a href="<?= base_url('dashboard/detail/' . $scale->id); ?>" class="btn btn-info text-white">Detail</a>
                                            <a href="<?= base_url('dashboard/edit/' . $scale->id); ?>" class="btn btn-warning text-white">Edit</a>
                                            <a href="<?= base_url('dashboard/delete/' . $scale->id); ?>" class="btn btn-danger text-white">Hapus</a>
                                        </td>
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