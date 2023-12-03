<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <form action="process_login.php" method="post">
        <div class="page">
            <div class="container">
                <div class="left">
                    <div class="login">Login</div>
                    <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to
                        read</div>
                </div>
                <div class="right">
                    <svg viewBox="0 0 320 300">
                        <defs>
                            <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992"
                                x2="307" y2="193.49992" gradientUnits="userSpaceOnUse">
                                <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
                                <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
                            </linearGradient>
                        </defs>
                        <path
                            d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                    </svg>
                    <div class="form">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>

                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <input type="submit" id="submit" value="Submit">
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script>
            var currentAnimation = null;

            document.querySelector('#username').addEventListener('focus', function () {
                handleAnimation(0, 700, 'easeOutQuart');
            });

            document.querySelector('#password').addEventListener('focus', function () {
                handleAnimation(-336, 700, 'easeOutQuart');
            });

            document.querySelector('#submit').addEventListener('focus', function () {
                handleAnimation(-730, 700, 'easeOutQuart');
            });

            function handleAnimation(offset, duration, easing) {
                if (currentAnimation) currentAnimation.pause();
                currentAnimation = anime({
                    targets: 'path',
                    strokeDashoffset: {
                        value: offset,
                        duration: duration,
                        easing: easing
                    },
                    strokeDasharray: {
                        value: '240 1386',
                        duration: duration,
                        easing: easing
                    }
                });
            }
        </script>
</body>

</html>