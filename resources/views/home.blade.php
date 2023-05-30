<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

</head>
<body>
  <nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-gray-800">
    <div class="container px-6 py-3 mx-auto md:flex">
        <div class="flex items-center justify-between">
            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
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
        <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800 md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
            <div class="flex flex-col px-2 -mx-4 md:flex-row md:mx-10 md:py-0">
                <a href="#" class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2 underline text-lg font-semibold">HOME</a>
                <a href="/insert" class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2 text-lg font-semibold">CREATE</a>
                <a href="/itemType" class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2 text-lg font-semibold">EDIT</a>
              </div>
  
            <div class="relative mt-4 md:mt-0">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>

                {{-- <script>
                  let res=null;
                    function gettypes(){
                      axios.get('/api/type')
        .then(function (response) {
            
           
           res=response.data;
           console.log(res);
          })
        .catch(function (error) {
   
          console.log(error);

        });
        return res;
                    }
                  </script> --}}

                  <script>
                    function typedata() {
                      return {
                        types: [],
                        org:[],
                        show:false,

                        search:'',
                  
                        fetchtypes() {
                          fetch('/api/type')
                            .then(response => response.json())
                            .then(data => {
                              this.types = data;
                              this.org=data;
                              console.log(data)
                            })
                            .catch(error => {
                              console.error('Error:', error);
                            });
                        },

                        filtername() {
                          if(this.search!=''){
                          console.log(this.search)
                          this.types=this.org;

             this.types= this.types.filter((t) => {
              return t.typename.includes(this.search);
             });
        
      }

        //  filterbytype(type){
        //   console.log(this.search)
        //   // return type.typename == this.search;
        // },


                      },
                    }
                  }
                  </script>
  
                @if ($types)

      @foreach($types as $type)
      <div x-data="typedata()" x-init="fetchtypes()">
@endforeach
@endif
    <input x-on:click="show=!show" @click.outside="show=false" @keyup="filtername" x-model="search" type="text" class="w-full py-2 pl-10 pr-4 
    text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 
    focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 
    focus:ring-blue-300 " placeholder="Search">
  <div x-show="show">        
    <ul class="absolute dark:bg-gray-800 p-3 mt-2">
        <template x-for="type in types" >
            <li  class="text-white"><a x-bind:href="'/display/'+type.id"+type.id x-text="type.typename"></a></li>
        </template>
    </ul>
  </div> 
</div>
</div>
        </div>
    </div>
  </nav>

    <section class="text-gray-600 body-font bg-neutral-900">
  <div class="container px-5 py-24 mx-auto ">
    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="sm:text-5xl font-medium title-font mb-2 text-white text-3xl">LARAVEL COMPONENTS</h1>
      <p class="lg:w-1/2 w-full leading-relaxed text-white text-lg">We offer a wide range of solutions tailored to meet your unique business needs.</p>
    </div>
    <div class="flex flex-wrap -m-4">
      @if ($types)

      @foreach($types as $type)

      <div class="xl:w-1/3 md:w-1/2 p-4 flex">
        
        <div class="flex w-full max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-lg  dark:bg-gray-800">
          <div class="w-1/2 bg-gray-300 dark:bg-gray-600">
            <div class="border border-gray-200 p-6 rounded-lg">
              <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                  <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
              </div>
              <h2 class="text-lg text-white font-medium title-font mb-2">{{$type->typename}}</h2>
              {{-- <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile poke farm.</p> --}}
              <a href="/display/{{$type->id}}" class="bg-red-800 text-slate-50 text-sm rounded-xl p-1">More</a>

            </div>
          </div>
      
          <div class="w-1/2 p-4 md:p-4">
              <h1 class="w-40 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
      
              <p class="w-48 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
      
              <div class="flex mt-4 item-center gap-x-2">
                  <p class="w-5 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                  <p class="w-5 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                  <p class="w-5 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                  <p class="w-5 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                  <p class="w-5 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
              </div>
      
              <div class="flex justify-between mt-6 item-center">
                  <h1 class="w-10 h-2 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
      
                  <div class="h-4 bg-gray-200 rounded-lg w-28 dark:bg-gray-700"></div>
              </div>
          </div>
      </div>
      </div>

      @endforeach
           @endif
    </div>
    </div>
</section>
<script>
 
</script>
</body>
</html>