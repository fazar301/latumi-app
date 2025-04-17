<x-auth-layout>
    <!--begin::Form-->
    <form class="form w-100" id="kt_sign_up_form" method="POST" action="{{ route('register') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">Buat akun</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Daftar melalui akun google anda</div>
            <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        <!--begin::Login options-->
        <div class="row g-3 mb-9">
            <!--begin::Col-->
            <div class="col-md-12">
                <!--begin::Google link=-->
                <a href="{{ route('oauth.google') }}" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100 border-2">
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
            <!--begin::Name-->
            <x-text-input id="name" class="form-control bg-transparent pink-focus" placeholder="Nama" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <!--end::Name-->
        </div>
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <x-text-input id="email" placeholder="Email" class="form-control bg-transparent pink-focus" type="email" name="email" :value="old('email')" required autocomplete="email"  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <!--end::Email-->
        </div>
        <div class="fv-row mb-8">
            <div class="flex items-center">
                <button id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 border-2" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 me-2" style="padding-top: 1px"><path fill="#fff" d="0H4V4H0z"/><path fill="red" d="M0 0H90V6H0z"/></svg>
                +62 
                </button>
                <label for="phone-input" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Phone number:</label>
                <div class="relative w-full">
                    <input type="text" name="noHP" value="{{ old('noHP') ? substr(str_replace('+62', '', old('noHP')), 0, 3) . '-' . substr(str_replace('+62', '', old('noHP')), 3, 4) . '-' . substr(str_replace('+62', '', old('noHP')), 7, 4) : '' }}" id="phone-input" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 pink-focus border-2" style="border-left:0!important" pattern="\d{3}-\d{4}-\d{4}" placeholder="812-3456-7890" required />
                </div>
            </div>
            <x-input-error :messages="$errors->get('noHP')" class="mt-2" />
        </div>
        <!--begin::Input group-->
<div class="fv-row mb-8" data-kt-password-meter="true">
    <!--begin::Wrapper-->
    <div class="mb-1">
        <!--begin::Input wrapper-->
        <div class="position-relative mb-3">
            <x-text-input id="password" placeholder="Password" type="password" name="password" class="pink-focus" required autocomplete="new-password" />
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
            <x-text-input id="password_confirmation" placeholder="Konfirmasi Password" name="password_confirmation" class="pink-focus" type="password" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <!--end::Repeat Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Accept-->
        {{-- <div class="fv-row mb-8">
            <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the 
                <a href="#" class="ms-1 link-primary">Terms</a></span>
            </label>
        </div> --}}
        <!--end::Accept-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_up_submit" class="btn !bg-pink-500 hover:!bg-pink-600 !border-pink-500 !text-white" disabled>
                <!--begin::Indicator label-->
                <span class="indicator-label">Register</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait... 
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">Sudah memiliki akun? 
        <a href="/login" class="text-pink-500 hover:text-pink-600 !important fw-semibold">Login</a></div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->

    {{-- Custom Javascript Buat Menambah karakter - otomatis ketika user input noHP --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnRegister = document.querySelector('#kt_sign_up_submit');
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
                    btnRegister.disabled = true;
                } else if (strength === 3) {
                    // Yellow for medium passwords (3 indicators)
                    indicators[i].classList.add('bg-warning');
                    btnRegister.disabled = true;
                } else {
                    // Green for strong passwords (4 indicators)
                    indicators[i].classList.add('bg-success');
                    btnRegister.disabled = false;
                }
            }
            });
        });

        const phoneInput = document.getElementById('phone-input');
      
        // Format tampilan hyphen (3-4-4 atau 4-4-4)
        phoneInput.addEventListener('input', function(e) {
          // Hapus semua hyphen sebelumnya & karakter non-digit
          let value = this.value.replace(/[^0-9]/g, '');
          let formattedValue = value;

            // Cek apakah input dimulai dengan angka ngasal (tidak valid)
            if(!phoneInput.value.match(/^(08|8)/)){
                this.value = ''; // Ubah value nya menjadi string kosong jika awalan input tidak valid selain angka(8)
                return;
            }   
      
          // Format 3-4-4 jika dimulai dengan '8' (bukan '08')
          if (value.startsWith('8') && !value.startsWith('08')) {
            if (value.length > 3) {
              formattedValue = value.substring(0, 3) + '-' + value.substring(3);
            }
            if (value.length > 7) {
              formattedValue = formattedValue.substring(0, 8) + '-' + formattedValue.substring(8, 12);
            }
          } 
          // Format 4-4-4 jika dimulai dengan '08'
          else if (value.startsWith('08')) {
            if (value.length > 4) {
              formattedValue = value.substring(0, 4) + '-' + value.substring(4);
            }
            if (value.length > 8) {
              formattedValue = formattedValue.substring(0, 9) + '-' + formattedValue.substring(9, 13);
            }
          }
      
          this.value = formattedValue;
        });
      
        // Proses sebelum submit: hapus hyphen & konversi ke +62 jika perlu
        document.querySelector('form').addEventListener('submit', function(e) {
          const rawNumber = phoneInput.value.replace(/-/g, '');
          let formattedNumber = rawNumber;

            // Konversi ke format internasional
            if(rawNumber.startsWith('08')){
                formattedNumber = '+628' + rawNumber.substring(2);
            } else if(rawNumber.startsWith('8')){
                formattedNumber = '+62' + rawNumber;
            }
      
            // Simpan nilai akhir ke input tersembunyi
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'noHP';
            hiddenInput.value = formattedNumber;
            this.appendChild(hiddenInput);
        
            // Nonaktifkan input asli (opsional)
            phoneInput.disabled = true;
        });
      </script>
      {{-- End of Custom Javascript --}}
</x-auth-layout>