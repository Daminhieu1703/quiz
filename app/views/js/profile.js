function profile(element,id,name,email,avatar,name_role,url) {
    document.querySelector(".card-2").innerHTML = ` <form id="form-edit-1" class="row g-3 needs-validation" novalidate action="`+url+`" method="POST" enctype="multipart/form-data">
    <div class="col-md-2">
      <label for="validationCustom01" class="form-label">Mã tài khoản</label>
      <input type="text" class="form-control" name="id" value="`+id+`" readonly>
    </div>
    <div class="col-md-5">
      <label for="validationCustom02" class="form-label">Họ và tên</label>
      <input type="text" class="form-control" name="name" value="`+name+`">
    </div>
    <div class="col-md-5">
      <label for="validationCustomUsername" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="`+email+`">
    </div>
    <div class="col-md-6">
      <label for="validationCustom03" class="form-label">Thay ảnh đại diện</label>
      <input type="file" class="form-control" name="avatar">
      <input type="hidden" class="form-control" name="avatar_before" value="`+avatar+`">
    </div>
    <div class="col-md-3">
      <label for="validationCustom05" class="form-label">Vai trò</label>
      <input type="text" class="form-control" name="role_id" id="validationCustom06" value="`+name_role+`" readonly>
    </div>
    <div class="col-md-3" style="margin-top:53px;">
      <button onclick="changePass()" type="button" class="btn btn-primary">Thay đổi mật khẩu</button>
    </div>
    <div class="col-12" style="margin-top:53px;">
      <button class="btn btn-success" type="submit">Sửa thông tin</button>
    </div>
  </form>`;
}
function showPass() {
    var x1 = document.querySelector("#pass_before");
    var x2 = document.querySelector("#pass_after");
    var x3 = document.querySelector("#pass_accuracy");
    if (x1.type === "password" && x2.type === "password" && x3.type === "password") {
      x1.type = "text";
      x2.type = "text";
      x3.type = "text";
    } else {
      x1.type = "password";
      x2.type = "password";
      x3.type = "password";
    }
}
function changePass(element,id,url) {
    document.getElementById("form-edit-1").style.display = "none";
    document.querySelector(".card-2").innerHTML = `<form id="form-edit" class="row g-3 needs-validation" novalidate action="`+url+`" method="POST">
                      <input type="hidden" name="id" value="`+id+`">
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Nhập mật khẩu cũ</label>
                        <input type="password" id="pass_before" class="form-control" name="pass_before">
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Mật khẩu mới</label>
                        <input type="password" id="pass_after" class="form-control" name="pass_after">
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustomUsername" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" id="pass_accuracy" class="form-control" name="pass_accuracy">
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required onclick="showPass()">
                          <label class="form-check-label" for="invalidCheck">Hiển thị mật khẩu</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-success" type="submit">Thay đổi</button>
                      </div>
                    </form>`;
}