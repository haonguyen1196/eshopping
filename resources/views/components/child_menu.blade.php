@if ($categoryParent->categoryChildren->count())
    <ul role="menu" class="sub-menu">
        @foreach($categoryParent->categoryChildren as $categoryChild)
            <li><a href="{{ route('category.products', ['slug' => $categoryChild->name, 'id' => $categoryChild->id ]) }}">{{ $categoryChild->name }}</a>
                @if ($categoryChild->categoryChildren->count())
                    @include('components.child_menu', ['categoryParent' => $categoryChild])
                @endif
            </li>
        @endforeach
    </ul>
@endif
