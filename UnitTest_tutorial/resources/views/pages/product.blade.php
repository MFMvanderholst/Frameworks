@vite(['resources/css/app.css', 'resources/js/app.js'])

<main>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>USD</th>
                                <th>EUR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->price_eur }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">{{ __('No products found') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>