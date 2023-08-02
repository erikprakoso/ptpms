<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title">Edit Barang Masuk</h4>
                        </div>
                    </div>
                    <form action="<?= base_url('dashboard/update/' . $scale->id); ?>" method="post">
                        <div class="form-group">
                            <label for="createDateInput">Tanggal</label>
                            <input type="date" class="form-control" id="createDateInput" name="createDateInput" value="<?php echo $scale->create_date; ?>">
                        </div>
                        <div class="form-group">
                            <label for="truckNumberInput">No. Truk</label>
                            <input type="text" class="form-control" id="truckNumberInput" name="truckNumberInput" placeholder="No. Truk" value="<?php echo $scale->truck_number; ?>">
                        </div>
                        <div class="form-group">
                            <label for="driveNameInput">Nama Sopir</label>
                            <input type="text" class="form-control" id="driveNameInput" name="driveNameInput" placeholder="Nama Sopir" value="<?php echo $scale->driver_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="brutoInput">Bruto</label>
                            <input type="number" class="form-control" id="brutoInput" name="brutoInput" placeholder="Bruto" value="<?php echo $scale->bruto; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?= base_url('dashboard'); ?>" class="btn btn-danger text-white">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>