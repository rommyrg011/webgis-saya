<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/chart-area-demo.js"></script>
<script src="../assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="../js/datatables-simple-demo.js"></script>

        <!-- punya short url -->
<script src="script.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
new DataTable('#Simple');
</script>

<!-- bagian gambar berubah otomatis saat edit/ upload file -->
<script>
        function previewImage(event) {
            const fileInput = event.target;
            const imagePreview = document.getElementById('imagePreview');
            
            // Jika ada file yang dipilih
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update gambar yang ditampilkan
                    imagePreview.innerHTML = '<img src="' + e.target.result + '" class="zoomx">';
                }
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                // Jika tidak ada gambar, tampilkan pesan
                imagePreview.innerHTML = 'No Photo';
            }
        }
    </script>