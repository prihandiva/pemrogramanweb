<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: ');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Siska-Polinema</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        body {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
        }

        .user-type-button {
            background-color: #2D1B6B;
        }

        .user-type-button.active {
            background-color: #2685F5;
        }

        .user-type-button:hover {
            background-color: #2685F5;
        }

        .user-type-button:focus {
            background-color: #2685F5;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="script.js"></script>
</head>

<body>
    <main class="grid grid-cols-2 h-screen">
        <div class="left bg-[#130B2d] py-20 ps-20 relative">
            <div class="rotate-[-179.604deg] h-full content-end" style="
            background: radial-gradient(
              83.74% 78.33% at 12.67% 80.29%,
              rgba(114, 102, 156, 0.25) 33.6%,
              rgba(0, 0, 0, 0.06) 100%
            );"></div>
            <div class="absolute bottom-0">
                <div class="px-10 mb-32 text-white">
                    <h1 class="text-5xl mb-2">Selamat Datang</h1>
                    <p class="text-xl text-wrap w-3/4">
                        Sistem Survey Kepuasan Politeknik Negeri Malang
                    </p>
                </div>
            </div>
        </div>
        <div class="right bg-white py-20 pe-20">
            <div class="bg-white h-full" style="box-shadow: 0px 4px 150px 11px rgba(0, 0, 0, 0.25)">
                <!--RIGHT-->
                <div class="mx-20 pt-10">
                    <div class="flex items-center gap-4 mb-2">
                        <img src="aset/lambang-polinema1.png" class="w-20">
                        <div>
                            <h1 class="font-bold text-xl">SISKA-POLINEMA</h1>
                            <p class="text-xs">Selamat Datang! Silahkan Masukkan Detail Akun Anda.</p>
                        </div>
                    </div>

                    <div class="flex flex-col mb-2">
                        <h1 class="text-center mb-4">Login Sebagai</h1>
                        <form action="LoginProses.php" method="post">
                            <input type="hidden" name="user_type" id="user_type">
                            <input type="hidden" name="user_status" id="user_type">
                            <ul class="grid grid-cols-4 gap-3 text-center text-sm">
                                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl user-type-button Mahasiswa cursor-pointer" onclick="selectUserType('Mahasiswa')" value="Mahasiswa">
                                    <h1>Mahasiswa</h1>
                                </li>
                                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl user-type-button Dosen cursor-pointer" onclick="selectUserType('Dosen')" value="Dosen">
                                    <h1>Dosen</h1>
                                </li>
                                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl user-type-button Alumni cursor-pointer" onclick="selectUserType('Alumni')">
                                    <h1>Alumni</h1>
                                </li>
                                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl user-type-button Mitra cursor-pointer" onclick="selectUserType('Mitra')">
                                    <h1>Mitra</h1>
                                </li>
                                <li class="px-5 py-2 bg-[#2D1B6B] font-bold text-white rounded-xl user-type-button Admin cursor-pointer" onclick="selectUserType('Admin')">
                                    <h1>Admin</h1>
                                </li>
                                <li class="px py-2 bg-[#2D1B6B] font-bold text-white rounded-xl user-type-button Wali-Mahasiswa cursor-pointer" onclick="selectUserType('Wali-Mahasiswa')">
                                    <h1 class="text-nowrap text-sm">Wali Mahasiswa</h1>
                                </li>
                                <li class="px py-2 bg-[#2D1B6B] font-bold text-white rounded-xl text-nowrap user-type-button Tenaga-Pendidikan cursor-pointer" onclick="selectUserType('Tenaga-Pendidikan')">
                                    <h1 class="text-nowrap text-sm">Tenaga Pendidikan</h1>
                                </li>
                            </ul>
                    </div>


                    <div class="mb-2">
                        <div class="container mt-4">
                            <div class="form">
                                <div class="input-group mb-2">
                                    <input type="username" placeholder="Username" name="username" class="w-full h-10 border px-4 rounded-lg text-sm ">
                                </div>
                                <!--PASSWORD-->
                                <div class="input-group mb-4">
                                    <input type="password" placeholder="Enter Password" name="password" class="w-full h-10 border px-4 rounded-lg text-sm">
                                </div>
                                <div class="w-full text-end">
                                    <a href="adminNum.html">
                                        <p class="text-xs text-blue-600">Forgot password?</p>
                                    </a>
                                </div>
                                <div class=" bg-[#2D1B6B] w-full py-2 text-center rounded-md mt-4">
                                    <button type="submit">
                                        <h1 class="text-white text font-bold">Sign in
                                    </button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs text-center mt-10">Dont have an account? <a class="text-blue-600" href="register.php">Create New Account</a> </p>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="script.js"></script>
</body>

</html>