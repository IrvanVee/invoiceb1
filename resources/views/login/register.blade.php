@extends('../layout/' . $layout)

@section('head')
    <title>Register - B One</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/LOGO B1  White.png') }}">
                    <span class="text-white text-lg ml-3">
                        B <span class="font-medium">One</span>
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br> create your own account.</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500"></div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign Up</h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to create your own account.</div>
                    <div class="intro-x mt-8">
                        <form id="register-form" action="/register" method="POST">
                            @csrf
                            <input name="name" type="text" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Your Name">
                            {{-- <div id="error-username" class="login__input-error w-5/6 text-theme-6 mt-2"></div> --}}
                            @error('name')
                            <div style="color: red;">nama tidak boleh kosong</div>
                            @enderror
                            <input name="email" type="email" class="intro-x login__input form-control py-3 mt-3 mb-3 px-4 border-gray-300 block" placeholder="Email">
                            @error('email')
                            <div style="color: red;">email tidak boleh kosong</div>
                            @enderror
                            <input name="password" type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password">
                            @error('password')
                            <div style="color: red;">password tidak boleh kosong</div>
                            @enderror
                            {{-- <input id="confirm-password" name="password" type="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Confirm Password">
                            <div id="error-confirm-password" class="login__input-error w-5/6 text-theme-6 mt-2"></div> --}}
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button id="btn-register" type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                                <a href="login" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Cancel</a></a></a>
                            </div>
                        </form>
                    </div>
                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                        By signin up, you agree to our <br> <a class="text-theme-1 dark:text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="">Privacy Policy</a>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>    
@endsection

@section('script')
    <script>
        cash(function () {
            async function register() {
                // Reset state
                cash('#register-form').find('.login__input').removeClass('border-theme-6')
                cash('#register-form').find('.login__input-error').html('')

                // Post form
                let email = cash('#email').val()
                let password = cash('#password').val()
                let rememberMe = cash('#remember-me').val()
                
                // Loading state
                cash('#btn-register').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()
                await helper.delay(1500)
                // end loading state
            }

            cash('#register-form').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    register()
                }
            })
            
            cash('#btn-register').on('click', function() {
                register()
            })
        })
    </script>
@endsection