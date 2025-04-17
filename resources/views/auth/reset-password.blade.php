<x-auth-layout>
    <!--begin::Form-->
<form class="form w-100" id="kt_new_password_form" method="POST" action="{{ route('password.store') }}">
    @csrf
    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <x-text-input id="email" class="block mt-1 w-full" type="hidden" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />

    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">Buat Password Baru</h1>
        <!--end::Title-->
        <!--begin::Link-->
        <div class="text-gray-500 fw-semibold fs-6">Sudah mereset password ? 
        <a href="/login" class="text-pink-500 fw-bold">Login</a></div>
        <!--end::Link-->
    </div>
    <!--begin::Heading-->
    <!--begin::Input group-->
    <div class="fv-row mb-8" data-kt-password-meter="true">
        <!--begin::Wrapper-->
        <div class="mb-1">
            <!--begin::Input wrapper-->
            <div class="position-relative mb-3">
                <input class="form-control bg-transparent pink-focus" id="password" type="password" placeholder="Password" name="password" autocomplete="off" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                    <i class="ki-duotone ki-eye fs-2 d-none">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <!--end::Input wrapper-->
            <!--begin::Meter-->
            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary rounded h-5px me-2 password-indicator"></div>
                <div class="flex-grow-1 bg-secondary rounded h-5px me-2 password-indicator"></div>
                <div class="flex-grow-1 bg-secondary rounded h-5px me-2 password-indicator"></div>
                <div class="flex-grow-1 bg-secondary rounded h-5px password-indicator"></div>
            </div>
            <!--end::Meter-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Hint-->
        <div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka & simbol.</div>
        <!--end::Hint-->
    </div>
    <!--end::Input group=-->
    <!--end::Input group=-->
    <div class="fv-row mb-8">
        <!--begin::Repeat Password-->
        <input type="password" placeholder="Konfirmasi Password" name="password_confirmation" autocomplete="off" class="form-control bg-transparent pink-focus" />
        <!--end::Repeat Password-->
    </div>
    <!--end::Input group=-->
    <!--begin::Action-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_new_password_submit" class="btn text-white !bg-pink-500 hover:!bg-pink-600 me-4 " disabled>
            <!--begin::Indicator label-->
            <span class="indicator-label">Submit</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait... 
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
    </div>
    <!--end::Action-->
</form>
<!--end::Form-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const btnSubmit = document.querySelector('#kt_new_password_submit');
            // Get password input and indicators
            const passwordInput = document.getElementById('password');
            const indicators = document.querySelectorAll('.password-indicator');
        
        
            // Password strength checker
            passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Check length
            if (password.length >= 8) {
                strength += 1;
            }
            
            // Check for lowercase and uppercase
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
                strength += 1;
            }
            
            // Check for numbers
            if (password.match(/[0-9]/)) {
                strength += 1;
            }
            
            // Check for special characters
            if (password.match(/[^a-zA-Z0-9]/)) {
                strength += 1;
            }
            
            // Reset all indicators
            indicators.forEach(indicator => {
                indicator.classList.remove('bg-danger', 'bg-warning', 'bg-success');
                indicator.classList.add('bg-secondary');
            });
            
            // Set active indicators based on strength
            for (let i = 0; i < strength; i++) {
                indicators[i].classList.remove('bg-secondary');
                
                // Set color based on strength level
                if (strength <= 2) {
                    // Red for weak passwords (1-2 indicators)
                    indicators[i].classList.add('bg-danger');
                    btnSubmit.disabled = true;
                } else if (strength === 3) {
                    // Yellow for medium passwords (3 indicators)
                    indicators[i].classList.add('bg-warning');
                    btnSubmit.disabled = true;
                } else {
                    // Green for strong passwords (4 indicators)
                    indicators[i].classList.add('bg-success');
                    btnSubmit.disabled = false;
                }
            }
            });
        });
</script>
</x-auth-layout>