<div class="container-fluid pageContent">
  <center>
    <div class="centerdiv">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          @if ($count == 0)
            <ul class="ul_noRes">
              <li> <h3>No Result...</h3></li>
            </ul>
            @else
              @foreach ($result as $res)
                <ul class="ul_res">
                  <a href="result/{{ $res->id }}">
                    <li><h3>{{ $res->search }}</h3></li>
                  </a>
                </ul>
              @endforeach
          @endif

        </div>
      </div>
    </div>
  </center>
</div>
