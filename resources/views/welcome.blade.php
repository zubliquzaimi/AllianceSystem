    <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

                <title>Alliance System</title>

                <style>
                    html, body 
                    {
                        background-color: #233040;
                        color: #636b6f;
                        font-family: 'Nunito', sans-serif;
                        font-weight: 200;
                        width: 100%;
                        height: 100%;
                        clip: auto;
                        position: absolute;
                        overflow: hidden;
                        margin: 0;
                    }

                    .div
                    {
                        overflow:hidden;
                    }

                    .full-height 
                    {
                        height: 100vh;
                    }

                    .flex-center 
                    {
                        align-items: center;
                        display: flex;
                        justify-content: center;
                    }

                    .position-ref 
                    {
                        position: relative;
                    }

                    .top-right 
                    {
                        position: absolute;
                        right: 10px;
                        top: 18px;
                    }

                    .content 
                    {
                        text-align: center;
                    }

                    .title 
                    {
                        font-size: 84px;
                    }

                    .links > a 
                    {
                        color: #636b6f;
                        padding: 0 25px;
                        font-size: 13px;
                        font-weight: 600;
                        letter-spacing: .1rem;
                        text-decoration: none;
                        text-transform: uppercase;
                    }

                    .m-b-md 
                    {
                        margin-bottom: 30px;
                    }

                    .landing-banner-title 
                    {
                        font-weight: 700;
                        font-size: 68px;
                        line-height: 68px;
                        font-family: Arial;
                        text-align: left;
                        padding-left: 150px;
                        padding-top: 200px;
                    }

                    .p-green 
                    {
                        color: #00a19c;
                    }

                    .left-side, .right-side 
                    {
                        height:40vh;
                        width: 100%;
                    }

                    .right-side 
                    {
                        padding-top: 225px;
                    }

                    .btn-outline-secondary 
                    {
                        width:200px;
                        color:#00a19c;
                        border-color:#00a19c;
                    }

                    .btn-outline-secondary:hover 
                    {
                        background-color: #394553;
                        border-color: #91989f;
                        color:#91989f;
                    }

                    @media screen and (min-width:760px)
                    {
                        .left-side, .right-side 
                        {
                            height:40vh;
                        }
                    }

                    .navbar-brand
                    {
                        position:fixed;
                        z-index:9999;
                        left:40px;
                        top:0px;
                        padding-top: 0px;
                    }

                    .navbar
                    {
                        min-height: 60px;
                        width: 100%;
                        color:#1E2835;
                    }

                    .bg-dark
                    {
                        background-color:#1b2530 !important;
                    }

                </style>
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand" href="/">
                        <img src="https://www.petronas.com/static/img/pet-logo-corp.jpg" class="shadow" width="66" height="79" alt="">
                    </a>
                </nav>
            </head>
            <body>
                <div class="row">
                    <div class="col md-6 no-gutters">
                        <div class="left-side landing-banner-title">
                            <span class="p-green">
                                PASSIONATE
                                <br>
                                ABOUT
                                <br>
                                PROGRESS
                            </span>
                        </div>
                    </div>
                    <div class="col md-6 no-gutters">
                        <div class="right-side landing-banner-title">
                            <a href="/login" class="btn btn-outline-secondary btn-lg">Login</a></br>
                            <a href="/register" class="btn btn-outline-secondary btn-lg">Register</a>
                        </div>
                    </div>
                </div>
            </body>
        </html>
    
