SCHEMA DATABASE WEB SADOKU

# Auth
## users
id
email
password
role ['umum', 'mahasiswa', 'dosen', 'admin']

## admin
id
nama lengkap
kontak

## dosens
id
nip
id_user (FK users)
nama lengkap
nidn (nullable)
prodi
fakultas
universitas
jabatan

## mahasiswas
id
nim
id_user (FK users)
nama lengkap
prodi
fakultas
universitas

## umums
id
id_users (FK users)
nama lengkap
afiliasi

# Informasi Utama/Layanan
## Informasi Utama/Layanan
no
pathfile
guidline ['guidline_etik_riset', 'form_permohonan_riset']

## proses_alur_kerja_risets
no
persyaratan

## proses_alur_kerja_risets_lampiran
no
gambar
keterangan

# Tentang
## abouts
​id (PK)
​konten (TEXT / LONGTEXT) - Isi profil tentang lembaga
​gambar_hero (VARCHAR) - Path foto utama
​sejarah (TEXT)
​updated_at (TIMESTAMP)

## ​visis
​id (PK)
​teks_visi (TEXT)
​is_active (BOOLEAN) - Untuk menandai visi mana yang sedang digunakan
​
## misis
​id (PK)
​teks_misi (TEXT)
​urutan (INT) - Untuk menentukan urutan poin misi (1, 2, 3...)
​is_active (BOOLEAN)

## ​struktur_organisasis
​id (PK)
​nama_jabatan (VARCHAR)
​parent_id (FK users) - Untuk menentukan hierarki (siapa membawahi siapa)
​gambar_bagan (VARCHAR) - Jika struktur diunggah sebagai satu gambar utuh
​versi (VARCHAR) - Contoh: "Periode 2024-2029"
​
## tim_pengelolas
​id (PK)
​nama_lengkap (VARCHAR)
​gelar (VARCHAR)
​jabatan (VARCHAR)
​nip_nidn (VARCHAR)
​foto (VARCHAR)
​urutan_tampil (INT)
​is_tampilkan (BOOLEAN)

## ​tarif_laik_etik_riset_inovasis
​id (PK)
​nama_kategori (VARCHAR) - Contoh: "Mahasiswa Internal", "Peneliti Luar", "Uji Klinis"
​nominal_tarif (DECIMAL/INT)
​deskripsi (TEXT) - Keterangan cakupan tarif
​is_active (BOOLEAN)

## ​kontak
​id (PK)
​alamat_kantor (TEXT)
​email (VARCHAR)
​no_telepon (VARCHAR)
​whatsapp (VARCHAR)
​link_google_maps (TEXT)
​link_facebook (VARCHAR)
​link_instagram (VARCHAR)
​jam_operasional (VARCHAR)

# DLL
## beritas
id
judul
img
isi

## pengumumans
id
judul
img
isi

# permohonan penelitian
## penelitians
id
id_users (FK users)
judul
id_subjek_penelitian (FK subjek_penelitians)
multisenter [true, false] <- radio button
senter_utama (nullable, wajib diisi jika multisenter true)
senter_penelitian_satelit (nullable, wajib diisi jika multisenter true)
id_jenis_penelitian (FK jenis_penelitians) ['bukan_kerjasama', 'kerjasama_nasional', 'kerjasama_internasional', 'melibatkan_ketua_peneliti_asing'] <- multioption button
komisi_etik_lain [true, false] <- radio button
id_jenis_sponsor (FK jenis_sponsors) ['mandiri', 'swasta', 'hibah_fakultas', 'hibah_universitas', 'hibah_nasional', 'hibah_internasional']
dana_penelitian (INT)
deskripsi_pendanaan
tanggal_mulai (DD/MM/YYYY)
tanggal_berakhir (DD/MM/YYYY)
tempat_penelitian
pembimbing1 (nullable, tapi wajib diisi khusus mahasiswa)
pembimbing2 (nullable, tapi wajib diisi khusus mahasiswa)
id_anggota (FK anggota_penelitians)
ringkasan_penelitian
penelitian_terdahulu
jenis_desain_penelitian
informasi_penelitian
dokumen_pendukung (list_path_file)
id_permohonan_dokumen (list FK dari permohonan_dokumens)

## subjek_penelitians
id
nama_subjek
deskripsi

## jenis_penelitian
id
nama_jenis
keterangan

## jenis_sponsor
id
nama_sponsor
kategori ['internal', 'eksternal"

## anggota_penelitians
id
id_permohonan (FK penelitians)
nama_anggota
institusi
peran
id_user (FK dari users, nullable)

## permohonan_dokumens
id
id_penelitians
nama_file
path_file
tipe_dokumen
