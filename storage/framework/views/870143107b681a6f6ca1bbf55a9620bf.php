<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Peserta Baru - Baksos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            color: #1e40af; /* biru gelap */
        }
        /* Card utama */
        .card {
            width: 100%;
            max-width: 520px;
            background-color: #fff;
            border-radius: 16px;
            padding: 40px 35px;
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.3);
            transition: box-shadow 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.5);
        }
        h2 {
            color: #2563eb; /* biru cerah */
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            letter-spacing: 1.1px;
        }
        label {
            font-weight: 600;
            color: #1e40af;
        }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #93c5fd; /* biru muda */
            padding: 10px 12px;
            font-weight: 500;
            color: #1e40af;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control::placeholder {
            color: #bfdbfe;
            font-style: italic;
        }
        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 8px rgba(37, 99, 235, 0.5);
            background-color: #f0f9ff;
            color: #1e40af;
        }
        .btn-primary {
            width: 100%;
            padding: 14px;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 14px;
            background-color: #2563eb;
            border: none;
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
            transition: background-color 0.3s ease, transform 0.2s ease;
            color: white;
        }
        .btn-primary:hover {
            background-color: #1e40af;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.5);
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 25px;
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s ease;
        }
        .btn-back:hover {
            color: #1e40af;
            text-decoration: underline;
        }
        .invalid-feedback {
            font-size: 0.875rem;
            color: #dc2626;
            font-weight: 600;
        }
        .form-text {
            color: #3b82f6;
            font-weight: 500;
        }
        .alert ul {
            margin-bottom: 0;
            color: #2563eb;
        }
    </style>
</head>
<body>
    <main>
        <div class="card" role="main" aria-label="Form tambah peserta baru">
            <h2>Tambah Peserta Baru</h2>

            <a href="<?php echo e(route('participants.index')); ?>" class="btn-back" aria-label="Kembali ke daftar peserta">← Kembali ke Daftar</a>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" aria-live="polite">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger" role="alert" aria-live="assertive">
                    <strong>Terjadi kesalahan input data:</strong>
                    <ul class="mb-0 mt-2">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('participants.store')); ?>" method="POST" novalidate>
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Peserta</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        value="<?php echo e(old('name')); ?>" 
                        placeholder="Masukkan nama lengkap"
                        required 
                        autofocus 
                        aria-describedby="nameHelp"
                    />
                    <div id="nameHelp" class="form-text">Masukkan nama lengkap peserta.</div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input 
                        type="text" 
                        name="address" 
                        id="address" 
                        class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        value="<?php echo e(old('address')); ?>" 
                        placeholder="Masukkan alamat lengkap"
                        required
                        aria-describedby="addressHelp"
                    />
                    <div id="addressHelp" class="form-text">Masukkan alamat tempat tinggal peserta.</div>
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone" 
                        class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        value="<?php echo e(old('phone')); ?>" 
                        placeholder="Contoh: 081234567890" 
                        pattern="\d+" 
                        title="Hanya angka yang diperbolehkan" 
                        required
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        aria-describedby="phoneHelp"
                    />
                    <div id="phoneHelp" class="form-text">Hanya angka, tanpa spasi atau simbol.</div>
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Peserta</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp1\htdocs\pendaftaran-baksos\resources\views/participants/create.blade.php ENDPATH**/ ?>