<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!--begin::Form-->
<form class="form w-100" method="POST" action="{{ route('login') }}" data-kt-redirect-url="/dashboard">
    @csrf
    <!--begin::Heading-->
    <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">Login</h1>
        <!--end::Title-->
        <!--begin::Subtitle-->
        <div class="text-gray-500 fw-semibold fs-6">Login melalui akun google anda</div>
        <!--end::Subtitle=-->
    </div>
    <!--begin::Heading-->
    <!--begin::Login options-->
    <div class="row g-3 mb-9">
        <!--begin::Col-->
        <div class="col-md-12">
            <!--begin::Google link=-->
            <a href="{{ route('oauth.google') }}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
            <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Sign in with Google</a>
            <!--end::Google link=-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Login options-->
    <!--begin::Separator-->
    <div class="separator separator-content my-14">
        <span class="w-250px text-gray-500 fw-semibold fs-7">Atau dengan email</span>
    </div>
    <!--end::Separator-->
    <!--begin::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Email-->
        <x-text-input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" id="email" :value="old('email')" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <!--end::Email-->
    </div>
    <!--end::Input group=-->
    <div class="fv-row mb-3">
        <!--begin::Password-->
        <x-text-input type="password" placeholder="Password" name="password" id="password" autocomplete="off" class="form-control bg-transparent" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <!--end::Password-->
    </div>
    <!--end::Input group=-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <!--begin::Link-->
        <a href="authentication/layouts/corporate/reset-password.html" class="link-primary">Lupa Password ?</a>
        <!--end::Link-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Login</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    <!--end::Submit button-->
    <!--begin::Sign up-->
    <div class="text-gray-500 text-center fw-semibold fs-6">Belum memiliki akun? 
    <a href="register" class="link-primary">Register</a></div>
    <!--end::Sign up-->
</form>
<!--end::Form-->
</x-auth-layout>