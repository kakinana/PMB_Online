<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ubah Data Pendaftaran") }}
                    <form method="POST" action="{{ route('update-daftar', ['id' => $daftar->id]) }}">
                    @csrf
                    @method('PUT')
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama', $daftar->nama)" required autofocus autocomplete="nama" />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>

                        <!-- Alamat KTP -->
                        <div>
                            <x-input-label for="alamat_ktp" :value="__('Alamat KTP')" />
                            <x-text-input id="alamat_ktp" class="block mt-1 w-full" type="text" name="alamat_ktp" :value="old('alamat_ktp', $daftar->alamat_ktp)" required autofocus autocomplete="alamat_ktp" />
                            <x-input-error :messages="$errors->get('alamat_ktp')" class="mt-2" />
                        </div>

                        <!-- Alamat Domisili -->
                        <div>
                            <x-input-label for="alamat_domisili" :value="__('Alamat Domisili')" />
                            <x-text-input id="alamat_domisili" class="block mt-1 w-full" type="text" name="alamat_domisili" :value="old('alamat_domisili', $daftar->alamat_domisili)" required autofocus autocomplete="alamat_domisili" />
                            <x-input-error :messages="$errors->get('alamat_domisili')" class="mt-2" />
                        </div>

                        <!-- Provinsi -->
                        <div class="mt-4">
                            <x-input-label for="prov_id" :value="__('Provinsi')" />
                            <select id="prov_id" name="prov_id" class="block mt-1 w-full" required>
                                @foreach($exProvinces as $prov)
                                    <option value="{{ $prov->prov_id }}"
                                        {{ $daftar->prov_id == $prov->prov_id ? 'selected' : '' }}> {{ $prov->prov_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('prov_id')" class="mt-2" />
                        </div>

                        <!-- Kabupaten -->
                        <div class="mt-4">
                            <x-input-label for="city_id" :value="__('Kabupaten')" />
                            <select id="city_id" name="city_id" class="block mt-1 w-full" required>
                                <option value="{{ $daftar->city_id }}" selected>
                                    {{ optional($cities->firstWhere('city_id', $daftar->city_id))->city_name ?? 'Pilih Kabupaten' }}
                                </option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->city_id }}" {{ $daftar->city_id == $city->city_id ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                        </div>

                        <!-- Kecamatan -->
                        <div class="mt-4">
                            <x-input-label for="dis_id" :value="__('Kecamatan')" />
                            <select id="dis_id" name="dis_id" class="block mt-1 w-full" required>
                                <option value="{{ $daftar->dis_id }}" selected>
                                    {{ optional($districts->firstWhere('dis_id', $daftar->dis_id))->dis_name ?? 'Pilih Kecamatan' }}
                                </option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->dis_id }}" {{ $daftar->dis_id == $district->dis_id ? 'selected' : '' }}>
                                        {{ $district->dis_name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('dis_id')" class="mt-2" />
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <x-input-label for="no_telp" :value="__('No Telp')" />
                            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp', $daftar->no_telp)" required autofocus autocomplete="no_telp" />
                            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                        </div>

                        <!-- Nomor HP -->
                        <div>
                            <x-input-label for="no_hp" :value="__('No HP')" />
                            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp', $daftar->no_hp)" required autofocus autocomplete="no_hp" />
                            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                        </div>
                
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $daftar->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Kewarganegaraan Dropdown -->
                        <div>
                            <x-input-label for="kewarganegaraan" :value="__('Kewarganegaraan')" />
                            <select id="kewarganegaraan" name="kewarganegaraan" class="block mt-1 w-full" required>
                                <option value="">{{ __('Pilih Kewarganegaraan') }}</option>
                                @foreach($kewarganegaraan as $option)
                                    <option value="{{ $option }}"
                                    {{ $daftar->kewarganegaraan == $option ? 'selected' : ''}}>{{ $option }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kewarganegaraan')" class="mt-2" />
                        </div>

                        <!-- Negara Asal (conditionally shown) -->
                        <div id="negara_asal" style="display: none;">
                            <x-input-label for="negara_asal" :value="__('Negara Asal')" />
                            <x-text-input id="negara_asal" class="block mt-1 w-full" type="text" name="negara_asal" :value="old('negara_asal', $daftar->negara_asal)" />
                            <x-input-error :messages="$errors->get('negara_asal')" class="mt-2" />
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                            <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir', $daftar->tanggal_lahir)" required autofocus autocomplete="tanggal_lahir" />
                            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <x-input-label for="tempat_lahir" :value="__('Tempat lahir')" />
                            <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir', $daftar->tempat_lahir)" required autofocus autocomplete="tempat_lahir" />
                            <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
                        </div>

                        <!-- Jenis Kelamin Dropdown -->
                        <div>
                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                            <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full" required>
                                <option value="">{{ __('Pilih Jenis Kelamin') }}</option>
                                @foreach($jenisKelamin as $option)
                                    <option value="{{ $option }}" {{ $daftar->jenis_kelamin == $option ? 'selected' : ''}}>{{ $option}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                        </div>

                        <!-- Status Nikah Dropdown -->
                        <div>
                            <x-input-label for="status_nikah" :value="__('Status Nikah')" />
                            <select id="status_nikah" name="status_nikah" class="block mt-1 w-full" required>
                                <option value="">{{ __('Pilih Status Nikah') }}</option>
                                @foreach($statusNikah as $option)
                                    <option value="{{ $option }}"{{ $daftar->status_nikah == $option ? 'selected' : ''}}>{{ $option }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status_nikah')" class="mt-2" />
                        </div>

                        <!-- Agama Dropdown -->
                        <div>
                            <x-input-label for="agama" :value="__('Agama')" />
                            <select id="agama" name="agama" class="block mt-1 w-full" required>
                                <option value="">{{ __('Pilih Agama') }}</option>
                                @foreach($agama as $option)
                                    <option value="{{ $option}}"{{ $daftar->agama == $option ? 'selected' : ''}}>{{ $option }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Ubah Pendaftaran') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kewarganegaraanSelect = document.getElementById('kewarganegaraan');
            const negaraAsalField = document.getElementById('negara_asal');
    
            kewarganegaraanSelect.addEventListener('change', function () {
                if (this.value === 'WNA') {
                    negaraAsalField.style.display = 'block';
                } else {
                    negaraAsalField.style.display = 'none';
                }
            });
            kewarganegaraanSelect.dispatchEvent(new Event('change'));
        });

        // for Kabupaten dropdown
        document.getElementById('prov_id').addEventListener('change', function () {
        const provinceId = this.value;

        fetch(`/get-kabupaten?province_id=${provinceId}`)
            .then(response => response.json())
            .then(data => {
                const kabupatenSelect = document.getElementById('city_id');
                kabupatenSelect.innerHTML = '<option value="">{{ __('Pilih Kabupaten') }}</option>';

                data.forEach(cities => {
                    const option = document.createElement('option');
                    option.value = cities.city_id;
                    option.textContent = cities.city_name;
                    kabupatenSelect.appendChild(option);
                });

                document.getElementById('dis_id').innerHTML = '<option value="">{{ __('Pilih Kecamatan') }}</option>';
            })
            .catch(error => console.error('Error fetching kabupaten:', error));
        });

        // for Kecamatan dropdown
        document.getElementById('city_id').addEventListener('change', function () {
        const cityId = this.value;

        fetch(`/get-kecamatan?city_id=${cityId}`)
            .then(response => response.json())
            .then(data => {
                const kecamatanSelect = document.getElementById('dis_id');
                kecamatanSelect.innerHTML = '<option value="">{{ __('Pilih Kecamatan') }}</option>';

                data.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.dis_id;
                    option.textContent = district.dis_name;
                    kecamatanSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching kecamatan:', error));
        });

        // no_hp
        document.getElementById('no_hp').addEventListener('input', function () {
        const phoneNumberInput = this.value;
        
        const isValid = /^\d*$/.test(phoneNumberInput);

        let errorElement = document.getElementById('no_hp_error');
        if (!errorElement) {
            errorElement = document.createElement('p');
            errorElement.id = 'no_hp_error';
            errorElement.style.color = 'red';
            this.parentNode.appendChild(errorElement);
        }

        if (!isValid) {
            errorElement.textContent = 'Isian harus format angka';
        } else {
            errorElement.textContent = '';
        }
        });

        // email
        document.getElementById('email').addEventListener('input', function () {
        const emailInput = this.value;

        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput);

        let errorElement = document.getElementById('email_error');
        if (!errorElement) {
            errorElement = document.createElement('p');
            errorElement.id = 'email_error';
            errorElement.style.color = 'red';
            this.parentNode.appendChild(errorElement);
        }

        if (!isValid && emailInput.length > 0) {
            errorElement.textContent = 'Isian tidak sesuai format email';
        } else {
            errorElement.textContent = '';
        }
        });
    </script>
</x-app-layout>
