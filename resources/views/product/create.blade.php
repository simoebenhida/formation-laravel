@extends('layouts.app')

@section('body')

<div class="flex items-center justify-center min-h-screen">
    <div class="min-w-md shadow border">
        <div class="p-8">
            <form action="{{ route('product_store') }}" method="POST">
                {{ csrf_field() }}
                <div class="mb-4">
                    <label for="">Name</label>
                    <input type="text" name="name" class="mt-2 px-2 py-1 border w-full rounded"  value="{{ old('name') }}">
                    @if($errors->has('name'))
                    <p class="text-red italic">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="">Price</label>
                    <input type="number" name="price" class="mt-2 px-2 py-1 border w-full rounded" value="{{ old('price') }}">
                    @if($errors->has('price'))
                    <p class="text-red italic">{{ $errors->first('price') }}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <select name="category_id" id="" class="w-full border py-1">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="mt-2 px-2 py-1 border w-full rounded"></textarea>
                </div>
                <div class="mb-4 flex justify-end">
                    <button type="submit" class="py-2 px-3 rounded border border-blue bg-blue text-white text-lg hover:bg-blue-light hover:border-blue-light">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection