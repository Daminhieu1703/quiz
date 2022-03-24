<nav id="colorlib-main-nav" role="navigation">
      <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
      <div class="js-fullheight colorlib-table">
        <div class="img" style="background-image: url(images/bg_3.jpg);"></div>
        <div class="colorlib-table-cell js-fullheight">
          <div class="row no-gutters">
            <div class="col-md-12 text-center">
              <h1 class="mb-4"><a href="index.html" class="logo">Danh sách môn học</a></h1>
                <ul>
                  @foreach ($monhoc as $key)
                    <li><a href="{{ BASE_URL . "quiz?id=".$key->id }}"><span><?= $key->name ?></span></a>
                    @if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2)
                      <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="edit(this, '{{ BASE_URL . 'mon-hoc/luu-cap-nhat?id=' . $key->id }}')" href="{{ BASE_URL . 'mon-hoc/cap-nhat'}}"><i class="fas fa-edit"></i></a> 
                      <a class="btn btn-danger" href="{{ BASE_URL . 'mon-hoc/xoa?id='.$key->id }}"><i class="fas fa-trash-alt"></i></a>
                    @endif
                    </li>
                    <br>
                  @endforeach
                  @if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2)
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="btn btn-primary"><i class="fas fa-plus-square"></i></span></li>
                  @endif
                </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <div id="colorlib-page">
      <header>
      	<div class="container">
	        <div class="colorlib-navbar-brand">
	          <a class="colorlib-logo" href="<?= BASE_URL . 'mon-hoc' ?>">Study Quiz</a>
	        </div>
	        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
          <div class="flex-shrink-0 dropdown colorlib-nav-toggle">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= $_SESSION['user']->avatar?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="<?= BASE_URL . 'profile'?>">Thông tin</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= BASE_URL . 'logout'?>">Đăng xuất</a></li>
          </ul>
        </div>
        </div>
      </header>
    </div>