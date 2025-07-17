<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Detail Peserta Baksos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
            min-height: 100vh;
            margin: 0;
            padding: 25px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #1e40af;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .container {
            max-width: 460px;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            padding: 40px 35px;
            box-shadow: 0 10px 28px rgba(59, 130, 246, 0.25);
            transition: box-shadow 0.3s ease;
            text-align: left;
        }
        .container:hover {
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
        }
        h2 {
            color: #2563eb;
            font-weight: 700;
            font-size: 2.1rem;
            margin-bottom: 30px;
            letter-spacing: 1.2px;
            text-align: center;
            text-shadow: 0 1px 4px rgba(37, 99, 235, 0.5);
        }
        p {
            font-size: 1.2rem;
            line-height: 1.7;
            margin: 20px 0;
            padding: 14px 20px;
            border-left: 6px solid #2563eb;
            background-color: #eff6ff;
            color: #1e40af;
            border-radius: 10px;
            box-shadow: inset 0 -1px 6px rgba(37, 99, 235, 0.1);
            user-select: text;
            transition: background-color 0.3s ease;
        }
        p strong {
            color: #1e40af;
            font-weight: 700;
        }
        p:hover {
            background-color: #dbeafe;
        }
        a.button-back {
            display: block;
            margin-top: 40px;
            padding: 16px 0;
            background-color: #2563eb;
            color: white;
            text-align: center;
            font-weight: 700;
            border-radius: 14px;
            box-shadow: 0 8px 18px rgba(37, 99, 235, 0.4);
            text-decoration: none;
            font-size: 1.1rem;
            user-select: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.15s ease;
        }
        a.button-back:hover,
        a.button-back:focus {
            background-color: #1e40af;
            box-shadow: 0 12px 28px rgba(30, 64, 175, 0.6);
            outline: none;
            transform: translateY(-2px);
            text-decoration: none;
        }
        a.button-back:active {
            transform: translateY(0);
            box-shadow: 0 6px 14px rgba(30, 64, 175, 0.4);
        }
        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 0 12px;
            }
            h2 {
                font-size: 1.75rem;
                margin-bottom: 24px;
            }
            p {
                font-size: 1rem;
                padding: 12px 16px;
                border-left-width: 5px;
                border-radius: 8px;
                margin: 16px 0;
            }
            a.button-back {
                padding: 14px 0;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <main class="container" role="main" aria-labelledby="title-detail-peserta">
        <h2 id="title-detail-peserta">Detail Peserta Baksos</h2>

        <p><strong>Nama:</strong> <?php echo e($participant->name); ?></p>
        <p><strong>Alamat:</strong> <?php echo e($participant->address); ?></p>
        <p><strong>Telepon:</strong> <?php echo e($participant->phone); ?></p>

        <a href="<?php echo e(route('participants.index')); ?>" class="button-back" aria-label="Kembali ke Daftar Peserta">Kembali ke Daftar Peserta</a>
    </main>
</body>
</html>
<?php /**PATH C:\xampp1\htdocs\pendaftaran-baksos\resources\views/participants/show.blade.php ENDPATH**/ ?>