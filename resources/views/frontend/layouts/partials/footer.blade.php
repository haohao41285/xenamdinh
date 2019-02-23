 <footer class="bd-footer text-muted" data-waypoint="70%">
      <div class="container"> 
        <div class="footer__wrapper">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <p>  Copyright © 2018 House to Home</p>
              <ul>
                {!! App\Models\MenuItem::createMenu(2) !!}
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>