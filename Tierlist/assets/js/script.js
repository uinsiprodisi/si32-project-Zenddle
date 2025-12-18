// konfirmasi hapus tambahan (backup)
function konfirmasiHapus() {
    return confirm("Yakin ingin menghapus data ini?");
}

// validasi form tambah/edit
function validasiForm() {
    let nama = document.getElementById("nama").value;
    let role = document.getElementById("role").value;
    let tier = document.getElementById("tier").value;

    if (nama === "" || role === "" || tier === "") {
        alert("Nama, Role, dan Tier wajib diisi!");
        return false;
    }
    return true;
}
