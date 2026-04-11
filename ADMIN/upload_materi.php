<?php
session_start();
require_once 'config.php';
requireLogin();

$uploadDir = __DIR__ . '/../../uploads/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

$errors   = [];
$success  = '';

// DELETE MATERI (AJAX)
if (isset($_GET['delete']) && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    header('Content-Type: application/json');
    $delId = (int)$_GET['delete'];
    $r = $conn->query("SELECT file FROM materi WHERE id=$delId");
    if ($r && $row = $r->fetch_assoc()) {
        $filePath = $uploadDir . $row['file'];
        if (file_exists($filePath)) unlink($filePath);
        $conn->query("DELETE FROM materi WHERE id=$delId");
        echo json_encode(['success'=>true]);
    } else {
        echo json_encode(['success'=>false,'message'=>'Materi tidak ditemukan']);
    }
    exit();
}

// UPLOAD MATERI
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul     = trim($_POST['judul'] ?? '');
    $kategori  = trim($_POST['kategori'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $file      = $_FILES['file'] ?? null;

    if (empty($judul))    $errors[] = 'Judul materi wajib diisi';
    if (empty($kategori)) $errors[] = 'Kategori wajib dipilih';
    if (!$file || $file['error'] !== UPLOAD_ERR_OK) $errors[] = 'File PDF wajib diunggah';

    if ($file && $file['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if ($ext !== 'pdf') $errors[] = 'File harus berformat PDF';
        if ($file['size'] > 20 * 1024 * 1024) $errors[] = 'Ukuran file maksimal 20MB';
    }

    if (empty($errors)) {
        $newFileName = 'materi_' . time() . '_' . uniqid() . '.pdf';
        $destPath    = $uploadDir . $newFileName;
        $fileSize    = formatFileSize($file['size']);

        if (move_uploaded_file($file['tmp_name'], $destPath)) {
            $adminId  = (int)$_SESSION['admin_id'];
            $judulEsc = $conn->real_escape_string($judul);
            $katEsc   = $conn->real_escape_string($kategori);
            $descEsc  = $conn->real_escape_string($deskripsi);
            $sizeEsc  = $conn->real_escape_string($fileSize);

            $conn->query("INSERT INTO materi (judul, kategori, deskripsi, file, ukuran, admin_id) VALUES ('$judulEsc','$katEsc','$descEsc','$newFileName','$sizeEsc',$adminId)");
            $success = 'Materi berhasil diunggah!';
        } else {
            $errors[] = 'Gagal menyimpan file. Periksa izin folder uploads.';
        }
    }
}

// Fetch materi list
$materiList = $conn->query("SELECT m.*, a.nama as admin_nama FROM materi m LEFT JOIN admin a ON m.admin_id=a.id ORDER BY m.created_at DESC")->fetch_all(MYSQLI_ASSOC);

$pageTitle = 'Upload Materi';
include 'partials/header.php';
?>

<div class="row mb-4">
    <div class="col">
        <h4 style="font-weight:800;color:var(--gray-dark);margin:0">Upload Materi</h4>
        <p style="color:var(--gray-mid);font-size:13px;margin-top:4px">Unggah materi belajar dalam format PDF</p>
    </div>
</div>

<div class="row g-4">
    <!-- Upload Form -->
    <div class="col-lg-5">
        <div class="card-sl">
            <div class="card-sl-header">
                <div class="card-sl-title"><i class="bi bi-cloud-arrow-up-fill"></i> Form Upload Materi</div>
            </div>
            <div class="card-sl-body">
                <?php if ($success): ?>
                <div style="background:var(--tosca-xlight);border:1px solid var(--tosca-mid);border-radius:var(--radius-md);padding:12px 16px;margin-bottom:20px;display:flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:var(--tosca-dark)">
                    <i class="bi bi-check-circle-fill"></i> <?= $success ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($errors)): ?>
                <div style="background:#FFF0F0;border:1px solid #FFD5D5;border-radius:var(--radius-md);padding:12px 16px;margin-bottom:20px;font-size:13px;color:#C53030">
                    <strong><i class="bi bi-exclamation-circle-fill me-1"></i>Terjadi kesalahan:</strong>
                    <ul style="margin:6px 0 0;padding-left:16px">
                        <?php foreach($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form id="uploadForm" method="POST" enctype="multipart/form-data" class="form-sl">
                    <div class="form-group-sl">
                        <label>Judul Materi</label>
                        <input type="text" name="judul" class="input-sl" placeholder="Contoh: Matematika Kelas 10 Bab 1" required
                               value="<?= htmlspecialchars($_POST['judul'] ?? '') ?>">
                    </div>
                    <div class="form-group-sl">
                        <label>Kategori / Kelas</label>
                        <select name="kategori" class="input-sl" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php
                            $opts = ['kelas10'=>'Kelas 10','kelas11'=>'Kelas 11','kelas12'=>'Kelas 12'];
                            foreach($opts as $val=>$label):
                                $sel = (($_POST['kategori']??'')===$val)?'selected':'';
                            ?>
                            <option value="<?= $val ?>" <?= $sel ?>><?= $label ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group-sl">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="input-sl" rows="3" placeholder="Deskripsi singkat tentang materi ini..."><?= htmlspecialchars($_POST['deskripsi'] ?? '') ?></textarea>
                    </div>
                    <div class="form-group-sl">
                        <label>File PDF</label>
                        <div class="upload-zone" id="uploadZone">
                            <i class="bi bi-file-earmark-pdf"></i>
                            <p><strong>Klik untuk pilih</strong> atau drag & drop file PDF</p>
                            <p style="font-size:11px;margin-top:4px">Maksimal 20MB</p>
                        </div>
                        <div id="filePreview"></div>
                        <input type="file" name="file" id="fileInput" accept=".pdf" style="display:none" required>
                    </div>
                    <button type="submit" class="btn-tosca" style="width:100%;justify-content:center;padding:13px">
                        <i class="bi bi-cloud-upload-fill"></i> Upload Materi
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Materi List -->
    <div class="col-lg-7">
        <div class="card-sl">
            <div class="card-sl-header">
                <div class="card-sl-title"><i class="bi bi-collection-fill"></i> Daftar Materi (<?= count($materiList) ?>)</div>
            </div>
            <div class="card-sl-body" style="padding-top:16px">
                <?php if (empty($materiList)): ?>
                <div class="empty-state">
                    <i class="bi bi-folder2-open"></i>
                    <h5>Belum ada materi</h5>
                    <p>Upload materi pertamamu menggunakan form di samping</p>
                </div>
                <?php else: ?>
                <?php foreach ($materiList as $m): ?>
                <div class="materi-item" id="materi-<?= $m['id'] ?>">
                    <div class="materi-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                    <div class="materi-info">
                        <div class="materi-title"><?= htmlspecialchars($m['judul']) ?></div>
                        <div class="materi-meta">
                            <?php
                            $katLabel = ['kelas10'=>'Kelas 10','kelas11'=>'Kelas 11','kelas12'=>'Kelas 12'];
                            echo $katLabel[$m['kategori']] ?? $m['kategori'];
                            ?> · <?= $m['ukuran'] ?? '—' ?> · <?= formatDate($m['created_at']) ?>
                        </div>
                        <?php if ($m['deskripsi']): ?>
                        <div style="font-size:11px;color:var(--gray-mid);margin-top:2px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                            <?= htmlspecialchars(substr($m['deskripsi'],0,70)) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex gap-2 flex-shrink-0">
                        <a href="../../uploads/<?= urlencode($m['file']) ?>" target="_blank" class="btn-sm-approve" title="Lihat PDF">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <button class="btn-sm-delete" onclick="deleteMateri(<?= $m['id'] ?>)" title="Hapus">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
