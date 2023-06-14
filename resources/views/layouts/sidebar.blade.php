<nav id="sidebar">
    <div class="nalika-profile">
        <div class="profile-dtl">
            <br><br>
            <a href="#"><img src="{{ url('antarmuka/img/notification/3135715.png') }}" alt="" /></a>
                @php
                    echo "<h2>". strtok(Auth::user()->name, " ")."</h2>";
                @endphp
            <br>
            <hr>
        </div>
    </div>
    <div class="left-custom-menu-adp-wrap comment-scrollbar">
        <nav class="sidebar-nav left-sidebar-menu-pro">
            {{-- <ul class="metismenu" id="menu1">

                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="icon nalika-home icon-wrap"></i>
                        <span class="mini-click-non">Home</span>
                    </a>
                </li>
                @if ( Auth::user()->level == "2" or Auth::user()->level == "1" )
                    <li>
                        <a href="{{ route('catat_surat') }}">
                            <i class="icon nalika-new-file icon-wrap"></i>
                            <span class="mini-click-non">Catat Surat</span>
                        </a>
                    </li>
                @endif

                @if ( Auth::user()->level == "3" or Auth::user()->level == "1" )
                    <li>
                        <a href="{{ route('disposisi') }}">
                            <i class="icon nalika-share icon-wrap"></i>
                            <span class="mini-click-non">Disposisi</span>
                        </a>
                    </li>
                @endif
                @if ( Auth::user()->level == "2" or Auth::user()->level == "1" )
                    <li>
                        <a href="{{ route('penyerahan_disposisi') }}">
                            <i class="icon nalika-flag icon-wrap"></i>
                            <span class="mini-click-non">Penyerahan Disposisi</span>
                        </a>
                    </li>
                @endif
                @if ( Auth::user()->level == "4" or Auth::user()->level == "1" )
                    <li>
                        <a href="{{ route('penugasan_distribusi') }}">
                            <i class="icon nalika-settings icon-wrap"></i>
                            <span class="mini-click-non">Penugasan Distribusi</span>
                        </a>
                    </li>
                @endif
                @if ( Auth::user()->level == "5" or Auth::user()->level == "1" )
                    <li>
                    <a href="{{ route('distribusi') }}">
                        <i class="icon nalika-paper-plane icon-wrap"></i>
                        <span class="mini-click-non">Distribusi</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('ekspedisi_digital') }}">
                        <i class="icon nalika-forms icon-wrap"></i>
                        <span class="mini-click-non">Ekspedisi Digital</span>
                    </a>
                </li>
            </ul> --}}
        </nav>
    </div>
</nav>
