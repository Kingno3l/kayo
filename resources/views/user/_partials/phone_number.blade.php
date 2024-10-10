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
        <button class="btn btn-light border phone-dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img id="phone-flag-img" src="{{ asset('assets/images/flags/ng.svg') }}" alt="flag img" height="20"
                class="phone-country-flagimg rounded">
            <span class="ms-2 phone-country-codeno">{{ $profileData->country_code }}</span>
            {{-- <span class="ms-2 phone-country-codeno"></span> --}}
        </button>

        <input type="text" name="phone" class="form-control rounded-end phone-flag-input"
            value="{{ $profileData->phone }}" placeholder="Enter number"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        <div class="dropdown-menu w-100">
            <div class="p-2 px-3 pt-1 searchlist-input">
                <input type="text" class="form-control form-control-sm border search-phone-countryList"
                    placeholder="Search country name or country code...">
            </div>
            <ul class="list-unstyled dropdown-menu-list mb-0">
                <!-- Algeria -->
                <li class="phone-dropdown-item d-flex" data-flag="dz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/dz.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Algeria</div>
                            <span class="phone-countrylist-codeno text-muted">+213</span>
                        </div>
                    </div>
                </li>

                <!-- Angola -->
                <li class="phone-dropdown-item d-flex" data-flag="ao.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ao.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Angola</div>
                            <span class="phone-countrylist-codeno text-muted">+244</span>
                        </div>
                    </div>
                </li>

                <!-- Benin -->
                <li class="phone-dropdown-item d-flex" data-flag="bj.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bj.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Benin</div>
                            <span class="phone-countrylist-codeno text-muted">+229</span>
                        </div>
                    </div>
                </li>

                <!-- Botswana -->
                <li class="phone-dropdown-item d-flex" data-flag="bw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bw.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Botswana</div>
                            <span class="phone-countrylist-codeno text-muted">+267</span>
                        </div>
                    </div>
                </li>

                <!-- Burkina Faso -->
                <li class="phone-dropdown-item d-flex" data-flag="bf.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bf.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Burkina Faso</div>
                            <span class="phone-countrylist-codeno text-muted">+226</span>
                        </div>
                    </div>
                </li>

                <!-- Burundi -->
                <li class="phone-dropdown-item d-flex" data-flag="bi.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bi.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Burundi</div>
                            <span class="phone-countrylist-codeno text-muted">+257</span>
                        </div>
                    </div>
                </li>

                <!-- Cabo Verde -->
                <li class="phone-dropdown-item d-flex" data-flag="cv.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cv.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Cabo Verde</div>
                            <span class="phone-countrylist-codeno text-muted">+238</span>
                        </div>
                    </div>
                </li>

                <!-- Cameroon -->
                <li class="phone-dropdown-item d-flex" data-flag="cm.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cm.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Cameroon</div>
                            <span class="phone-countrylist-codeno text-muted">+237</span>
                        </div>
                    </div>
                </li>

                <!-- Central African Republic (CAR) -->
                <li class="phone-dropdown-item d-flex" data-flag="cf.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cf.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Central African Republic</div>
                            <span class="phone-countrylist-codeno text-muted">+236</span>
                        </div>
                    </div>
                </li>

                <!-- Chad -->
                <li class="phone-dropdown-item d-flex" data-flag="td.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/td.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Chad</div>
                            <span class="phone-countrylist-codeno text-muted">+235</span>
                        </div>
                    </div>
                </li>

                <!-- Comoros -->
                <li class="phone-dropdown-item d-flex" data-flag="km.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/km.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Comoros</div>
                            <span class="phone-countrylist-codeno text-muted">+269</span>
                        </div>
                    </div>
                </li>

                <!-- Congo, Democratic Republic of the -->
                <li class="phone-dropdown-item d-flex" data-flag="cd.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cd.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Congo, Democratic Republic of the</div>
                            <span class="phone-countrylist-codeno text-muted">+243</span>
                        </div>
                    </div>
                </li>

                <!-- Congo, Republic of the -->
                <li class="phone-dropdown-item d-flex" data-flag="cg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cg.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Congo, Republic of the</div>
                            <span class="phone-countrylist-codeno text-muted">+242</span>
                        </div>
                    </div>
                </li>

                <!-- Cote d’Ivoire -->
                <li class="phone-dropdown-item d-flex" data-flag="ci.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ci.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Cote d’Ivoire</div>
                            <span class="phone-countrylist-codeno text-muted">+225</span>
                        </div>
                    </div>
                </li>

                <!-- Djibouti -->
                <li class="phone-dropdown-item d-flex" data-flag="dj.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/dj.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Djibouti</div>
                            <span class="phone-countrylist-codeno text-muted">+253</span>
                        </div>
                    </div>
                </li>

                <!-- Egypt -->
                <li class="phone-dropdown-item d-flex" data-flag="eg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/eg.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Egypt</div>
                            <span class="phone-countrylist-codeno text-muted">+20</span>
                        </div>
                    </div>
                </li>

                <!-- Equatorial Guinea -->
                <li class="phone-dropdown-item d-flex" data-flag="gq.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gq.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Equatorial Guinea</div>
                            <span class="phone-countrylist-codeno text-muted">+240</span>
                        </div>
                    </div>
                </li>

                <!-- Eritrea -->
                <li class="phone-dropdown-item d-flex" data-flag="er.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/er.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Eritrea</div>
                            <span class="phone-countrylist-codeno text-muted">+291</span>
                        </div>
                    </div>
                </li>

                <!-- Eswatini -->
                <li class="phone-dropdown-item d-flex" data-flag="sz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sz.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Eswatini</div>
                            <span class="phone-countrylist-codeno text-muted">+268</span>
                        </div>
                    </div>
                </li>

                <!-- Ethiopia -->
                <li class="phone-dropdown-item d-flex" data-flag="et.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/et.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Ethiopia</div>
                            <span class="phone-countrylist-codeno text-muted">+251</span>
                        </div>
                    </div>
                </li>

                <!-- Gabon -->
                <li class="phone-dropdown-item d-flex" data-flag="ga.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ga.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Gabon</div>
                            <span class="phone-countrylist-codeno text-muted">+241</span>
                        </div>
                    </div>
                </li>

                <!-- Gambia -->
                <li class="phone-dropdown-item d-flex" data-flag="gm.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gm.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Gambia</div>
                            <span class="phone-countrylist-codeno text-muted">+220</span>
                        </div>
                    </div>
                </li>

                <!-- Ghana -->
                <li class="phone-dropdown-item d-flex" data-flag="gh.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gh.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Ghana</div>
                            <span class="phone-countrylist-codeno text-muted">+233</span>
                        </div>
                    </div>
                </li>

                <!-- Guinea -->
                <li class="phone-dropdown-item d-flex" data-flag="gn.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gn.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Guinea</div>
                            <span class="phone-countrylist-codeno text-muted">+224</span>
                        </div>
                    </div>
                </li>

                <!-- Guinea-Bissau -->
                <li class="phone-dropdown-item d-flex" data-flag="gw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gw.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Guinea-Bissau</div>
                            <span class="phone-countrylist-codeno text-muted">+245</span>
                        </div>
                    </div>
                </li>

                <!-- Kenya -->
                <li class="phone-dropdown-item d-flex" data-flag="ke.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ke.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Kenya</div>
                            <span class="phone-countrylist-codeno text-muted">+254</span>
                        </div>
                    </div>
                </li>

                <!-- Lesotho -->
                <li class="phone-dropdown-item d-flex" data-flag="ls.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ls.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Lesotho</div>
                            <span class="phone-countrylist-codeno text-muted">+266</span>
                        </div>
                    </div>
                </li>

                <!-- Liberia -->
                <li class="phone-dropdown-item d-flex" data-flag="lr.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/lr.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Liberia</div>
                            <span class="phone-countrylist-codeno text-muted">+231</span>
                        </div>
                    </div>
                </li>

                <!-- Libya -->
                <li class="phone-dropdown-item d-flex" data-flag="ly.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ly.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Libya</div>
                            <span class="phone-countrylist-codeno text-muted">+218</span>
                        </div>
                    </div>
                </li>

                <!-- Madagascar -->
                <li class="phone-dropdown-item d-flex" data-flag="mg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mg.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Madagascar</div>
                            <span class="phone-countrylist-codeno text-muted">+261</span>
                        </div>
                    </div>
                </li>

                <!-- Malawi -->
                <li class="phone-dropdown-item d-flex" data-flag="mw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mw.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Malawi</div>
                            <span class="phone-countrylist-codeno text-muted">+265</span>
                        </div>
                    </div>
                </li>

                <!-- Mali -->
                <li class="phone-dropdown-item d-flex" data-flag="ml.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ml.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Mali</div>
                            <span class="phone-countrylist-codeno text-muted">+223</span>
                        </div>
                    </div>
                </li>

                <!-- Mauritania -->
                <li class="phone-dropdown-item d-flex" data-flag="mr.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mr.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Mauritania</div>
                            <span class="phone-countrylist-codeno text-muted">+222</span>
                        </div>
                    </div>
                </li>

                <!-- Mauritius -->
                <li class="phone-dropdown-item d-flex" data-flag="mu.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mu.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Mauritius</div>
                            <span class="phone-countrylist-codeno text-muted">+230</span>
                        </div>
                    </div>
                </li>

                <!-- Morocco -->
                <li class="phone-dropdown-item d-flex" data-flag="ma.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ma.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Morocco</div>
                            <span class="phone-countrylist-codeno text-muted">+212</span>
                        </div>
                    </div>
                </li>

                <!-- Mozambique -->
                <li class="phone-dropdown-item d-flex" data-flag="mz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mz.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Mozambique</div>
                            <span class="phone-countrylist-codeno text-muted">+258</span>
                        </div>
                    </div>
                </li>

                <!-- Namibia -->
                <li class="phone-dropdown-item d-flex" data-flag="na.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/na.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Namibia</div>
                            <span class="phone-countrylist-codeno text-muted">+264</span>
                        </div>
                    </div>
                </li>

                <!-- Niger -->
                <li class="phone-dropdown-item d-flex" data-flag="ne.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ne.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Niger</div>
                            <span class="phone-countrylist-codeno text-muted">+227</span>
                        </div>
                    </div>
                </li>

                <!-- Nigeria -->
                <li class="phone-dropdown-item d-flex" data-flag="ng.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ng.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Nigeria</div>
                            <span class="phone-countrylist-codeno text-muted">+234</span>
                        </div>
                    </div>
                </li>

                <!-- Rwanda -->
                <li class="phone-dropdown-item d-flex" data-flag="rw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/rw.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Rwanda</div>
                            <span class="phone-countrylist-codeno text-muted">+250</span>
                        </div>
                    </div>
                </li>

                <!-- Sao Tome and Principe -->
                <li class="phone-dropdown-item d-flex" data-flag="st.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/st.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Sao Tome and Principe</div>
                            <span class="phone-countrylist-codeno text-muted">+239</span>
                        </div>
                    </div>
                </li>

                <!-- Senegal -->
                <li class="phone-dropdown-item d-flex" data-flag="sn.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sn.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Senegal</div>
                            <span class="phone-countrylist-codeno text-muted">+221</span>
                        </div>
                    </div>
                </li>

                <!-- Seychelles -->
                <li class="phone-dropdown-item d-flex" data-flag="sc.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sc.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Seychelles</div>
                            <span class="phone-countrylist-codeno text-muted">+248</span>
                        </div>
                    </div>
                </li>

                <!-- Sierra Leone -->
                <li class="phone-dropdown-item d-flex" data-flag="sl.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sl.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Sierra Leone</div>
                            <span class="phone-countrylist-codeno text-muted">+232</span>
                        </div>
                    </div>
                </li>

                <!-- Somalia -->
                <li class="phone-dropdown-item d-flex" data-flag="so.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/so.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Somalia</div>
                            <span class="phone-countrylist-codeno text-muted">+252</span>
                        </div>
                    </div>
                </li>

                <!-- South Africa -->
                <li class="phone-dropdown-item d-flex" data-flag="za.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/za.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">South Africa</div>
                            <span class="phone-countrylist-codeno text-muted">+27</span>
                        </div>
                    </div>
                </li>

                <!-- South Sudan -->
                <li class="phone-dropdown-item d-flex" data-flag="ss.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ss.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">South Sudan</div>
                            <span class="phone-countrylist-codeno text-muted">+211</span>
                        </div>
                    </div>
                </li>

                <!-- Sudan -->
                <li class="phone-dropdown-item d-flex" data-flag="sd.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sd.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Sudan</div>
                            <span class="phone-countrylist-codeno text-muted">+249</span>
                        </div>
                    </div>
                </li>

                <!-- Tanzania -->
                <li class="phone-dropdown-item d-flex" data-flag="tz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/tz.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Tanzania</div>
                            <span class="phone-countrylist-codeno text-muted">+255</span>
                        </div>
                    </div>
                </li>

                <!-- Togo -->
                <li class="phone-dropdown-item d-flex" data-flag="tg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/tg.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Togo</div>
                            <span class="phone-countrylist-codeno text-muted">+228</span>
                        </div>
                    </div>
                </li>

                <!-- Tunisia -->
                <li class="phone-dropdown-item d-flex" data-flag="tn.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/tn.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Tunisia</div>
                            <span class="phone-countrylist-codeno text-muted">+216</span>
                        </div>
                    </div>
                </li>

                <!-- Uganda -->
                <li class="phone-dropdown-item d-flex" data-flag="ug.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ug.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Uganda</div>
                            <span class="phone-countrylist-codeno text-muted">+256</span>
                        </div>
                    </div>
                </li>

                <!-- Zambia -->
                <li class="phone-dropdown-item d-flex" data-flag="zm.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/zm.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Zambia</div>
                            <span class="phone-countrylist-codeno text-muted">+260</span>
                        </div>
                    </div>
                </li>

                <!-- Zimbabwe -->
                <li class="phone-dropdown-item d-flex" data-flag="zw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/zw.svg') }}" alt="country flag"
                            class="phone-options-flagimg" height="20">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="phone-country-name me-1">Zimbabwe</div>
                            <span class="phone-countrylist-codeno text-muted">+263</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
