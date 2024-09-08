<div class="col-lg-6 mb-3">
    <label class="form-label">Country</label>
    <div data-input-flag="" data-option-flag-img-name="">
        <input type="text" class="form-control rounded-end flag-input" name="country" id="country" readonly=""
            value="{{ $profileData->country }}" placeholder="Select country" data-bs-toggle="dropdown"
            aria-expanded="false" />

        <div class="dropdown-menu w-100">
            {{-- <div class="p-2 px-3 pt-1 searchlist-input">
                <input type="text" class="form-control form-control-sm border search-countryList"
                    placeholder="Search country name or country code..." />
            </div> --}}
            <ul class="list-unstyled dropdown-menu-list mb-0">
                <!-- Algeria -->
                <li class="dropdown-item d-flex" data-flag="dz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/dz.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Algeria</div>
                            <span class="countrylist-codeno text-muted">+213</span>
                        </div>
                    </div>
                </li>

                <!-- Angola -->
                <li class="dropdown-item d-flex" data-flag="ao.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ao.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Angola</div>
                            <span class="countrylist-codeno text-muted">+244</span>
                        </div>
                    </div>
                </li>

                <!-- Benin -->
                <li class="dropdown-item d-flex" data-flag="bj.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bj.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Benin</div>
                            <span class="countrylist-codeno text-muted">+229</span>
                        </div>
                    </div>
                </li>

                <!-- Botswana -->
                <li class="dropdown-item d-flex" data-flag="bw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bw.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Botswana</div>
                            <span class="countrylist-codeno text-muted">+267</span>
                        </div>
                    </div>
                </li>

                <!-- Burkina Faso -->
                <li class="dropdown-item d-flex" data-flag="bf.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bf.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Burkina Faso</div>
                            <span class="countrylist-codeno text-muted">+226</span>
                        </div>
                    </div>
                </li>

                <!-- Burundi -->
                <li class="dropdown-item d-flex" data-flag="bi.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/bi.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Burundi</div>
                            <span class="countrylist-codeno text-muted">+257</span>
                        </div>
                    </div>
                </li>

                <!-- Cabo Verde -->
                <li class="dropdown-item d-flex" data-flag="cv.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cv.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Cabo Verde</div>
                            <span class="countrylist-codeno text-muted">+238</span>
                        </div>
                    </div>
                </li>

                <!-- Cameroon -->
                <li class="dropdown-item d-flex" data-flag="cm.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cm.svg') }}" alt="country flag" class="options-flagimg"
                            height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Cameroon</div>
                            <span class="countrylist-codeno text-muted">+237</span>
                        </div>
                    </div>
                </li>

                <!-- Central African Republic -->
                <li class="dropdown-item d-flex" data-flag="cf.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cf.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Central African Republic</div>
                            <span class="countrylist-codeno text-muted">+236</span>
                        </div>
                    </div>
                </li>

                <!-- Chad -->
                <li class="dropdown-item d-flex" data-flag="td.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/td.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Chad</div>
                            <span class="countrylist-codeno text-muted">+235</span>
                        </div>
                    </div>
                </li>

                <!-- Comoros -->
                <li class="dropdown-item d-flex" data-flag="km.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/km.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Comoros</div>
                            <span class="countrylist-codeno text-muted">+269</span>
                        </div>
                    </div>
                </li>

                <!-- Congo (Republic of the) -->
                <li class="dropdown-item d-flex" data-flag="cg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cg.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Republic of the Congo</div>
                            <span class="countrylist-codeno text-muted">+242</span>
                        </div>
                    </div>
                </li>

                <!-- Congo (Democratic Republic of the) -->
                <li class="dropdown-item d-flex" data-flag="cd.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/cd.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Democratic Republic of the Congo</div>
                            <span class="countrylist-codeno text-muted">+243</span>
                        </div>
                    </div>
                </li>

                <!-- Djibouti -->
                <li class="dropdown-item d-flex" data-flag="dj.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/dj.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Djibouti</div>
                            <span class="countrylist-codeno text-muted">+253</span>
                        </div>
                    </div>
                </li>

                <!-- Egypt -->
                <li class="dropdown-item d-flex" data-flag="eg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/eg.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Egypt</div>
                            <span class="countrylist-codeno text-muted">+20</span>
                        </div>
                    </div>
                </li>

                <!-- Equatorial Guinea -->
                <li class="dropdown-item d-flex" data-flag="gq.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gq.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Equatorial Guinea</div>
                            <span class="countrylist-codeno text-muted">+240</span>
                        </div>
                    </div>
                </li>

                <!-- Eritrea -->
                <li class="dropdown-item d-flex" data-flag="er.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/er.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Eritrea</div>
                            <span class="countrylist-codeno text-muted">+291</span>
                        </div>
                    </div>
                </li>

                <!-- Eswatini -->
                <li class="dropdown-item d-flex" data-flag="sz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sz.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Eswatini</div>
                            <span class="countrylist-codeno text-muted">+268</span>
                        </div>
                    </div>
                </li>

                <!-- Ethiopia -->
                <li class="dropdown-item d-flex" data-flag="et.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/et.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Ethiopia</div>
                            <span class="countrylist-codeno text-muted">+251</span>
                        </div>
                    </div>
                </li>

                <!-- Gabon -->
                <li class="dropdown-item d-flex" data-flag="ga.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ga.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Gabon</div>
                            <span class="countrylist-codeno text-muted">+241</span>
                        </div>
                    </div>
                </li>

                <!-- Gambia -->
                <li class="dropdown-item d-flex" data-flag="gm.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gm.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Gambia</div>
                            <span class="countrylist-codeno text-muted">+220</span>
                        </div>
                    </div>
                </li>

                <!-- Ghana -->
                <li class="dropdown-item d-flex" data-flag="gh.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gh.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Ghana</div>
                            <span class="countrylist-codeno text-muted">+233</span>
                        </div>
                    </div>
                </li>

                <!-- Guinea -->
                <li class="dropdown-item d-flex" data-flag="gn.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gn.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Guinea</div>
                            <span class="countrylist-codeno text-muted">+224</span>
                        </div>
                    </div>
                </li>

                <!-- Guinea-Bissau -->
                <li class="dropdown-item d-flex" data-flag="gw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/gw.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Guinea-Bissau</div>
                            <span class="countrylist-codeno text-muted">+245</span>
                        </div>
                    </div>
                </li>

                <!-- Ivory Coast (Côte d'Ivoire) -->
                <li class="dropdown-item d-flex" data-flag="ci.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ci.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Côte d'Ivoire</div>
                            <span class="countrylist-codeno text-muted">+225</span>
                        </div>
                    </div>
                </li>

                <!-- Kenya -->
                <li class="dropdown-item d-flex" data-flag="ke.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ke.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Kenya</div>
                            <span class="countrylist-codeno text-muted">+254</span>
                        </div>
                    </div>
                </li>

                <!-- Lesotho -->
                <li class="dropdown-item d-flex" data-flag="ls.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ls.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Lesotho</div>
                            <span class="countrylist-codeno text-muted">+266</span>
                        </div>
                    </div>
                </li>

                <!-- Liberia -->
                <li class="dropdown-item d-flex" data-flag="lr.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/lr.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Liberia</div>
                            <span class="countrylist-codeno text-muted">+231</span>
                        </div>
                    </div>
                </li>

                <!-- Libya -->
                <li class="dropdown-item d-flex" data-flag="ly.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ly.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Libya</div>
                            <span class="countrylist-codeno text-muted">+218</span>
                        </div>
                    </div>
                </li>

                <!-- Madagascar -->
                <li class="dropdown-item d-flex" data-flag="mg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mg.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Madagascar</div>
                            <span class="countrylist-codeno text-muted">+261</span>
                        </div>
                    </div>
                </li>

                <!-- Malawi -->
                <li class="dropdown-item d-flex" data-flag="mw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mw.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Malawi</div>
                            <span class="countrylist-codeno text-muted">+265</span>
                        </div>
                    </div>
                </li>

                <!-- Mali -->
                <li class="dropdown-item d-flex" data-flag="ml.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ml.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Mali</div>
                            <span class="countrylist-codeno text-muted">+223</span>
                        </div>
                    </div>
                </li>

                <!-- Mauritania -->
                <li class="dropdown-item d-flex" data-flag="mr.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mr.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Mauritania</div>
                            <span class="countrylist-codeno text-muted">+222</span>
                        </div>
                    </div>
                </li>

                <!-- Mauritius -->
                <li class="dropdown-item d-flex" data-flag="mu.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mu.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Mauritius</div>
                            <span class="countrylist-codeno text-muted">+230</span>
                        </div>
                    </div>
                </li>

                <!-- Morocco -->
                <li class="dropdown-item d-flex" data-flag="ma.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ma.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Morocco</div>
                            <span class="countrylist-codeno text-muted">+212</span>
                        </div>
                    </div>
                </li>

                <!-- Mozambique -->
                <li class="dropdown-item d-flex" data-flag="mz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/mz.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Mozambique</div>
                            <span class="countrylist-codeno text-muted">+258</span>
                        </div>
                    </div>
                </li>

                <!-- Namibia -->
                <li class="dropdown-item d-flex" data-flag="na.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/na.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Namibia</div>
                            <span class="countrylist-codeno text-muted">+264</span>
                        </div>
                    </div>
                </li>

                <!-- Niger -->
                <li class="dropdown-item d-flex" data-flag="ne.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ne.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Niger</div>
                            <span class="countrylist-codeno text-muted">+227</span>
                        </div>
                    </div>
                </li>

                <!-- Nigeria -->
                <li class="dropdown-item d-flex" data-flag="ng.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ng.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Nigeria</div>
                            <span class="countrylist-codeno text-muted">+234</span>
                        </div>
                    </div>
                </li>

                <!-- Rwanda -->
                <li class="dropdown-item d-flex" data-flag="rw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/rw.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Rwanda</div>
                            <span class="countrylist-codeno text-muted">+250</span>
                        </div>
                    </div>
                </li>

                <!-- São Tomé and Príncipe -->
                <li class="dropdown-item d-flex" data-flag="st.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/st.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">São Tomé and Príncipe</div>
                            <span class="countrylist-codeno text-muted">+239</span>
                        </div>
                    </div>
                </li>

                <!-- Senegal -->
                <li class="dropdown-item d-flex" data-flag="sn.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sn.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Senegal</div>
                            <span class="countrylist-codeno text-muted">+221</span>
                        </div>
                    </div>
                </li>

                <!-- Seychelles -->
                <li class="dropdown-item d-flex" data-flag="sc.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sc.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Seychelles</div>
                            <span class="countrylist-codeno text-muted">+248</span>
                        </div>
                    </div>
                </li>

                <!-- Sierra Leone -->
                <li class="dropdown-item d-flex" data-flag="sl.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sl.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Sierra Leone</div>
                            <span class="countrylist-codeno text-muted">+232</span>
                        </div>
                    </div>
                </li>

                <!-- Somalia -->
                <li class="dropdown-item d-flex" data-flag="so.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/so.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Somalia</div>
                            <span class="countrylist-codeno text-muted">+252</span>
                        </div>
                    </div>
                </li>

                <!-- South Africa -->
                <li class="dropdown-item d-flex" data-flag="za.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/za.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">South Africa</div>
                            <span class="countrylist-codeno text-muted">+27</span>
                        </div>
                    </div>
                </li>

                <!-- South Sudan -->
                <li class="dropdown-item d-flex" data-flag="ss.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ss.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">South Sudan</div>
                            <span class="countrylist-codeno text-muted">+211</span>
                        </div>
                    </div>
                </li>

                <!-- Sudan -->
                <li class="dropdown-item d-flex" data-flag="sd.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/sd.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Sudan</div>
                            <span class="countrylist-codeno text-muted">+249</span>
                        </div>
                    </div>
                </li>

                <!-- Tanzania -->
                <li class="dropdown-item d-flex" data-flag="tz.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/tz.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Tanzania</div>
                            <span class="countrylist-codeno text-muted">+255</span>
                        </div>
                    </div>
                </li>

                <!-- Togo -->
                <li class="dropdown-item d-flex" data-flag="tg.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/tg.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Togo</div>
                            <span class="countrylist-codeno text-muted">+228</span>
                        </div>
                    </div>
                </li>

                <!-- Tunisia -->
                <li class="dropdown-item d-flex" data-flag="tn.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/tn.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Tunisia</div>
                            <span class="countrylist-codeno text-muted">+216</span>
                        </div>
                    </div>
                </li>

                <!-- Uganda -->
                <li class="dropdown-item d-flex" data-flag="ug.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/ug.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Uganda</div>
                            <span class="countrylist-codeno text-muted">+256</span>
                        </div>
                    </div>
                </li>

                <!-- Zambia -->
                <li class="dropdown-item d-flex" data-flag="zm.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/zm.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Zambia</div>
                            <span class="countrylist-codeno text-muted">+260</span>
                        </div>
                    </div>
                </li>

                <!-- Zimbabwe -->
                <li class="dropdown-item d-flex" data-flag="zw.svg">
                    <div class="flex-shrink-0 me-2">
                        <img src="{{ asset('assets/images/flags/zw.svg') }}" alt="country flag"
                            class="options-flagimg" height="20" />
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="country-name me-1">Zimbabwe</div>
                            <span class="countrylist-codeno text-muted">+263</span>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputField = document.querySelector('.flag-input');
        const dropdownItems = document.querySelectorAll('.dropdown-menu-list .dropdown-item');

        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                const countryName = this.querySelector('.country-name').textContent;
                const flagFileName = this.getAttribute('data-flag');

                // Update the input field value with the selected country name
                inputField.value = countryName;

                // Update the background image of the input field using the correct path
                inputField.style.backgroundImage = `url(/assets/images/flags/${flagFileName})`;

                // Close the dropdown (optional)
                const dropdownMenu = this.closest('.dropdown-menu');
                if (dropdownMenu) {
                    const bootstrapDropdown = bootstrap.Dropdown.getInstance(dropdownMenu);
                    if (bootstrapDropdown) {
                        bootstrapDropdown.hide();
                    }
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Select all the phone number dropdown items
        const phoneDropdownItems = document.querySelectorAll(".phone-dropdown-item");

        // Attach click event listeners to each phone number dropdown item
        phoneDropdownItems.forEach(item => {
            item.addEventListener("click", function() {
                // Get the country name, country code, and flag from the clicked item
                const countryName = this.querySelector(".phone-country-name").innerText;
                const countryCode = this.querySelector(".phone-countrylist-codeno").innerText;
                const flagSrc = this.querySelector(".phone-options-flagimg").getAttribute(
                    "src");

                // Update the phone number input's flag and code
                const phoneInputGroup = this.closest("[data-phone-input-flag]");
                const phoneFlagImg = phoneInputGroup.querySelector(".phone-country-flagimg");
                const phoneCodeSpan = phoneInputGroup.querySelector(".phone-country-codeno");

                // Update the flag image source and country code
                phoneFlagImg.setAttribute("src", flagSrc);
                phoneCodeSpan.innerText = countryCode;
            });
        });
    });

    //update flag image

    window.assetUrl = "{{ asset('assets/images/flags') }}";
    document.addEventListener('DOMContentLoaded', function() {
        // Define the flag map
        const flagMap = {
            "Nigeria": "ng.svg",
            "Benin": "bj.svg",
            "Botswana": "bw.svg",
            "Algeria": "dz.svg",
            "Angola": "ao.svg",
            "Burkina Faso": "bf.svg",
            "Burundi": "bi.svg",
            "Cabo Verde": "cv.svg",
            "Cameroon": "cm.svg",
            "Central African Republic": "cf.svg",
            "Chad": "td.svg",
            "Comoros": "km.svg",
            "Congo": "cg.svg",
            "Democratic Republic of the Congo": "cd.svg",
            "Djibouti": "dj.svg",
            "Egypt": "eg.svg",
            "Equatorial Guinea": "gq.svg",
            "Eritrea": "er.svg",
            "Eswatini": "sz.svg",
            "Ethiopia": "et.svg",
            "Gabon": "ga.svg",
            "Gambia": "gm.svg",
            "Ghana": "gh.svg",
            "Guinea": "gn.svg",
            "Guinea-Bissau": "gw.svg",
            "Ivory Coast": "ci.svg",
            "Kenya": "ke.svg",
            "Lesotho": "ls.svg",
            "Liberia": "lr.svg",
            "Libya": "ly.svg",
            "Madagascar": "mg.svg",
            "Malawi": "mw.svg",
            "Mali": "ml.svg",
            "Mauritania": "mr.svg",
            "Mauritius": "mu.svg",
            "Morocco": "ma.svg",
            "Mozambique": "mz.svg",
            "Namibia": "na.svg",
            "Niger": "ne.svg",
            "Rwanda": "rw.svg",
            "Sao Tome and Principe": "st.svg",
            "Senegal": "sn.svg",
            "Seychelles": "sc.svg",
            "Sierra Leone": "sl.svg",
            "Somalia": "so.svg",
            "South Africa": "za.svg",
            "South Sudan": "ss.svg",
            "Sudan": "sd.svg",
            "Togo": "tg.svg",
            "Tanzania": "tz.svg",
            "Tunisia": "tn.svg",
            "Uganda": "ug.svg",
            "Zambia": "zm.svg",
            "Zimbabwe": "zw.svg"
        };


        // Get the country input field and its value
        const countryInput = document.querySelector('#country');
        const countryName = countryInput ? countryInput.value.trim() : '';

        // Determine the flag image based on the country name
        const flagImage = flagMap[countryName] || 'ng.svg'; // Default to Nigeria if not found

        // console.log(`Country: ${countryName}, Flag Image: ${flagImage}`); // Debugging

        // Get the container for the flag input
        const container = document.querySelector('[data-input-flag]');

        if (container) {
            // Update the data attribute
            container.setAttribute('data-option-flag-img-name', flagImage);
            // console.log(`Updated data-option-flag-img-name to ${flagImage}`); // Debugging

            // Update the CSS background image dynamically
            const flagInput = container.querySelector('.flag-input');
            if (flagInput) {
                const imageUrl = `${window.assetUrl}/${flagImage}`;
                flagInput.style.backgroundImage = `url('${imageUrl}')`;
                // console.log(`Updated background image to ${imageUrl}`); // Debugging
            } else {
                console.error('.flag-input not found'); // Debugging
            }
        } else {
            console.error('Container with data-input-flag not found'); // Debugging
        }
    });



    document.addEventListener('DOMContentLoaded', function() {
        const dropdownItems = document.querySelectorAll('.phone-dropdown-item');
        const countryCodeInput = document.getElementById('country_code');

        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                const countryCode = this.querySelector('.phone-countrylist-codeno').textContent
                    .trim();
                console.log('Selected Country Code:', countryCode); // Debugging line
                countryCodeInput.value = countryCode;
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Country map with flags and phone codes
        const countryMap = {
            "DZ": {
                flag: "dz.svg",
                phoneCode: "+213"
            }, // Algeria
            "AO": {
                flag: "ao.svg",
                phoneCode: "+244"
            }, // Angola
            "BJ": {
                flag: "bj.svg",
                phoneCode: "+229"
            }, // Benin
            "BW": {
                flag: "bw.svg",
                phoneCode: "+267"
            }, // Botswana
            "BF": {
                flag: "bf.svg",
                phoneCode: "+226"
            }, // Burkina Faso
            "BI": {
                flag: "bi.svg",
                phoneCode: "+257"
            }, // Burundi
            "CM": {
                flag: "cm.svg",
                phoneCode: "+237"
            }, // Cameroon
            "CV": {
                flag: "cv.svg",
                phoneCode: "+238"
            }, // Cape Verde
            "CF": {
                flag: "cf.svg",
                phoneCode: "+236"
            }, // Central African Republic
            "TD": {
                flag: "td.svg",
                phoneCode: "+235"
            }, // Chad
            "KM": {
                flag: "km.svg",
                phoneCode: "+269"
            }, // Comoros
            "CG": {
                flag: "cg.svg",
                phoneCode: "+242"
            }, // Congo (Brazzaville)
            "CD": {
                flag: "cd.svg",
                phoneCode: "+243"
            }, // Congo (Kinshasa)
            "DJ": {
                flag: "dj.svg",
                phoneCode: "+253"
            }, // Djibouti
            "EG": {
                flag: "eg.svg",
                phoneCode: "+20"
            }, // Egypt
            "GQ": {
                flag: "gq.svg",
                phoneCode: "+240"
            }, // Equatorial Guinea
            "ER": {
                flag: "er.svg",
                phoneCode: "+291"
            }, // Eritrea
            "SZ": {
                flag: "sz.svg",
                phoneCode: "+268"
            }, // Eswatini
            "ET": {
                flag: "et.svg",
                phoneCode: "+251"
            }, // Ethiopia
            "GA": {
                flag: "ga.svg",
                phoneCode: "+241"
            }, // Gabon
            "GM": {
                flag: "gm.svg",
                phoneCode: "+220"
            }, // Gambia
            "GH": {
                flag: "gh.svg",
                phoneCode: "+233"
            }, // Ghana
            "GN": {
                flag: "gn.svg",
                phoneCode: "+224"
            }, // Guinea
            "GW": {
                flag: "gw.svg",
                phoneCode: "+245"
            }, // Guinea-Bissau
            "CI": {
                flag: "ci.svg",
                phoneCode: "+225"
            }, // Ivory Coast
            "KE": {
                flag: "ke.svg",
                phoneCode: "+254"
            }, // Kenya
            "LS": {
                flag: "ls.svg",
                phoneCode: "+266"
            }, // Lesotho
            "LR": {
                flag: "lr.svg",
                phoneCode: "+231"
            }, // Liberia
            "LY": {
                flag: "ly.svg",
                phoneCode: "+218"
            }, // Libya
            "MG": {
                flag: "mg.svg",
                phoneCode: "+261"
            }, // Madagascar
            "MW": {
                flag: "mw.svg",
                phoneCode: "+265"
            }, // Malawi
            "ML": {
                flag: "ml.svg",
                phoneCode: "+223"
            }, // Mali
            "MR": {
                flag: "mr.svg",
                phoneCode: "+222"
            }, // Mauritania
            "MU": {
                flag: "mu.svg",
                phoneCode: "+230"
            }, // Mauritius
            "YT": {
                flag: "yt.svg",
                phoneCode: "+262"
            }, // Mayotte
            "MA": {
                flag: "ma.svg",
                phoneCode: "+212"
            }, // Morocco
            "MZ": {
                flag: "mz.svg",
                phoneCode: "+258"
            }, // Mozambique
            "NA": {
                flag: "na.svg",
                phoneCode: "+264"
            }, // Namibia
            "NE": {
                flag: "ne.svg",
                phoneCode: "+227"
            }, // Niger
            "NG": {
                flag: "ng.svg",
                phoneCode: "+234"
            }, // Nigeria
            "RW": {
                flag: "rw.svg",
                phoneCode: "+250"
            }, // Rwanda
            "ST": {
                flag: "st.svg",
                phoneCode: "+239"
            }, // São Tomé and Príncipe
            "SN": {
                flag: "sn.svg",
                phoneCode: "+221"
            }, // Senegal
            "SC": {
                flag: "sc.svg",
                phoneCode: "+248"
            }, // Seychelles
            "SL": {
                flag: "sl.svg",
                phoneCode: "+232"
            }, // Sierra Leone
            "SO": {
                flag: "so.svg",
                phoneCode: "+252"
            }, // Somalia
            "ZA": {
                flag: "za.svg",
                phoneCode: "+27"
            }, // South Africa
            "SS": {
                flag: "ss.svg",
                phoneCode: "+211"
            }, // South Sudan
            "SD": {
                flag: "sd.svg",
                phoneCode: "+249"
            }, // Sudan
            "TZ": {
                flag: "tz.svg",
                phoneCode: "+255"
            }, // Tanzania
            "TG": {
                flag: "tg.svg",
                phoneCode: "+228"
            }, // Togo
            "TN": {
                flag: "tn.svg",
                phoneCode: "+216"
            }, // Tunisia
            "UG": {
                flag: "ug.svg",
                phoneCode: "+256"
            }, // Uganda
            "EH": {
                flag: "eh.svg",
                phoneCode: "+212"
            }, // Western Sahara
            "ZM": {
                flag: "zm.svg",
                phoneCode: "+260"
            }, // Zambia
            "ZW": {
                flag: "zw.svg",
                phoneCode: "+263"
            } // Zimbabwe
        };


        // Get the country code from the hidden input and normalize it
        const countryCodeElement = document.getElementById('country_code');
        let countryCode = countryCodeElement ? countryCodeElement.value.trim() : '';

        // Debugging
        console.log('Raw Country Code:', countryCode);

        // Normalize country code (remove '+', make uppercase)
        countryCode = countryCode.replace(/\+/g, '').toUpperCase();

        // Debugging
        console.log('Normalized Country Code:', countryCode);

        // Find country data using the normalized country code
        const countryData = Object.values(countryMap).find(data => data.phoneCode === `+${countryCode}`) || {
            flag: "ng.svg",
            phoneCode: "+234"
        };

        // Debugging
        console.log('Country Data:', countryData);

        // Update the flag image and phone code
        const flagImg = document.getElementById('phone-flag-img');
        const phoneCodeSpan = document.getElementById('phone-country-code');

        if (flagImg) {
            // Update the flag image source
            const flagUrl = `{{ asset('assets/images/flags') }}/${countryData.flag}`;
            flagImg.src = flagUrl;
            console.log('Updated Flag URL:', flagUrl);
        }

        if (phoneCodeSpan) {
            phoneCodeSpan.textContent = countryData.phoneCode;
            console.log('Updated Phone Code:', countryData.phoneCode);
        }
    });
</script>
