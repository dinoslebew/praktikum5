<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
   
</head>
<body>
    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    NO
                </th>
                <th scope="col" class="px-6 py-3">
                    NAMA PRODUK
                </th>
                <th scope="col" class="px-6 py-3">
                    DESKRIPSI
                </th>
                <th scope="col" class="px-6 py-3">
                    HARGA
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($nama as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $index + 1 }}
                </th>
                <td class="px-6 py-4">
                   {{ $item }}
                </td>
                <td class="px-6 py-4">
                    {{ $desc[$index] }}
                </td>
                <td class="px-6 py-4">
                    {{ $harga[$index] }}
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>
</div>

     <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>



