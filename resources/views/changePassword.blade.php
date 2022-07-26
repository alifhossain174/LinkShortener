<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Link Shortener</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{url('css')}}/all.min.css">

    <style>
        body {
            padding-top: 100px;
            background-color: #eee;
        }

        .header {
            background: #373B44;
            background: -webkit-linear-gradient(to right, #4286f4, #373B44);
            background: linear-gradient(to right, #4286f4, #373B44);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 99;
        }

        footer {
            background: #373B44;
            background: -webkit-linear-gradient(to right, #4286f4, #373B44);
            background: linear-gradient(to right, #4286f4, #373B44);
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .card-header {
            background: #373B44;
            background: -webkit-linear-gradient(to right, #4286f4, #373B44);
            background: linear-gradient(to right, #4286f4, #373B44);
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #242f3f;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
        }

        .loader-inner {
            vertical-align: top;
            display: inline-block;
            width: 100%;
            background-color: #fff;
            animation: loader-inner 2s infinite ease-in;
        }

        @keyframes loader {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(180deg);
            }

            50% {
                transform: rotate(180deg);
            }

            75% {
                transform: rotate(360deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes loader-inner {
            0% {
                height: 0%;
            }

            25% {
                height: 0%;
            }

            50% {
                height: 100%;
            }

            75% {
                height: 100%;
            }

            100% {
                height: 0%;
            }
        }
    </style>
</head>

<body>


    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <section>
        <div class="header">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{ url('/') }}/images/logo.jpg"
                            style="width: 80px !important"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color: white; font-size: 28px;"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            {{-- <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li> --}}
                        </ul>
                        <a class="nav-link text-white" style="padding-left: 0px" href="{{ url('/home') }}">Home</a>
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
                <div class="card mt-4">
                    <div class="card-header">
                        <b class="text-white">Change Password</b>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('password/change') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $userInfo->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $userInfo->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="text" name="password" class="form-control"
                                            placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="text" name="new_password" class="form-control"
                                            placeholder="New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button type="submit" class="btn btn-primary rounded">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                <div class="col-lg-6 text-white text-center text-lg-left">
                    All Rights Reserved &copy; @php echo date("Y") @endphp
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <a href="http://www.facebook.com/gstl.tech" class="text-white">Developed By Genesis Software &
                        Technology
                        Ltd.</a>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="{{url('js')}}/c218529370.js"></script>

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").delay(2000).fadeOut("slow");
        });
    </script>

</body>

</html>
