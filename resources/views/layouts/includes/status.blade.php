    <!-- Show status if exists -->
    @if (session('status'))
      <div class="alert alert-success fixed-bottom" role="alert">
          <strong> {{ session('status') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </div>
    @endif
    <!-- /.Show status -->

  <!-- Show status wrong if exists -->
  @if (session('statuswrong'))
  <div class="alert alert-danger fixed-bottom" role="alert">
      <strong> {{ session('statuswrong') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </div>
@endif
<!-- /.Show statuswrong -->
  
