<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Document</title>
</head>
<body class="">
  @foreach($components as $component)
    <div class="border-2 m-20 rounded-2xl bg-gray-400">
        <div x-data="{ showCode: false }">
          <div class="bg-slate-950 rounded-t-2xl">
            <button class="m-3 p-4 bg-slate-800 text-white rounded-2xl font-bold" x-show="showCode" x-on:click="showCode = false">Preview</button>
            <button class="m-3 p-4 bg-slate-800 text-white rounded-2xl font-bold" x-show="!showCode" x-on:click="showCode = true">Code</button>
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