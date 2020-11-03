@include('Partials.header')
        @include('Components.Navbar')
    <div class="dashboard-content">
        @auth
            @if (request()->is('user') || request()->is('user/myQuestions') || request()->is('user/public/questions/solved') || request()->is('user/myQuestions/solved') || request()->is('user/public/questions/unsolved') || request()->is('user/myQuestions/unsolved') || request()->is('user/public/search'))
                @include('Components.Sidebar')
            @endif
        @endauth
        @auth
        <div class="modal" id="modalForm">
            <div class="modal-content" id="modalContent">
                <form action="{{route('myQuestion.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="label-modal-title">Judul</label>
                        <input type="text" name="title" class="modal-form-input">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-modal-title">Pertanyaan</label>
                        <textarea name="question" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn-primary modal-form-btn">Post</button>
                </form>
            </div>
        </div>
        <div class="modal" id="modalSearch">
            <form action="{{route('searchQuestion')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="keyword" class="modal-content form-search-modal" id="modalContentForm" placeholder="Search Question">
                    <button type="submit" class="modal-btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        @endauth
        @yield('content')
    </div>

@include('Partials.footer')
