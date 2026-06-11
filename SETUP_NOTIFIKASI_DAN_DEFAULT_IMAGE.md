# Setup Notifikasi, Konfirmasi Delete, dan Default Image

## ✅ Fitur Yang Sudah Diimplementasikan

### 1. **Success Notification Popup (Toast Alert)**
- Menggunakan **SweetAlert2** library
- Muncul otomatis setelah action berhasil: Create, Update, Delete
- Toast muncul di **top-right** dengan auto-close 3 detik
- Jenis notifikasi:
  - ✅ Success (warna hijau) - untuk berhasil
  - ❌ Error (warna merah) - untuk error
  - ⚠️ Warning (warna kuning) - untuk konfirmasi delete

### 2. **Delete Confirmation Dialog (Modal Alert)**
- Replace default `confirm()` browser dengan SweetAlert2
- Lebih **cantik**, **user-friendly**, dan **profesional**
- Tampil saat user klik tombol "Hapus"
- Dialog memberikan pilihan:
  - "Ya, hapus!" - untuk melanjutkan delete
  - "Batal" - untuk membatalkan
- Berlaku untuk semua delete operations:
  - ❌ Delete Artikel
  - ❌ Delete Kategori
  - ❌ Delete Penulis

### 3. **Default Foto Profil**
- Jika penulis belum upload foto, otomatis gunakan `default.png`
- File disimpan di: `storage/app/public/foto/default.png`
- Default image ditampilkan di:
  - 📷 Sidebar avatar (layout admin)
  - 📷 Table foto di halaman Kelola Penulis
  - 📷 Preview foto di form Edit Penulis

---

## 🔧 File Yang Diubah

| File | Perubahan |
|------|-----------|
| `resources/views/layouts/app.blade.php` | Tambah SweetAlert2, JavaScript notification, handle default image di avatar |
| `resources/views/artikel/index.blade.php` | Replace `confirm()` dengan `handleDelete()` |
| `resources/views/kategori/index.blade.php` | Replace `confirm()` dengan `handleDelete()` |
| `resources/views/penulis/index.blade.php` | Buat view index yang benar, tambah delete dengan SweetAlert |
| `resources/views/penulis/edit.blade.php` | Handle default image fallback |
| `app/Providers/AppServiceProvider.php` | Tambah blade directive untuk default image |

---

## 📋 Setup Default Image

### Opsi 1: Download Image Default (Recommended)
1. Download gambar default dari: [https://ui-avatars.com/api/?name=User&background=e9ecef&color=999&size=200](https://ui-avatars.com/api/?name=User&background=e9ecef&color=999&size=200)
2. Simpan sebagai `default.png` di folder: `storage/app/public/foto/`
3. Folder structure:
   ```
   storage/
   └── app/
       └── public/
           └── foto/
               └── default.png
   ```

### Opsi 2: Buat Manual dengan PHP
1. Buat file `storage/app/public/foto/default.png` menggunakan GD library
2. Atau gunakan command artisan (jika sudah dibuat):
   ```bash
   php artisan storage:link
   ```

### Opsi 3: Gunakan Placeholder SVG
Jika tidak ada file `default.png`, sistem akan otomatis fallback ke SVG placeholder dengan `onerror` handler.

---

## ⚙️ Cara Menggunakan

### Saat Create/Update Artikel/Kategori/Penulis:
1. Isi form dengan data
2. Klik tombol **"Simpan Data"** atau **"Simpan Perubahan"**
3. Tunggu beberapa detik
4. **Toast notification** akan muncul di **top-right** dengan pesan sukses ✅
5. Otomatis redirect ke halaman list

### Saat Delete Artikel/Kategori/Penulis:
1. Klik tombol **"Hapus"** di tabel
2. **Modal dialog** SweetAlert akan muncul dengan pesan:
   - Judul: "Hapus [item name]?"
   - Pesan: "Tindakan ini tidak dapat dibatalkan!"
   - 2 tombol: "Ya, hapus!" dan "Batal"
3. Klik **"Ya, hapus!"** untuk confirm atau **"Batal"** untuk cancel
4. Jika confirm, data akan dihapus dan **toast success** akan muncul ✅

### Foto Profil Penulis:
1. Saat edit/create penulis, jika tidak upload foto:
   - Preview akan menampilkan `default.png`
   - Database akan menyimpan: `default.png`
2. Saat login, avatar di sidebar akan menampilkan default jika foto kosong
3. Fallback ke SVG placeholder jika file tidak ditemukan

---

## 🎨 Styling

### SweetAlert2 Toast
- **Position**: Top-right
- **Auto-close**: 3 detik
- **Timer bar**: Ya (progressbar di bawah toast)
- **Icon**: ✅ Success / ❌ Error

### SweetAlert2 Confirmation Dialog
- **Icon**: ⚠️ Warning
- **Button color**: 
  - Confirm (Hapus): Red (#d33)
  - Cancel (Batal): Gray (#6c757d)

---

## 📝 Kode JavaScript Yang Digunakan

### Function `handleDelete()`
```javascript
function handleDelete(event, itemName = 'data ini') {
    event.preventDefault();
    const form = event.target;
    
    confirmDelete(itemName).then((confirmed) => {
        if (confirmed) {
            form.submit();
        }
    });
}
```

### Trigger pada Delete Form
```html
<form action="..." method="POST" onsubmit="return handleDelete(event, 'artikel')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm">Hapus</button>
</form>
```

---

## 🚀 Testing Checklist

```
✅ Create artikel → Toast "Artikel berhasil ditambahkan" muncul
✅ Update artikel → Toast "Artikel berhasil diperbarui" muncul
✅ Delete artikel → Modal konfirmasi muncul → Delete → Toast success
✅ Create kategori → Toast success muncul
✅ Update kategori → Toast success muncul
✅ Delete kategori → Modal konfirmasi muncul → Toast success
✅ Create penulis → Toast success muncul
✅ Update penulis → Toast success muncul + foto default ditampilkan
✅ Delete penulis → Modal konfirmasi muncul → Toast success
✅ Avatar sidebar → Tampilkan foto penulis atau default.png
✅ Responsive → Test di mobile (semua dialog responsive)
```

---

## 📦 CDN Yang Digunakan

```html
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
```

---

## 🔗 Catatan Penting

1. **Session Flash Messages**: Semua flash session messages (`sukses`, `gagal`) akan otomatis ditampilkan sebagai toast notification
2. **Fallback Image**: Jika `default.png` tidak ada, gambar akan fallback ke SVG placeholder
3. **Responsive**: Semua SweetAlert dialog responsive di mobile
4. **Browser Compatibility**: Kompatibel dengan semua browser modern (Chrome, Firefox, Safari, Edge)

---

## ❓ Troubleshooting

### Notification Tidak Muncul
- Pastikan `session.php` config sudah aktif
- Pastikan flash message di controller sudah di-set dengan `.with()` method
- Check console browser untuk error

### Default Image Tidak Tampil
- Pastikan folder `storage/app/public/foto/` sudah ada
- Pastikan file `default.png` sudah di-download dan disimpan di folder tersebut
- Jalankan: `php artisan storage:link` untuk membuat symbolic link

### Modal Tidak Tampil
- Refresh browser (clear cache)
- Pastikan SweetAlert2 CDN tidak diblock (check network tab di DevTools)
- Update ke versi SweetAlert2 terbaru

---

**Semua fitur sudah siap digunakan! 🎉**
