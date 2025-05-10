<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ $title }}</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ $action }}">
            @csrf
            @if(isset($method))
                @method($method)
            @endif
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $item->title ?? '') }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $item->description ?? '') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>