<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Edit Peserta Baksos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #c5d9f1, #e8effa);
            margin: 0;
            min-height: 100vh;
            padding: 30px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #2c3e50;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        form {
            max-width: 460px;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            padding: 40px 35px;
            box-shadow: 0 14px 28px rgba(30, 64, 155, 0.25);
            transition: box-shadow 0.3s ease;
        }
        form:hover {
            box-shadow: 0 20px 40px rgba(30, 64, 155, 0.4);
        }
        h1 {
            text-align: center;
            color: #1e409b;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 30px;
            letter-spacing: 1.2px;
            text-shadow: 0 1px 3px rgba(30, 64, 155, 0.4);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #163d7a;
            font-size: 1rem;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 22px;
            font-size: 1.05rem;
            border: 1.8px solid #a3b7e6;
            border-radius: 10px;
            color: #34495e;
            background-color: #fff;
            transition: border-color 0.3s ease, background-color 0.3s ease;
            box-sizing: border-box;
            font-family: inherit;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #1e409b;
            outline: none;
            background-color: #e6ecfc;
        }
        textarea {
            resize: vertical;
            min-height: 90px;
        }
        button {
            width: 100%;
            background-color: #1e409b;
            color: #fff;
            border: none;
            padding: 16px 0;
            border-radius: 14px;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(30, 64, 155, 0.38);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
            font-family: inherit;
        }
        button:hover {
            background-color: #163d7a;
            box-shadow: 0 10px 28px rgba(22, 61, 122, 0.6);
        }
        .error-message {
            background-color: #f8d7da;
            color: #842029;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 28px;
            border: 1.5px solid #f5c2c7;
            box-shadow: inset 0 1px 4px rgba(255,255,255,0.5);
            font-size: 0.95rem;
            line-height: 1.4;
        }
        .error-message ul {
            margin: 0;
            padding-left: 20px;
        }
        a {
            display: block;
            text-align: center;
            margin: 32px 0 0;
            color: #2563eb;
            font-weight: 600;
            font-size: 1.05rem;
            text-decoration: none;
            transition: color 0.25s ease;
            user-select: none;
        }
        a:hover {
            color: #1e40af;
            text-decoration: underline;
        }
        @media (max-width: 480px) {
            form {
                padding: 30px 25px;
                margin: 0 12px;
            }
            h1 {
                font-size: 1.7rem;
                margin-bottom: 24px;
            }
            input[type="text"], textarea {
                font-size: 1rem;
                padding: 12px 14px;
                margin-bottom: 18px;
            }
            button {
                font-size: 1rem;
                padding: 14px 0;
            }
            a {
                font-size: 1rem;
                margin-top: 24px;
            }
        }
    </style>
</head>
<body>
    <form action="<?php echo e(route('participants.update', $participant->id)); ?>" method="POST" aria-label="Form edit peserta baksos" novalidate>
        <h1>Edit Peserta Baksos</h1>

        <?php if($errors->any()): ?>
            <div class="error-message" role="alert" aria-live="assertive">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>- <?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?php echo e(old('name', $participant->name)); ?>" required aria-required="true" autocomplete="name">

        <label for="address">Alamat:</label>
        <textarea id="address" name="address" rows="3" required aria-required="true" autocomplete="street-address"><?php echo e(old('address', $participant->address)); ?></textarea>

        <label for="phone">Telepon:</label>
        <input type="text" id="phone" name="phone" value="<?php echo e(old('phone', $participant->phone)); ?>" required aria-required="true" autocomplete="tel">

        <button type="submit">Update</button>

        <a href="<?php echo e(route('participants.index')); ?>" aria-label="Kembali ke Daftar Peserta">Kembali ke Daftar Peserta</a>
    </form>
</body>
</html>
<?php /**PATH C:\xampp1\htdocs\pendaftaran-baksos\resources\views/participants/edit.blade.php ENDPATH**/ ?>