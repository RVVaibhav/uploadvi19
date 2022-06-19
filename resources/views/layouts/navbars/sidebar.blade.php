
<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __('') }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ __('Vision') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'login') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <!-- <a data-toggle="collapse" href="#laravelExamples">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("Laravel Examples") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
        </div> -->
      </li>
      <li class = "@if ($activePage == 'users') active @endif">
        <a href="{{ url('/users') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p>{{ __('Users') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'ambiguity') active @endif">
        <a href="{{ url('/ambiguity') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p>{{ __('Ambiguity') }}</p>
        </a>
      </li>

      <li class = "@if ($activePage == 'mkcl') active @endif">
        <a href="{{ url('/mkcl') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p>{{ __('Mkcl') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'headers') active @endif">
        <a href="{{ url('/headers') }}">
          <i class="now-ui-icons ui-2_chat-round"></i>
          <p>{{ __('Headers') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'test') active @endif">
        <a href="{{ url('/test') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Test') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'quiz') active @endif">
        <a href="{{ url('/quiz') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('Question') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'motivationQuotes') active @endif">
        <a href="{{ url('/motivationQuotes') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('Motivational Quotes') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'testQuiz') active @endif">
        <a href="{{ url('/testQuiz') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('Test Question') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'study') active @endif">
        <a href="{{ url('/study') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('Study Tips') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'reading') active @endif">
        <a href="{{ url('/reading') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('Reading Stuff') }}</p>
        </a>
      </li>

      <li class = "@if ($activePage == 'questionformat') active @endif">
        <a href="{{ url('/questionformat') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('QUESTION FORMAT') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'aboutus') active @endif">
        <a href="{{ url('/aboutus') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('About Us') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'category') active @endif">
        <a href="{{ url('/category') }}">
          <i class="now-ui-icons shopping_box"></i>
          <p>{{ __('Categories') }}</p>
        </a>
      </li>

      <li class = "@if ($activePage == 'result') active @endif">
        <a href="{{ url('/result') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Result') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'datauploads') active @endif">
        <a href="{{ url('/datauploads') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Uploads') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'subscribe') active @endif">
        <a href="{{ url('/subscribe') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Subscribe') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'notes') active @endif">
        <a href="{{ url('/notes') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Notes Purches') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'vedio') active @endif">
        <a href="{{ url('/vedio') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Video') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'notification') active @endif">
        <a href="{{ url('/notification') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Notification') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'mnemonics') active @endif">
        <a href="{{ url('/mnemonics') }}">
          <i class="now-ui-icons business_bulb-63"></i>
          <p>{{ __('Mnemonics') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="">
          <i class="now-ui-icons loader_gear"></i>
          <p>{{ __('Settings') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
