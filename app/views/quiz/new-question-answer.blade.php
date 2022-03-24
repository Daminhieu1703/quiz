<!doctype html>
<html lang="en">
<head>
  <title>Danh sách môn học</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="\WEB16305-PHP2\asm1\app\views\css\style.css">
  <link rel="stylesheet" href="\WEB16305-PHP2\asm1\app\views\css\new-question-answer.css">
</head>
<body>
  <div class="page">
    @include('layout.sidebar')
    <section class="hero-wrap js-fullheight">
      <div class="container px-0">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate text-center">
            <div class="desc">
              <div class="container mt-5">
                <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-md-6">
                    <form action="{{ BASE_URL . 'quiz/luu-tao-moi-cau-hoi?id=' . $_GET['id'] }}" id="regForm" method="post">
                      <h5>Câu hỏi - Đáp án</h5>
                      <div class="all-steps" id="all-steps"><span class="step"></span><span class="step"></span></div>
                      <input type="hidden" name="question_id">
                      <input type="hidden" name="answer_id">
                      <input type="hidden" name="img_question">
                      <div class="tab">
                        Câu hỏi
                        <p><input placeholder="Điền cầu hỏi vào đây" name="name" id="" cols="30" rows="1" oninput="this.className = ''"></p>
                        <p><select name="quiz_id">
                            @foreach ($quiz as $key)
                              <option value="<?= $key->id ?>"><?= $key->name ?></option>
                            @endforeach
                          </select></p>
                      </div>
                      <div class="tab">
                        Đáp án
                        <div class="group-input-select">
                          <p><input type="text" placeholder="Đáp án 1" oninput="this.className = ''" name="content1"></p>
                          <p><select name="is_correct1" id="selects">
                              <option value="1">Sai</option>
                              <option value="2">Đúng</option>
                            </select></p>
                        </div>
                        <div class="group-input-select">
                          <p><input type="text" placeholder="Đáp án 2" oninput="this.className = ''" name="content2"></p>
                          <p><select name="is_correct2" id="selects">
                              <option value="1">Sai</option>
                              <option value="2">Đúng</option>
                            </select></p>
                        </div>
                        <div class="group-input-select">
                          <p><input type="text" placeholder="Đáp án 3" oninput="this.className = ''" name="content3"></p>
                          <p><select name="is_correct3" id="selects">
                              <option value="1">Sai</option>
                              <option value="2">Đúng</option>
                            </select></p>
                        </div>
                        <div class="group-input-select">
                          <p><input type="text" placeholder="Đáp án 4" oninput="this.className = ''" name="content4"></p>
                          <p><select name="is_correct4" id="selects">
                              <option value="1">Sai</option>
                              <option value="2">Đúng</option>
                            </select></p>
                        </div>
                      </div>
                      <div class="tab"></div>
                      <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Trở lại</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Tiếp</button> </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2) { ?>
    <?php include_once "./app/views/layout/modalSubject.php";?>
    <script src="\WEB16305-PHP2\asm1\app\views\js\edit-subject.js"></script>
    <script src="\WEB16305-PHP2\asm1\app\views\js\new-quiz.js"></script>
  <?php } ?>
  <?php include_once "./app/views/layout/link-js.php" ?>
</body>

</html>