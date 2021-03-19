@foreach($children as $child)
    <li class="dropdown">
        <a class="dropdown {{count($child->children)?'':'particularHierarchy'}}"
            href="" value="{{$child->id}}"
            role="button" data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">{{$child->name}}
        </a>
        @if(count($child->children))
        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
           
           @include('frontend.menus.childmenu',['children'=>$child->children])

        </ul>
        @endif
    </li>
@endforeach