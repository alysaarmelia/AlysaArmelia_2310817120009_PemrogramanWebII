<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpus Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('perpustakaan.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-blur {
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px); 
        }

        .overlay {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            background-color: rgba(0, 0, 0, 0.4);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 80px;
        }

        .container-menu {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            padding: 40px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-in-out;
        }

        .menu-card {
            transition: transform 0.3s, background-color 0.3s;
            cursor: pointer;
        }

        .menu-card:hover {
            background-color: #e7f0ff;
            transform: translateY(-5px);
        }

        .menu-title {
            font-size: 22px;
            margin: 10px 0;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">Perpustakaan Shasha</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="overlay">
            <div class="container-menu text-center">
                <h2 class="mb-4 fw-semibold">Selamat Datang di Perpustakaan Shasha</h2>

                <div class="row row-cols-1 g-3">
                    <div class="col">
                        <a href="Member.php" class="text-decoration-none text-dark">
                            <div class="card menu-card p-3">
                                <div class="menu-title">👤 Member</div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="Buku.php" class="text-decoration-none text-dark">
                            <div class="card menu-card p-3">
                                <div class="menu-title">📚 Buku</div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="Peminjaman.php" class="text-decoration-none text-dark">
                            <div class="card menu-card p-3">
                                <div class="menu-title">📄 Peminjaman</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>