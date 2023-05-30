<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
</head>
<body>
    
    <nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-cyan-950">
        <div class="container px-6 py-3 mx-auto md:flex">
            <div class="flex items-center justify-between">
                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button" class="" aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>
                
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
      
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-cyan-950 md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
                <div class="flex flex-col px-2 -mx-4 md:flex-row md:mx-10 md:py-0">
                    <a href="/" class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2 underline text-lg font-semibold">HOME</a>
                  </div>
                </nav>


<div class="bg-gray-800 h-screen">
    <div class="mx-auto w-[50%] pt-56">
        
            <form action="/component/store" class=" flex flex-col" method="POST">
                @method('POST')
                @csrf    
            <textarea name="htmlcode" id="" cols="30" rows="10" class=" h-20 text-gray-700 bg-white border rounded-lg mb-4" placeholder="Html code..."></textarea>
            <textarea name="jscode" id="" cols="30" rows="10" class=" h-20 text-gray-700 bg-white border rounded-lg mb-4" placeholder="JS code..."></textarea>
            <select name="type" class="  h-20 text-gray-700 bg-white border rounded-lg " id="type" >
                <option >--Select Type--</option>
                @foreach ($typename as $type)
                <option value={{$type->id}}>{{$type->typename}}</option> @endforeach
              </select>
              <button class=" self-end w-[20%] mt-4 px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                SUBMIT
            </button>
        </form>  


        <div class="relative flex justify-center">
    <a href="/addType" class="px-6 py-2 mx-auto tracking-wide text-white capitalize transition-colors duration-300 transform bg-slate-700 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
       + Add Type
    </a>
    </div>
</div>
</body>
</html>