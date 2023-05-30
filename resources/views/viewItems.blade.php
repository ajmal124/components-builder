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
    <body class="">

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

    
        @foreach($components as $component)
          <div class="border-2 m-20 rounded-2xl bg-gray-400">
              <div x-data="{ showCode: false }">
                <div class="bg-slate-950 rounded-t-2xl">
                  <button class="m-3 p-4 bg-slate-800 text-white rounded-2xl font-bold" x-show="showCode" x-on:click="showCode = false">Preview</button>
                  <button class="m-3 p-4 bg-slate-800 text-white rounded-2xl font-bold" x-show="!showCode" x-on:click="showCode = true">Code</button>
                  <a href="/deleteitem/{{$component->id}}" class=" ml-4 text-white bg-red-700 rounded-xl p-4">
                    Delete
                </a>
                <a href="/saveItem/{{$component->id}}" class=" ml-4 text-white bg-sky-700 rounded-xl p-4">
                    Update
                </a>
                </div>
                <div class="">
                  <div x-show="!showCode" class="h-full overflow-auto m-7">
                    {!!$component->htmlcode!!}
                  </div>
                  <div class="flex"  x-data="{html, js}" x-init="copyToClipboard('html, js')">
                  <div class="text-white bg-stone-700 overflow-auto w-1/2 border-4 border-black" x-show="showCode">
                    <h1 class="ml-2 text-xl font-bold text-yellow-400">HTML</h1>
                    <img src="{{asset('images/copy-icon.svg')}}" alt="" class="bg-white h-6 w-7 p-1 rounded-md ml-3 mt-3" x-on:click="copyToClipboard('html')">
                    <pre><code class="language-html" id="html">
                      {{$component->htmlcode}}</code></pre>
                  </div>
                  <div class="text-white bg-cyan-900 overflow-auto w-1/2 border-t-4 border-b-4 border-r-4 border-r-black border-t-black border-b-black" x-show="showCode">
                      <h1 class="ml-2 text-xl font-bold text-green-400">JS</h1>
                      <img src="{{asset('images/copy-icon.svg')}}" alt="" class="bg-white h-6 w-7 p-1 rounded-md ml-3 mt-3" x-on:click="copyToClipboard('js')">
                    <pre><code class="language-html" id="js">{{$component->jscode}}</code></pre>
                    </div></div>
                </div>
              </div>
            </div>
            @endforeach
      
            <script>
              function copyToClipboard(elementId) {
                var element = document.getElementById(elementId);
                var text = element.innerText;
                navigator.clipboard.writeText(text)
                  .then(() => {
                    alert("Text copied to clipboard");
                  })
                  .catch((error) => {
                    console.error("Error copying text: ", error);
                  });
              }
            </script>
            
</body>
</html>