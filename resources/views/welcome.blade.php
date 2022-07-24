<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Link Shortener</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        body {
            padding-top: 60px
        }

        .header {
            background: #373B44;
            background: -webkit-linear-gradient(to right, #4286f4, #373B44);
            background: linear-gradient(to right, #4286f4, #373B44);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <section>
        <div class="header">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('/home') }}"><b class="text-white">Link Shortener</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            {{-- <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li> --}}
                        </ul>
                        <a href="{{ route('logout') }}" class="btn btn-sm btn-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <b>{{ __('Logout') }}</b></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section>
        <div class="middle_section">
            <div class="container">


                <h3 class="text-center mt-3"><b>Link Shortener</b></h3>
                <form action="{{ url('generate/url') }}" method="POST" class="text-center">
                    @csrf
                    <input type="text" name="actual_url" class="form-control mb-2"
                        placeholder="Type/Paste the URL here">
                    <button type="submit" class="btn btn-success">Generate</button>
                </form>

                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Original URL</th>
                            <th scope="col">Generated URL</th>
                            <th scope="col">Visit</th>
                            <th scope="col">Copy</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{ $item->actual_url }}</td>
                                <td>http://127.0.0.1:8000/generated/{{ $item->generated_url }}</td>
                                <td>{{ $item->click }}</td>
                                <td>
                                    {{-- <a href="{{url('delete/url')}}/{{$item->id}}">Delete</a> --}}
                                    <a href="javascript:void(0)" data-toggle="tooltip"
                                        class="btn btn-info btn-sm rounded generateLink"
                                        data-id="{{ $item->generated_url }}">Copy</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script>
        $('body').on('click', '.generateLink', function() {
            var slug = $(this).data('id');
            navigator.clipboard.writeText(slug);
        });
    </script>

</body>

</html>
