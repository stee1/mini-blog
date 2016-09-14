<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-blog | Вася (12.43.12)</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--HEADER-->
<header id="header" class="container-fluid">
    <a href="index.php"><h1 class="text-center">mini-blog</h1></a>
</header>
<!--END HEADER-->

<!--CONTENT-->
<div class="content container-fluid">

    <!-- POPULAR RECORDS-->
    <div class="container">
        <p class="text-center form-caption">Популярные записи</p>
        <ul class="bxslider">
            <li>
                <p>Author 1 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 2 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 3 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 4 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>
            <li>
                <p>Author 5 (<span>12.45.12</span>)</p>

                <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores beatae
                    blanditiis consequa.</p>

                <p class="comments">Коментариев <span class="badge">4</span></p>
                <a href="record.php" class="pull-right">Читать полностью</a>
            </li>

        </ul>
    </div>
    <!-- END POPULAR RECORDS-->

    <!-- RECORD-->
    <div class="container">
        <p>Author (<span>12.45.12</span>)</p>

        <p class="record-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aperiam assumenda
            consectetur consequuntur deserunt dicta dignissimos doloremque doloribus dolorum ducimus id illo ipsum
            laboriosam minima modi non nostrum, nulla obcaecati officia officiis pariatur porro quo quod ratione
            sapiente soluta sunt temporibus veniam vero. Delectus dolor nam numquam pariatur porro.</p>

        <!-- COMMENTS-->
        <div class="comments-container">
            <p class="form-caption">Комментарии:</p>
            <ul class="list-unstyled">
                <li>
                    <p>Author (<span>12.45.12</span>):</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </li>
                <li>
                    <p>Author (<span>12.45.12</span>):</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </li>
                <li>
                    <p>Author (<span>12.45.12</span>):</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </li>
                <li>
                    <p>Author (<span>12.45.12</span>):</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </li>
            </ul>
        </div>
        <!-- END COMMENTS-->
    </div>
    <!-- END RECORD-->

    <!-- FORM NEW RECORD-->
    <div class="container">
        <p class="form-caption">Добавить комментарий</p>

        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputName" class="col-xs-1 control-label">Автор</label>

                <div class="col-xs-11">
                    <input type="text" class="form-control" id="inputName" placeholder="Имя">
                </div>
            </div>
            <div class="form-group">
                <label for="inputText" class="col-xs-1 control-label">Текст</label>

                <div class="col-xs-11">
                    <textarea id="inputText" class="form-control" rows="3" placeholder="Текст комментария"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right ">Отправить</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END FORM NEW RECORD-->
</div>
<!--END CONTENT-->

<!--FOOTER-->
<footer id="footer">
    <h3 class="text-center">2016 ©</h3>
</footer>
<!--END FOOTER-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>