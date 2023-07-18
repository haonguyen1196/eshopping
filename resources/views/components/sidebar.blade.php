<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sản phẩm</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            @if($category->categoryChildren->count())
                                <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                                    <span class="badge pull-right">
                                        @if($category->categoryChildren->count())
                                            <i class="fa fa-plus"></i>
                                        @endif
                                    </span>
                                    {{ $category->name }}
                                </a>
                            @else
                                <a href="{{ route('category.products', ['slug' => $categoryChildren->name, 'id' => $categoryChildren->id ]) }}">
                                    {{ $category->name }}
                                </a>
                            @endif
                        </h4>
                    </div>
                    <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->categoryChildren as $categoryChildren)
                                    <li><a href="{{ route('category.products', ['slug' => $categoryChildren->name, 'id' => $categoryChildren->id ]) }}">{{ $categoryChildren->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    </div>
</div>
