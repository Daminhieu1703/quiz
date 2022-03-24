<!doctype html>
<html lang="en">
  <head>
  	<title>Danh sách môn học</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  	<link rel="stylesheet" href="./app/views/css/style.css">
    <link rel="stylesheet" href="\WEB16305-PHP2\asm1\app\views\css\profile.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	</head>
	<body>
	
	<div class="page">
    @include('layout.sidebar')
    <section class="hero-wrap js-fullheight">
	      <div class="container px-0">
	        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-12 ftco-animate text-center">
	          	<div class="desc">
                  <div class="container-2">
                    <div class="card">
                      <div class="card-image"> 
                        <img src="<?=$user->avatar?>" alt=""> 
                      </div>
                        <div class="card-content d-flex flex-column align-items-center">
                          <h4 class="pt-2"><?=$user->name_user?></h4>
                            <h5><?=$user->email?></h5>
                              <ul class="social-icons d-flex justify-content-center">
                                @if ($_SESSION['user']->role_id == 2)
                                  <li style="--i:1"> <a href="{{BASE_URL . 'mon-hoc/detail-subjects'}}"> <i class="fas fa-history"></i> </a> </li> 
                                @endif
                                <li style="--i:2"> <button onclick="profile(this,'<?=$id_role?>','<?=$user->name_user?>','<?=$user->email?>','<?=$user->avatar?>','<?=$user->name_role?>','<?= BASE_URL . 'profile/edit'?>')"> <i class="fas fa-user"></i></button> </li>
                              </ul>
                        </div>
                    </div>
                    <div class="card-2">
                      <form id="form-edit-1" class="row g-3 needs-validation" novalidate action="<?=BASE_URL . 'profile/edit'?>" method="POST" enctype="multipart/form-data">
                          <div class="col-md-2">
                            <label for="validationCustom01" class="form-label">Mã tài khoản</label>
                            <input type="text" class="form-control" name="id" value="<?=$id_role ?>" readonly>
                          </div>
                          <div class="col-md-5">
                            <label for="validationCustom02" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="<?=$user->name_user?>">
                          </div>
                          <div class="col-md-5">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?=$user->email?>">
                          </div>
                          <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Thay ảnh đại diện</label>
                            <input type="file" class="form-control" name="avatar">
                            <input type="hidden" class="form-control" name="avatar_before" value="<?=$user->avatar?>">
                          </div>
                          <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Vai trò</label>
                            <input type="text" class="form-control" name="role_id" id="validationCustom06" value="<?=$user->name_role?>" readonly>
                          </div>
                          <div class="col-md-3" style="margin-top:53px;">
                            <button onclick="changePass(this,'<?=$id_role?>','<?= BASE_URL . 'profile/change-password'?>')" type="button" class="btn btn-primary">Thay đổi mật khẩu</button>
                          </div>
                          <div class="col-12" style="margin-top:53px;">
                            <button class="btn btn-success" type="submit">Sửa thông tin</button>
                          </div>
                        </form>
                    </div>
                  </div>
	            </div>
	          </div>
	        </div>
	      </div>
	</section>
  </div>
  <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2) { ?>
    <?php include_once "./app/views/layout/modalSubject.php"; ?>
    <script src="\WEB16305-PHP2\asm1\app\views\js\edit-subject.js"></script>
    <?php } ?>
    <script src="\WEB16305-PHP2\asm1\app\views\js\profile.js"></script>
    <?php include_once "./app/views/layout/link-js.php" ?>
	</body>
</html>