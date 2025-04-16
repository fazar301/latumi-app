<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!--begin::Form-->
    <form class="form w-100" id="kt_password_reset_form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">Lupa Password ?</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">Masukkan alamat email anda untuk reset password</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="email" :value="old('email')" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent pink-focus" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <!--end::Email-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="submit" id="kt_password_reset_submit" class="btn text-white !bg-pink-500 hover:!bg-pink-600 me-4 ">
                <!--begin::Indicator label-->
                <span class="indicator-label">Submit</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
            <a href="/login" class="btn btn-light">Cancel</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</x-auth-layout>