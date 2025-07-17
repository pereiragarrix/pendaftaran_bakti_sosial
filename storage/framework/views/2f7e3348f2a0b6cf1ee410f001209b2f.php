<!-- resources/views/participants/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Peserta Baksos</title>
    <style>
        /* gunakan style original yang sudah kamu miliki */
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, sans-serif; }
        body { margin: 0; background: #f4f6f9; color: #333; }
        header { background: #1e3a8a; color: white; text-align: center; padding: 2rem 1rem; font-size: 2rem; font-weight: bold; letter-spacing: 1px; box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3); }
        .container { max-width: 1100px; margin: 3rem auto; background: white; padding: 2.5rem; border-radius: 15px; box-shadow: 0 6px 25px rgba(0,0,0,0.08); }
        .btn-add { background-color: #1e40af; color: white; padding: 12px 28px; border-radius: 8px; font-size: 1rem; font-weight: bold; text-decoration: none; display: inline-block; margin-bottom: 1.8rem; transition: background 0.3s ease, transform 0.2s ease; }
        .btn-add:hover { background-color: #1c3aa9; transform: translateY(-2px); }
        table { width: 100%; border-collapse: collapse; }
        thead th { background: #e0e7ff; color: #1e3a8a; text-align: left; padding: 14px; font-weight: 600; border-bottom: 3px solid #1e40af; }
        tbody td { padding: 14px; border-bottom: 1px solid #e5e7eb; color: #4b5563; }
        tbody tr:hover { background-color: #f1f5f9; transition: background-color 0.3s ease; }
        .action-buttons { display: flex; gap: 10px; }
        .action-buttons a, .action-buttons button { color: #1e40af; font-weight: 600; text-decoration: none; padding: 6px 10px; border-radius: 6px; transition: background-color 0.2s ease; }
        .action-buttons a:hover { background-color: #e0e7ff; }
        .action-buttons button { background: none; border: none; cursor: pointer; color: #dc2626; }
        .action-buttons button:hover { background-color: #fee2e2; }
        .empty-row { text-align: center; padding: 2rem; color: #6b7280; font-size: 1rem; }
        .pagination { margin-top: 1.5rem; text-align: center; }
        .pagination .page-link { display: inline-block; padding: 8px 12px; margin: 0 4px; border-radius: 6px; background: #e0e7ff; color: #1e3a8a; text-decoration: none; }
        .pagination .page-link:hover { background: #c7d2fe; }
        .pagination .active span { background: #1e3a8a; color: white; }
        @media (max-width: 768px) {
            thead { display: none; }
            tbody tr { display: block; margin-bottom: 1rem; background: #f9fafb; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); }
            tbody td { display: flex; justify-content: space-between; padding: 12px 16px; border-bottom: 1px solid #eee; }
            tbody td::before { content: attr(data-label); font-weight: 600; color: #1e40af; }
            .action-buttons { flex-direction: column; align-items: flex-start; gap: 6px; }
        }
    </style>
</head>
<body>
    <header>Daftar Peserta Baksos</header>
    <div class="container">
        <a href="<?php echo e(route('participants.create')); ?>" class="btn-add">+ Tambah Peserta</a>

        <!-- Form Pencarian -->
        <form method="GET" action="<?php echo e(route('participants.index')); ?>" style="margin-bottom: 1.5rem;">
            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                placeholder="Cari nama, alamat, atau telepon..."
                style="padding: 10px 15px; border: 1px solid #ccc; border-radius: 8px; width: 250px; max-width: 100%;"
            >
            <button
                type="submit"
                style="background-color: #1e40af; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-weight: 600; cursor: pointer;"
            >
                🔍 Cari
            </button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td data-label="No."><?php echo e(($participants->currentPage() - 1) * $participants->perPage() + $loop->iteration); ?></td>
                    <td data-label="Nama"><?php echo e($participant->name); ?></td>
                    <td data-label="Alamat"><?php echo e($participant->address); ?></td>
                    <td data-label="No. Telepon"><?php echo e($participant->phone); ?></td>
                    <td data-label="Aksi" class="action-buttons">
                        <a href="<?php echo e(route('participants.show', $participant->id)); ?>">👁️ Lihat</a>
                        <a href="<?php echo e(route('participants.edit', $participant->id)); ?>">✏️ Edit</a>
                        <form action="<?php echo e(route('participants.destroy', $participant->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus peserta ini?')">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="empty-row">Belum ada peserta yang terdaftar.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php echo e($participants->withQueryString()->links()); ?>

        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp1\htdocs\pendaftaran-baksos\resources\views/participants/index.blade.php ENDPATH**/ ?>