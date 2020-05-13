<footer>

    <div class="contenedor-footer text-white text-center">
      <div class="container">

        <div class="footer-menu border-bottom border-white row justify-content-center py-3">
          Trabajo Integrador Final - Curso Full Stack Digital House 2019 - <a href="">Creditos</a>
        </div>

        <div class="row py-3">

          <div class="col-md-4 p-2">
            <div class="footerLogo">
              <img src="{{ asset('img/logo.png') }}" alt="4OsosStore">
            </div>
          </div>

          <div class="col-md-4 p-2">
            <div class="linkSociales">
              <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-youtube"></a>
              <a href="#" class="fa fa-instagram"></a>
            </div>
          </div>

          <div class="col-md-4 p-2">
            <h3>Ponete en contacto</h3>
            <form id="frmContactoHome" action="contacto" method="POST">
              @csrf
              @if (Auth::user())
                  <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
              @endif
              <div id="nombre" class="form-group">
                <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Nombre" aria-describedby="helpId">
                <span class="errorForm" style="display:none;">.</span>
              </div>


              <div id="email" class="form-group">
                <input type="email" class="form-control" required name="email" id="email" aria-describedby="emailHelpId" placeholder="Email">
                <span class="errorForm" style="display:none;">.</span>
              </div>

              <div id="mensaje" class="form-group">
                <textarea class="form-control" name="mensaje" required id="mensaje" rows="3" placeholder="Dejanos tu mensaje"></textarea>
                <span class="errorForm" style="display:none;">.</span>
              </div>
              <button class="btn btn-primary w-100" type="submit"> Enviar </button>
            </form>
          </div>
        </div>

        <div class="border-top border-white row justify-content-center py-3">
          Trabajo Integrador Final - Curso Full Stack Digital House 2019 - <a href="">Creditos</a>
        </div>
      </div>
    </div>
    <button onclick="topFunction()" id="irArribaBtn" title="Ir arriba"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

    </footer>

