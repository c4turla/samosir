
//Alert Tambah dan Edit Data
const flashData = $('.flash-data').data("flashdata");
if (flashData) {
    Swal.fire({
        title: 'Berhasil!',
        text: flashData,
        icon: 'success',
        confirmButtonColor: '#5156be'
    });
}

//Hapus Data
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data ini akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2ab57d",
        cancelButtonColor: "#fd625e",
        confirmButtonText: "Ya, Hapus Data!"
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
        })
    });

//Preview Gambar
photo.onchange = evt => {
    const [file] = photo.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }