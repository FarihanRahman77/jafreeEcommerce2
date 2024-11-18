 <x-guest-layout>

     <section>
         <div class="block">
             <div class=" container container-fluid vh-100 d-flex justify-content-center align-items-center">

                 <div class="col-md-6 d-flex">
                     <div class="card flex-grow-1 mb-md-0">
                         <div class="card-body">
                             <h3 class="card-title">Login</h3>
                             <x-auth-session-status class="mb-4" :status="session('status')" />
                             <form method="POST" action="{{ route('login') }}">
                                 @csrf
                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                 </div>
                                 <div class="form-group">
                                     <label>Password</label>
                                     <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                                 </div>
                                 <div class="d-none flex items-center justify-end mt-4">
                                     @if (Route::has('password.request'))
                                     <small
                                     class="form-text text-muted"> <a  href="{{ route('password.request') }}">
                                         {{ __('Forgotten  password?') }}
                                     </a></small>
                                     @endif


                                 </div>
                                 <div class="form-group">
                                     <div class="form-check"><span class="form-check-input input-check"><span
                                                 class="input-check__body">
                                                 <input class="input-check__input" type="checkbox" id="login-remember">
                                                 <!-- <span class="input-check__box"></span>  -->
                                                 <svg class="input-check__icon" width="9px" height="7px">
                                                     <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                 </svg>
                                             </span></span>
                                         <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                         <label class="form-check-label" for="login-remember">Remember Me</label>

                                     </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary mt-4">
                                     {{ __('Log in') }}
                                 </button>

                             </form>
                         </div>
                     </div>
                 </div>


             </div>
         </div>
     </section>
 </x-guest-layout>