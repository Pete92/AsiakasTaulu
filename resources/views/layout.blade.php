<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

    <style>
        .input-user{
            width: 998px;
        }
        .linkki{
            text-decoration: none;
            color: green;
            margin-right: 1rem;
        }
        .fa-trash{
            color: red;
        }
        html,body {
            height: 100%;
        }
        .alert-danger{
            background-color: rgb(219, 135, 135);
            border: none;
            text-align: center;
            color: #fff;
        }
        .alert-success{
            background-color: rgb(76, 177, 76);
            border: none;
            text-align: center;
            color: #fff;
        }
        body {
        margin: 0;
        background: linear-gradient(45deg, #ADD8E6, #0080FF);
        font-family: sans-serif;
        font-weight: 100;
        }
        th,td,h3 {
            color: #fff;
        }
        @media screen and (max-width: 576px) {
            .input-user {
                width: 100%;
                margin: 0 5px;
            }
        }
        .table-wrapper {
            max-height: 500px;
            overflow: auto;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>