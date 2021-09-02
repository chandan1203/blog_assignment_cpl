<div id="post-section">
    @foreach ($posts as $item)
    <div class="card-body">
        <h4 class="card-title"><span class="font-weight-bold"> {{ $item->title }}</span></h4>
        <p class="card-text">{{ Str::limit($item->body, 50) }}</p>
        <p class="card-text"><span class="font-weight-bold">Category:</span>
            @foreach ($item->categories as $category)
                {{ $category->name .',' }}
            @endforeach
        </p>
        <p class="card-text"><span class="font-weight-bold">Author: </span> {{ $item->user->name }}</p>
    </div>
    <hr>
    @endforeach
</div>
