<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-sm-12">
            <div class="alert" role="alert" style="display: none;"></div>
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
                                <input type="text" class="form-control" id="itemNameInput" name="itemNameInput" placeholder="Nama Barang" value="<?php echo isset($scale->item_name) ? $scale->item_name : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="destinationInput">Relasi(Tujuan)</label>
                                <select class="form-control" name="destinationInput" id="destinationInput">
                                    <?php foreach ($destinations as $destination): ?>
                                        <option value="<?php echo $destination->id; ?>"><?php echo $destination->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="destinationInput">Keterangan</label>
                                <textarea class="form-control" id="informationInput" name="informationInput" rows="3"><?php echo isset($scale->information) ? $scale->information : ''; ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title">Berat Barang Masuk</h4>
                            <div class="form-group">
                                <label for="updateDateInput">Tanggal</label>
                                <input type="date" class="form-control" id="updateDateInput" name="updateDateInput" value="<?php echo isset($scale->update_date) ? $scale->update_date : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="brutoInput">Bruto</label>
                                <input type="number" class="form-control" id="brutoInput" name="brutoInput" placeholder="Bruto" value="<?php echo $scale->bruto; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="taraInput">Tara</label>
                                <input type="number" class="form-control" id="taraInput" name="taraInput" placeholder="Tara" value="<?php echo isset($scale->tara) ? $scale->tara : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nettoInput">Netto</label>
                                <input type="number" class="form-control" id="nettoInput" name="nettoInput" placeholder="Netto" value="<?php echo isset($scale->netto) ? $scale->netto : ''; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary btn-block" id="submitButton">Submit</button>
                            <!-- <button type="button" class="btn btn-success btn-block text-white">Print</button> -->
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
        const updateDate = document.getElementById("updateDateInput").value;
        const information = document.getElementById("informationInput").value;

        // Create a data object to send with the request
        const data = {
            itemNameInput: itemName,
            destinationInput: destination,
            taraInput: tara,
            nettoInput: netto,
            updateDateInput: updateDate,
            informationInput: information
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
                // Check if the response has status 200 (OK)
                if (response.ok) {
                    // The request was successful
                    return response.json(); // Parse the JSON data and pass it to the next `.then()`
                } else {
                    // The request failed
                    throw new Error("Error submitting data.");
                }
            })
            .then(data => {

                // Display success message in the alert
                const alertDiv = document.querySelector('.alert');
                alertDiv.classList.add('alert-primary');
                alertDiv.innerText = "Data submitted successfully!";
                alertDiv.style.display = 'block'; // Show the alert

                // Add a timeout before redirecting to the dashboard
                setTimeout(() => {
                    window.location.href = '<?php echo base_url("dashboard"); ?>';
                }, 3000); // Delay for 3 seconds (adjust as needed)
            })
            .catch(error => {
                // Handle any errors that occurred during the fetch() request

                console.error("Error:", error);

                // Display error message in the alert
                const alertDiv = document.querySelector('.alert');
                alertDiv.classList.add('alert-danger');
                alertDiv.innerText = "Error submitting data.";
                alertDiv.style.display = 'block'; // Show the alert
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
        const updateDateInput = document.getElementById("updateDateInput");
        const informationInput = document.getElementById("informationInput");

        // Reset the values of the input fields
        itemNameInput.value = "";
        destinationInput.value = "";
        taraInput.value = "";
        nettoInput.value = "";
        updateDateInput.value = "";
        informationInput.value = "";
    });

    // Add an event listener to the "Submit" button
    document.getElementById("submitButton").addEventListener("click", handleSubmit);

    // Add an event listener to hide the alert when clicked
    document.querySelector('.alert').addEventListener('click', function() {
        this.style.display = 'none'; // Hide the alert when clicked
        // Redirect to the dashboard page after a successful submission
    });

    // Optionally, hide the alert after a certain time (e.g., 5 seconds)
    setTimeout(function() {
        document.querySelector('.alert').style.display = 'none';
    }, 5000); // Hide the alert after 5 seconds (adjust as needed)
</script>