<script type="text/javascript">
function ModalAdd(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#addscrollable-modal .modal-body').html(
        '<div style="text-align:center;"><img src="<?php echo base_url() . 'assets/global/bg-pattern-light.svg'; ?>" /></div>'
    );
    jQuery('#addscrollable-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#addscrollable-modal').modal('show', {
        backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#addscrollable-modal .modal-body').html(response);
            jQuery('#addscrollable-modal .modal-title').html(header);
        }
    });
}

function ModalEdit(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#editscrollable-modal .modal-body').html(
        '<div style="text-align:center;"><img src="<?php echo base_url() . 'assets/global/bg-pattern-light.svg'; ?>" /></div>'
    );
    jQuery('#editscrollable-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#editscrollable-modal').modal('show', {
        backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#editscrollable-modal .modal-body').html(response);
            jQuery('#editscrollable-modal .modal-title').html(header);
        }
    });
}

function ModalAddLarge(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#addscrollablelarge-modal .modal-body').html(
        '<div style="text-align:center;"><img src="<?php echo base_url() . 'assets/global/bg-pattern-light.svg'; ?>" /></div>'
    );
    jQuery('#addscrollablelarge-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#addscrollablelarge-modal').modal('show', {
        backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#addscrollablelarge-modal .modal-body').html(response);
            jQuery('#addscrollablelarge-modal .modal-title').html(header);
        }
    });
}

function ModalEditLarge(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#editscrollablelarge-modal .modal-body').html(
        '<div style="text-align:center;"><img src="<?php echo base_url() . 'assets/global/bg-pattern-light.svg'; ?>" /></div>'
    );
    jQuery('#editscrollablelarge-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#editscrollablelarge-modal').modal('show', {
        backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#editscrollablelarge-modal .modal-body').html(response);
            jQuery('#editscrollablelarge-modal .modal-title').html(header);
        }
    });
}

function infomodallarge(url, header) {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#infomodallarge-modal .modal-body').html(
        '<div style="text-align:center;"><img src="<?php echo base_url() . 'assets/global/bg-pattern-light.svg'; ?>" /></div>'
    );
    jQuery('#infomodallarge-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#infomodallarge-modal').modal('show', {
        backdrop: 'true'
    });

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#infomodallarge-modal .modal-body').html(response);
            jQuery('#infomodallarge-modal .modal-title').html(header);
        }
    });
}
</script>

<!-- Add -->
<!-- hapus tabindex="-1" for select2-->
<div class="modal fade shadow-md" data-bs-backdrop="false" id="addscrollable-modal" data-keyboard="false" role="dialog"
    aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-light py-1">
                <div style="font-size: 13px;" class="modal-title text-uppercase" id="scrollableModalTitle">Modal title
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ml-2 mr-2" style="background-color: #f8f9fa;">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit -->
<div class="modal fade" id="editscrollable-modal" data-backdrop="static" data-keyboard="false" role="dialog"
    aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-light text-dark py-1">
                <div style="font-size: 14px;" class="modal-title text-uppercase font-weight-bold"
                    id="scrollableModalTitle">Modal title</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ml-2 mr-2">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- modaladdlarge -->
<div class="modal fade" id="addscrollablelarge-modal" data-backdrop="static" data-keyboard="false" role="dialog"
    aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-success text-white py-2">
                <h6 class="modal-title text-uppercase font-weight-bold" id="scrollableModalTitle">Modal title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- modaleditlarge -->
<div class="modal fade" id="editscrollablelarge-modal" data-backdrop="static" data-keyboard="false" role="dialog"
    aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white py-2">
                <h6 class="modal-title text-uppercase font-weight-bold" id="scrollableModalTitle">Modal title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- info modal large -->
<div class="modal fade" id="infomodallarge-modal" role="dialog" aria-labelledby="scrollableModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-light text-dark py-2">
                <h6 class="modal-title text-uppercase font-weight-bold" id="scrollableModalTitle">Modal title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Confirm Modal-->
<div class="modal fade mt-5" id="confirm" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md " role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning-light py-1">

                <!-- <h5 class="modal-title font-weight-bold" style="font-size: 11pt;" id="exampleModalLabel">Confirmation</h5> -->
                <div style="font-size: 13px;" class="modal-title text-uppercase" id="scrollableModalTitle">Confirmation
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body font-weight-bold text-center">Are you sure?
            </div>
            <div class="modal-body text-center">
                <button class="btn btn-danger px-4 py-1" type="button" data-bs-dismiss="modal">No</button>
                <a class="btn btn-primary btn-ok px-4 py-1">Yes</a>
            </div>
        </div>
    </div>
</div>