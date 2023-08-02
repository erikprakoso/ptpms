<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title">Buat Barang Masuk</h4>
                        </div>
                    </div>
                    <form action="<?= base_url('dashboard/create'); ?>" method="post">
                        <div class="form-group">
                            <label for="createDateInput">Tanggal</label>
                            <input type="date" class="form-control" id="createDateInput" name="createDateInput">
                        </div>
                        <div class="form-group">
                            <label for="truckNumberInput">No. Truk</label>
                            <input type="text" class="form-control" id="truckNumberInput" name="truckNumberInput" placeholder="No. Truk">
                        </div>
                        <div class="form-group">
                            <label for="driveNameInput">Nama Sopir</label>
                            <input type="text" class="form-control" id="driveNameInput" name="driveNameInput" placeholder="Nama Sopir">
                        </div>
                        <div class="form-group">
                            <label for="brutoInput">Bruto</label>
                            <input type="number" class="form-control" id="brutoInput" name="brutoInput" placeholder="Bruto">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>