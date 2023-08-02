<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Input Barang Masuk</h4>
                            <div class="form-group">
                                <label for="createDateInput">Tanggal</label>
                                <input type="date" class="form-control" id="createDateInput" name="createDateInput" value="<?php echo $scale->create_date; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="truckNumberInput">No. Truk</label>
                                <input type="text" class="form-control" id="truckNumberInput" name="truckNumberInput" placeholder="No. Truk" value="<?php echo $scale->truck_number; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="driveNameInput">Nama Sopir</label>
                                <input type="text" class="form-control" id="driveNameInput" name="driveNameInput" placeholder="Nama Sopir" value="<?php echo $scale->driver_name; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="itemNameInput">Nama Barang</label>
                                <input type="text" class="form-control" id="itemNameInput" name="itemNameInput" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <label for="destinationInput">Relasi(Tujuan)</label>
                                <input type="text" class="form-control" id="destinationInput" name="destinationInput" placeholder="Relasi(Tujuan)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title">Berat Barang Masuk</h4>
                            <div class="form-group">
                                <label for="brutoInput">Bruto</label>
                                <input type="number" class="form-control" id="brutoInput" name="brutoInput" placeholder="Bruto" value="<?php echo $scale->bruto; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="taraInput">Tara</label>
                                <input type="number" class="form-control" id="taraInput" name="taraInput" placeholder="Tara">
                            </div>
                            <div class="form-group">
                                <label for="nettoInput">Netto</label>
                                <input type="number" class="form-control" id="nettoInput" name="nettoInput" placeholder="Netto">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary btn-block" id="submitButton">Submit</button>
                            <button type="button" class="btn btn-success btn-block text-white">Print</button>
                            <button type="button" class="btn btn-warning btn-block" id="resetButton">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to handle the form submission
    function handleSubmit() {
        // Get the values of the input fields
        const itemName = document.getElementById("itemNameInput").value;
        const destination = document.getElementById("destinationInput").value;
        const tara = document.getElementById("taraInput").value;
        const netto = document.getElementById("nettoInput").value;

        // Create a data object to send with the request
        const data = {
            itemNameInput: itemName,
            destinationInput: destination,
            taraInput: tara,
            nettoInput: netto
        };

        console.log(data);

        // Send the data via a POST request using fetch()
        fetch(`<?= base_url('dashboard/update_weight/' . $scale->id); ?>`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest" // Set the X-Requested-With header
                },
                body: JSON.stringify(data),
            })
            .then(response => {
                console.log(response);
                // Check if the response has status 200 (OK)
                if (response.ok) {
                    // The request was successful
                    console.log("Data submitted successfully!");
                } else {
                    // The request failed
                    console.error("Error submitting data.");
                }

                // Additional error handling for non-OK responses
                if (!response.ok) {
                    response.json().then(errorData => {
                        console.error("Error details:", errorData);
                    });
                }
            })
            .catch(error => {
                // Handle any errors that occurred during the fetch() request
                console.error("Error:", error);
            });
    }

    // Add an event listener to the "Tara" input field
    document.getElementById("taraInput").addEventListener("input", function() {
        // Get the values of "Bruto" and "Tara"
        const brutoValue = parseFloat(document.getElementById("brutoInput").value);
        const taraValue = parseFloat(this.value);

        // Calculate the "Netto" value
        const nettoValue = brutoValue - taraValue;

        // Update the "Netto" input field with the calculated value
        document.getElementById("nettoInput").value = isNaN(nettoValue) ? "" : nettoValue;
    });

    // Add an event listener to the "Reset" button
    document.getElementById("resetButton").addEventListener("click", function() {
        // Get the references to the input fields
        const itemNameInput = document.getElementById("itemNameInput");
        const destinationInput = document.getElementById("destinationInput");
        const taraInput = document.getElementById("taraInput");
        const nettoInput = document.getElementById("nettoInput");

        // Reset the values of the input fields
        itemNameInput.value = "";
        destinationInput.value = "";
        taraInput.value = "";
        nettoInput.value = "";
    });

    // Add an event listener to the "Submit" button
    document.getElementById("submitButton").addEventListener("click", handleSubmit);
</script>