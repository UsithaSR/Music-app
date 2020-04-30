<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="{{route('backend.home')}}" class="simple-text logo-normal">
            {{ __('Ranwala APP Backend') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage == 'home') active @endif">
                <a href="{{ route('backend.home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'traditional_song') active @endif">
                <a href="{{ route('backend.traditional_songs.index') }}">
                    <i class="fas fa-music"></i>
                    <p>{{ __('Traditional Songs') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'song_category') active @endif">
                <a href="{{ route('backend.song_categories.index') }}">
                    <i class="fas fa-guitar"></i>
                    <p>{{ __('Song Categories') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'hand_work_category') active @endif">
                <a href="{{ route('backend.hand_work_categories.index') }}">
                    <i class="fas fa-sign-language"></i>
                    <p>{{ __('Hand Work Categories') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'hand_work') active @endif">
                <a href="{{ route('backend.hand_works.index') }}">
                    <i class="fas fa-hand-rock"></i>
                    <p>{{ __('Hand Works') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'hand_work_image') active @endif">
                <a href="{{ route('backend.hand_work_images.index') }}">
                    <i class="fas fa-images"></i>
                    <p>{{ __('Hand Work Images') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'proverb') active @endif">
                <a href="{{ route('backend.proverbs.index') }}">
                    <i class="far fa-comment-dots"></i>
                    <p>{{ __('Proverbs') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'knowledge_hub_video') active @endif">
                <a href="{{ route('backend.knowledge_hub_videos.index') }}">
                    <i class="fas fa-video"></i>
                    <p>{{ __('Knowledge Hub Videos') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'knowledge_hub_image') active @endif">
                <a href="{{ route('backend.knowledge_hub_images.index') }}">
                    <i class="far fa-images"></i>
                    <p>{{ __('Knowledge Hub Images') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'knowledge_hub_audio') active @endif">
                <a href="{{ route('backend.knowledge_hub_audios.index') }}">
                    <i class="fas fa-volume-up"></i>
                    <p>{{ __('Knowledge Hub Audios') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'riddle') active @endif">
                <a href="{{ route('backend.riddles.index') }}">
                    <i class="fas fa-child"></i>
                    <p>{{ __('Riddles') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'traditional_game') active @endif">
                <a href="{{ route('backend.traditional_games.index') }}">
                    <i class="fas fa-gamepad"></i>
                    <p>{{ __('Traditional Games') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'new_creation') active @endif">
                <a href="{{ route('backend.new_creations.index') }}">
                    <i class="fas fa-headphones"></i>
                    <p>{{ __('New Creation') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'faq') active @endif">
                <a href="{{ route('backend.faq.index') }}">
                    <i class="fas fa-info-circle"></i>
                    <p>{{ __('FAQ') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'push_notifications') active @endif">
                <a href="{{ route('backend.push_notifications.create') }}">
                    <i class="fas fa-envelope-square"></i>
                    <p>{{ __('Push Notifications') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'settings') active @endif">
                <a href="{{ route('backend.settings.index') }}">
                    <i class="fas fa-cog"></i>
                    <p>{{ __('Settings') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
