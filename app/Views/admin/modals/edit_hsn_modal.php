<div class="modal center-modal fade" id="mdl_edit_hsn">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-info mb-0"><i class="ti-pencil me-15"></i> <?php echo trans('edit_hsn_info') ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="m-3">
                <form method="post" autocomplete="off" id="edit_hsn_detail" onsubmit="return false">
                    <?php echo csrf_field() ?>
                    <input type="hidden" id="e_hsn_id" name="hsn_id">
                    <div class="form-group">
                        <label for="username" class="control-label"><?php echo trans('details') ?> <span class="required">
                                *</span></label>
                        <div class="controls">
                            <input type="text" name="details" class="form-control" id="e_detail" placeholder="Enter your detail" data-validation-required-message="This field is required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="control-label"><?php echo trans('hsn_code') ?> <span class="required">
                                *</span></label>
                        <div class="controls">
                            <input type="text" name="hsn_code" class="form-control" id="e_hsn_code" placeholder="Enter your hsn code" data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="control-label"><?php echo trans('hsn_code_4_digits') ?> <span class="required"> *</span></label>
                        <div class="controls">
                            <input type="text" name="hsn_code_4_digits" class="form-control" id="e_hsn_code_4_digits" placeholder="Enter your hsn code (4 digit)" data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="control-label"><?php echo trans('gst_rate') ?> <span class="required">
                                *</span></label>
                        <div class="controls">
                            <input type="number" name="gst_rate" class="form-control" id="e_gst_rate" placeholder="Enter your gst rate" data-validation-required-message="This field is required">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info btn-sm px-4 pull-right tst3 " id="">
                            <?php echo trans('add_new_details') ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>