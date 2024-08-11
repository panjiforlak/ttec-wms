<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-7 ">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-2 d-flex flex-row align-items-center border-bottom-primary justify-content-between">
                <h6 class="m-0 font-weight-bold text-dark">Master Company</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="POST" action="<?php echo site_url('master/company/edit/1'); ?>">
                    <div class="form-group">
                        <label class="col-form-label-sm font-weight-bold mb-0" for="">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="company_name" value="<?php echo $get_company['company_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label-sm font-weight-bold mb-0" for="">Address</label>
                        <textarea class="form-control form-control-sm text-capitalize" name="company_address"><?php echo $get_company['company_address']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label-sm font-weight-bold mb-0" for="">Contact </label>
                        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="company_phone1" value="<?php echo $get_company['company_phone1']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="company_phone2" value="<?php echo $get_company['company_phone2']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm text-capitalize" id="" name="company_phone3" value="<?php echo $get_company['company_phone3']; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label-sm font-weight-bold mb-0" for="">Email </label>
                        <input type="email" class="form-control form-control-sm text-capitalize" id="" name="company_mail1" value="<?php echo $get_company['company_mail1']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-sm text-capitalize" id="" name="company_mail2" value="<?php echo $get_company['company_mail2']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-sm text-capitalize" id="" name="company_mail3" value="<?php echo $get_company['company_mail3']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label-sm font-weight-bold mb-0" for="">Rekening </label>
                        <div class="row m-1">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-3 mr-1" id="" name="company_rek1_bank" value="<?php echo $get_company['company_rek1_bank']; ?>">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-3 mr-1" id="" name="company_rek1_an" value="<?php echo $get_company['company_rek1_an']; ?>">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-4" id="" name="company_rek1_no" value="<?php echo $get_company['company_rek1_no']; ?>">
                        </div>
                        <div class="row m-1">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-3 mr-1" id="" name="company_rek2_bank" value="<?php echo $get_company['company_rek2_bank']; ?>">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-3 mr-1" id="" name="company_rek2_an" value="<?php echo $get_company['company_rek2_an']; ?>">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-4" id="" name="company_rek2_no" value="<?php echo $get_company['company_rek2_no']; ?>">
                        </div>
                        <div class="row m-1">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-3 mr-1" id="" name="company_rek3_bank" value="<?php echo $get_company['company_rek3_bank']; ?>">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-3 mr-1" id="" name="company_rek3_an" value="<?php echo $get_company['company_rek3_an']; ?>">
                            <input type="text" class="form-control form-control-sm text-capitalize col-md-4" id="" name="company_rek3_no" value="<?php echo $get_company['company_rek3_no']; ?>">
                        </div>
                    </div>

                    <hr class="mt-4">
                    <center>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#confirm').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    })
</script>