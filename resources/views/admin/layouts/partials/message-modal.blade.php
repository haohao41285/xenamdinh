 @if(session('message'))
    <div class="modal modal-danger fade text-center" id="modal-danger" style="border-radius:0 20px">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Message</h4>
              </div>
              <div class="modal-body">
                <span style="font-size: 16px">{{session('message')}}</span>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    @endif