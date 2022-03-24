<!doctype html>
<html lang="en">
<head>
	<title>Danh sách môn học</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  	<link rel="stylesheet" href="\WEB16305-PHP2\asm1\app\views\css\style.css">
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
                        @if ($list_quizs->isEmpty())
                            <h1>Hiện tại môn học này chưa có quiz</h1>
                        @else
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th>ID QUIZ</th>
                                        <th>TÊN QUIZ</th>
                                        <th>THỜI GIAN LÀM BÀI</th>
                                        <th>NGÀY BẮT ĐẦU</th>
                                        <th>NGÀY KẾT THÚC</th> 
                                        <th>TRẠNG THÁI</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_quizs as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->duration_minutes}} phút</td>
                                            <td>{{date('d-m-Y', strtotime($item->start_time))}}</td>
                                            <td>{{date('d-m-Y', strtotime($item->end_time))}}</td>
                                            <td>{{($item->status == 2) ? "Hiện" : "Ẩn"}}</td>
                                            <th><a href="{{BASE_URL . 'quiz/quiz-detail?id='.$item->id}}" class="btn btn-success">CHI TIẾT QUIZ</a></th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                        @endif
					</div>
				</div>
				</div>
			</div>
		</section>
  </div>
  	<?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2) { ?>
	   <?php include_once "./app/views/layout/modalSubject.php";?>
	   <script src="\WEB16305-PHP2\asm1\app\views\js\edit-subject.js"></script>
	<?php } ?>
	<?php include_once "./app/views/layout/link-js.php" ?>
</body>
</html>