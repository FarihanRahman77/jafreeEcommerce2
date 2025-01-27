<div class="modal modalCentered fade form-sign-in modal-part-content" id="login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">Admin Log in</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-login-form">
                    <form  method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                            <label class="tf-field-label" for="">Email *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="password"  name="password" required autocomplete="current-password">
                            <label class="tf-field-label" for="">Password *</label>
                        </div>
                        <!-- <div>
                            <a href="#forgotPassword" data-bs-toggle="modal" class="btn-link link">Forgot your password?</a>
                        </div> -->
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <label class="form-check-label" for="login-remember">Remember Me</label>
                        <div class="bottom"> 
                            <div class="w-100">
                                <button type="submit"  class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">
                                    <span>{{ __('Log in') }}</span>
                                </button>
                            </div>
                            <!-- <div class="w-100">
                                <a href="#register" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                    New customer? Create your account
                                    <i class="icon icon-arrow1-top-left"></i>
                                </a>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>