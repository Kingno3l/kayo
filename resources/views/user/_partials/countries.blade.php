<style>
    .selected-item-africa {
        display: flex;
        align-items: center;
        width: 100%;
        height: 35px;
    }

    .selected-item-africa img {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        display: none;
        /* Initially hidden */
    }

    .selected-item-africa input {
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #ddd;
        cursor: pointer;
    }

    .select-items-africa {
        position: absolute;
        background-color: white;
        width: 100%;
        border: 1px solid #ddd;
        cursor: pointer;
        display: none;
        z-index: 1;
        max-height: 200px;
        overflow-y: auto;
    }

    .select-items-africa div {
        padding: 10px;
        display: flex;
        align-items: center;
    }

    .select-items-africa div:hover {
        background-color: #f1f1f1;
    }

    .select-items-africa div img {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }
</style>


<!-- Hidden inputs to store the country name and code -->
<input type="hidden" name="country" id="selected-country" value="{{ old('country', $profileData->country) }}">
<input type="hidden" name="country_code" id="selected-country-code" value="{{ old('country_code', $profileData->country_code) }}">

<div class="custom-select-africa mb-3 col-lg-6">
    <label for="Countries">Country</label>
    <div class="selected-item-africa">
        <img src="" alt="Selected Flag" id="selected-flag-africa">
        <input type="text" placeholder="Search countries..." id="search-input-africa" class="form-control country-form">
    </div>
    <div class="select-items-africa">
        <div onclick="selectCountry('dz', 'Algeria')">
            <img src="{{ asset('assets/images/flags/dz.svg') }}" alt="Algeria Flag"> Algeria
        </div>
        <div onclick="selectCountry('ao', 'Angola')">
            <img src="{{ asset('assets/images/flags/ao.svg') }}" alt="Angola Flag"> Angola
        </div>
        <div onclick="selectCountry('bj', 'Benin')">
            <img src="{{ asset('assets/images/flags/bj.svg') }}" alt="Benin Flag"> Benin
        </div>
        <div onclick="selectCountry('bw', 'Botswana')">
            <img src="{{ asset('assets/images/flags/bw.svg') }}" alt="Botswana Flag"> Botswana
        </div>
        <div onclick="selectCountry('bf', 'Burkina Faso')">
            <img src="{{ asset('assets/images/flags/bf.svg') }}" alt="Burkina Faso Flag"> Burkina Faso
        </div>
        <div onclick="selectCountry('bi', 'Burundi')">
            <img src="{{ asset('assets/images/flags/bi.svg') }}" alt="Burundi Flag"> Burundi
        </div>
        <div onclick="selectCountry('cm', 'Cameroon')">
            <img src="{{ asset('assets/images/flags/cm.svg') }}" alt="Cameroon Flag"> Cameroon
        </div>
        <div onclick="selectCountry('cv', 'Cape Verde')">
            <img src="{{ asset('assets/images/flags/cv.svg') }}" alt="Cape Verde Flag"> Cape Verde
        </div>
        <div onclick="selectCountry('cf', 'Central African Republic')">
            <img src="{{ asset('assets/images/flags/cf.svg') }}" alt="Central African Republic Flag"> Central African Republic
        </div>
        <div onclick="selectCountry('td', 'Chad')">
            <img src="{{ asset('assets/images/flags/td.svg') }}" alt="Chad Flag"> Chad
        </div>
        <div onclick="selectCountry('km', 'Comoros')">
            <img src="{{ asset('assets/images/flags/km.svg') }}" alt="Comoros Flag"> Comoros
        </div>
        <div onclick="selectCountry('cg', 'Congo')">
            <img src="{{ asset('assets/images/flags/cg.svg') }}" alt="Congo Flag"> Congo
        </div>
        <div onclick="selectCountry('cd', 'DR Congo')">
            <img src="{{ asset('assets/images/flags/cd.svg') }}" alt="DR Congo Flag"> DR Congo
        </div>
        <div onclick="selectCountry('dj', 'Djibouti')">
            <img src="{{ asset('assets/images/flags/dj.svg') }}" alt="Djibouti Flag"> Djibouti
        </div>
        <div onclick="selectCountry('eg', 'Egypt')">
            <img src="{{ asset('assets/images/flags/eg.svg') }}" alt="Egypt Flag"> Egypt
        </div>
        <div onclick="selectCountry('gq', 'Equatorial Guinea')">
            <img src="{{ asset('assets/images/flags/gq.svg') }}" alt="Equatorial Guinea Flag"> Equatorial Guinea
        </div>
        <div onclick="selectCountry('er', 'Eritrea')">
            <img src="{{ asset('assets/images/flags/er.svg') }}" alt="Eritrea Flag"> Eritrea
        </div>
        <div onclick="selectCountry('et', 'Ethiopia')">
            <img src="{{ asset('assets/images/flags/et.svg') }}" alt="Ethiopia Flag"> Ethiopia
        </div>
        <div onclick="selectCountry('ga', 'Gabon')">
            <img src="{{ asset('assets/images/flags/ga.svg') }}" alt="Gabon Flag"> Gabon
        </div>
        <div onclick="selectCountry('gm', 'Gambia')">
            <img src="{{ asset('assets/images/flags/gm.svg') }}" alt="Gambia Flag"> Gambia
        </div>
        <div onclick="selectCountry('gh', 'Ghana')">
            <img src="{{ asset('assets/images/flags/gh.svg') }}" alt="Ghana Flag"> Ghana
        </div>
        <div onclick="selectCountry('gn', 'Guinea')">
            <img src="{{ asset('assets/images/flags/gn.svg') }}" alt="Guinea Flag"> Guinea
        </div>
        <div onclick="selectCountry('gw', 'Guinea-Bissau')">
            <img src="{{ asset('assets/images/flags/gw.svg') }}" alt="Guinea-Bissau Flag"> Guinea-Bissau
        </div>
        <div onclick="selectCountry('ci', 'Ivory Coast')">
            <img src="{{ asset('assets/images/flags/ci.svg') }}" alt="Ivory Coast Flag"> Ivory Coast
        </div>
        <div onclick="selectCountry('ke', 'Kenya')">
            <img src="{{ asset('assets/images/flags/ke.svg') }}" alt="Kenya Flag"> Kenya
        </div>
        <div onclick="selectCountry('ls', 'Lesotho')">
            <img src="{{ asset('assets/images/flags/ls.svg') }}" alt="Lesotho Flag"> Lesotho
        </div>
        <div onclick="selectCountry('lr', 'Liberia')">
            <img src="{{ asset('assets/images/flags/lr.svg') }}" alt="Liberia Flag"> Liberia
        </div>
        <div onclick="selectCountry('ly', 'Libya')">
            <img src="{{ asset('assets/images/flags/ly.svg') }}" alt="Libya Flag"> Libya
        </div>
        <div onclick="selectCountry('mg', 'Madagascar')">
            <img src="{{ asset('assets/images/flags/mg.svg') }}" alt="Madagascar Flag"> Madagascar
        </div>
        <div onclick="selectCountry('mw', 'Malawi')">
            <img src="{{ asset('assets/images/flags/mw.svg') }}" alt="Malawi Flag"> Malawi
        </div>
        <div onclick="selectCountry('ml', 'Mali')">
            <img src="{{ asset('assets/images/flags/ml.svg') }}" alt="Mali Flag"> Mali
        </div>
        <div onclick="selectCountry('mr', 'Mauritania')">
            <img src="{{ asset('assets/images/flags/mr.svg') }}" alt="Mauritania Flag"> Mauritania
        </div>
        <div onclick="selectCountry('mu', 'Mauritius')">
            <img src="{{ asset('assets/images/flags/mu.svg') }}" alt="Mauritius Flag"> Mauritius
        </div>
        <div onclick="selectCountry('ma', 'Morocco')">
            <img src="{{ asset('assets/images/flags/ma.svg') }}" alt="Morocco Flag"> Morocco
        </div>
        <div onclick="selectCountry('mz', 'Mozambique')">
            <img src="{{ asset('assets/images/flags/mz.svg') }}" alt="Mozambique Flag"> Mozambique
        </div>
        <div onclick="selectCountry('na', 'Namibia')">
            <img src="{{ asset('assets/images/flags/na.svg') }}" alt="Namibia Flag"> Namibia
        </div>
        <div onclick="selectCountry('ne', 'Niger')">
            <img src="{{ asset('assets/images/flags/ne.svg') }}" alt="Niger Flag"> Niger
        </div>
        <div onclick="selectCountry('ng', 'Nigeria')">
            <img src="{{ asset('assets/images/flags/ng.svg') }}" alt="Nigeria Flag"> Nigeria
        </div>
        <div onclick="selectCountry('rw', 'Rwanda')">
            <img src="{{ asset('assets/images/flags/rw.svg') }}" alt="Rwanda Flag"> Rwanda
        </div>
        <div onclick="selectCountry('st', 'Sao Tome and Principe')">
            <img src="{{ asset('assets/images/flags/st.svg') }}" alt="Sao Tome and Principe Flag"> Sao Tome and Principe
        </div>
        <div onclick="selectCountry('sn', 'Senegal')">
            <img src="{{ asset('assets/images/flags/sn.svg') }}" alt="Senegal Flag"> Senegal
        </div>
        <div onclick="selectCountry('sc', 'Seychelles')">
            <img src="{{ asset('assets/images/flags/sc.svg') }}" alt="Seychelles Flag"> Seychelles
        </div>
        <div onclick="selectCountry('sl', 'Sierra Leone')">
            <img src="{{ asset('assets/images/flags/sl.svg') }}" alt="Sierra Leone Flag"> Sierra Leone
        </div>
        <div onclick="selectCountry('so', 'Somalia')">
            <img src="{{ asset('assets/images/flags/so.svg') }}" alt="Somalia Flag"> Somalia
        </div>
        <div onclick="selectCountry('za', 'South Africa')">
            <img src="{{ asset('assets/images/flags/za.svg') }}" alt="South Africa Flag"> South Africa
        </div>
        <div onclick="selectCountry('ss', 'South Sudan')">
            <img src="{{ asset('assets/images/flags/ss.svg') }}" alt="South Sudan Flag"> South Sudan
        </div>
        <div onclick="selectCountry('sd', 'Sudan')">
            <img src="{{ asset('assets/images/flags/sd.svg') }}" alt="Sudan Flag"> Sudan
        </div>
        <div onclick="selectCountry('sz', 'Eswatini')">
            <img src="{{ asset('assets/images/flags/sz.svg') }}" alt="Eswatini Flag"> Eswatini
        </div>
        <div onclick="selectCountry('tz', 'Tanzania')">
            <img src="{{ asset('assets/images/flags/tz.svg') }}" alt="Tanzania Flag"> Tanzania
        </div>
        <div onclick="selectCountry('tg', 'Togo')">
            <img src="{{ asset('assets/images/flags/tg.svg') }}" alt="Togo Flag"> Togo
        </div>
        <div onclick="selectCountry('tn', 'Tunisia')">
            <img src="{{ asset('assets/images/flags/tn.svg') }}" alt="Tunisia Flag"> Tunisia
        </div>
        <div onclick="selectCountry('ug', 'Uganda')">
            <img src="{{ asset('assets/images/flags/ug.svg') }}" alt="Uganda Flag"> Uganda
        </div>
        <div onclick="selectCountry('zm', 'Zambia')">
            <img src="{{ asset('assets/images/flags/zm.svg') }}" alt="Zambia Flag"> Zambia
        </div>
        <div onclick="selectCountry('zw', 'Zimbabwe')">
            <img src="{{ asset('assets/images/flags/zw.svg') }}" alt="Zimbabwe Flag"> Zimbabwe
        </div>
    </div>

</div>

<script>
    const selectedItemAfrica = document.querySelector('.selected-item-africa input');
    const selectItemsAfrica = document.querySelector('.select-items-africa');
    const optionsAfrica = document.querySelectorAll('.select-items-africa div');
    const selectedFlagAfrica = document.getElementById('selected-flag-africa');

    // Function to pre-fill the selected country and flag when the page loads
    function loadSelectedCountry() {
        const countryName = document.getElementById('selected-country').value;
        const countryCode = document.getElementById('selected-country-code').value;

        if (countryName && countryCode) {
            selectCountry(countryCode, countryName); // Pre-fill the input and flag if a country is already selected
        }
    }

    // Function to select a country and update the input field and hidden inputs
    function selectCountry(countryCode, countryName) {
        // Update the flag image
        document.getElementById('selected-flag-africa').src = '/assets/images/flags/' + countryCode + '.svg';
        document.getElementById('selected-flag-africa').style.display = 'inline'; // Show the flag

        // Update the input field with the selected country's name
        document.getElementById('search-input-africa').value = countryName;

        // Update hidden inputs with the selected country name and code
        document.getElementById('selected-country').value = countryName;
        document.getElementById('selected-country-code').value = countryCode;

        // Hide the dropdown after selection
        selectItemsAfrica.style.display = 'none';
    }

    // Show options when clicking on input
    selectedItemAfrica.addEventListener('click', () => {
        selectItemsAfrica.style.display = 'block';
    });

    // Filter options based on input
    selectedItemAfrica.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        optionsAfrica.forEach(option => {
            const text = option.textContent.toLowerCase();
            if (text.includes(filter)) {
                option.style.display = 'flex'; // Show option if it matches the input
            } else {
                option.style.display = 'none'; // Hide option if it doesn't match
            }
        });
    });

    // Select an option when clicked
    selectItemsAfrica.addEventListener('click', (e) => {
        const target = e.target.closest('div');
        if (target) {
            const countryCode = target.getAttribute('onclick').match(/'(\w+)'/)[1]; // Extract country code
            const countryName = target.textContent.trim();

            // Update the input field and flag
            selectCountry(countryCode, countryName);
        }
    });

    // Load the selected country on page load if available
    window.onload = function() {
        loadSelectedCountry();
    };
</script>
