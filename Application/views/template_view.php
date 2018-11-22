<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="js/main.js" type="text/javascript"></script>

    <!-- помои js -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


    <!-- подключение нужной версии jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <!-- подключение popper.js, необходимого для корректной работы некоторых плагинов Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <!-- подключение js-файла -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>   

    <script src="https://unpkg.com/vue"></script>   
    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>    

    <script src=' https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

    <meta charset="utf-8">

    <title><?= \Flint\Application\Core\View::$title ?></title>
</head>
<body>

    <div class="content">
        <?php require_once("../Application/views/{$contentView}") ?>
    </div>

</body>
</html>
