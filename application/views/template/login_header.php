<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $title; ?>
    </title>

    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1a07ed5a89.js" crossorigin="anonymous"></script>
    <link href="<?php echo base_url('style') ?>" rel="stylesheet">
</head>

<body>
    <style>
        .button {
            color: black;
            padding: 10px 50px;
            border-radius: 6px;
            background: #f875aa;
            transition: all 0.2 ease;
            font-family: "montserrat";
            border: none;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: box-shadow, transform;
            transition-property: box-shadow, transform;
        }


        .btn:hover,
        .btn:focus,
        .button:active {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            -webkit-transform: scale(0.96);
            transform: scale(0.96);
        }

        .font_poppins {
            font-family: 'Lato', sans-serif;
            font-family: 'Poppins', sans-serif;
        }

        .link {

            color: #f875aa;
            cursor: pointer;
        }

        .link:hover {
            color: black;
            transition-duration: 0.3s;
        }


        .gradient-custom {
            /* fallback for old browsers */
            background-image: url('<?= base_url("assets_2/img/login_gradient_background.jpg"); ?>');

        }
    </style>

    <section class="vh-100 gradient-custom">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-black shadow-lg" style="border-radius: 1rem; background-color: #ffffff ; ">
                        <div class="card-body p-5 text-center ">