@extends('layouts.app')

@section('title', 'Manage Products | The Silver Ravens')

@section('content')

<main class="container admin-page">

    <div class="admin-heading">

        <div>
            <h1>MANAGE PRODUCTS</h1>
            <p>Manage your store merchandise.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="button">
            BACK TO DASHBOARD
        </a>

    </div>

    <div class="admin-actions">

        <a href="{{ route('admin.products.create') }}" class="button">
            + ADD PRODUCT
        </a>

    </div>

    @if (session('success'))

        <p class="form-success" role="status">
            {{ session('success') }}
        </p>

    @endif

    <div class="admin-table-wrapper">

        <table class="admin-table">

            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($products as $product)

                    @php
                        $images = $product->images['Black']
                            ?? collect($product->images)->first();

                        $image = $images[0] ?? null;
                    @endphp

                    <tr>

                        <td>
                            @if ($image)
                                <img src="{{ asset('assets/images/' . $image) }}"
                                     alt="{{ $product->name }}"
                                     class="admin-product-image">
                            @endif
                        </td>

                        <td>{{ $product->name }}</td>

                        <td>{{ ucfirst($product->category) }}</td>

                        <td>${{ number_format($product->price, 2) }}</td>

                        <td>

                            <div class="admin-row-actions">

                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="admin-edit-button">
                                    EDIT
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.products.destroy', $product->id) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="admin-delete-button">
                                        DELETE
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5">No products found.</td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</main>

@endsection