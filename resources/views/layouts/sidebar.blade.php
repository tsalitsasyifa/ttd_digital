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
            <ul class="metismenu" id="menu1">

                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="icon nalika-home icon-wrap"></i>
                        <span class="mini-click-non">Home</span>
                    </a>
                </li>
                {{-- @if ( Auth::user()->level == "5" or Auth::user()->level == "1" ) --}}
                    {{-- <li>
                        <a href="#">
                            <i class="icon nalika-paper-plane icon-wrap"></i>
                            <span class="mini-click-non">Distribusi</span>
                        </a>
                    </li> --}}
                {{-- @endif --}}
                <li>
                    <a href="#">
                        <i class="icon nalika-forms icon-wrap"></i>
                        <span class="mini-click-non">Input Dokumen</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon nalika-thumb-up icon-wrap"></i>
                        <span class="mini-click-non">Persetujuan Dokumen</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon nalika-folder icon-wrap"></i>
                        <span class="mini-click-non">Pelacakan Dokumen</span>
                    </a>
                </li>
                <li>
                    <a href="user">
                        <i class="icon nalika-user icon-wrap"></i>
                        <span class="mini-click-non">Pengaturan Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="division">
                        <i class="icon nalika-pie-chart icon-wrap"></i>
                        <span class="mini-click-non">Pengaturan Divisi</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</nav>
