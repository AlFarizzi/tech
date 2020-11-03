<div class="sidebar">
    <nav class="navbar">
        <ul class="sidebar-container">
            <li class="sidebar-item "><a href="{{ request()->is('user') || request()->is('user/public/questions/solved') || request()->is('user/public/questions/unsolved') ? route('home') : route('myQuestion.get') }}" class="sidebar-link {{request()->is('user') || request()->is('user/myQuestions') ? 'active' : ''}} ">All Questions</a></li>
            <li class="sidebar-item"><a href="{{request()->is('user') || request()->is('user/public/questions/solved') || request()->is('user/public/questions/unsolved')  ? route('publicSolved.get') : route('mySolved.get')}}" class="sidebar-link {{request()->is('user/public/questions/solved') || request()->is('user/myQuestions/solved') ? 'active' : ''}} ">Solved</a></li>
            <li class="sidebar-item"><a href="{{request()->is('user') || request()->is('user/public/questions/solved') || request()->is('user/public/questions/unsolved') ? route('publicUnsolved.get') : route('myUnsolved.get')}}"class="sidebar-link {{request()->is('user/public/questions/unsolved') || request()->is('user/myQuestions/unsolved') ? 'active' : ''}} ">Unsolved</a></li>
        </ul>
</div>
