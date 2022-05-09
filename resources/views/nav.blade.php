<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="/store">Train6 back end</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        @if(Session::get('store_id') == NULL)
            <a class="nav-item nav-link active" href="/store">店家登入</a>
        @endif
      <!-- <a class="nav-item nav-link active" href="#">Features</a> -->
    </div>
  </div>
</nav>
