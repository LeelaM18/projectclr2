<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/monaco-editor@latest/min/vs/editor/editor.main.css">
<script src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>

<script>
  require.config({ paths: { 'vs': 'https://unpkg.com/monaco-editor@latest/min/vs' }});
  require(['vs/editor/editor.main'], function() {
    var editor = monaco.editor.create(document.getElementById('editorContainer'), {
      value:'',
      language: 'html', // Specify the desired language mode
    });
  });
  
</script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('layout.header')
    <div class="h-full p-5 m-5 border  border-gray-300  shadow-xl bg-white rounded-lg">
   @yield('content')
</div>
   @include('layout.footer')

   <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</body>

</html>
