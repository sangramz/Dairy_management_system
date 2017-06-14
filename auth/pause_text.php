<?php
if ($pause == 1) {
echo  '<span data-toggle="tooltip" data-placement="left" title="" data-original-title="You have paused your delivery. Click on it to end it.">
  <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#pause">End Pause</button>
  </span>';
} elseif {
  echo '<span data-toggle="tooltip" data-placement="left" title="" data-original-title="Stop your delivery for 1 day or more days">
  <button type="button" class="btn btn-inverse btn-lg" data-toggle="modal" data-target="#pause">Pause Delivery</button>
  </span>
  <!-- Modal -->
  <div id="pause" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Pause Delivery</h4>
  </div>
  <div class="modal-body">
  <form action="auth/pause.php" method="post">
  <div class="input-group col-md-5">
  <input type="text" class="form-control" name="paudt" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" id="datepicker1">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  </div>
  </div>
  <div class="modal-footer">
  <input type="submit" class="btn btn-success" name="pause"/>
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </form>
  </div>
  </div>
  </div>';
}
 ?>
