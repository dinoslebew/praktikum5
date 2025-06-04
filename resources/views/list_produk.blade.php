<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen">
    <!-- Navbar -->
    @include('components.menu')

    <!-- Container -->
    <div class="max-w-4xl mx-auto p-6">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Input Produk -->
        <form method="POST" action="{{ route('produk.simpan') }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-8">
            @csrf
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Input Produk</h1>

            <div class="flex flex-col gap-5">
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
                    <input type="text" id="nama" name="nama" class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan nama produk" required>
                </div>

                <div>
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis deskripsi produk..." required></textarea>
                </div>

                <div>
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" id="harga" name="harga" class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan harga produk" required>
                </div>

                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </div>
        </form>

        <!-- Tabel Produk -->
        <div class="relative overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Deskripsi</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $product->nama }}</td>
                            <td class="px-6 py-4">{{ $product->deskripsi }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button data-modal-target="modal-update-{{ $product->id }}" data-modal-toggle="modal-update-{{ $product->id }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-4 py-2 rounded-lg transition duration-150">
                                        Edit
                                    </button>
                                    <form action="{{ route('produk.delete', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $product->nama }}?')" class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg transition duration-150">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Update Produk -->
    @foreach ($data as $product)
        <div id="modal-update-{{ $product->id }}" tabindex="-1" aria-hidden="true"
          class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-black/50">
          <div class="relative w-full max-w-lg p-4">
            <div class="bg-white rounded-xl shadow-lg">
              <!-- Header Modal -->
              <div class="flex items-center justify-between p-4 border-b rounded-t bg-blue-900">
                <h3 class="text-lg text-white font-semibold">Edit Produk</h3>
                <button type="button" data-modal-hide="modal-update-{{ $product->id }}"
                  class="text-white hover:text-gray-300 rounded-lg text-sm p-1.5">
                  ✕
                </button>
              </div>

              <!-- Body Modal -->
              <div class="p-4">
                <form method="POST" action="{{ route('produk.update', $product->id) }}">
                  @csrf
                  @method('PUT')

                  <div class="mb-4">
                    <label for="nama-{{ $product->id }}" class="block mb-1 text-sm font-medium text-gray-900">Nama Produk</label>
                    <input type="text" id="nama-{{ $product->id }}" name="nama" required
                      value="{{ old('nama', $product->nama) }}"
                      class="w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                  </div>

                  <div class="mb-4">
                    <label for="deskripsi-{{ $product->id }}" class="block mb-1 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea id="deskripsi-{{ $product->id }}" name="deskripsi" rows="3"
                      class="w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                  </div>

                  <div class="mb-4">
                    <label for="harga-{{ $product->id }}" class="block mb-1 text-sm font-medium text-gray-900">Harga</label>
                    <input type="number" id="harga-{{ $product->id }}" name="harga" required
                      value="{{ old('harga', $product->harga) }}"
                      class="w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500">
                  </div>

                  <div class="flex justify-end mt-6">
                    <button type="button" data-modal-hide="modal-update-{{ $product->id }}"
                      class="text-gray-600 bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg mr-2">Batal</button>
                    <button type="submit"
                      class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    @endforeach

    <!-- Script Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>