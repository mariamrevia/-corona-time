<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body>
  
    <div class="flex flex-row justify-between w-[23rem] mobile:w-[90rem] h-[5rem]">


        <div class="flex flex-col mobile:ml-[6.5rem] ml-[1rem] mt-[2.635rem]">
            <img src="/images/Group1.png" class="w-[10.6rem] h-[2.6rem]"/>
        </div>

        <div class="flex flex-row mt-[2.635rem] gap-[3rem] mr-108">
       

        <div class="hidden mobile:block">

            <h2>mariam</h2>
            
            <form method="POST" action="">
                @csrf
                <button>Log Out</button>
    
            </form>
        </div>
    </div>

    
</div>
<div class=" bg-lightGr mt-[1rem] h-0.5  w-[24rem] mobile:w-[90rem]"></div>

{{$slot}}


</body>
