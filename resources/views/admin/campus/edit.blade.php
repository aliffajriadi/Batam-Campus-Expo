@extends('admin.layouts.app')

@section('title', 'Edit Campus')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.campus.index') }}"
            class="text-indigo-400 hover:text-indigo-300 transition flex items-center gap-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Campuses
        </a>
        <h1 class="text-2xl font-bold text-gray-100">Edit Campus</h1>
    </div>

    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 max-w-2xl">
        <form action="{{ route('admin.campus.update', $campus->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name_campus" class="block text-sm font-medium text-gray-300 mb-2">Campus Name</label>
                <input type="text" name="name_campus" id="name_campus"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('name_campus', $campus->name_campus) }}" required>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-300 mb-2">Location</label>
                <input type="text" name="location" id="location"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('location', $campus->location) }}" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="singkatan" class="block text-sm font-medium text-gray-300 mb-2">Abbreviation</label>
                    <input type="text" name="singkatan" id="singkatan"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('singkatan', $campus->singkatan) }}" placeholder="e.g. UI">
                </div>
                <div>
                    <label for="akreditasi" class="block text-sm font-medium text-gray-300 mb-2">Accreditation</label>
                    <select name="akreditasi" id="akreditasi"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="A" {{ old('akreditasi', $campus->akreditasi) == 'A' ? 'selected' : '' }}>A
                        </option>
                        <option value="B" {{ old('akreditasi', $campus->akreditasi) == 'B' ? 'selected' : '' }}>B
                        </option>
                        <option value="C" {{ old('akreditasi', $campus->akreditasi) == 'C' ? 'selected' : '' }}>C
                        </option>
                        <option value="Unggul" {{ old('akreditasi', $campus->akreditasi) == 'Unggul' ? 'selected' : '' }}>
                            Unggul</option>
                        <option value="Baik Sekali"
                            {{ old('akreditasi', $campus->akreditasi) == 'Baik Sekali' ? 'selected' : '' }}>Baik Sekali
                        </option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="negeri" {{ old('status', $campus->status) == 'negeri' ? 'selected' : '' }}>Negeri
                        </option>
                        <option value="swasta" {{ old('status', $campus->status) == 'swasta' ? 'selected' : '' }}>Swasta
                        </option>
                    </select>
                </div>
                <div>
                    <label for="tahun_berdiri" class="block text-sm font-medium text-gray-300 mb-2">Founded Year</label>
                    <input type="number" name="tahun_berdiri" id="tahun_berdiri"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('tahun_berdiri', $campus->tahun_berdiri) }}" placeholder="e.g. 1990">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="jumlah_mahasiswa" class="block text-sm font-medium text-gray-300 mb-2">Total
                        Students</label>
                    <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('jumlah_mahasiswa', $campus->jumlah_mahasiswa) }}" placeholder="e.g. 5000">
                </div>
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-300 mb-2">Website</label>
                    <input type="url" name="website" id="website"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        value="{{ old('website', $campus->website) }}" placeholder="https://example.com">
                </div>
            </div>

            <div>
                <label for="fakultas" class="block text-sm font-medium text-gray-300 mb-2">Faculties (Comma
                    separated)</label>
                <input type="text" name="fakultas" id="fakultas"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    value="{{ old('fakultas', is_array($campus->fakultas) ? implode(', ', $campus->fakultas) : $campus->fakultas) }}"
                    placeholder="e.g. Engineering, Medicine, Economics">
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Brief description about the campus...">{{ old('deskripsi', $campus->deskripsi) }}</textarea>
            </div>

            @if ($campus->logo_campus)
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Current Logo</label>
                    <img src="{{ asset('storage/' . $campus->logo_campus) }}" class="w-24 h-24 object-cover rounded-lg"
                        alt="">
                </div>
            @endif

            <div>
                <label for="logo_campus" class="block text-sm font-medium text-gray-300 mb-2">New Logo (optional)</label>
                <input type="file" name="logo_campus" id="logo_campus" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-600 file:text-white file:cursor-pointer @error('logo_campus') border-red-500 @enderror">
                <p class="mt-1 text-xs text-gray-400">Allowed: JPG, PNG, GIF. Max: 2MB</p>
                @error('logo_campus')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">
                    Update Campus
                </button>
            </div>
        </form>
    </div>
@endsection
