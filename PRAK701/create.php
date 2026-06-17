<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        
        form, .table-container {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 600px; 
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
            display: inline-block;
        }
        input[type="text"], 
        input[type="password"], 
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, 
        input[type="password"]:focus, 
        input[type="number"]:focus {
            border-color: #4dabf7;
            outline: none;
        }

        button {
            background-color: #4dabf7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.1s;
        }
        button:hover {
            background-color: #3b8fd9;
        }
        button:active {
            transform: translateY(1px);
        }
        
        a {
            text-decoration: none;
            color: #4dabf7;
            font-weight: 500;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }

        .alert {
            background-color: #ffe3e3;
            color: #c92a2a;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid #ffa8a8;
        }
    </style>
</head>
<body>
    <h2>Tambah Data Buku</h2>
    
    <?php if (session()->has('errors')): ?>
        <div class="alert">
            <ul style="margin: 0; padding-left: 20px;">
                <?php foreach (session('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/buku/store" method="post">
        <label>Judul:</label>
        <input type="text" name="judul" value="<?= old('judul') ?>">

        <label>Penulis:</label>
        <input type="text" name="penulis" value="<?= old('penulis') ?>">

        <label>Penerbit:</label>
        <input type="text" name="penerbit" value="<?= old('penerbit') ?>">

        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" value="<?= old('tahun_terbit') ?>">

        <div style="margin-top: 10px;">
            <button type="submit">Simpan</button>
            <a href="/buku" style="margin-left: 15px;">Kembali</a>
        </div>
    </form>
</body>
</html>