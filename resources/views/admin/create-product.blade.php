@extends('layouts.app')

@section('title', 'Add Product | The Silver Ravens')

@section('content')

<main class="container admin-page">

    <div class="admin-heading">

        <div>
            <h1>ADD PRODUCT</h1>
            <p>Add new merchandise to your store.</p>
        </div>

        <a href="{{ route('admin.products.index') }}" class="button">
            CANCEL
        </a>

    </div>

    <form class="admin-form"
          method="POST"
          action="{{ route('admin.products.store') }}"
          enctype="multipart/form-data">

        @csrf

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
                   value="{{ old('name') }}"
                   required>

        </div>

        <div class="form-group">

            <label for="description">DESCRIPTION</label>

            <textarea id="description"
                      name="description"
                      required>{{ old('description') }}</textarea>

        </div>

        <div class="form-group">

            <label for="price">PRICE ($)</label>

            <input type="number"
                   id="price"
                   name="price"
                   min="0"
                   step="0.01"
                   value="{{ old('price') }}"
                   required>

        </div>

        <div class="form-group">

            <label for="category">CATEGORY</label>

            <select name="category" id="category" required>

                @foreach (['clothing', 'accessories', 'gaming'] as $category)

                    <option value="{{ $category }}"
                            @selected(old('category') === $category)>
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
                   value="{{ old('sizes') }}"
                   placeholder="S, M, L, XL">

        </div>

        @foreach (['Black', 'White', 'Blue', 'Purple'] as $color)

            <div class="form-group">

                <label for="images-{{ $color }}">
                    {{ strtoupper($color) }} PRODUCT IMAGES
                </label>

                <input type="file"
                       id="images-{{ $color }}"
                       name="images[{{ $color }}][]"
                       accept=".jpg,.jpeg,.png,.webp"
                       multiple>

            </div>

        @endforeach

        <button type="submit" class="button">
            SAVE PRODUCT
        </button>

    </form>

</main>

@endsection