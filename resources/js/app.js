import './bootstrap';

var typeDropdown = document.getElementById('type');
        var categoryDropdown = document.getElementById('type_description');

        // Pilihan untuk dropdown kategori
        var categoryOptions = {
            Kering: ['Uncategorized', 'Dus', 'Kertas', 'Botol', 'Plastik', 'Kaleng'],
            Basah: ['Uncategorized']
        };

        // Event listener untuk update kategori sesuai type
        typeDropdown.addEventListener('change', function() {
            categoryDropdown.innerHTML = '';

            // Membuat opsi baru sesuai dengan type
            var selectedType = typeDropdown.value;
            categoryOptions[selectedType].forEach(function(type_description) {
                addCategoryOption(type_description);
            });
        });

        // Fungsi untuk menambah opsi kedalam kategori
        function addCategoryOption(value) {
            var option = document.createElement('option');
            option.value = value;
            option.textContent = value;
            categoryDropdown.appendChild(option);
        }
