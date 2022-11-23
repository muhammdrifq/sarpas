<nav class="main-header navbar navbar-expand navbar-white navbar-green text-light" style="background-color: #0F3460; position:sticky; top: 0;">
  <!-- Left navbar links -->
  <ul class="navbar-nav" style="word-spacing: 5px;">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <style>
          .container {
            display: inline-block;
            cursor: pointer;
          }

          .bar1, .bar2, .bar3 {
            width: 30px;
            height: 5px;
            background-color: #97D2EC;
            margin: 5px 0;
            transition: 0.4s;
          }

          .change .bar1 {
            transform: translate(0, 11px) rotate(-45deg);
          }

          .change .bar2 {opacity: 0;}

          .change .bar3 {
            transform: translate(0, -11px) rotate(45deg);
          }

          /* INI CSS SEARCH */
          
          .topnav .search-container {
            float: right;
          }

          .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
          }

          .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #97D2EC;
            font-size: 17px;
            border: none;
            cursor: pointer;
          }

          .topnav .search-container button:hover {
            background: #97D2EC;
          }

          @media screen and (max-width: 600px) {
            .topnav .search-container {
              float: none;
            }
            .topnav a, .topnav input[type=text], .topnav .search-container button {
              float: none;
              display: block;
              text-align: left;
              width: 100%;
              margin: 0;
              padding: 14px;
            }
            .topnav input[type=text] {
              border: 1px solid #97D2EC;  
            }
          }

          </style>
          </head>
          <body>

          <div class="container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div>

          <script>
          function myFunction(x) {
            x.classList.toggle("change");
          }
          </script>
    </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="text-align: center;">
      <a href="home"  class="nav-link" style="text-decorations:none; color:white;" >
        <img src="{{asset('assets/dist/img/h.png' )}}" width="30px" alt=""  >
        𝐇𝐎𝐌𝐄
      </a>
    </li>
  </ul>

  <!-- Center navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown ml-auto text-center">
      <a class="nav-link dropdown-toggle" style="text-decorations:none; color:white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        𝐆𝐞𝐝𝐮𝐧𝐠 𝟏
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ route('ltsgds.index') }}">Lantai 1</a>
        <a class="dropdown-item" href="{{ route('ltdgds.index') }}">Lantai 2</a>
        <a class="dropdown-item" href="{{ route('lttgds.index') }}">Lantai 3</a>
        <a class="dropdown-item" href="{{ route('ltegds.index') }}">Lantai 4</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="text-decorations:none; color:white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        𝐆𝐞𝐝𝐮𝐧𝐠 𝟐
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ route('ltsgdd.index') }}">Lantai 1</a>
        <a class="dropdown-item" href="{{ route('ltdgdd.index') }}">Lantai 2</a>
        <a class="dropdown-item" href="{{ route('lttgdd.index') }}">Lantai 3</a>
        <a class="dropdown-item" href="{{ route('ltegdd.index') }}">Lantai 4</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="text-decorations:none; color:white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        𝐆𝐞𝐝𝐮𝐧𝐠 𝟑
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ route('basement.index') }}">Basement</a>
        <a class="dropdown-item" href="{{ route('ltsgdt.index') }}">Lantai 1</a>
        <a class="dropdown-item" href="{{ route('ltdgdt.index') }}">Lantai 2</a>
        <a class="dropdown-item" href="{{ route('lttgdt.index') }}">Lantai 3</a>  
        <a class="dropdown-item" href="{{ route('ltegdt.index') }}">Lantai 4</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="text-decorations:none; color:white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        𝐆𝐞𝐝𝐮𝐧𝐠 𝟒
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ route('gd4.index') }}">Apotek</a>
      </div>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a href="{{ route('riwayat.index') }}"  class="nav-link" style="text-decorations:none; color:white;" >
        <i class="bi bi-bootstrap-reboot"></i>
        𝐑𝐢𝐰𝐚𝐲𝐚𝐭
      </a>
    </li>

    <li class="nav-item">
     <a class="nav-link"  href="{{ route('logout') }}"
     onclick="event.preventDefault();
         document.getElementById('logout-form').submit();" role="button">
       <img src="{{asset('assets/dist/img/logoutt.png' )}}" width="30px" alt="">
     </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
   </li>

 </ul>

</nav>