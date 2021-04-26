<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/error_page.css') }}" />

</head>

<body>
    <div class="wrapper">
        <div class="text_group">
            <p class="text_404">@yield('code')</p>
            <p class="text_lost">@yield('message')</p>
        </div>
        <div class="window_group">
            <div class="window_404">
                <div class="stars"></div>
            </div>
        </div>
    </div>
</body>
<script>
    let starContainer = document.querySelector(".stars");

    for (let i = 0; i < 100; i++) {
        starContainer.innerHTML += `<div class="star"></div>`;
    }

</script>

</html>
