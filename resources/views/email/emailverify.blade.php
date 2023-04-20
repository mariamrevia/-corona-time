
<x-email.verifylayout>


 
       
    
    <h2 class=" font-bold  text-center text-2xl">Reset Password</h2>

        <form method="POST" action="{{route('password.email')}}">

            @csrf
                <x-input name="email" />
                <button class="w-[21.4rem] h-[3rem] bg-green mt-[1.5rem] border rounded-md text-white font-black">RESET PASSWORD</button>
            
            </form>
    
 

</x-email.verifylayout>
