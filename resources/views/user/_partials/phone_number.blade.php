<style>
    .phone-options-flagimg {
        height: 20px;
        width: auto;
        /* Ensure the aspect ratio is maintained */
    }
</style>


<div class="col-lg-6 mb-3">
    <label class="form-label">Phone Number</label>
    <input type="hidden" name="country_code" id="country_code" value="{{ $profileData->country_code }}">

    <div class="input-group" data-phone-input-flag="">
        {{-- <button class="btn btn-light border phone-dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img id="phone-flag-img" src="{{ asset('assets/images/flags/ng.svg') }}" alt="flag img" height="20"
                class="phone-country-flagimg rounded">
            <span class="ms-2 phone-country-codeno" id="selected-country-code">{{ $profileData->country_code }}</span>
        </button> --}}

        <input type="text" name="phone" class="form-control rounded-end phone-flag-input"
            value="{{ $profileData->phone }}" placeholder="Enter number"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
       
    </div>
</div>


<script>
    // Get the elements
    const countryList = document.getElementById('country-list');
    const phoneFlagImg = document.getElementById('phone-flag-img');
    const selectedCountryCode = document.getElementById('selected-country-code');
    const countryCodeInput = document.getElementById('country_code');

    // Add event listener to the country list
    countryList.addEventListener('click', function (e) {
        const clickedItem = e.target.closest('.phone-dropdown-item');
        if (clickedItem) {
            const flag = clickedItem.getAttribute('data-flag');
            const code = clickedItem.getAttribute('data-code');
            
            // Update the flag image source
            phoneFlagImg.src = `{{ asset('assets/images/flags/') }}/${flag}`;

            // Update the country code
            selectedCountryCode.textContent = code;
            countryCodeInput.value = code; // Update the hidden input value

            // Close the dropdown (optional)
            document.querySelector('.phone-dropdown-toggle').click(); 
        }
    });
</script>