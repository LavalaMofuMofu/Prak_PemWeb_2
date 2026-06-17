<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
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
            max-width: 800px; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
        }
        tr:hover {
            background-color: #fdfdfd;
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
        
        a.btn-delete {
            color: #fa5252;
        }
        a.btn-delete:hover {
            color: #e03131;
        }

        .menu-atas {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f4f7f6;
        }
    </style>
</head>
<body>
    <h2>Daftar Buku</h2>
    
    <div class="table-container">
        
        <div class="menu-atas">
            <a href="/buku/create">Tambah Buku</a> | 
            <a href="/auth/logout">Logout</a>
        </div>
        
        <table>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            <?php foreach($buku as $b): ?>
            <tr>
                <td><?= $b['judul'] ?></td>
                <td><?= $b['penulis'] ?></td>
                <td><?= $b['penerbit'] ?></td>
                <td><?= $b['tahun_terbit'] ?></td>
                <td>
                    <a href="/buku/edit/<?= $b['id'] ?>">Edit</a> | 
                    <a href="/buku/delete/<?= $b['id'] ?>" class="btn-delete" onclick="return confirm('Yakin hapus?')">Delete</a>                
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        
    </div>
</body>
</html>