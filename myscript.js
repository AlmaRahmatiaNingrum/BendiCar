// JavaScript for handling dynamic content (e.g., displaying vehicle details)
document.addEventListener('DOMContentLoaded', function () {
    const kendaraanSelect = document.getElementById('kendaraan');
    const kendaraanDetails = document.getElementById('kendaraan-details');
    const harga = document.getElementById('harga');

    // Fetch vehicle details dynamically
    kendaraanSelect.addEventListener('change', function () {
        const kendaraanId = this.value;
        
        if (kendaraanId) {
            // Example of retrieving the selected vehicle's details (hardcoded for this example)
            // In a real-world scenario, you would fetch the data from the server via AJAX
            fetchKendaraanDetails(kendaraanId);
        } else {
            kendaraanDetails.innerHTML = '';
            harga.innerHTML = '';
        }
    });

    // Function to simulate fetching kendaraan details
    function fetchKendaraanDetails(id) {
        // In this example, let's simulate fetching vehicle details based on id
        const kendaraanInfo = {
            'K123': {
                merk: 'Toyota',
                jenis: 'Avanza',
                harga_sewa: 300000
            },
            'K124': {
                merk: 'Honda',
                jenis: 'Civic',
                harga_sewa: 500000
            },
            // Add more vehicles as needed
        };

        const kendaraan = kendaraanInfo[id];
        if (kendaraan) {
            kendaraanDetails.innerHTML = `<p>Merk: ${kendaraan.merk}</p><p>Jenis: ${kendaraan.jenis}</p>`;
            harga.innerHTML = `Rp ${kendaraan.harga_sewa.toLocaleString()}`;
        }
    }
});
