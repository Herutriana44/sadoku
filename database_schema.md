**1. Tabel: users (Format Laravel Breeze + Role)**
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * name | VARCHAR(255)
   * email | VARCHAR(255) | Unique
   * email_verified_at | TIMESTAMP | Nullable
   * password | VARCHAR(255)
   * role | ENUM('peneliti', 'sekretariat', 'reviewer', 'ketua_kepk')
   * remember_token | VARCHAR(100) | Nullable
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable
**2. Tabel: password_reset_tokens (Format Laravel Breeze)**
 * **Kolom**:
   * email | VARCHAR(255) | **Primary Key** | **Foreign Key** -> users.email
   * token | VARCHAR(255)
   * created_at | TIMESTAMP | Nullable
**3. Tabel: submissions (Pengajuan Berkas Penelitian)**
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * user_id | BIGINT UNSIGNED | **Foreign Key** -> users.id
   * judul_penelitian | VARCHAR(255)
   * abstrak | TEXT
   * berkas_path | VARCHAR(255)
   * status | ENUM('diajukan', 'perbaikan_administrasi', 'proses_telaah', 'perbaikan_minor', 'perbaikan_mayor', 'disetujui', 'tidak_disetujui')
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable
**4. Tabel: administrative_verifications (Verifikasi Administrasi)**
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * sekretariat_id | BIGINT UNSIGNED | **Foreign Key** -> users.id
   * is_lengkap | BOOLEAN
   * catatan | TEXT | Nullable
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable
**5. Tabel: review_classifications (Penentuan Klasifikasi Telaah)**
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * sekretariat_id | BIGINT UNSIGNED | **Foreign Key** -> users.id
   * jenis_telaah | ENUM('exempted', 'expedited', 'full_board')
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable
**6. Tabel: reviews (Proses Penelaahan)**
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * reviewer_id | BIGINT UNSIGNED | **Foreign Key** -> users.id | Nullable *(Kosong jika Full Board / Rapat Pleno)*
   * catatan_review | TEXT | Nullable
   * rekomendasi_hasil | ENUM('disetujui', 'perbaikan_minor', 'perbaikan_mayor', 'tidak_disetujui')
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable
**7. Tabel: final_decisions (Keputusan Ketua KEPK)**
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * ketua_id | BIGINT UNSIGNED | **Foreign Key** -> users.id
   * hasil_keputusan | ENUM('disetujui', 'perbaikan_minor', 'perbaikan_mayor', 'tidak_disetujui')
   * catatan | TEXT | Nullable
   * no_sertifikat_etik | VARCHAR(255) | Nullable *(Diisi jika Disetujui / Ethical Exemption)*
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable
**8. Tabel: submission_revisions (Log Riwayat Perbaikan/Revisi Berkas)**
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * berkas_revisi_path | VARCHAR(255)
   * catatan_peneliti | TEXT | Nullable
   * tipe_perbaikan | ENUM('administrasi', 'minor', 'mayor')
   * versi | INT
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable

Berikut adalah beberapa tabel tambahan yang **sangat disarankan** (opsional tapi krusial) untuk melengkapi sistem alur etik ini agar dapat berjalan otomatis sesuai dengan aturan waktu (*timeline*) dan pencatatan riwayat yang ada pada infografis:
**9. Tabel: review_assignments (Penugasan Reviewer / Plotting Rapat)**
*Untuk mengakomodasi proses "Review Cepat oleh Reviewer" (Expedited) atau "Rapat Pleno" (Full Board).*
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * reviewer_id | BIGINT UNSIGNED | **Foreign Key** -> users.id | Nullable *(Bisa kosong jika formatnya rapat pleno komisi)*
   * tanggal_rapat | DATETIME | Nullable *(Diisi jika jenis telaah adalah Full Board)*
   * status_penugasan | ENUM('pending', 'diterima', 'selesai')
   * created_at | TIMESTAMP | Nullable
   * updated_at | TIMESTAMP | Nullable
**10. Tabel: submission_timelines (Monitoring Batas Waktu / SLA)**
*Untuk memantau batasan hari kerja sesuai infografis (Administrasi: 1-3 hari, Exempted: 3 hari, Expedited: 14 hari, Full Board: 30 hari).*
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * tahap | ENUM('verifikasi_administrasi', 'telaah_exempted', 'telaah_expedited', 'telaah_full_board')
   * tanggal_mulai | TIMESTAMP
   * deadline | TIMESTAMP *(Dihitung otomatis menggunakan sistem penambahan hari kerja berdasarkan jenis tahap)*
   * tanggal_selesai | TIMESTAMP | Nullable
   * status_sla | ENUM('on_track', 'overdue', 'completed')
   * created_at | TIMESTAMP | Nullable
**11. Tabel: activity_logs (Rekam Jejak / Audit Trail)**
*Penting untuk melacak siapa melakukan apa (misal: kapan Sekretariat mengembalikan berkas, kapan Peneliti mengunggah revisi).*
 * **Kolom**:
   * id | BIGINT UNSIGNED | **Primary Key** | Auto Increment
   * submission_id | BIGINT UNSIGNED | **Foreign Key** -> submissions.id
   * user_id | BIGINT UNSIGNED | **Foreign Key** -> users.id *(Aktor yang melakukan aksi)*
   * aksi | VARCHAR(255) *(Contoh: 'Mengunggah Berkas', 'Mengubah Status ke Perbaikan Minor', 'Menyetujui Etik')*
   * keterangan | TEXT | Nullable
   * created_at | TIMESTAMP | Nullable
Dengan tambahan 3 tabel di atas, sistem Anda sudah siap menangani aspek pembagian tugas reviewer, pengingat batas waktu (*deadline*), dan pelacakan riwayat revisi secara menyeluruh.

