@if (!empty($meta['links']))
   <nav>
        <ul class="pagination">
            @foreach ($meta['links'] as $link)

                @if ($link['active'] == false)
                <li class="page-item"><a  class="page-link"href="{{ $link['url'] }}">{!! $link['label'] !!}</a></li>
                @else
                <li class="page-item  active" aria-current="page"><span class="page-link">{!! $link['label'] !!}</span></li>
                @endif

            @endforeach

        </ul>
    </nav>
@endif