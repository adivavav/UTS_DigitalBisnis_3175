@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">
        Edit Partner
    </h2>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        <form action="{{ route('admin.partners.update', $partner->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Partner
                </label>

                <input type="text"
                       name="name"
                       value="{{ $partner->name }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">

            </div>

            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Logo URL
                </label>

                <input type="text"
                       name="logo_url"
                       value="{{ $partner->logo_url }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2">

            </div>

            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded font-semibold hover:bg-indigo-700">
                Update Partner
            </button>

        </form>

    </div>

</div>

@endsection