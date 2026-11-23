@extends('layouts.app')

@section('title', 'Edit Product | The Silver Ravens')

@section('content')

<main class="container admin-page">

    <div class="admin-heading">

        <div>
            <h1>EDIT PRODUCT</h1>
            <p>Update your product information.</p>
        </div>

        <a href="{{ route('admin.products.index') }}" class="button">
            CANCEL
        </a>

    </div>

    <form class="admin-form"
          method="POST"
          action="{{ route('admin.products.update', $product->id) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @if ($errors->any())

            <div class="form-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>

        @endif

        <div class="form-group">

            <label for="name">PRODUCT NAME</label>

            <input type="text"
                   id="name"
                   name="name"
                   value="{{ old('name', $product->name) }}"
                   required>

        </div>

        <div class="form-group">

            <label for="description">DESCRIPTION</label>

            <textarea id="description"
                      name="description"
                      required>{{ old('description', $product->description) }}</textarea>

        </div>

        <div class="form-group">

            <label for="price">PRICE ($)</label>

            <input type="number"
                   id="price"
                   name="price"
                   min="0"
                   step="0.01"
                   value="{{ old('price', $product->price) }}"
                   required>

        </div>

        <div class="form-group">

            <label for="category">CATEGORY</label>

            <select name="category" id="category" required>

                @foreach (['clothing', 'accessories', 'gaming'] as $category)

                    <option value="{{ $category }}"
                            @selected(old('category', $product->category) === $category)>
                        {{ ucfirst($category) }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="form-group">

            <label for="sizes">SIZES</label>

            <input type="text"
                   id="sizes"
                   name="sizes"
                   value="{{ old('sizes', implode(', ', $product->sizes ?? [])) }}"
                   placeholder="S, M, L, XL">

        </div>

        @foreach (['Black', 'White', 'Blue', 'Purple'] as $color)

            <div class="form-group">

                <label for="images-{{ $color }}">
                    {{ strtoupper($color) }} PRODUCT IMAGES
                </label>

                <div class="admin-image-preview">

                    @foreach ($product->images[$color] ?? [] as $image)

                        <img src="{{ asset('assets/images/' . $image) }}"
                             alt="{{ $product->name }}">

                    @endforeach

                </div>

                @if (!empty($product->images[$color]))

                    <label class="admin-checkbox">

                        <input type="checkbox"
                               name="remove_colors[]"
                               value="{{ $color }}">

                        Remove this color

                    </label>

                @endif

                <input type="file"
                       id="images-{{ $color }}"
                       name="images[{{ $color }}][]"
                       accept=".jpg,.jpeg,.png,.webp"
                       multiple>

            </div>

        @endforeach

        <button type="submit" class="button">
            SAVE CHANGES
        </button>

    </form>

</main>

@endsection