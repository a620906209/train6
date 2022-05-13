<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a6d1c9;">
    <a class="navbar-brand" href="/index">Train6 back end</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
          @if(Session::get('sales_id') == NULL)
              <a class="nav-item nav-link active" href="/index">業務登入</a>
          @endif
        <!-- <a class="nav-item nav-link active" href="#">Features</a> -->
      </div>
    </div>
  </nav>
