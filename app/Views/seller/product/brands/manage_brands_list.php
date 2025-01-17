<?php
echo view('seller/include/header_top');
echo view('seller/include/header');
echo view('seller/include/sidebar');
?>
<div class="alert alert-success" style="display:none" id="success-msg"></div>
<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h4 class="page-title"><i class="fa fa-list"></i>&nbsp; <?php echo trans('brand_details') ?></h4>
                </div>
                <div class="d-inline-block float-right">
                    <a href="<?php echo base_url("seller/product/brands/add") ?>" class="btn btn-info btn-sm add"><i class="fa fa-plus"></i>
                        <?php echo trans('add_new_brand') ?></a>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- For Messages -->

            <div class="card">
                <div class="card-body table-responsive">
                    <table id="brand_details_table" class="table" width="100%">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo trans('logo') ?></th>
                                <th scope="col"><?php echo trans('name') ?></th>
                                <th scope="col"><?php echo trans('brand_description') ?></th>
                                <th scope="col"><?php echo trans('website_link') ?></th>
                                <!-- <th scope="col"><?php echo trans('seo_title') ?></th>
                                <th width="100"><?php echo trans('seo_description') ?></th> -->
                                <th width="100" class="text-end"><?php echo trans('action') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
echo view('seller/modals/add_hsn_modal.php');
echo view('seller/modals/edit_hsn_modal.php');
echo view('seller/include/footer.php');
?>
<script src="<?php echo base_url('public/custom/js/seller/brands.js') ?>"></script>