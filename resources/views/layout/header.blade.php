<header class=" pt-3">
       <nav class="flex justify-between bg-white">
       <div class="font-bold text-2xl">CodeCLR
        @auth 
        <span class="bg-yellow-400 rounded-lg px-2 py-1 text-base mt-2">{{Auth::user()->name}}[{{Auth::user()->role}}]</span>
        @endauth
       </div>
        <div class="inline-flex space-x-3">
            <a href="{{route('post.index')}}" class="bg-green-300 p-3 rounded-lg hover:bg-red-500 hover:text-white">Home</a>
            <a href="{{route('post.create')}}" class="bg-green-300 p-3 rounded-lg  hover:bg-red-500 hover:text-white">create</a>
            <a href="{{route('post.index')}}" class="bg-green-300 p-3 rounded-lg  hover:bg-red-500 hover:text-white">Recent posts</a>
            <a href="{{route('user.index')}}" class="bg-green-300 p-3 rounded-lg  hover:bg-red-500 hover:text-white">Profile</a>
            <form method="post" action="{{route('logout')}}">
            <button type="submit" href="{{route('post.create')}}" class="bg-green-300 p-3 rounded-lg  hover:bg-red-500 hover:text-white">Logout</buttton>
            @csrf    
        </form>
        </nav>
           
    </header>