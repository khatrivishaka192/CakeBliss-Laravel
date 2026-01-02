<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cake Bliss — The sweetness of your happiness')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
@include('partials.header')



{{-- Page Content --}}
<main class="py-4">
    @yield('content')
</main>

{{-- Footer --}}
@include('partials.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        $("#liveSearch").keyup(function () {
            let query = $(this).val();

            if (query.length < 1) {
                $("#searchResultBox").hide();
                return;
            }

            $.ajax({


                url: "{{ route('ajax.search') }}",
                type: "GET",
                data: { query: query },
                success: function (data) {
                    let results = "";
                    if (data.length > 0) {
                        data.forEach(function(cake) {
                            results += `
            <a href="/cake/${cake.id}" class="list-group-item list-group-item-action">
                <strong>${cake.name}</strong><br>
                <small class="text-muted">${cake.description}</small>
            </a>
        `;
                        });
                    } else {
                        results = `<p class="text-muted text-center m-2">No results found</p>`;
                    }


                    $("#searchResultBox").html(results).show();
                }
            });
        });

        // hide dropdown when clicking outside
        $(document).click(function(e){
            if (!$(e.target).closest('#liveSearch').length) {
                $("#searchResultBox").hide();
            }
        });

    });
</script>


</body>
</html>
