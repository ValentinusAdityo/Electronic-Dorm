// pagination.js

$(document).ready(function() {
    // Fungsi untuk membuat kamar dan tombol
    function generateRoomsAndPagination() {
        const containerKamar = document.getElementById('roomContainer');
        const containerPagination = document.getElementById('pagination');
        containerKamar.innerHTML = ''; // Hapus kamar yang sudah ada
        containerPagination.innerHTML = ''; // Hapus tombol yang sudah ada

        const jumlahTombol = Math.ceil(jumlahKamar / kamarPerHalaman);
        for (let i = 1; i <= jumlahTombol; i++) {
            const elemenTombol = document.createElement('li');
            elemenTombol.className = 'page-item';
            const elemenLink = document.createElement('a');
            elemenLink.className = 'page-link';
            elemenLink.href = `javascript:void(0);`;
            elemenLink.textContent = i;
            elemenLink.addEventListener('click', () => tampilkanKamar(i));
            elemenTombol.appendChild(elemenLink);
            containerPagination.appendChild(elemenTombol);
        }

        tampilkanKamar(halamanSaatIni);
    }

    // Fungsi untuk menampilkan kamar-kamar tertentu berdasarkan klik tombol
    function tampilkanKamar(nomorTombol) {
        const containerKamar = document.getElementById('roomContainer');
        const tombolTombol = document.querySelectorAll('#pagination li');

        halamanSaatIni = nomorTombol;
        counter = (halamanSaatIni - 1) * kamarPerHalaman + 1; // Reset nomor kamar pada setiap halaman

        tombolTombol.forEach((tombol, indeks) => {
            if (indeks + 1 === halamanSaatIni) {
                tombol.classList.add('active');
            } else {
                tombol.classList.remove('active');
            }
        });

        const kamarAwal = (halamanSaatIni - 1) * kamarPerHalaman;
        const kamarAkhir = halamanSaatIni * kamarPerHalaman;

        containerKamar.childNodes.forEach((kamar, indeks) => {
            if (indeks >= kamarAwal && indeks < kamarAkhir) {
                if (kamar) {
                    kamar.style.display = 'block';
                    kamar.querySelector('.room_desc h5').textContent = `No: ${counter}`;
                    counter++;
                }
            } else {
                if (kamar) {
                    kamar.style.display = 'none';
                }
            }
        });
    }

    // Generasi awal
    generateRoomsAndPagination();
});
