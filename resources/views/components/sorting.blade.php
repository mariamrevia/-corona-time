@props(['name'])

<div class="flex flex-col align-middle justify-center ml-[0.5rem] w-10">
    <a 
        href="{{ request()->fullUrlWithQuery(['sort' => $name, 'order' => 'asc' ]) }}">
        <svg width="10" height="6" viewBox="0 0 10 6"
        fill="{{ request('sort') === $name && request('order') === 'asc' ? '#010414' : '#BFC0C4' }}"  
         xmlns="http://www.w3.org/2000/svg">
            <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z"  />
        </svg>

    </a>
    <a
    href="{{ request()->fullUrlWithQuery(['sort' => $name, 'order' => 'desc']) }}">
        <svg width="10" height="6" viewBox="0 0 10 6"
        fill="{{ request('sort') === $name && request('order') === 'desc' ? '#010414' : '#BFC0C4' }}"      
        xmlns="http://www.w3.org/2000/svg">
            <path d="M5 5.5L0 0.5H10L5 5.5Z"  />
        </svg>
    </a>


</div>
