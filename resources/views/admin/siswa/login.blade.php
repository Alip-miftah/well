<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login Akun</title>
</head>
<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7UvmrBMgcBcqZsHYrebr85Y968k2EslDRCA&s" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            Smk pertiwi kuningan
          </a>
        </div>
      </nav>

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-6 offset-md-4">
            <div class="card">
                <div class="card-body">
                    <label>LOGIN</label>
                    <hr>

                    <form id="loginForm">
                        @csrf <!-- Tambahkan ini untuk keamanan CSRF -->
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Alamat Email" required>
                        </div>
                        

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        </div>

                        <button type="submit" class="btn btn-login btn-block btn-success">LOGIN</button>
                    </form>

                </div>
            </div>

            <div class="text-center" style="margin-top: 15px">
            
                Belum punya akun? <a href="{{ route('register.index') }}">Silahkan Register</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {

        $("#loginForm").submit(function(event) {
            event.preventDefault(); // Menghentikan form agar tidak reload halaman

            var email = $("#email").val();
            var password = $("#password").val();
            var token = $("meta[name='csrf-token']").attr("content");

            if(email === "") {

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Alamat Email Wajib Diisi !'
                });

            } else if(password === "") {

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Password Wajib Diisi !'
                });

            } else {

                $.ajax({
                    url: "{{ route('login.check') }}", // Sesuaikan dengan route yang benar
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        email: email,
                        password: password,
                        _token: token
                    },
                    success:function(response){
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login Berhasil!',
                                text: 'Anda akan di arahkan dalam 3 Detik',
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false
                            }).then (function() {
                                window.location.href = "{{ route('siswa.tampil') }}";
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Gagal!',
                                text: 'Silahkan coba lagi!'
                            });
                        }
                    },
                    error:function(response){
                        Swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'Terjadi kesalahan pada server!'
                        });
                    }
                });
            }
        });

    });
</script>

</body>
</html>
