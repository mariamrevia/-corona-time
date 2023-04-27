
<x-email.verifylayout>


 
       
    
    <h2 class=" font-bold  text-center text-2xl">{{__('passreset.Heading')}}</h2>

        <form method="POST" action="{{route('password.email')}}">

            @csrf
                <x-input name="email" :text="__('passreset.Email')" />
                <button class="w-[21.4rem] h-[3rem] bg-green mt-[1.5rem] border rounded-md text-white font-black">{{__('passreset.ResetPass')}}</button>
            
            </form>
    
 

</x-email.verifylayout>
