<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CARRENTAL</title>
        <link rel="stylesheet" href="maincss\style.css">
        <script src="https://kit.fontawesome.com/267db1472e.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <section class="banner" id="sec">
            <header>
                {{-- <a href="#" class="logo">Logo</a> --}}

                <h1>
                    <a href="#"><span>R</span></a>
                    <a href="#"><span>E</span></a>
                    <a href="#"><span>N</span></a>
                    <a href="#"><span>T</span></a>
                    <a href="#"><span>A</span></a>
                    <a href="#"><span>L</span></a>
                </h1>

                <div id="toggle" onclick="toggle()"></div>
            </header>

            <div class="content">
                <h2>WELCOME TO CARRENTAL, <br>Looking? <span class="typing">ZeanBae</span></h2>
                <p>SOLUTION FOR EVERYBODY SAFE OUR MONEY FOR THE TRAVEL</p>
                <a href="{{url('/to-ren')}}">RENTAL</a>
                <a href="{{route('backpack.auth.login')}}">CO_OPERATION</a>
            </div>

            <ul class="sci">
                <li><a href="#"><i class="fab fa-facebook-square" aria-hidden="true" id="fb"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram-square" aria-hidden="true" id="in"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-square" aria-hidden="true" id="gm"></i></a></li>
            </ul>
        </section>
        <div id="navigation">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <script type="text/javascript">
            function toggle(){
                var sec = document.getElementById('sec');
                var nav = document.getElementById('navigation');
                sec.classList.toggle('active');
                nav.classList.toggle('active');
            }
        </script>
        <script src="{{asset('js/app2.js')}}"></script>
    </body>
</html>
