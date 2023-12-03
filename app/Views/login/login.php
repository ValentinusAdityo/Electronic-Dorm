<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="apple-touch-icon-precomposed" href="images/d.png" />
    <link rel="icon" href="images/dreamkostlogo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;100&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            outline: none;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #0000, #3498db);
        }

        .login {
            width: 80%;
            height: 85vh;
            position: absolute;
            left: 50%;
            top: 50%;
            display: flex;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            background-color: #fff;
        }

        .main-login,
        .banner {
            width: 60%;
            height: 100%;
            flex: 1;
            padding: 50px;
            text-align: center;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
            background-color: aliceblue;
        }

        @media only screen and (max-width: 1000px) {
            .main-login {
                width: 100%;
                border-radius: 5px;
            }

            .banner {
                display: none;
            }

            .main-login h1 {
                font-size: 36px;
                font-weight: bold;
                color: #333;
            }

            .facebook {
                font-size: 13px;
            }
        }

        @media only screen and (max-width: 600px) {
            .login {
                width: 100%;
                height: 100%;
                margin-top: 25px;
            }

            .main-login {
                width: 100%;
                border-radius: 5px;
            }

            .banner {
                display: none;
            }

            .main-login h1 {
                font-size: 25px;
            }

            .facebook {
                font-size: 13px;
            }
        }

        .main-login h1 {
            color: #333;
            font-size: 35px;
            margin-bottom: 20px;
        }

        .put {
            max-width: 300px;
            width: 65%;
            height: 45px;
            color: #070708;
            background-color: rgb(234, 234, 234);
            outline: none;
            border-radius: 10px;
            margin: 0 auto;
            margin: 10px;
            padding-left: 10px;
            border: 2px solid transparent;
            transition: .4s;
        }

        .put:not(:placeholder-shown)>.sub {
            background-color: #55be9b;
            color: rgb(234, 234, 234);
        }

        .sub:hover {
            background-color: #55be9b;
            color: rgb(234, 234, 234);
        }

        .main-login .put:not(:placeholder-shown) {
            border-bottom: 2px solid #9336B4;
        }

        .sub {

            width: 65%;
            height: 40px;
            color: #fff;
            background-color: #3498db;
            outline: none;
            border-radius: 10px;
            margin: 0 auto;
            margin: 10px;
            border: 2px solid transparent;
            transition: .4s;
            cursor: pointer;
        }

        .main-login input::placeholder {
            color: #094067;
        }

        .pass {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
            font-size: 13px;
            color: #9336B4;
            text-decoration: none;
            display: flex;
            width: fit-content;
            margin-left: 20%;
        }

        .shw {
            position: absolute;
            border-radius: 10px;
            z-index: 2;
            border: none;
            cursor: pointer;
            color: #c0c0c0;
            background-color: transparent;
            transform: translateX(-60px) translateY(23px);
        }

        .banner {
            width: 40%;
            height: 100%;
            text-align: center;
            color: aliceblue;
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
            background-color: #3da9fc;
            /* background-color: rgb(255, 189, 127); */
        }

        .banner h4 {
            width: 70%;
            z-index: 100 !important;
            margin: 30 auto;
            font-family: 'Roboto', sans-serif;
        }

        .p-b {
            color: #e5e5e5;
            margin-bottom: 3px;
            font-family: 'Roboto', sans-serif;
        }

        .lines {
            margin-top: 25px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
        }

        .line {
            width: 60px;
            height: 1px;
            margin: 10px;
            background-color: #e5e5e5;
        }

        .pp {
            margin-top: 10px;
        }

        .contain {
            z-index: 100 !important;
            position: absolute;
        }

        .main-btn {
            width: 250px;
            padding: 10px;
            margin-top: 20px;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
            border: 2px solid #3498db;
            background-color: transparent;
            transition: background-color 0.4s, color 0.4s;
        }

        .main-btn:hover {

            background-color: #3da9fc;
        }

        .top {
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
        }

        .top button {
            margin: 5px;
            padding: 5px;
            cursor: pointer;
            transition: .6s;
            color: #3da9fc;
            background-color: transparent;
            border: 3px solid transparent;
            outline: none;
        }

        .top button:hover {
            border-bottom: 3px solid #094067;
        }

        .blob:nth-child(1) {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100px;
            height: 100px;
            z-index: 1;
            border-top-left-radius: 100%;
            background-color: #3f4c52;
        }

        .blob:nth-child(2) {
            position: absolute;
            top: 0;
            left: 0;
            width: 100px;
            height: 100px;
            z-index: 1;
            border-bottom-right-radius: 100%;
            background-color: #3f4c52;
        }

        #btn {
            background-color: #3da9fc;
            /* Mengubah warna latar belakang tombol menjadi biru */
            color: white;
            /* Mengubah warna teks tombol menjadi putih */
            /* Anda juga dapat menambahkan properti lain sesuai kebutuhan */
        }

        #btn:hover {

            background-color: #094067;
        }
    </style>
</head>

<body>
    <main class="login">
        <div class="main-login">
        <form action="/login/check" method="post" onsubmit="showLoading()">
                <?= csrf_field() ?>
                <h1>Halaman Login</h1>
                <input class="usr put" name="usr" placeholder="Username" type="text">
                <br>
                <input id="pass" name="pwd" class="pss put" placeholder="Password" type="password"><button id="bhde" onclick="show()" class="shw" type="button">show</button>
                <div id="loading" class="loading-spinner" style="display: none;"></div>
                <a class="pass" href="">Lupa Password</a>
                <input value="Masuk" id="btn" class="sub" type="submit" name="submit">
                <div class="lines">
                    <div style="background-color: #a5a5a5;" class="line"></div>
                    <p style="color: #a5a5a5;" class="p-b">Belum punya akun?</p>
                    <div style="background-color: #a5a5a5;" class="line"></div>

                </div>
                <button class="main-btn"> <a href="/register">Daftar Sekarang</a> </button>
        </div>
        </form>
        <div class="banner">
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="contain">
                <h1>Selamat Datang Sobat DreamKost!</h1>

                <h4>Kami senang melihat Anda datang kembali, Jangan lupa untuk pesan kamar impian Anda
                    karena kamar impian semua orang hanya ada di DreamKost tentunya!
                    Silahkan masuk ke akun Anda untuk melihat kamar dan melanjutkan pemesanan</h4>


            </div>
        </div>
    </main>
    <style>
        /* Add a rotating animation for the loading spinner */
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .button-container {
            position: relative;
            width: 100%;
            text-align: center;
        }

        .loading-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 6px solid rgba(255, 255, 255, 0.3);
            border-radius: 10%;
            border-top: 6px solid #3da9fc;
            width: 60px;
            height: 60px;
            animation: rotate 2s linear infinite;
            display: none;
        }
    </style>

    <script>
        function show() {
            var x = document.getElementById("pass");
            var y = document.getElementById("bhde");
            if (x.type === "password") {
                x.type = "text";
                y.innerText = "Hide";
            } else {
                x.type = "password";
                y.innerText = "Show";
            }
        }
    </script>
    <script>
        function showLoading() {
            // Display the loading animation
            var loadingElement = document.getElementById("loading");
            loadingElement.style.display = "block";

            // You can add additional logic here if needed

            // Hide the loading animation after a certain time (for example, 3 seconds)
            setTimeout(function () {
                loadingElement.style.display = "none";
            }, 3000);

            // Returning true to allow the form submission to proceed
            return true;
        }
    </script>
</body>

</html>