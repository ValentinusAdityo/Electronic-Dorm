<!DOCTYPE html>
<html lang="en">

<!-- =========== PAGE TITLE ========== -->
<div class="page_title" style="background: linear-gradient(45deg, rgba(9,64,103, 1),
              rgba(9,64,103, 1)), url(images/page_title_bg.jpg);">
    <div class="container">
        <div class="inner">
            <h1>Profilku</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>Profilku</li>
            </ol>
        </div>
    </div>
</div>

<body>
    <main class="main">

        <div class="content">
            <h1>Profil</h1>

            <div class="card">
                <div class="card-header">
                    <div style="display: flex; gap: 1em">
                        <a href="">Ganti foto</a>
                    </div>
                </div>

                <div class="card-body">
                    <?php
                    $avatar = $current_user->avatar ?
                        base_url('upload/avatar/' . $current_user->avatar)
                        : get_gravatar($current_user->email)
                    ?>
                    <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>" height="80" width="80">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <b>Profile Settings</b>
                    <a href="<?= site_url('admin/setting/edit_profile') ?>">Edit Profile</a>
                </div>
                <div class="card-body">
                    Name: <span class="text-gray"><?= html_escape($current_user->name) ?></span>
                    <br>
                    Email: <span class="text-gray"><?= html_escape($current_user->email) ?></span>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <b>Security & Password</b>
                    <a href="<?= site_url('admin/setting/edit_password') ?>">Edit Password</a>
                </div>
                <div class="card-body">
                    Your Password: <span class="text-gray">******</span>
                    <br>
                    Last Changed: <span class="text-gray">22-08-2020</span>
                </div>
            </div>

            <?php $this->load->view('admin/_partials/footer.php') ?>
        </div>
    </main>


    <?php if ($this->session->flashdata('message')) : ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('message') ?>'
            })
        </script>
    <?php endif ?>
</body>

</html>